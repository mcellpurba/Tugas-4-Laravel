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