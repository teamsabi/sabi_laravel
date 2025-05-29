<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Midtrans\Notification;
use App\Models\DataDonatur;
use App\Models\DetailDataDonatur;
use App\Models\KategoriDonasi;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MidtransTransaction;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config as MidtransConfig;

class PaymentDonasiApiController extends Controller
{
        public function createCharge(Request $request)
    {
        // Validasi
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string',
            'kategori_donasi_id' => 'required|exists:kategori_donasi,id',
            'nominal' => 'required|numeric|min:1000',
            'user_id' => 'required|exists:users,id'
        ]);

        // Konfigurasi Midtrans
        MidtransConfig::$serverKey = config('midtrans.server_key');
        MidtransConfig::$isProduction = config('midtrans.is_production');
        MidtransConfig::$isSanitized = true;
        MidtransConfig::$is3ds = true;

        $orderId = 'DONASI-' . time() . '-' . Str::random(5);
        $nominal = (int) $request->nominal;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $nominal,
            ],
            'customer_details' => [
                'first_name' => $request->nama,
                'email' => $request->email,
                'phone' => $request->telepon,
            ]
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            MidtransTransaction::create([
                'order_id' => $orderId,
                'user_id' => $request->user_id,
                'kategori_donasi_id' => $request->kategori_donasi_id,
                'gross_amount' => $nominal,
                'payment_type' => 'pending',
                'transaction_status' => 'pending',
                'fraud_status' => null,
                'bank' => null,
                'va_number' => null,
                'pdf_url' => null,
                'payload' => $params,
            ]);

            return response()->json([
                'success' => true,
                'snap_token' => $snapToken,
                'order_id' => $orderId,
                'gross_amount' => $nominal,
                'message' => 'Token Midtrans berhasil dibuat'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat membuat token Midtrans',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function HandleCallback(Request $request)
    {
        // Pastikan key Midtrans sudah diset di .env: MIDTRANS_SERVER_KEY dll.
        MidtransConfig::$serverKey    = config('midtrans.server_key');
        MidtransConfig::$isProduction = config('midtrans.is_production');
        MidtransConfig::$isSanitized  = true;
        MidtransConfig::$is3ds        = true;

        try {
            // Buat instance Notification dari payload JSON
            // Notification() akan otomatis membaca JSON dari body request.
            $notif = new Notification();

            // Cari transaksi berdasarkan order_id dari payload
            $transaction = MidtransTransaction::where('order_id', $notif->order_id)->first();

            if (! $transaction) {
                Log::warning("Transaksi tidak ditemukan: {$notif->order_id}");
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Transaction not found'
                ], 404);
            }

            // Ambil beberapa field dari notifikasi
            $status        = $notif->transaction_status;
            $type          = $notif->payment_type;
            $fraud         = $notif->fraud_status ?? null;
            $bank          = $notif->va_numbers[0]->bank      ?? null;
            $vaNumber      = $notif->va_numbers[0]->va_number ?? null;
            $pdfUrl        = $notif->pdf_url ?? null;

            // Tentukan final status berdasarkan rules Midtrans
            $finalStatus = $transaction->transaction_status;
            if ($status == 'capture' && $type == 'credit_card') {
                $finalStatus = ($fraud == 'challenge') ? 'challenge' : 'success';
            }
            elseif ($status == 'settlement') {
                $finalStatus = 'success';
            }
            elseif ($status == 'pending') {
                $finalStatus = 'pending';
            }
            elseif (in_array($status, ['deny','cancel','expire'])) {
                $finalStatus = 'failed';
            }

            // Update record midtrans_transactions
            $transaction->update([
                'transaction_status' => $finalStatus,
                'payment_type'       => $type,
                'fraud_status'       => $fraud,
                'bank'               => $bank,
                'va_number'          => $vaNumber,
                'pdf_url'            => $pdfUrl,
                'payload'            => json_encode($notif),
            ]);

            // Jika berhasil, perbarui kategori_donasi
            $kategori = KategoriDonasi::find($transaction->kategori_donasi_id);
            if ($finalStatus === 'success' && $kategori) {
                $kategori->increment('jumlah_donatur');
                $kategori->increment('donasi_terkumpul', $transaction->gross_amount);
            }

            // Ambil data user
            $user = User::find($transaction->user_id);

            // Buat atau ambil entri data_donatur (hindari duplikasi)
            $dataDonatur = DataDonatur::firstOrCreate([
                'user_id'            => $transaction->user_id,
                'kategori_donasi_id' => $transaction->kategori_donasi_id,
                'transaction_id'     => $transaction->id,
            ]);

            // Tambah entri baru di detail_data_donatur
            DetailDataDonatur::create([
                'data_donatur_id'    => $dataDonatur->id,
                'nama_donatur'       => $user->nama_lengkap   ?? 'Anonim',
                'email'              => $user->email          ?? '-',
                'no_whatsapp'        => $user->no_whatsapp    ?? '-',
                'kategori_donasi'    => $kategori->judul_donasi ?? '-',
                'nominal'            => $transaction->gross_amount,
                'metode_pembayaran'  => $type,
                'status'             => $finalStatus,
                'tanggal_transaksi'  => now(),
            ]);

            Log::info("Callback API berhasil. Order ID: {$notif->order_id}, Status: {$finalStatus}");

            return response()->json([
                'status'  => 'success',
                'message' => 'Callback API handled successfully'
            ], 200);
        }
        catch (\Exception $e) {
            Log::error("Callback API error: " . $e->getMessage());
            return response()->json([
                'status'  => 'error',
                'message' => 'Callback API error'
            ], 500);
        }
    }
}
