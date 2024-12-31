<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('AdminMiddleware dijalankan.');
        if (Auth::check() && Auth::user()->role === config('roles.admin')) {
            return $next($request);
        }
        Log::warning('Akses ditolak. Role: ' . Auth::user()->role);
        return redirect('/')->with('error', "Anda tidak memiliki akses ke halaman ini");
    }
}
