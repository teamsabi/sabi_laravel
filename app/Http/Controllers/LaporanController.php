<?php

namespace App\Http\Controllers;

use App\Models\KategoriDonasi;
use App\Models\DetailDataDonatur;
use Illuminate\Http\Request;

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

        return view('administrator.laporan.history', compact('detailDonatur'));
    }
}
