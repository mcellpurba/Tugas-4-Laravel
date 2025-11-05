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

    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultasid');
}
}

$f = Fakultas::find(1);
foreach ($f->prodi as $p) {
// tampilan program studi dari fakultas dengan id = 1
}
$list = Fakultas::with('prodi')->get();
Fakultas::withCount('prodi')->get();
