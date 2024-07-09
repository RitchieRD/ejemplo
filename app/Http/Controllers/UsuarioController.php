<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

use App\Models\Usuario;

use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function login()
    {
        return Inertia::render('App');
    }

    public function registrar(Request $request)
    {
        $usuario = $request->usuario;
        $clave = $request->clave;

        $clave_encriptada = Hash::make($clave);

        $usuario_creado = Usuario::create([
            'usuario' => $usuario,
            'clave' => $clave_encriptada
        ]);

        return $usuario_creado->id;
    }

    public function ingresar(Request $request)
    {

        $usuario = $request->usuario;
        $clave = $request->clave;

        $usuario_encontrado = Usuario::where('usuario', $usuario)->get()->first();

        if ($usuario_encontrado) {
            $clave_encriptada = $usuario_encontrado->clave;

            $verificado = Hash::check($clave, $clave_encriptada);

            if ($verificado) {
                return 'ACCESO CORRECTO';
            } else {
                return 'ACCESO DENEGADO';
            }
        } else {
            return 'USUARIO NO ENCONTRADO';
        }
    }

    public function tables()
    {
        $usuarios = Usuario::select(
            'id',
            'usuario',
            'created_at as fecha'
        )
            ->get();


        return Inertia::render('Tables', ['usuarios' => $usuarios]);
    }
}
