<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoTipo extends Model
{
    protected $table = 'producto_tipos';

    protected $primaryKey = 'id';

    protected $fillable = [
        'tipo',
        'created_at',
        'updated_at'
    ];
}
