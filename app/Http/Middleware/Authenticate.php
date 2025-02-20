<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('login'); // Redirect ke halaman login jika belum login
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if (empty($guards)) {
            $guards = ['web', 'internal']; // Pastikan menangani kedua guard
        }

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return $next($request);
            }
        }

        return redirect('/'); // Redirect ke home jika belum login
    }
}
