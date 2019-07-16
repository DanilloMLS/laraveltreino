<?php

use Illuminate\Support\Facades\DB;
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

Route::get('/categorias', function () {
    //retorna toda a tabela de categorias
    $cats = DB::table('categorias')->get();
    foreach ($cats as $c) {
        echo "id: ". $c->id . "; ";
        echo "nome: ". $c->nome . "<br>";
    }
    echo "<hr>";

    //busca todos os nomes das categorias
    $nomes = DB::table('categorias')->pluck('nome');
    foreach ($nomes as $nome) {
        echo "$nome <br>";
    }
    echo "<hr>";

    //busca um id específico na tabela categorias
    $cats = DB::table('categorias')->where('id',1)->get();
    foreach ($cats as $c) {
        echo "id: ". $c->id . "; ";
        echo "nome: ". $c->nome . "<br>";
    }
    echo "<hr>";

    //ao pesquisar por id, grava na variável somente o 1º registro encontrado
    $cat = DB::table('categorias')->where('id',1)->first();
    echo "id: ". $cat->id . "; ";
    echo "nome: ". $cat->nome . "<br>";
    echo "<hr>";

    //uma outra forma de se imprimir somente o primeiro elemento
    $cat = DB::table('categorias')->where('id',1)->get();
    echo "id: ". $cat[0]->id . "; ";
    echo "nome: ". $cat[0]->nome . "<br>";
    echo "<hr>";

    echo "<p>retorna um array utilizando like</p>";
    $cats = DB::table('categorias')->where('nome','like','%p%')->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }

    echo "<p>sentenças lógicas</p>";
    $cats = DB::table('categorias')->where('id',1)->orWhere('id',2)->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }

    //dentro de um conjunto
    echo "<p>conjunto</p>";
    $cats = DB::table('categorias')->whereBetween('id',[1,2])->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }

    echo "<p>conjunto</p>";
    $cats = DB::table('categorias')->whereNotBetween('id',[3,4])->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }

    //whereIn funciona como um and (where 1 and where 2 ...)
    echo "<p>conjunto</p>";
    $cats = DB::table('categorias')->whereIn('id',[1,3,4])->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }

    echo "<p>intervalo</p>";
    $cats = DB::table('categorias')->whereNotIn('id',[1,3,4])->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }

    echo "<p>sentenças lógicas</p>";
    $cats = DB::table('categorias')->where([['id',1],['nome','Roupas']])->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }

    echo "<p>ordenando</p>";
    $cats = DB::table('categorias')->orderBy('nome')->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }

    echo "<p>ordenando (decrescente)</p>";
    $cats = DB::table('categorias')->orderBy('nome','desc')->get();
    foreach ($cats as $cat) {
        echo "id: ". $cat->id . "; ";
        echo "nome: ". $cat->nome . "<br>";
    }
});

//inserção de dados
Route::get('/novascategorias', function(){
    DB::table('categorias')->insert([
        ['nome'=>'Alimentos'],
        ['nome'=>'Informática'],
        ['nome'=>'Cozinha']
    ]);
});

//inserção que retorna na tela o ID do que foi inserido
Route::get('/novascategorias2', function(){
    $id = DB::table('categorias')->insertGetId(['nome'=>'Carros']);
    echo "Novo ID =  $id <br>";
});

//atualização de dados do banco
Route::get('/atualizandocategorias', function () {
    $cat = DB::table('categorias')->where('id',1)->first();
    echo "<p> Antes da atualização</p>";
    echo "id: " . $cat->id . "; ";
    echo "nome: " . $cat->nome . "; ";
    DB::table('categorias')->where('id',1)->update(['nome'=>'Roupas infantis']);
    $cat = DB::table('categorias')->where('id',1)->first();
    echo "<p> Depois da atualização</p>";
    echo "id: " . $cat->id . "; ";
    echo "nome: " . $cat->nome . "; ";
});

//remoção de dados do banco
Route::get('/removendocategorias', function () {
    echo "<p> Antes da remoção</p>";
    
    $cats = DB::table('categorias')->get();
    foreach ($cats as $cat) {
        echo "id: " . $cat->id . "; ";
        echo "nome: " . $cat->nome . "<br>";
    }
    echo "<hr>";

    //DB::table('categorias')->where('id',1)->delete();
    //DB::table('categorias')->whereNotIn('id',[1-6])->delete();

    echo "<p> Depois da atualização</p>";
    $cats = DB::table('categorias')->get();
    foreach ($cats as $cat) {
        echo "id: " . $cat->id . "; ";
        echo "nome: " . $cat->nome . "<br>";
    }
});