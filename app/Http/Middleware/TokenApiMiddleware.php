<?php

namespace App\Http\Middleware;

use App\Helpers\ResponseHelpers;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokenApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $user = JWTAuth::user();
            $available_route = [];

            if (in_array($request->route()->getName(), $available_route)) {
                return $next($request);
            }

            if (empty($user->id)) {
                return ResponseHelpers::reponseUnauthorized();
            }

        } catch (\Exception $ex) {
            return ResponseHelpers::reponseUnauthorized();
        }

        return $next($request);
    }
}
