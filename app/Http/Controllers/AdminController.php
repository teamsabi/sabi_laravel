<?php

namespace App\Http\Controllers;

use App\Models\KategoriDonasi;
use App\Models\MidtransTransaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
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

        // Statistik Jumlah Donatur per Bulan (tidak peduli user_id sama)
        $bulan = collect(range(1, 12))->map(function ($m) {
            return Carbon::create()->month($m)->translatedFormat('F');
        });

        $jumlahDonaturPerBulan = [];
        for ($i = 1; $i <= 12; $i++) {
            $jumlah = MidtransTransaction::where('transaction_status', 'success')
                ->whereMonth('created_at', $i)
                ->whereYear('created_at', now()->year)
                ->count(); // Total semua transaksi sukses bulan tersebut (tidak unik)

            $jumlahDonaturPerBulan[] = $jumlah;
        }

        return view('administrator.dashboard.index', compact(
            'jumlahDonatur',
            'jumlahDonasi',
            'donasiSukses',
            'donasiAktif',
            'kategoriTerbaru',
            'bulan',
            'jumlahDonaturPerBulan'
        ));
    }
}
