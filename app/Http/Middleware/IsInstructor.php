<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsInstructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() || Auth::user()->role !== 'instructor') {

            if (Auth::check()) {
                // Sudah login tapi role salah
                return redirect('/')->with('error', 'Akses hanya untuk instructor.');
            }
            // Belum login
            return redirect()->route('login')->with('error', 'Silakan login untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}

