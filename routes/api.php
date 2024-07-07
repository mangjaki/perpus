<?php

use App\Http\Controllers\API\AnggotaController;
use App\Http\Controllers\API\BukuController;
use App\Http\Controllers\API\PeminjamanController;
use App\Http\Controllers\API\PengurusController;
use App\Http\Controllers\API\RakbukuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('buku', [BukuController::class, 'index']);
Route::post('buku', [BukuController::class, 'store']);
Route::patch('buku/{id}', [BukuController::class, 'update']);
Route::delete('buku/{id}', [BukuController::class, 'destroy']);

Route::get('anggota', [AnggotaController::class, 'index']);
Route::post('anggota', [AnggotaController::class, 'store']);
Route::patch('anggota/{id}', [AnggotaController::class, 'update']);
Route::delete('anggota/{id}', [AnggotaController::class, 'destroy']);

Route::get('pengurus', [PengurusController::class, 'index']);
Route::post('pengurus', [PengurusController::class, 'store']);
Route::patch('pengurus/{id}', [PengurusController::class, 'update']);
Route::delete('pengurus/{id}', [PengurusController::class, 'destroy']);

Route::get('rakbuku', [RakbukuController::class, 'index']);
Route::post('rakbuku', [RakbukuController::class, 'store']);
Route::patch('rakbuku/{id}', [RakbukuController::class, 'update']);
Route::delete('rakbuku/{id}', [RakbukuController::class, 'destroy']);

Route::get('peminjaman', [PeminjamanController::class, 'index']);
Route::post('peminjaman', [PeminjamanController::class, 'store']);
Route::patch('peminjaman/{id}', [PeminjamanController::class, 'update']);
Route::delete('peminjaman/{id}', [PeminjamanController::class, 'destroy']);
