<?php

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DukproController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Resources\PesananTransaksiResources;
use App\Http\Controllers\BahanBakuUsageController;
use App\Http\Controllers\PesananTransaksiController;

Route::get('/auth', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'store']);

Route::middleware('auth.basic')->group(function () {
    Route::get('/pesanan', [PesananTransaksiController::class, 'index']);
    // Tambahkan route lainnya jika diperlukan
});

Route::get('/pesanan/{id}', [PesananTransaksiController::class, 'show']);
Route::get('/pesanan/search/{name}/{id}', [PesananTransaksiController::class, 'showByNameProduk']);
Route::get('/pesanan/pickup/{id}/{status}', [PesananTransaksiController::class, 'showByStatus']);
Route::put('/pesanan/{id}', [PesananTransaksiController::class, 'updateStatus']);
Route::get('/bahanbakuusage/report/{start}/{end}', [BahanBakuUsageController::class, 'report']);

Route::apiResource('dukpro', DukproController::class);
Route::apiResource('bahanbaku', BahanBakuController::class);

// Route::middleware('auth.basic')->get('/pesanan', [PesananTransaksiController::class, 'index']);