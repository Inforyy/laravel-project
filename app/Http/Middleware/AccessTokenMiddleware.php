<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessTokenMiddleware
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
        // Check if accessToken exists in local storage
        $accessToken = $request->cookie('accessToken');

        if (!$accessToken) {
            // If accessToken does not exist, return unauthorized response
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Continue to the next middleware or the requested route
        return $next($request);
    }
}
