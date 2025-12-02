<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role !== 'member') {

            if (Auth::check()) {
                return redirect('/')->with('error', 'Akses ditolak. Anda bukan Member.');
            }

            // Belum login
            return redirect()->route('login')->with('error', 'Silakan login sebagai Member.');
        }

        return $next($request);
    }
}
