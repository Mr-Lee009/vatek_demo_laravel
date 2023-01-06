<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class verifyJWT
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if ($request->header('Authorization') === null || $request->header('Authorization') === "") {
                return response()->json(['error' => 'Token not found']);
            }
            $user = JWTAuth::parseToken()->authenticate();
        }
        catch (JWTException $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json(['token_expired'], $e->getStatusCode());
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json(['token_invalid'], $e->getStatusCode());
            } else {
                return response()->json(['error' => 'Token is required']);
            }
        }
        return $next($request);
    }
}
