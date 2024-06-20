<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

class UsuarioController extends Controller
{
    public function login()
    {
        return Inertia::render('App');
    }
}
