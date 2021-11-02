<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\ServiciosController;
use  App\Http\Controllers\ValoracionesController;
use  App\Http\Controllers\VendedorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('servicio', ServiciosController::class)->middleware('auth');
Route::get('servicio/mostrar', [ServiciosController::class, 'mostrar'])->middleware('auth');
Route::resource('valoraciones', ValoracionesController::class)->middleware('auth');
Route::resource('Vendedor/mostrar', VendedorController::class, 'mostrar')->middleware('auth');
Route::get('detalle/mostrar', [DetalleServicioController::class, 'mostrar'])->middleware('auth');
Route::get('servicio/crear', [ServiciosController::class, 'crear'])->middleware('auth');
Route::get('servicio/editar', [ServiciosController::class, 'editar'])->middleware('auth');
