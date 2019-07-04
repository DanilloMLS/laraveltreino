<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
	<link rel="stylesheet" href="{{URL::to('css/app.css')}}">
</head>
<body>
    {{-- $produtos é um parâmetro que veio de ProdutoControlador --}}
    
    @if (isset($produtos))
        @if (count($produtos) == 0)
            <!-- verifica quantidade -->
            <h1>Nenhum produto.</h1>
        @elseif (count($produtos) === 1)
            <!-- verifica quantidade e compara tipo -->
            <h1>Um produto.</h1>
        @else
            <h1>Temos vários produtos.</h1>
        @endif

    @else
        <h2>Variável produtos não foi passada como parâmetro.</h2>
    @endif

    @empty($produtos)
        <h2>Nada em produtos.</h2>        
    @endempty
    
	<script scr="{{URL::to('js/app.js')}}" type="text/javascript"></script>
	
</body>
</html>