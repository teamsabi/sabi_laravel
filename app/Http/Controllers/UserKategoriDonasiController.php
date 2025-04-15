<?php

namespace App\Http\Controllers;

use App\Models\KategoriDonasi;

class UserKategoriDonasiController extends Controller
{
    public function index()
    {
        $kategoriDonasi = KategoriDonasi::all(); // Atau bisa pakai paginate
        return view('user.donasi.index', compact('kategoriDonasi'));
    }
}