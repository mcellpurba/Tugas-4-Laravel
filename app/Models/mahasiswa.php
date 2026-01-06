<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = [
        'nim',
        'nama_mahasiswa',
        'prodi', //Foreign key prodi (id_prodi)
        'fakultas', //Foreign key fakultas (id_fakultas)
        'email',
        'no_hp',
    ];

    public function Prodi(): BelongsTo
    {
        return $this->belongsTo(prodi::class, 'prodi', 'id_prodi');
    }

    public function Fakultas(): BelongsTo
    {
        return $this->belongsTo(fakultas::class, 'fakultas', 'id_fakultas');
    }


}
