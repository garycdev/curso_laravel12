<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'username',
        'rol'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    // Relaciones en modelos (se los debo)
    // public function role() {
    //     return $this->belongsTo(Role::class, 'id', 'rol');
    // }
}
