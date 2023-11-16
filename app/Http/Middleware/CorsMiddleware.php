<?php

namespace App\Http\Middleware;

use Closure;
use Log;
class CorsMiddleware
{
    public function handle($request, Closure $next)
    {
        Log::info("before middilware");

        $response = $next($request);

        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE');
        $response->header('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Origin');
        
        Log::info("before after");

        return $response;
    }
}
