<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\StaffController;

/**
 * ✅ ROUTE LOGIN (bebas dari middleware auth)
 */
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/**
 * ✅ ROUTE YANG HANYA UNTUK USER LOGIN
 */
Route::middleware(['auth'])->group(function () {
     Route::get('/', [PajakController::class, 'index']);

    Route::resource('pajak', PajakController::class);
    Route::resource('kendaraan', KendaraanController::class);
    Route::resource('staff', StaffController::class);

    // ❗ Cek jabatan hanya untuk create/edit/delete pembayaran
    Route::middleware('cek.jabatan')->group(function () {
        Route::resource('pembayaran', PembayaranController::class)->except(['index', 'show']);
    });

    // ✅ index & show tetap bisa diakses semua yang login
    Route::resource('pembayaran', PembayaranController::class)->only(['index', 'show']);
});

