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

use App\Categoria;
use App\Produtos;

Route::get('/categorias', function () {
    $cat = Categoria::all();
    if (count($cat)==0) {
        echo "<h4>Voce não possui nenhuma categoria cadastrada</h4>";
    } else {
        foreach ($cat as $c ) {
            echo "<p>" . $c->id . " - " . $c->nome . "</p>";
        }
    }
});

Route::get('/produtos', function () {
    $prod = Produtos::all();
    if (count($prod)==0) {
        echo "<h4>Voce não possui nenhum produto cadastrado</h4>";
    } else {
        echo "<table>";
        echo "<thead><tr>
            <td>Nome</td>
            <td>Estoque</td>
            <td>Preço</td>
            <td>Categoria</td>
            </tr></thead>";
        foreach ($prod as $p ) {
            echo "<tr>";
            echo "<td>" . $p->nome . "</td>";
            echo "<td>" . $p->estoque . "</td>";
            echo "<td>" . $p->preco . "</td>";
            echo "<td>" . $p->categoria->nome . "</td>"; //belongsTo()
            echo "</tr>";
        }
    }
});

Route::get('/categoriasprodutos', function () {
    $cat = Categoria::all();
    if (count($cat)==0) {
        echo "<h4>Voce não possui nenhuma categoria cadastrada</h4>";
    } else {
        foreach ($cat as $c ) {
            echo "<p>" . $c->id . " - " . $c->nome . "</p>";

            //sem o hasMany seria necessário fazer uma consulta na tabela de produtos manualmente
            $produtos = $c->produto;

            if (count($produtos)>0) {
                echo "<ul>";
                foreach ($produtos as $p ) {
                    echo "<li>" . $p->nome . "</li>";
                }
                echo "</ul>";
            }
        }
    }
});

Route::get('/categoriasprodutos/json', function () {
    $cats = Categoria::with('produto')->get();
    return $cats->toJson();
});

Route::get('/adicionarproduto', function () {
    $cat = Categoria::find(1);
    $p = new Produtos();
    $p->nome = "Produto 1";
    $p->estoque = 12;
    $p->preco = 15.6;
    $p->categoria()->associate($cat); //se vc já tem o ID
    $p->save();
    return $p->toJson();
});

Route::get('/removercategoria/produto', function () {
    $p = Produtos::find(10);
    if (isset($p)){
        $p->categoria()->dissociate();
        $p->save();
        return $p->toJson();
    }
    return '';
});

Route::get('/adicionarproduto/{catid}', function ($catid) {
    $cat = Categoria::with('produto')->find($catid);
    
    $p = new Produtos();
    $p->nome = "Novo produto";
    $p->estoque = 100;
    $p->preco = 50;

    if (isset($cat)) {
        $cat->produto()->save($p);
    }
    $cat->load('produto');
    return $cat->toJson();
});