<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $response->headers->set('Access-Control-Allow-Origin', config('cors.allowed_origins'));
        $response->headers->set('Access-Control-Allow-Methods', config('cors.allowed_methods'));
        $response->headers->set('Access-Control-Allow-Headers', config('cors.allowed_headers'));

        return $response;
    }
}