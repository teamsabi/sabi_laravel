<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MidtransTransaction;
use App\Models\DataDonatur;
use Carbon\Carbon;

class TransaksiApiController extends Controller
{
    // Mengambil data transaksi user yang sedang login (via Sanctum)
    public function getTransaksiUser()
    {
        $user = auth()->user();

        // Ambil semua transaksi user ini dan relasi ke kategori
        $transaksi = MidtransTransaction::with('kategoriDonasi')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at')
            ->get();

        if ($transaksi->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Transaksi tidak ditemukan untuk user ini.',
            ], 404);
        }

        // Format response
        $data = $transaksi->map(function ($item) {
            $judulDonasi = $item->kategoriDonasi->judul_donasi ?? 'Donasi';
            $nominal = number_format($item->gross_amount, 0, ',', '.');
            $message = '';

            switch ($item->transaction_status) {
                case 'success':
                    $message = "Donasi sebesar Rp.{$nominal} ke {$judulDonasi} telah berhasil. Terima kasih atas dukungan Anda!";
                    break;
                case 'pending':
                    $message = "Pembayaran donasi ke {$judulDonasi} masih tertunda. Selesaikan sebelum batas waktu habis.";
                    break;
                case 'failed':
                case 'deny':
                case 'cancel':
                case 'expire':
                    $message = "Donasi gagal. Silahkan coba beberapa saat lagi.";
                    break;
                default:
                    $message = "Status transaksi tidak dikenali.";
                    break;
            }

            return [
                'order_id' => $item->order_id,
                'judul_donasi' => $judulDonasi,
                'gross_amount' => $item->gross_amount,
                'transaction_status' => $item->transaction_status,
                'message' => $message,
                'created_at' => $item->created_at,
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function getTotalDonasi()
    {
        $user = auth()->user();

        $dataDonatur = DataDonatur::with(['detail' => function ($query) {
            $query->where('status', 'success');
        }])->where('user_id', $user->id)->get();

        if ($dataDonatur->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Belum ada data donasi.',
                'total_donasi' => 0
            ], 404);
        }

        $totalDonasi = $dataDonatur->flatMap(function ($donatur) {
            return $donatur->detail;
        })->sum('nominal');

        return response()->json([
            'status' => 'success',
            'total_donasi' => $totalDonasi,
        ]);
    }

    public function totalDonasiBulanIni()
    {
        $user = auth()->user();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $total = DataDonatur::with('detail')
            ->where('user_id', $user->id)
            ->get()
            ->flatMap(function ($dataDonatur) use ($startOfMonth, $endOfMonth) {
                return $dataDonatur->detail->filter(function ($detail) use ($startOfMonth, $endOfMonth) {
                    return $detail->status === 'success' &&
                           Carbon::parse($detail->tanggal_transaksi)->between($startOfMonth, $endOfMonth);
                });
            })
            ->sum('nominal');

        return response()->json([
            'status' => 'success',
            'total_donasi_bulan_ini' => $total,
            'periode' => $startOfMonth->format('Y-m')
        ]);
    }
}
