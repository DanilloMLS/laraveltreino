<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class PrimeiroMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Log::debug('passou pelo PrimeiroMiddleware ANTES');
        $response = $next($request);
        //return response('Parando a chamada de cadeias');
        Log::debug('passou pelo PrimeiroMiddleware DEPOIS');
        //return $response;
        return response('Alterei a resposta',201);
    }
}
