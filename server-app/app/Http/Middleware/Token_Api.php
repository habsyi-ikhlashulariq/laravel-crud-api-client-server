<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Token_Api
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //postman
        // $token = $request->header('APP_KEY');
        // if ($token != 'UNBIN'){
        //     return response()->json(['message' => 'App key not found'],401);
        // }
        // return $next($request);

        //client
        $token = $request->bearerToken();
        if ($token != 'UNBIN'){
            return response()->json(['message' => 'App key not found'],401);
        }
        return $next($request);
    }
}
