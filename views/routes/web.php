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
    return view('pagina');
});

Route::get('/primeiraView', function () {
	return view('minhaView');
});


//passagem de parâmetros
Route::get('/ola', function () {
	return view('minhaView')
		->with('nome', 'Joao')
		->with('sobrenome', 'Silva');
});

//passagem de parâmetros
Route::get('/ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
	/*return view('minhaView')
		->with('nome', $nome)
		->with('sobrenome', $sobrenome);*/
	
	//Array associativo
	// $parametros = ['nome'=>$nome, 'sobrenome'=>$sobrenome];
	// return view('minhaView', $parametros);
	
	//Função PHP que monta um array associativo
	return view('minhaView', compact('nome','sobrenome'));
});

Route::get('/email/{email}', function ($email) {
	//verificando se uma view existe
	if (View::exists('email'))
		return view('email', compact('email'));
	else
		return view('erro');
});
