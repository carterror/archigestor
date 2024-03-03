<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Materia;
use App\Http\Controllers\PublicacionController;
use Illuminate\Support\Facades\Route;
use App\Models\Autor;
use Illuminate\Http\Request;

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

Route::get('/', [IndexController::class, 'index'])->name('inicio');


Route::post('publicacion/buscar', [PublicacionController::class, 'buscar'])->name('publicacion.buscar');
Route::get('publicacion/ordenar/{orden}', [PublicacionController::class, 'order'])->name('publicacion.ordenar');
Route::resource('publicacion', PublicacionController::class);
Route::resource('materia', Materia::class);
Route::resource('autor', AutorController::class);

Route::get('asd', [IndexController::class, 'asd']);

