<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

use App\Models\ProductoMarca;
use App\Models\ProductoTipo;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function productos()
    {

        $marcas = ProductoMarca::all();
        $tipos = ProductoTipo::all();

        return Inertia::render('Crud/Productos', ['marcas' => $marcas, 'tipos' => $tipos]);
    }

    public function crear(Request $request)
    {
        $frmProducto = json_decode($request->frmProducto);

        $producto = $frmProducto->producto;
        $marca_id = $frmProducto->marca_id;
        $tipo_id = $frmProducto->tipo_id;
        $precio = $frmProducto->precio;
        $cantidad = $frmProducto->cantidad;

        $producto_nuevo = Producto::create([
            'producto' => $producto,
            'marca_id' => $marca_id,
            'tipo_id' => $tipo_id,
            'precio' => $precio,
            'cantidad' => $cantidad
        ]);

        return $producto_nuevo->id;
    }
}
