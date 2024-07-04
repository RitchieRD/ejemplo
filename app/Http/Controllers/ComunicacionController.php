<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ComunicacionController extends Controller
{
    public function padre()
    {
        return Inertia::render('Comunicacion/Padre');
    }
}
