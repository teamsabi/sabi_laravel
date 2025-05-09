<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Notification;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MidtransTransaction;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config as MidtransConfig;

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

    public function handle(Request $request)
    {
        $notif = new Notification();

        $orderId = $notif->order_id;

        $transaction = MidtransTransaction::where('order_id', $orderId)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        $transaction->update([
            'payment_type' => $notif->payment_type,
            'transaction_status' => $notif->transaction_status,
            'fraud_status' => $notif->fraud_status ?? null,
            'bank' => $notif->va_numbers[0]->bank ?? null,
            'va_number' => $notif->va_numbers[0]->va_number ?? null,
            'pdf_url' => $notif->pdf_url ?? null,
        ]);

        return response()->json(['message' => 'Callback handled successfully']);
    }
    
}
