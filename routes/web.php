<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\NoticiasController;



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
    return view('products');
});

Route::get('/noticias', function () {
    return view('noticias');
});

/*Route::get('/register', function () {
    return view('register');
});*/
Route::get('/register', [userController::class, 'register']);
Route::post('/register', [userController::class, 'store']);
Route::get('/login', [userController::class, 'login']);
Route::post('/login', [userController::class, 'access']);
Route::get('/contact', [contactController::class, 'index']);
Route::post('/contact', [contactController::class, 'store']);
Route::get('/noticias', [NoticiasController::class, 'index']);
Route::get('/noticias/{id}', [NoticiasController::class, 'show']);
Route::get('/contact', function () {
    return view('contacto');
});

