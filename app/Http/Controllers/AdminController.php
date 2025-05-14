<?php

namespace App\Http\Controllers;

use App\Models\KategoriDonasi;
use App\Models\MidtransTransaction;

class AdminController extends Controller
{
    function index()
    {
        $kategoriTerbaru = KategoriDonasi::latest()->first();

        $jumlahDonatur = 0;
        $jumlahDonasi = 0;
        $donasiSukses = 0;

        if ($kategoriTerbaru) {
            $jumlahDonatur = MidtransTransaction::where('kategori_donasi_id', $kategoriTerbaru->id)
            ->where('transaction_status', 'success')
            ->count();

            $jumlahDonasi = MidtransTransaction::where('kategori_donasi_id', $kategoriTerbaru->id)
            ->where('transaction_status', 'success')
            ->sum('gross_amount');

            $donasiSukses = MidtransTransaction::where('kategori_donasi_id', $kategoriTerbaru->id)
                ->where('transaction_status', 'success')
                ->count();
        }

        $donasiAktif = KategoriDonasi::where('status', 'aktif')->count();

        return view('administrator.dashboard.index', compact(
            'jumlahDonatur',
            'jumlahDonasi',
            'donasiSukses',
            'donasiAktif',
            'kategoriTerbaru'
        ));
    }
}
