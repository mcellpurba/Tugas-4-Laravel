<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'prodis';
    protected $fillable = [
        'no_prodi',
        'no_identitas_fakultas',
        'nama_prodi'
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }
}
