<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KategoriDonasiController;
use App\Http\Controllers\UserKategoriDonasiController;

// =========================
// Guest (belum login)
// =========================
Route::middleware('guest')->group(function () {
    Route::get('/sesi', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/sesi', [AuthController::class, 'login']);
    Route::get('/reg', [AuthController::class, 'create'])->name('auth.registrasi');
    Route::post('/reg', [AuthController::class, 'register']);
    Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);

    // Halaman Lupa Password
    Route::prefix('lupa-password')->group(function () {
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
});

// =========================
// Logout
// =========================
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// =========================
// Halaman utama sebelum login
// =========================
Route::get('/', function () {
    return view('user.home.index');
});

// =========================
// Authenticated User
// =========================
Route::middleware(['auth'])->group(function () {

    // -------------------------
    // Role Admin
    // -------------------------
    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

        // CRUD Akun
        Route::resource('/akun', AkunController::class);

        // CRUD Kategori Donasi
        Route::get('/kategori', [KategoriDonasiController::class, 'index'])->name('kategori.index');
        Route::get('/kategori/create', [KategoriDonasiController::class, 'create'])->name('kategori.create');
        Route::post('/kategori', [KategoriDonasiController::class, 'store'])->name('kategori.store');
        Route::get('/kategori/{id}/edit', [KategoriDonasiController::class, 'edit'])->name('kategori.edit');
        Route::put('/kategori/{id}', [KategoriDonasiController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori/{id}', [KategoriDonasiController::class, 'destroy'])->name('kategori.destroy');

        // Laporan
        Route::prefix('laporan')->group(function () {
            Route::get('/', fn () => view('administrator.laporan.index'))->name('laporan.index');
            Route::get('/riwayat', fn () => view('administrator.laporan.history'))->name('laporan.riwayat');
        });

        // Data Donatur
        Route::get('/data-donatur', fn () => view('administrator.data donatur.index'))->name('donatur.index');
    });

    // -------------------------
    // Role User
    // -------------------------
    Route::middleware('role:user')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('home.index');

        // Halaman Donasi untuk User
        Route::get('/user/donasi', [UserKategoriDonasiController::class, 'index'])->name('donasi.index');

        // Halaman Lain
        Route::get('/user/download', fn () => view('user.download.index'))->name('download.index');
        Route::get('/user/about', fn () => view('user.about.index'))->name('about.index');
        Route::get('/user/faq', fn () => view('user.FAQ.index'))->name('FAQ.index');
    });

    // -------------------------
    // Profil untuk semua yang login
    // -------------------------
    Route::get('/profile', [ProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil/update', [ProfilController::class, 'updateProfile'])->name('profil.update');
});