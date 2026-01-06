<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\MahasiswaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Rute untuk mendapatkan token API (Login)
Route::post('/login', [AuthController::class, 'login']);
// Rute yang dilindungi menggunakan Token Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // Contoh rute yang hanya bisa diakses dengan token valid
    Route::get('/user', [AuthController::class, 'user']);
    // Rute Logout API baru
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::get('/mahasiswa', [mahasiswaController::class, 'index'])->middleware('auth:sanctum');
Route::post('/register', [AuthController::class, 'register']);