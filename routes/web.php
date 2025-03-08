<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use PHPUnit\Util\Http\Downloader;

// Halaman utama (Welcome)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk Login
Route::get('/sesi', function () {
    return view('auth.login');
})->name('auth.login');

// Route untuk Registrasi
Route::get('/reg', function () {
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

// Route untuk Halaman Index User
Route::get('/JTICare', function () {
    return view('user.home.index');
})->name('home.index');

// Route untuk Kategori Donasi
Route::prefix('JTICare')->group(function () {
    Route::get('/', function () {
        return view('user.home.index');
    })->name('home.index');

    Route::get('/donasi', function () {
        return view('user.donasi.index');
    })->name('donasi.index');

    Route::get('/download', function () {
        return view('user.download.index');
    })->name('download.index');

    Route::get('/about', function () {
        return view('user.about.index');
    })->name('about.index');
});

Route::middleware('guest')->group(function () {
    Route::get('/sesi', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/sesi', [AuthController::class, 'login']);
    Route::get('/reg', [AuthController::class, 'create'])->name('auth.registrasi');
    Route::post('/reg', [AuthController::class, 'register']);
    Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);
});

Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
Route::get('/user', [UserController::class, 'index'])->name('home.index');


Route::put('/profil/update', [ProfilController::class, 'updateProfile'])->name('profil.update');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    // Hanya admin yang bisa mengakses dashboard admin
    Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('role:admin')
        ->name('dashboard');

    // Hanya user biasa yang bisa mengakses halaman user
    Route::get('/user', [UserController::class, 'index'])
        ->middleware('role:user')
        ->name('home.index');
});


