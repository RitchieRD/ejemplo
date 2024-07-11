<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoMarca extends Model
{
    protected $table = 'producto_marcas';

    protected $primaryKey = 'id';

    protected $fillable = [
        'marca',
        'created_at',
        'updated_at'
    ];
}
