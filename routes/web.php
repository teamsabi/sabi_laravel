<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KategoriDonasiController;
use App\Http\Controllers\UserKategoriDonasiController;

// Guest (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/sesi', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/sesi', [AuthController::class, 'login']);
    Route::get('/reg', [AuthController::class, 'create'])->name('auth.registrasi');
    Route::post('/reg', [AuthController::class, 'register']);
    Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);

    Route::get('/verify-email-baru/{verify_key}', [AuthController::class, 'verifyNewEmail'])->name('auth.verify_email_baru');

    // Halaman Lupa Password
    Route::prefix('lupa-password')->group(function () {
        Route::get('/', [AuthController::class, 'showForgotPasswordForm'])->name('auth.lupa_password');
        Route::post('/kirim', [AuthController::class, 'sendResetLink'])->name('auth.lupa_password.kirim');

        Route::get('/new-password', [AuthController::class, 'showResetForm'])->name('auth.new_password');
        Route::post('/new-password', [AuthController::class, 'updatePassword'])->name('auth.lupa_password.update');    
    });

    // Halaman utama sebelum login (untuk guest)
    Route::get('/', [KategoriDonasiController::class, 'tampilTigaKategori'])->name('beranda');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Authenticated User
Route::middleware(['auth'])->group(function () {

    // Role Admin
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

        // Dokumentasi
        Route::get('/dokumentasi', function () {
            return view('administrator.dokumentasi.index');
        })->name('dokumentasi.index');

        Route::get('/dokumentasi/create', function () {
            return view('administrator.dokumentasi.add');
        })->name('dokumentasi.add');

        // Profil Admin
        Route::get('/profile', [ProfilController::class, 'index'])->name('profil.index');
        Route::put('/profil/update', [ProfilController::class, 'updateProfile'])->name('profil.update');
        Route::put('/admin/profil/hapus-foto', [ProfilController::class, 'hapusFoto'])->name('profil.hapus-foto');
        Route::get('/profile/pengaturan-akun', function () {
            return view('administrator.profil.pengaturan-akun');
        })->name('admin.profil.pengaturan-akun');

        // Ganti Email Admin via AuthController
        Route::post('/profile/ganti-email', [AuthController::class, 'updateEmail'])->name('update.email');

        // Ganti Password baru
        Route::post('/update-password', [ProfilController::class, 'updatePassword'])->name('update.password');

        Route::delete('/admin/hapus-akun', [ProfilController::class, 'hapusAkun'])->name('admin.hapus-akun');
    });

    // Role User
    Route::middleware('role:user')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('home.index');

        // Halaman Donasi untuk User
        Route::get('/user/donasi', [UserKategoriDonasiController::class, 'index'])->name('donasi.index');

        // Halaman Lain
        Route::get('/dokumentasi', function () {
            return view('user.dokumentasi.index');
        })->name('dokumentasi.index');

        Route::get('/dokumentasi/detail', function () {
            return view('user.dokumentasi.detail_dokumentasi');
        })->name('dokumentasi.detail');

        Route::get('/user/download', fn () => view('user.download.index'))->name('download.index');
        Route::get('/user/about', fn () => view('user.about.index'))->name('about.index');
        Route::get('/user/faq', fn () => view('user.FAQ.index'))->name('FAQ.index');
        Route::get('/user/kontak', fn () => view('user.hubungi kami.index'))->name('hubungi kami.index');

        // Route yang ingin diamankan (Detail Donasi)
        Route::get('/user/detail/{id}', [KategoriDonasiController::class, 'detail'])->name('donasi.detail');
        

        // Form Donasi
        Route::get('/user/berdonasi/{id}', [KategoriDonasiController::class, 'formDonasi'])->name('donasi.form_donasi');

        // Halaman utama setelah login
        Route::get('/beranda', [KategoriDonasiController::class, 'tampilTigaKategori'])->name('beranda.login');
        
        //Profil untuk User
        Route::get('/profil', [ProfilController::class, 'user'])->name('user.profil.index');
        Route::put('user/profil/update', [ProfilController::class, 'updateProfile'])->name('user.profil.update');
        Route::put('/user/profil/hapus-foto', [ProfilController::class, 'hapusFoto'])->name('user.profil.hapus-foto');
        
        Route::get('/profil/pengaturan-akun', function () {
            return view('user.profil.pengaturan_akun');
        })->name('user.profil.pengaturan-akun');

        Route::post('user/profile/ganti-email', [AuthController::class, 'updateEmail'])->name('user.update.email');

        Route::post('/user/update-password', [ProfilController::class, 'updatePasswordUser'])->name('user.update.password');

        Route::delete('/user/hapus-akun', [ProfilController::class, 'hapusAkun'])->name('user.hapus-akun');
    });
    
});
