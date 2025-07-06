<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PembayaranController;

Route::resource('pembayaran', PembayaranController::class);

Route::get('/', function () {
    return view('welcome');
});
