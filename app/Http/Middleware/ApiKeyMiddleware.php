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

        if(empty($apikey)){
            return response()->json([
                "success" => false,
                "message" => 'check your request, maybe API_KEY is missing'
            ], 400); 
        }

        if ($apikey !== env('API_KEY')) {
            return response()->json([
                "success" => false,
                "message" => 'unAuthorized: contact joonik\'s customer support to refresh your API_KEY'
            ], 401);
        }

        return $next($request);
    }
}
