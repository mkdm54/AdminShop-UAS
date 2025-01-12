<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role === 'user') {
            Log::info('UserMiddleware dijalankan.');
            return $next($request);
        }
        Log::warning('Akses ditolak. Role: ' . (Auth::check() ? Auth::user()->role : 'null'));
        return redirect()->route('home')->with('error', 'Anda tidak memiliki akses ke halaman ini');
    }
}
