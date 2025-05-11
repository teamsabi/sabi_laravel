<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MidtransTransaction;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config as MidtransConfig;
use Illuminate\Support\Facades\Log;


class PaymentDonasiController extends Controller
{
    public function createCharge(Request $request)
    {
        MidtransConfig::$serverKey = config('midtrans.server_key');
        MidtransConfig::$isProduction = config('midtrans.is_production');
        MidtransConfig::$isSanitized = true;
        MidtransConfig::$is3ds = true;

        $nominal = (int) str_replace('.', '', $request->nominal);

        $formattedNominal = 'Rp ' . number_format($nominal, 0, ',', '.');
    
        $orderId = 'DONASI-' . time() . '-' . Str::random(5);
    
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
                'user_id' => Auth::id(),
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

            return view('user.donasi.detail_transaksi', compact('snapToken', 'request', 'formattedNominal'));
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memproses pembayaran.');
        }
    }

    public function handleCallback(Request $request)
    {
        MidtransConfig::$serverKey = config('midtrans.server_key');
        MidtransConfig::$isProduction = config('midtrans.is_production');
        MidtransConfig::$isSanitized = true;
        MidtransConfig::$is3ds = true;
    
        try {
            $notif = new Notification();
    
            $transaction = MidtransTransaction::where('order_id', $notif->order_id)->first();
    
            if (!$transaction) {
                Log::warning("Transaksi tidak ditemukan: {$notif->order_id}");
                return response()->json(['message' => 'Transaction not found'], 404);
            }
    
            $status = $notif->transaction_status;
            $type = $notif->payment_type;
            $fraud = $notif->fraud_status ?? null;
            $bank = $notif->va_numbers[0]->bank ?? null;
            $vaNumber = $notif->va_numbers[0]->va_number ?? null;
            $pdfUrl = $notif->pdf_url ?? null;
    
            // Default status
            $finalStatus = $transaction->transaction_status;
    
            if ($status == 'capture') {
                if ($type == 'credit_card') {
                    $finalStatus = ($fraud == 'challenge') ? 'challenge' : 'success';
                }
            } elseif ($status == 'settlement') {
                $finalStatus = 'success';
            } elseif ($status == 'pending') {
                $finalStatus = 'pending';
            } elseif (in_array($status, ['deny', 'cancel', 'expire'])) {
                $finalStatus = 'failed';
            }
    
            // Update transaksi
            $transaction->update([
                'transaction_status' => $finalStatus,
                'payment_type' => $type,
                'fraud_status' => $fraud,
                'bank' => $bank,
                'va_number' => $vaNumber,
                'pdf_url' => $pdfUrl,
                'payload' => json_encode($notif),
            ]);
    
            // Tambahkan logika update kategori_donasi jika success
            if ($finalStatus === 'success') {
                $kategori = \App\Models\KategoriDonasi::find($transaction->kategori_donasi_id);
    
                if ($kategori) {
                    $kategori->increment('jumlah_donatur');
                    $kategori->increment('donasi_terkumpul', $transaction->gross_amount);
                }
            }
    
            Log::info("Callback berhasil. Order ID: {$notif->order_id}, Status: {$finalStatus}");
    
            return response()->json(['message' => 'Callback handled successfully']);
        } catch (\Exception $e) {
            Log::error("Callback error: " . $e->getMessage());
            return response()->json(['message' => 'Callback error'], 500);
        }
    }
    
}
