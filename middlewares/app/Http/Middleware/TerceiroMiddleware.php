<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;

use Closure;

class TerceiroMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $nome, $idade)
    {
        Log::debug("Passou pelo TerceiroMiddleware [nome = $nome, $idade]");
        return $next($request);
    }
}
