<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fakultasController;
use App\Http\Controllers\prodiController;
use App\Http\Controllers\mahasiswaController;


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



Route::middleware(['auth', 'role:admin'])->group(function () {
    // Fakultas - CRUD Operations
    Route::get('/fakultas/create', [fakultasController::class, 'create'])->name('fakultas.create');
    Route::post('/fakultas/store', [fakultasController::class, 'store'])->name('fakultas.store');
    Route::get('/fakultas/edit/{id}', [fakultasController::class, 'edit'])->name('fakultas.edit');
    Route::put('/fakultas/update/{id}', [fakultasController::class, 'update'])->name('fakultas.update');
    Route::delete('/fakultas/destroy/{id}', [fakultasController::class, 'destroy'])->name('fakultas.destroy');

    // Prodi - CRUD Operations
    Route::get('/prodi/create', [prodiController::class, 'create'])->name('prodi.create');
    Route::post('/prodi/store', [prodiController::class, 'store'])->name('prodi.store');
    Route::get('/prodi/edit/{id}', [prodiController::class, 'edit'])->name('prodi.edit');
    Route::put('/prodi/update/{id}', [prodiController::class, 'update'])->name('prodi.update');
    Route::delete('/prodi/destroy/{id}', [prodiController::class, 'destroy'])->name('prodi.destroy');

    // Mahasiswa - CRUD Operations
    Route::get('/mahasiswa/create', [mahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('/mahasiswa/store', [mahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/edit/{id}', [mahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/update/{id}', [mahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/destroy/{id}', [mahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

});

Route::middleware(['auth'])->group(function () {
    // Fakultas - View Only
    Route::get('/fakultas', [fakultasController::class, 'index'])->name('fakultas.index');
    Route::get('/fakultas/{id}', [fakultasController::class, 'show'])->name('fakultas.show');

    // Prodi - View Only
    Route::get('/prodi', [prodiController::class, 'index'])->name('prodi.index');
    Route::get('/prodi/{id}', [prodiController::class, 'show'])->name('prodi.show');

    // Mahasiswa - View Only
    Route::get('/mahasiswa', [mahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/{id}', [mahasiswaController::class, 'show'])->name('mahasiswa.show');
});

require __DIR__ . '/auth.php';
