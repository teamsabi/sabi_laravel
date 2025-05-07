<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Str;
use App\Models\MidtransTransaction;

class PaymentDonasiController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    /**
     * Membuat Snap Token dan menyimpan transaksi ke database.
     */
    public function createCharge(Request $request)
    {
        $user = auth()->user();

        $orderId = 'DONASI-' . Str::upper(Str::random(10));

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => (int) $request->gross_amount,
            ],
            'customer_details' => [
                'first_name' => $user->nama_lengkap,
                'email' => $user->email,
                'phone' => $user->no_whatsapp,
            ],
        ];

        // Generate Snap Token
        $snapToken = Snap::getSnapToken($params);

        // Simpan transaksi ke database
        MidtransTransaction::create([
            'order_id' => $orderId,
            'user_id' => $user->id,
            'kategori_donasi_id' => $request->kategori_donasi_id,
            'gross_amount' => (int) $request->gross_amount,
            'payment_type' => '-', // Akan diupdate setelah callback
            'transaction_status' => 'pending',
            'fraud_status' => null,
            'bank' => null,
            'va_number' => null,
            'pdf_url' => null,
            'payload' => null,
        ]);

        return response()->json(['snap_token' => $snapToken]);
    }

    /**
     * Callback dari Midtrans untuk memperbarui status transaksi.
     */
    public function midtransCallback(Request $request)
    {
        // Ambil notifikasi Midtrans
        $notification = new Notification();

        $orderId = $notification->order_id;
        $transactionStatus = $notification->transaction_status;
        $fraudStatus = $notification->fraud_status;
        $paymentType = $notification->payment_type;
        $bank = $notification->va_numbers[0]->bank ?? null;
        $vaNumber = $notification->va_numbers[0]->va_number ?? null;
        $pdfUrl = $notification->pdf_url ?? null;

        // Temukan transaksi berdasarkan order_id
        $transaction = MidtransTransaction::where('order_id', $orderId)->first();

        if (!$transaction) {
            return response()->json(['status' => 'failed', 'message' => 'Transaction not found'], 404);
        }

        // Update status transaksi
        switch ($transactionStatus) {
            case 'capture':
                $transaction->transaction_status = ($fraudStatus === 'challenge') ? 'challenge' : 'success';
                break;
            case 'settlement':
                $transaction->transaction_status = 'success';
                break;
            case 'pending':
                $transaction->transaction_status = 'pending';
                break;
            case 'deny':
            case 'cancel':
            case 'expire':
                $transaction->transaction_status = 'failed';
                break;
        }

        // Simpan detail pembayaran
        $transaction->payment_type = $paymentType;
        $transaction->fraud_status = $fraudStatus;
        $transaction->bank = $bank;
        $transaction->va_number = $vaNumber;
        $transaction->pdf_url = $pdfUrl;
        $transaction->payload = json_encode($notification);

        $transaction->save();

        return response()->json(['status' => 'success']);
    }
}
