<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre',
        'precio',
        'categoria_id'
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class, 'id', 'categoria_id');
    }
}
