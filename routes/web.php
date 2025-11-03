<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// route sederhana yang mengembalikan string
Route::get('/hello', function () {
return 'Hello Laravel!';
});

use App\Http\Controllers\HelloController;
Route::get('/hello-controller', [HelloController::class, 'index']);

use App\Http\Controllers\MahasiswaController;
Route::resource('mahasiswa', MahasiswaController::class);
Route::get('/mahasiswa', [MahasiswaController::class, 'index']); // list atau profil
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create']); // form tambah
Route::post('/mahasiswa', [MahasiswaController::class, 'store']); // proses simpan
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit']); // form edit
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update']); // proses update
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy']);// proses hapus

use App\Http\Controllers\FakultasController;
Route::resource('fakultas', FakultasController::class);
Route::get('/fakultas', [FakultasController::class, 'index']); // list atau profil
Route::get('/fakultas/create', [FakultasController::class, 'create']); // form tambah
Route::post('/fakultas', [FakultasController::class, 'store']); // proses simpan
Route::get('/fakultas/{id}/edit', [FakultasController::class, 'edit']); // form edit
Route::put('/fakultas/{id}', [FakultasController::class, 'update']); // proses update
Route::delete('/fakultas/{id}', [FakultasController::class, 'destroy']);// proses hapus

use App\Http\Controllers\ProdiController;
Route::resource('prodi', ProdiController::class);
Route::get('/prodi', [ProdiController::class, 'index']); // list atau profil
Route::get('/prodi/create', [ProdiController::class, 'create']); // form tambah
Route::post('/prodi', [ProdiController::class, 'store']); // proses simpan
Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit']); // form edit
Route::put('/prodi/{id}', [ProdiController::class, 'update']); // proses update
Route::delete('/prodi/{id}', [ProdiController::class, 'destroy']);// proses hapus
