<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--<link rel="stylesheet" href="{{asset('css/app.css')}}"><--->
	<link rel="stylesheet" href="{{URL::to('css/app.css')}}">
</head>
<body>
	
	<script scr="{{URL::to('js/app.js')}}" type="text/javascript"></script>
	<!--script scr="{{asset('js/app.js')}}" type="text/javascript"></script-->

	<!-- os dois componentes abaixo são iguais, mas com diferenças no uso de slot -->

	@component('components.meucomponente')
		<!-- isso é um slot -->
		<strong>Erro: </strong> Sua mensagem de erro
		
		@slot('titulo')
			Erro fatal
		@endslot
		@slot('tipo')
			danger
		@endslot
	@endcomponent

	@component('components.meucomponente', ['tipo'=>'primary', 'titulo'=>'Erro fatal'])
		<!-- isso é um slot -->
		<strong>Erro: </strong> Sua mensagem de erro
	@endcomponent

	<!-- esse componente foi nomeado em AppServiceProvider -->
	@alerta(['tipo'=>'warning', 'titulo'=>'Erro fatal'])
		<!-- isso é um slot -->
		<strong>Erro: </strong> Sua mensagem de erro
	@endcomponent

	@alerta(['tipo'=>'info', 'titulo'=>'Erro fatal'])
		<!-- isso é um slot -->
		<strong>Erro: </strong> Sua mensagem de erro
	@endcomponent

	@alerta(['tipo'=>'light', 'titulo'=>'Erro fatal'])
		<!-- isso é um slot -->
		<strong>Erro: </strong> Sua mensagem de erro
	@endcomponent

	@alerta(['tipo'=>'dark', 'titulo'=>'Erro fatal'])
		<!-- isso é um slot -->
		<strong>Erro: </strong> Sua mensagem de erro
	@endcomponent
</body>
</html>