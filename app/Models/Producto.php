<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'producto',
        'marca_id',
        'tipo_id',
        'precio',
        'cantidad',
        'created_at',
        'updated_at'
    ];
}
