<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if ($role === 'admin') {
            if (auth()->check() && auth()->user()->user_agent == 1) {
                return $next($request);
            }
        } elseif ($role === 'client') {
            if (auth()->check() && auth()->user()->user_agent == 3) {
                return $next($request);
            }
        }
        return abort(403, 'Forbidden');
    }
}
