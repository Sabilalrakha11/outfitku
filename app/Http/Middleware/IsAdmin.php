<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN punya pangkat 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Pintu dibuka, silakan masuk Bos!
        }

        // Kalau bukan admin (misal user biasa atau belum login), tendang ke home
        return redirect('/')->with('error', 'Akses ditolak! Halaman ini khusus Super Admin cuy.');
    }
}