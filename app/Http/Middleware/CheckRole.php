<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (Auth::check() && in_array(Auth::user()->role, $roles)) {
            return $next($request);
        }

        return redirect('/'); // Arahkan ke halaman lain jika akses ditolak
    }
}
