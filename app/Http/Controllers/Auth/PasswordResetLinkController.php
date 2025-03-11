<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Internal;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Cek apakah email ada di tabel users atau internals
        $user = User::where('email', $request->email)->first();
        $internal = Internal::where('email', $request->email)->first();

        if ($user) {
            $status = Password::broker('users')->sendResetLink(
                $request->only('email')
            );
        } elseif ($internal) {
            $status = Password::broker('internals')->sendResetLink(
                $request->only('email')
            );
        } else {
            return back()->withErrors(['email' => 'Email tidak ditemukan di sistem kami.']);
        }

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
