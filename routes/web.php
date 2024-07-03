<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\RakbukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome2');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
require __DIR__.'/auth.php';

Route::resource('buku', BukuController::class);
Route::resource('anggota', AnggotaController::class);
Route::resource('pengurus', PengurusController::class);
Route::resource('peminjaman', PeminjamanController::class);
Route::resource('rak', RakbukuController::class);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});