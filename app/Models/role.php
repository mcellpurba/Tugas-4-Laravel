<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id_role';
    protected $fillable = [
        'nama_role',
    ];

    public function User(): HasMany
    {
        return $this->hasMany(User::class, 'id_role', 'id_role');
    }
}
