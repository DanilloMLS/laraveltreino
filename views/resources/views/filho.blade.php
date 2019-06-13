@extends('Layouts.app')

@section('titulo', 'Minha página - filho')

@section('barralateral')
	@parent
	<p>Essa parte é do filho</p>
@endsection

@section('conteudo')
	<p>Este é o conteúdo do filho</p>
@endsection