<!DOCTYPE html>
<html>
<head>
	<title>Meu título - @yield('titulo')</title>
</head>
<body>
	@section('barralateral')
		<p>Esta parte da seção é do template PAI</p>
	@show
		
	<div>
		@yield('conteudo')
	</div>
</body>
</html>