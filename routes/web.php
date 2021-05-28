<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\RacesController;
use App\Http\Controllers\ProductsController;



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
/*
Route::get('/', function () {
    return view('products');
});

*/

Route::get('/', [Controller::class, 'index']);



/*Route::get('/register', function () {
    return view('register');
});*/

Route::get('/register', [userController::class, 'register']);
Route::post('/register', [userController::class, 'store']);
Route::get('/login', [userController::class, 'login']);
Route::post('/login', [userController::class, 'access']);
Route::get('/logout', [userController::class, 'logout']);

Route::get('/usuarios', [userController::class, 'index']);
Route::get('/show_usuario/{id}', [userController::class, 'show']);
Route::get('/nuevo_usuario', [userController::class, 'create']);
Route::post('/nuevo_usuario', [userController::class, 'store']);
Route::get('/edit_user/{id}', [userController::class, 'edit']);
Route::post('/edit_user/{id}', [userController::class, 'update']);
Route::get('/usuarios/{id}', [userController::class, 'destroy']);

Route::get('/contact', [contactController::class, 'index']);
Route::post('/contact', [contactController::class, 'store']);

Route::get('/noticias', [NoticiasController::class, 'index']);
Route::get('/noticias/{id}', [NoticiasController::class, 'show'])->name('noticias.show');
Route::get('/nova_noticia', [NoticiasController::class, 'create']);
Route::post('/nova_noticia', [NoticiasController::class, 'store']);
Route::get('/noticias/{id}/edit', [NoticiasController::class, 'edit']);
Route::put('/noticias/{id}', [NoticiasController::class, 'update']);
Route::get('/delete_noticias/{id}', [NoticiasController::class, 'destroy']);

Route::get('/carreras', [RacesController::class, 'index']);
Route::get('/nova_carrera', [RacesController::class, 'create']);
Route::post('/nova_carrera', [RacesController::class, 'store']);
Route::get('/carreras/{id}', [RacesController::class, 'show'])->name('carreras.show');
Route::get('/carreras/{id}/edit', [RacesController::class, 'edit']);
Route::put('/carreras/{id}', [RacesController::class, 'update']);
Route::get('/delete_carreras/{id}', [RacesController::class, 'destroy']);

Route::get('/productos', [ProductsController::class, 'index']);
Route::get('/productos/{id}', [ProductsController::class, 'show'])->name('productos.show');
Route::get('/productos/{id}/edit', [ProductsController::class, 'edit']);
Route::put('/productos/{id}', [ProductsController::class, 'update']);
Route::get('/delete_productos/{id}', [ProductsController::class, 'destroy']);

