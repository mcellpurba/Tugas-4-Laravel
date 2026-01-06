<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class prodi extends Model
{
    use HasFactory;
    protected $table = 'prodis';
    protected $primaryKey = 'id_prodi';
    protected $fillable = [
        'nama_prodi',
        'deskripsi',
        'nama_fakultas', //Foreign key fakultas (id_fakultas)
    ];

    public function Fakultas(): BelongsTo
    {
        return $this->belongsTo(fakultas::class, 'nama_fakultas', 'id_fakultas');
    }

    public function Mahasiswa(): HasMany
    {
        return $this->hasMany(mahasiswa::class, 'prodi', 'id_prodi');
    }
}
