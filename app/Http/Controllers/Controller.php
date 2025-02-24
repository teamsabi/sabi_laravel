<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // Tampilkan halaman index akun
    public function index()
    {
        return view('administrator.akun.index');
    }

    // Tampilkan halaman tambah akun (add)
    public function create()
    {
        return view('administrator.akun.add');
    }
}
