@extends('Layouts.meulayout')

@section('minha_secao_produtos')

    <h1>Loop foreach - Arrays Associativos</h1>

    @foreach ($produtos as $produto)
        <p>{{ $produto['id'] }}: {{ $produto['nome'] }}</p>
    @endforeach

    <hr>

    @foreach ($produtos as $produto)
        <p>
            {{ $produto['id'] }}: {{ $produto['nome'] }}
            
            @if ($loop->first)
                (Primeiro)
            @endif
            @if ($loop->last)
                (Último)
            @endif

        {{-- index: índice atual; count: quantidade total de iterações; remaining: iterações que restam --}}
        <span class="badge badge-secondary">{{$loop->index}} / {{$loop->count-1}} / {{$loop->remaining}}</span>
        <span class="badge badge-secondary">{{$loop->iteration}} / {{$loop->count}}</span>
        </p>
    @endforeach

@endsection