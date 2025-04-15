<?php

use PHPUnit\Util\Http\Downloader;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KategoriDonasiController;

// Halaman utama (Welcome)
Route::get('/', function () {
    return view('user.home.index');
});

// Route untuk Login
Route::get('/sesi', function () {
    return view('auth.login');
})->name('auth.login');

// Route untuk Registrasi
Route::get('/reg', function () {
    return view('auth.registrasi');
})->name('auth.registrasi');

// Route untuk Lupa Password
Route::get('/lupa-password', function () {
    return view('auth.lupa_password');
})->name('auth.lupa_password');

// Route untuk Lupa Password
Route::prefix('lupa-password')->group(function() {
    Route::get('/', function () {
        return view('auth.lupa_password');
    })->name('auth.lupa_password');

    Route::get('/kode-otp', function () {
        return view('auth.kode_otp');
    })->name('auth.kode_otp');

    Route::get('/new-password', function () {
        return view('auth.new_password');
    })->name('auth.new_password');
});

// Route untuk Profile
Route::get('/profile', function () {
    return view('administrator.profil.index'); 
})->name('profil.index');

// Route untuk Dashboard
Route::get('/admin', function () {
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

// Route untuk Profile User
Route::get('/profile', function () {
    return view('user.profil.index'); 
})->name('profil.index');

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
Route::get('/user', function () {
    return view('user.home.index');
})->name('home.index');

// Route untuk Kategori Donasi
Route::prefix('user')->group(function () {
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

    Route::get('/faq', function () {
        return view('user.FAQ.index');
    })->name('FAQ.index');
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




Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth'])->group(function () {
    // Kategori Donasi (hanya untuk user login)
    Route::get('/kategori', [KategoriDonasiController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriDonasiController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriDonasiController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}/edit', [KategoriDonasiController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [KategoriDonasiController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriDonasiController::class, 'destroy'])->name('kategori.destroy');

    // Yang lain (profil, dashboard, dsb)
    Route::get('/admin', [AdminController::class, 'index'])->middleware('role:admin')->name('dashboard');
    Route::get('/user', [UserController::class, 'index'])->middleware('role:user')->name('home.index');
    Route::get('/profile', [ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil/update', [ProfilController::class, 'updateProfile'])->name('profil.update');
});


Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
Route::get('/akun/{id}/edit', [AkunController::class, 'edit'])->name('akun.edit');
Route::delete('/akun/{id}', [AkunController::class, 'destroy'])->name('akun.destroy');
Route::put('/akun/{id}', [AkunController::class, 'update'])->name('akun.update');
Route::get('/akun/create', [AkunController::class, 'create'])->name('akun.create');
Route::post('/akun', [AkunController::class, 'store'])->name('akun.store');



