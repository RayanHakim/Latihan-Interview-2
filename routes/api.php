<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\ProductController; // Jangan lupa import ini!
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// --- ROUTE PUBLIK ---
Route::post('/login', [AuthController::class, 'login']);


// --- ROUTE TERPROTEKSI (Wajib Login/Punya Token) ---
Route::middleware('auth:api')->group(function () {

    /**
     * Route Profile User
     */
    Route::get('/me', function () {
        return response()->json(Auth::guard('api')->user());
    });

    /**
     * Manajemen Toko
     */
    // Lihat daftar toko (Superadmin: Semua, Admin: Milik sendiri)
    Route::get('/stores', [StoreController::class, 'index'])
        ->middleware('role:superadmin,admin');

    // Tambah toko baru (Hanya Superadmin)
    Route::post('/stores', [StoreController::class, 'store'])
        ->middleware('role:superadmin');


    /**
     * Manajemen Produk (Baru!)
     */
    // Tambah produk baru
    // Diizinkan untuk Superadmin dan Admin Toko
    Route::post('/products', [ProductController::class, 'store'])
        ->middleware('role:superadmin,admin');

});