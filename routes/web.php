<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']);
Route::post('/mahasiswa', [MahasiswaController::class, 'store']);
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']);
Route::post('/mahasiswa/{id}/update', [MahasiswaController::class, 'update']);
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

use App\Http\Controllers\FakultasController;
Route::get('/fakultas', [FakultasController::class, 'index']);
Route::get('/fakultas/create', [FakultasController::class, 'create']);
Route::post('/fakultas', [FakultasController::class, 'store']);
Route::get('/fakultas/{id}/edit', [FakultasController::class, 'edit']);
Route::post('/fakultas/{id}/update', [FakultasController::class, 'update']);
Route::delete('/fakultas/{id}', [FakultasController::class, 'destroy'])->name('fakultas.destroy');

use App\Http\Controllers\ProdiController;
Route::get('/prodi', [ProdiController::class, 'index']);
Route::get('/prodi/create', [ProdiController::class, 'create']);
Route::post('/prodi', [ProdiController::class, 'store']);
Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit']);
Route::post('/prodi/{id}/update', [ProdiController::class, 'update']);
Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('mahasiswa', MahasiswaController::class)->middleware('auth');



// Route Mahasiswa hanya bisa diakses admin
Route::middleware('admin')->group(function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');
});

use App\Http\Controllers\Api\AuthController;
// Rute untuk mendapatkan token API (Login)
Route::post('/login', [AuthController::class, 'login']);
// Rute yang dilindungi menggunakan Token Sanctum
Route::middleware('auth:sanctum')->group(function () {
// Contoh rute yang hanya bisa diakses dengan token valid
Route::get('/user', [AuthController::class, 'user']);
// Rute Logout API baru
Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);









