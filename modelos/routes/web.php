<?php
use App\Categoria;

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
    $categorias = Categoria::all();
    foreach ($categorias as $c) {
        echo "id: " . $c->id . ", ";
        echo "nome: " . $c->nome . "<br>";
    }
});

Route::get('/inserir/{nome}', function ($nome) {
    $cat = new Categoria();
    $cat->nome = $nome;
    $cat->save();
    return redirect('/');
});

Route::get('/categoria/{id}', function ($id) {
    $cat = Categoria::findOrFail($id);
    if (isset($cat)) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br> ";
    } else {
        echo "<h1>Categoria não encontrada</h1>";
    } 
});

Route::get('/atualizar/{id}/{nome}', function ($id, $nome) {
    $cat = Categoria::find($id);
    if (isset($cat)) {
        $cat->nome = $nome;
        $cat->save();
        return redirect('/');
    } else {
        echo "<h1>Categoria não encontrada</h1>";
    } 
});

Route::get('/remover/{id}', function ($id) {
    $cat = Categoria::find($id);
    if (isset($cat)) {
        $cat->delete();
        return redirect('/');
    } else {
        echo "<h1>Categoria não encontrada</h1>";
    } 
});

Route::get('/categoriapornome/{nome}', function ($nome) {
    $cats = Categoria::where('nome', $nome)->get();
    foreach ($cats as $cat) {
        echo "id: " . $cat->id . ", ";
        echo "nome: " . $cat->nome . "<br> ";
    } 
});

Route::get('/categoriaidmaiorque/{id}', function ($id) {
    $categorias = Categoria::where('id','>=',$id)->get();
    foreach ($categorias as $c) {
        echo "id: " . $c->id . ", ";
        echo "nome: " . $c->nome . "<br> ";
    }

    $count = Categoria::where('id','>=',$id)->count();
    echo "<h1>Count: $count </h1>";
    $max = Categoria::where('id','>=',$id)->max('id');
    echo "<h1>Max: $max </h1>";
});

Route::get('/ids123', function () {
    $categorias = Categoria::find([1,2]);
    foreach ($categorias as $c) {
        echo "id: " . $c->id . ", ";
        echo "nome: " . $c->nome . "<br> ";
    }
});