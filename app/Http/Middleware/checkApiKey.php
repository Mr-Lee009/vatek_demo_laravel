<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkApiKey
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
        if ($request->header("apiKey") === null || $request->header("apiKey") === "") {
            return response()->json(
                [
                    "status" => "Error",
                    "message" => "thieu apikey"
                ]
            );
        }
        return $next($request);
    }
}
