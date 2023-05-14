<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
class CheckAccessToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next) {
        if (!Auth::guard('api')->check()) {
            throw new HttpResponseException(
                response()->json(['error' => 'Token de acceso inválido'], Response::HTTP_UNAUTHORIZED)
            );
        }

        return $next($request);
    }
}
