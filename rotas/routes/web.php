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

use Illuminate\Http\Request;

Route::get('/', function () {
    return "<H1>LARAVEL</H1>";
    //return view('welcome');
});

Route::get('/ola', function () {
    return "<H1>Seja bem vindo</H1>";
    //return view('welcome');
});

Route::get('/ola/sejabemvindo', function () {
    //return "<H1>Olá visitante, seja bem vindo</H1>";
    return view('welcome');
});

Route::get('/nome/{nome}/{sobrenome}', function ($nome, $sn) {
    return "<H1>Ola, $nome $sn!</H1>";
    //return view('welcome');
});

Route::get('/repetir/{nome}/{n}', function ($nome, $n) {
    if (is_int($n)){
        for($i=0;$i<$n;$i++){
            echo "<H1>Ola, $nome!</H1>";
        }
    }
    else
        echo "Você não digitou um inteiro";
    
    //return view('welcome');
});

Route::get('/seunomecomregra/{nome}/{n}', function($nome, $n){
    for($i=0;$i<$n;$i++){
        echo "<H1>Ola, $nome! ($i)</H1>";
    }
    //regras que restringem parâmetros, se cair 
})->where('n','[0-9]+')->where('nome','[a-zA-Z]+');

//passagem de parâmetro opcional
Route::get('/seunomesemregra/{nome?}', function($nome=null){
    if (isset($nome)){
        echo "<H1>Ola, $nome! </H1>";
    }
    else {
        echo "Voce nao passou nenhum nome";
    }
});

//agrupamento de rotas
Route::prefix('app')->group(function(){
    Route::get("/", function(){
        return "Pagina principal do APP";
    });
    Route::get("profile", function(){
        return "Pagina profile";
    });
    Route::get("about", function(){
        return "Meu about";
    });
});

//redirecionamento cód http 301
Route::redirect('/aqui', '/ola', 301);

//forma abreviada de se chama a view hello.blade.php
Route::view('/hello', 'hello');

Route::view('/viewnome', 'hellonome', ['nome'=>'Joao', 'sobrenome'=>'Silva']);

Route::get('/hellonome/{nome}/{sobrenome}', function($nome, $sn){
    return view('hellonome', ['nome'=>$nome,'sobrenome'=>$sn]);
});

Route::get('/rest/hello', function(){
    return "Hello (GET)";
});

Route::post('/rest/hello', function(){
    return "Hello (POST)";
});

Route::delete('/rest/hello', function(){
    return "Hello (DELETE)";
});

Route::put('/rest/hello', function(){
    return "Hello (PUT)";
});

Route::patch('/rest/hello', function(){
    return "Hello (PATCH)";
});

Route::options('/rest/hello', function(){
    return "Hello (OPTIONS)";
});

//preenchimento de formulário
Route::post('/rest/imprimir', function(Request $req){
    $nome = $req->input('nome');
    $idade = $req->input('idade');
    return "Hello $nome ($idade)!! (POST)";
});

Route::match(['get','post'],'/rest/hello2',function(){
    return "Hello World 2";
});

Route::any('/rest/hello3',function(){
    return "Hello World 3";
});

//nomeação de rotas
Route::get('/produtos',function(){
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressoras</li>";
    echo "<li>Mouse</li>";
    echo "</ol>";
})->name('meusprodutos');

//teste de acesso da rota pelo nome
Route::get('/linkprodutos',function(){
    $url = route('meusprodutos');
    echo "<a href=\"" . $url . "\">Meus produtos</a>";
});

Route::get('/redirecionarprodutos',function(){
    return redirect()->route('meusprodutos');
});