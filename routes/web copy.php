<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengurusController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.main');
});

//Route::resource('dashboard', Das::class);
Route::resource('buku', BukuController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('pengurus', PengurusController::class);
Route::resource('peminjaman', PeminjamanController::class);