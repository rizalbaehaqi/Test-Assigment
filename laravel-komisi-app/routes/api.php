<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KomisiController;
use App\Http\Controllers\Api\PembayaranController;

// API Komisi
Route::get('/komisi', [KomisiController::class, 'index']);

// API Pembayaran
Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::post('/pembayaran', [PembayaranController::class, 'store']);
