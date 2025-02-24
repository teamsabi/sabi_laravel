<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

// Halaman utama (Welcome)
Route::get('/', function () {
    return view('welcome');
});

// Halaman Dashboard
Route::get('/dashboard', function () {
    return view('administrator.dashboard.index');
});

// Route untuk Akun
Route::prefix('akun')->group(function() {
    Route::get('/', [Controller::class, 'index'])->name('akun.index');
    Route::get('/tambah', [Controller::class, 'create'])->name('akun.create');
});

// Halaman Katalog Donasi
Route::get('/katalog', function () {
    return view('administrator.katalog_donasi.index');
});
