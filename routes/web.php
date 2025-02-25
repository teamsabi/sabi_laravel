<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

// Halaman utama (Welcome)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk Dashboard
Route::get('/dashboard', function () {
    return view('administrator.dashboard.index'); 
})->name('dashboard');

// Route untuk Akun
Route::prefix('akun')->group(function() {
    Route::get('/', function () {
        return view('administrator.akun.index');
    })->name('akun.index');

    Route::get('/tambah', function () {
        return view('administrator.akun.add');
    })->name('akun.create');
});

// Route untuk Kategori Donasi
Route::prefix('kategori-donasi')->group(function() {
    Route::get('/', function () {
        return view('administrator.kategori donasi.index');
    })->name('kategori.index');

    Route::get('/tambah', function () {
        return view('administrator.kategori donasi.add');
    })->name('kategori.create');
});

