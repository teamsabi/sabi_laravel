<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

// Halaman utama (Welcome)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk Login
Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');

// Route untuk Registrasi
Route::get('/registrasi', function () {
    return view('auth.registrasi');
})->name('auth.registrasi');

// Route untuk Profile
Route::get('/profile', function () {
    return view('administrator.profil.index'); 
})->name('profil.index');

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

// Route untuk Data Donatur
Route::get('/data-donatur', function () {
    return view('administrator.data donatur.index'); 
})->name('donatur.index');

// Route untuk Laporan
Route::prefix('laporan')->group(function() {
    Route::get('/',function () {
        return view('administrator.laporan.index'); 
    })->name('laporan.index');

    Route::get('/riwayat', function() {
        return view('administrator.laporan.history');
    })->name('laporan.riwayat');
});
