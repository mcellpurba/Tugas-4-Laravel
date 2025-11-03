<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika mengikuti konvensi Laravel)
    protected $table = 'fakultas';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'no_identitas_fakultas',
        'nama_fakultas',
        'alamat',
        'email',
        'no_telepon',
    ];
}
