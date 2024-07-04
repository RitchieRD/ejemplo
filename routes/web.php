<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ComunicacionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return Inertia::render('App');
// });

Route::get('/login', [UsuarioController::class, 'login']);
Route::get('/tables', [UsuarioController::class, 'tables']);
Route::get('/padre', [ComunicacionController::class, 'padre']);
