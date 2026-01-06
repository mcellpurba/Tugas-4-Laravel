<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultas';
    protected $primaryKey = 'id_fakultas';
    protected $fillable = [
        'nama_fakultas',
        'deskripsi',
    ];

    public function Prodi(): HasMany
    {
        return $this->hasMany(prodi::class, 'nama_fakultas', 'id_fakultas');
    }

    public function Mahasiswa(): HasMany
    {
        return $this->hasMany(mahasiswa::class, 'fakultas', 'id_fakultas');
    }
}
