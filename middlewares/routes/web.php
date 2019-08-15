<?php

use App\Http\Middleware\PrimeiroMiddleware;
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
    return 'teste';
});

Route::get('/usuarios', 'UsuarioControlador@index')
    ->middleware('primeiro','segundo');

Route::get('/terceiro', function () {
    return ('Passou pelo TerceiroMiddleware');
})->middleware('terceiro:joao,20');
