<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Internal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah pengguna ada di tabel 'internals'
        if (Auth::guard('internal')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // Sesuaikan dengan halaman internal
        }

        // Jika bukan internal, cek di tabel 'users'
        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // Sesuaikan dengan halaman user
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function destroy(Request $request)
    {
        if (Auth::guard('internal')->check()) {
            Auth::guard('internal')->logout();
        }

        $request->session()->invalidate();
        $request->session()->flush();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
