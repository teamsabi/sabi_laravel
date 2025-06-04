<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataDonatur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataDonaturApi extends Controller
{
    public function getDetailByUser()
    {
        Carbon::setLocale('id');

        $userId = auth()->id();
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $dataDonatur = DataDonatur::with(['detail', 'kategoriDonasi'])
            ->where('user_id', $userId)
            ->get();

        if ($dataDonatur->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $filteredDetails = $dataDonatur->flatMap(function ($donatur) use ($startOfMonth, $endOfMonth) {
            return $donatur->detail->filter(function ($detail) use ($startOfMonth, $endOfMonth) {
                $tanggal = Carbon::parse($detail->tanggal_transaksi);
                return $tanggal->between($startOfMonth, $endOfMonth);
            })->map(function ($detail) use ($donatur) {
                return [
                    'id' => $detail->id,
                    'data_donatur_id' => $detail->data_donatur_id,
                    'nama_donatur' => $detail->nama_donatur,
                    'email' => $detail->email,
                    'no_whatsapp' => $detail->no_whatsapp,
                    'kategori_donasi' => $detail->kategori_donasi,
                    'gambar_donasi' => $donatur->kategoriDonasi->gambar ?? null,
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
            'data' => $filteredDetails->values(),
            'periode' => Carbon::now()->format('Y-m'),
        ]);
    }
}

