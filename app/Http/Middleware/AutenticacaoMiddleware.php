<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $methodAuthentication)
    {
        if ($methodAuthentication == 'padrao') {
            return $next($request);
        }
        return Response()->json(data: [
            'msg' => 'Acesso negado'
        ], status: 403);
    }
}
