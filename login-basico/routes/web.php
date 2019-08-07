<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Aqui somente esta routa estará protegida
//Route::get('/produtos', 'ProdutoControlador@index')->middleware('auth');

Route::get('/produtos', 'ProdutoControlador@index')->name('produtos');

Route::get('/departamentos', 'DepartamentoControlador@index');

Route::get('/usuario', function () {
    return view('usuario');
});