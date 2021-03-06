<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('novocliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:20|unique:clientes',
            'idade' => 'required',
            'endereco' => 'required|min:5',
            'email' => 'required|email'
        ];

        $mensagens = [
            'required' => 'O atributo :attribute não pode estar em branco',
            'nome.required' => 'O nome é requerido',
            'nome.min' => 'Nome deve ter pelo menos três letras',
            'email.required' => 'Digite um endereço de e-mail',
            'email.email' => 'Digite um email válido'
        ];

        $request->validate($regras, $mensagens);

        /**
         * $request->validade([
         *      'nome' => 'required|min:3|max:20',
         *      'idade' => 'required',
         *      'endereco' => 'required|min:5'
         *      'email' => 'required|email'
         * ], $mensagens);
         */

        $cliente = new Cliente();

        $cliente->nome = $request->nome;
        $cliente->idade = $request->idade;
        $cliente->endereco = $request->endereco;
        $cliente->email = $request->email;
        $cliente->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
