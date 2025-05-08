<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config as MidtransConfig;
use App\Models\MidtransTransaction;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

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
    
}
