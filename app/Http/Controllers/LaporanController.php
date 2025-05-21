<?php

namespace App\Http\Controllers;

use App\Models\KategoriDonasi;
use App\Models\DetailDataDonatur;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        $kategoriDonasi = KategoriDonasi::all();
        return view('administrator.laporan.index', compact('kategoriDonasi'));
    }

    public function detail($id)
    {
        // Ambil semua detail donatur berdasarkan kategori donasi yang dipilih
        $detailDonatur = DetailDataDonatur::whereHas('dataDonatur', function ($query) use ($id) {
            $query->where('kategori_donasi_id', $id);
        })->get();

        $kategori = KategoriDonasi::findOrFail($id);

        $totalDana = $detailDonatur->whereIn('status', ['success', 'settlement'])->sum('nominal');

        return view('administrator.laporan.history', compact('detailDonatur', 'kategori', 'totalDana'));
    }

    public function print($id)
    {
        $kategori = KategoriDonasi::findOrFail($id);

        $dataDonaturIds = $kategori->dataDonatur()->pluck('id');

        $detailDonatur = DetailDataDonatur::whereIn('data_donatur_id', $dataDonaturIds)
                                        ->whereIn('status', ['success', 'settlement'])
                                        ->get();

        $totalDana = $detailDonatur->whereIn('status', ['success', 'settlement'])->sum('nominal');

        $pdf = Pdf::loadView('administrator.laporan.pdf', compact('kategori', 'detailDonatur', 'totalDana'))
                 ->setPaper('A4', 'landscape');

        return $pdf->stream('laporan_donatur_' . now()->format('Ymd_His') . '.pdf');
    }
}
