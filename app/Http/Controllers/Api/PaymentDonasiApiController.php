<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
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
}
