<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\PaymentDonasiController;
use App\Http\Controllers\Api\PaymentDonasiApiController;
use App\Http\Controllers\Api\KategoriDonasiApiController;

// Login & Register
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/verify/{verify_key}', [AuthController::class, 'verify']);
Route::get('/verify-email-baru/{verify_key}', [AuthController::class, 'verifyNewEmail']);

// Reset Password
Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);
Route::post('/reset-password', [AuthController::class, 'updatePassword']);

// Ganti email & logout (butuh token login)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/ganti-email', [AuthController::class, 'updateEmail']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/kategori-donasi', [KategoriDonasiApiController::class, 'index']);

Route::post('/midtrans/callback', [PaymentDonasiController::class, 'handleCallback']);

Route::post('/donasi/create-charge', [PaymentDonasiApiController::class, 'createCharge']);


