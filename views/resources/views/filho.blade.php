@extends('Layouts.app')

@section('titulo', 'Minha página - Filho')

@section('barralateral')
	@parent
	<p>Essa parte é do Filho</p>
@endsection

@section('conteudo')
	<p>Este é o conteúdo do Filho</p>
@endsection