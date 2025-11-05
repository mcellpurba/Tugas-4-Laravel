<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create(['nim' => '2201405001', 'nama' => 'Budi', 'prodi' => 'Teknik Sipil']);
        Mahasiswa::create(['nim' => '2202405001', 'nama' => 'Budi', 'prodi' => 'Teknik Mesin']);
        Mahasiswa::create(['nim' => '2203405001', 'nama' => 'Budi', 'prodi' => 'Teknik Elektro']);
        Mahasiswa::create(['nim' => '2204405001', 'nama' => 'Andi', 'prodi' =>'Teknologi Informasi']);
    }
}
