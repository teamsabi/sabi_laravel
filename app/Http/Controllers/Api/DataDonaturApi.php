<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataDonatur;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DataDonaturApi extends Controller
{
    public function getDetailByUser()
    {
        $userId = auth()->id();

        $dataDonatur = DataDonatur::with(['detail'])
            ->where('user_id', $userId)
            ->get();

        if ($dataDonatur->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $allDetails = $dataDonatur->flatMap(function ($donatur) {
            return $donatur->detail->map(function ($detail) {
                return [
                    'id' => $detail->id,
                    'data_donatur_id' => $detail->data_donatur_id,
                    'nama_donatur' => $detail->nama_donatur,
                    'email' => $detail->email,
                    'no_whatsapp' => $detail->no_whatsapp,
                    'kategori_donasi' => $detail->kategori_donasi,
                    'nominal' => $detail->nominal,
                    'metode_pembayaran' => $detail->metode_pembayaran,
                    'status' => $detail->status,
                    'tanggal_transaksi' => $detail->tanggal_transaksi,
                    'waktu_berlalu' => Carbon::parse($detail->tanggal_transaksi)->diffForHumans(),
                ];
            });
        });

        return response()->json([
            'status' => 'success',
            'data' => $allDetails,
        ]);
    }
}
