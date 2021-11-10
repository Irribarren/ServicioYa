<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\servicioController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\DisponiblesController;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/servicio', servicioController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/todo', TodoController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::resource('/disponible', DisponiblesController::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');
});

