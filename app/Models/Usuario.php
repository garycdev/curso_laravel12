<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'username',
        'password',
        'rol'
    ];

    // Relaciones en modelos (se los debo)
    // public function role() {
    //     return $this->belongsTo(Role::class, 'id', 'rol');
    // }
}
