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
        if (Auth::check() && Auth::user()->role === 'admin') {
            Log::info('AdminMiddleware dijalankan.');
            $username = Auth::user()->username;
            session()->put('username', $username);
            return $next($request);
        }
        Log::warning('Akses ditolak. Role: ' . (Auth::check() ? Auth::user()->role : 'null'));
        return redirect()->route('home')->with('error', "Anda tidak memiliki akses ke halaman ini");
    }
}
