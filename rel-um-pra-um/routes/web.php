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
use App\Cliente;
use App\Endereco;

Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach ($clientes as $c ) {
        echo "<p>ID: ". $c->id ."</p>";
        echo "<p>Nome: ". $c->nome ."</p>";
        echo "<p>Telefone: ". $c->telefone ."</p>";
        //$e = Endereco::where('cliente_id',$c->id)->first();

        //esses campos não fazem parte do cliente, mas é possível chamá-los
        //com o hasOne em App\Cliente
        echo "<p>Rua: ". $c->endereco->rua ."</p>";
        echo "<p>Número: ". $c->endereco->numero ."</p>";
        echo "<p>Bairro: ". $c->endereco->bairro ."</p>";
        echo "<p>Cidade: ". $c->endereco->cidade ."</p>";
        echo "<p>UF: ". $c->endereco->uf ."</p>";
        echo "<p>CEP: ". $c->endereco->cep ."</p>";
        echo "<hr>";
    }
});

Route::get('/enderecos', function () {
    $enderecos = Endereco::all();
    foreach ($enderecos as $e ) {
        echo "<p>Cliente: ". $e->cliente_id ."</p>";
        //o método belongsTo() é parecido com o hasOne()
        echo "<p>Nome: ". $e->cliente->nome ."</p>";
        echo "<p>Telefone: ". $e->cliente->telefone ."</p>";
        echo "<p>Rua: ". $e->rua ."</p>";
        echo "<p>Número: ". $e->numero ."</p>";
        echo "<p>Bairro: ". $e->bairro ."</p>";
        echo "<p>Cidade: ". $e->cidade ."</p>";
        echo "<p>UF: ". $e->uf ."</p>";
        echo "<p>CEP: ". $e->cep ."</p>";
        echo "<hr>";
    }
});

Route::get('/inserir', function () {
    $c = new Cliente();
    $c->nome = "Jose Almeida";
    $c->telefone = "11 97878-7878";
    $c->save();

    $e = new Endereco();
    $e->rua = "Av. do Estado";
    $e->numero = 400;
    $e->bairro = "Centro";
    $e->cidade = "São Paulo";
    $e->uf = "SP";
    $e->cep = "45612-000";

    //mesmo sendo entidades diferentes, é possível salvar desse forma
    //através de relacionamentos
    //é necessário ter atenção no padrão de nome dos campos para isso dar certo
    //id e entidade_id
    $c->endereco()->save($e);
});

Route::get('/clientes/json', function () {
    //$clientes = Cliente::all();

    //o Laravel usa uma estratégia do tipo Lazy Loading para carregar relacionamentos
    //então é necessário passsar por parâmetro o relacionamento para carregar os endereços
    //Eager Loading
    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();
});

Route::get('/enderecos/json', function () {
    //$clientes = Cliente::all();

    //o Laravel usa uma estratégia do tipo Lazy Loading para carregar relacionamentos
    //então é necessário passsar por parâmetro o relacionamento para carregar os endereços
    //Eager Loading
    $enderecos = Endereco::with(['cliente'])->get();
    return $enderecos->toJson();
});