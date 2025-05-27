<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DonaturController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\HubungiKamiController;
use App\Http\Controllers\PaymentDonasiController;
use App\Http\Controllers\KategoriDonasiController;
use App\Http\Controllers\UserKategoriDonasiController;

Route::middleware('guest')->group(function () {
    Route::get('/sesi', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/sesi', [AuthController::class, 'login']);
    Route::get('/reg', [AuthController::class, 'create'])->name('auth.registrasi');
    Route::post('/reg', [AuthController::class, 'register']);
    Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);

    Route::get('/verify-email-baru/{verify_key}', [AuthController::class, 'verifyNewEmail'])->name('auth.verify_email_baru');

    Route::get('/verifikasi-email', function () {
        return view('auth.verifikasi');
    });

    Route::prefix('lupa-password')->group(function () {
        Route::get('/', [AuthController::class, 'showForgotPasswordForm'])->name('auth.lupa_password');
        Route::post('/kirim', [AuthController::class, 'sendResetLink'])->name('auth.lupa_password.kirim');

        Route::get('/new-password', [AuthController::class, 'showResetForm'])->name('auth.new_password');
        Route::post('/new-password', [AuthController::class, 'updatePassword'])->name('auth.lupa_password.update');    
    });

    Route::get('/', [KategoriDonasiController::class, 'tampilTigaKategori'])->name('beranda');
});

    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');


Route::middleware(['auth'])->group(function () {

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

        Route::resource('/akun', AkunController::class);

        Route::get('/kategori', [KategoriDonasiController::class, 'index'])->name('kategori.index');
        Route::get('/kategori/create', [KategoriDonasiController::class, 'create'])->name('kategori.create');
        Route::post('/kategori', [KategoriDonasiController::class, 'store'])->name('kategori.store');
        Route::get('/kategori/{id}/edit', [KategoriDonasiController::class, 'edit'])->name('kategori.edit');
        Route::put('/kategori/{id}', [KategoriDonasiController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori/{id}', [KategoriDonasiController::class, 'destroy'])->name('kategori.destroy');

        Route::prefix('laporan')->group(function () {
            Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
            Route::get('/laporan/{id}', [LaporanController::class, 'detail'])->name('laporan.detail');
            Route::get('/laporan/{id}/print', [LaporanController::class, 'print'])->name('laporan.print');
        });

        Route::get('/data-donatur', [DonaturController::class, 'index'])->name('data.donatur');

        Route::prefix('dokumentasi')->name('admin.dokumentasi.')->group(function () {
            Route::get('/', [DokumentasiController::class, 'index'])->name('index');
            Route::get('/create', [DokumentasiController::class, 'create'])->name('add');
            Route::post('/store', [DokumentasiController::class, 'store'])->name('store');
            Route::get('/{id}/edit', [DokumentasiController::class, 'edit'])->name('edit');
            Route::put('/{id}', [DokumentasiController::class, 'update'])->name('update');
            Route::delete('/{id}', [DokumentasiController::class, 'destroy'])->name('destroy');
        });

        Route::get('/profile', [ProfilController::class, 'index'])->name('profil.index');
        Route::put('/profil/update', [ProfilController::class, 'updateProfile'])->name('profil.update');
        Route::put('/admin/profil/hapus-foto', [ProfilController::class, 'hapusFoto'])->name('profil.hapus-foto');
        Route::get('/profile/pengaturan-akun', function () {
            return view('administrator.profil.pengaturan-akun');
        })->name('admin.profil.pengaturan-akun');

        Route::post('/profile/ganti-email', [AuthController::class, 'updateEmail'])->name('update.email');

        Route::post('/update-password', [ProfilController::class, 'updatePassword'])->name('update.password');

        Route::delete('/admin/hapus-akun', [ProfilController::class, 'hapusAkun'])->name('admin.hapus-akun');
    });

    Route::middleware('role:user')->group(function () {
        Route::get('/user', [UserController::class, 'index'])->name('home.index');

        Route::get('/user/donasi', [UserKategoriDonasiController::class, 'index'])->name('donasi.index');

        Route::get('/user/dokumentasi', [DokumentasiController::class, 'showuser'])->name('user.dokumentasi.index');
        Route::get('/user/dokumentasi/{id}', [DokumentasiController::class, 'show'])->name('user.dokumentasi.show');       

        Route::get('/user/download', fn () => view('user.download.index'))->name('download.index');
        Route::get('/user/about', [KategoriDonasiController::class, 'aboutdonasi'])->name('about.index');
        Route::get('/user/faq', fn () => view('user.FAQ.index'))->name('FAQ.index');
        Route::get('/user/kontak', fn () => view('user.hubungi kami.index'))->name('hubungi kami.index');
        Route::post('/hubungi-kami/kirim', [HubungiKamiController::class, 'kirim'])->name('hubungi.kami.kirim');

        Route::get('/user/detail/{id}', [KategoriDonasiController::class, 'detail'])->name('donasi.detail');

        Route::get('/user/berdonasi/{id}', [KategoriDonasiController::class, 'formDonasi'])->name('donasi.form_donasi');

        Route::get('/donasi/detail-transaksi', function () {
            return view('user.donasi.detail_transaksi');
        })->name('user.donasi.detail_transaksi');

        Route::get('/donasi/success', function () {
            return view('user.donasi.form_success');
        })->name('user.donasi.form_success');

        Route::post('/donasi/pay', [PaymentDonasiController::class, 'createCharge'])->name('donasi.pay');

        Route::get('/beranda', [KategoriDonasiController::class, 'tampilTigaKategori'])->name('beranda.login');

        Route::get('/transparansi', [DokumentasiController::class, 'showTransparansi'])->name('user.transparansi');
   

        Route::get('/profil', [ProfilController::class, 'user'])->name('user.profil.index');
        Route::put('user/profil/update', [ProfilController::class, 'updateProfile'])->name('user.profil.update');
        Route::put('/user/profil/hapus-foto', [ProfilController::class, 'hapusFoto'])->name('user.profil.hapus-foto');
        
        Route::get('/profil/pengaturan-akun', function () {
            return view('user.profil.pengaturan_akun');
        })->name('user.profil.pengaturan-akun');

        Route::get('/profil/notifikasi', [ProfilController::class, 'notifikasi'])->name('user.profil.notifikasi');

        Route::get('/profil/donasi-saya', function () {
            return view('user.profil.donasi_saya');
        })->name('user.profil.donasi-saya');

        Route::post('user/profile/ganti-email', [AuthController::class, 'updateEmail'])->name('user.update.email');

        Route::post('/user/update-password', [ProfilController::class, 'updatePasswordUser'])->name('user.update.password');

        Route::delete('/user/hapus-akun', [ProfilController::class, 'hapusAkun'])->name('user.hapus-akun');
    });
    
});
