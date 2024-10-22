<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $apikey = $request->header('API_KEY');

        if ($apikey !== env('API_KEY')) {
            return response()->json([
                "success" => false,
                "message" => 'unAuthorized: contact joonik\'s customer support'
            ], 401);
        }

        return $next($request);
    }
}
