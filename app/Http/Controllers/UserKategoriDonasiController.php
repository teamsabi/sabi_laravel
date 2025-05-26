<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriDonasi;

class UserKategoriDonasiController extends Controller
{
    public function index(Request $request)
    {
        $kategoriDonasi = KategoriDonasi::where('status', 'aktif')
                                        ->latest()
                                        ->get();

        $pesan = $request->query('pesan'); 

        return view('user.donasi.index', compact('kategoriDonasi', 'pesan'));
    }
}