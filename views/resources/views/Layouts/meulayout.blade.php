<!DOCTYPE html>
<html>
<head>
	<title>Produtos</title>
	<link rel="stylesheet" href="{{URL::to('css/app.css')}}">
</head>
<body>
    
    @hasSection ('minha_secao_produtos')
        <div class="card" >
            <div class="card-body">
                <h5 class="card-title" style="width:500px; margin:10px;">Produtos</h5>
                <p class="card-text">
                    @yield('minha_secao_produtos')
                </p>
                <a href="#" class="card-link">Informações</a>
                <a href="#" class="card-link">Ajuda</a>
            </div>
        </div>
    @endif
    
	<script scr="{{URL::to('js/app.js')}}" type="text/javascript"></script>
	
</body>
</html>