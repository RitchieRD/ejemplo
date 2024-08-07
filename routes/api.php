<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ExportController;

use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::POST('/login/registrar', [UsuarioController::class, 'registrar']);
Route::GET('/login/ingresar', [UsuarioController::class, 'ingresar']);

Route::POST('/tables/export', [ExportController::class, 'export']);

Route::POST('/productos/crear', [ProductoController::class, 'crear']);
