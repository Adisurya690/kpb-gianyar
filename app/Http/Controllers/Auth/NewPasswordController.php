<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Internal;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Cek apakah email ada di tabel users atau internals
        $user = User::where('email', $request->email)->first();
        $internal = Internal::where('email', $request->email)->first();

        if ($user) {
            $model = $user;
        } elseif ($internal) {
            $model = $internal;
        } else {
            return back()->withErrors(['email' => "We can't find a user with that email address."]);
        }

        // Reset password
        $model->forceFill([
            'password' => Hash::make($request->password),
        ])->save();

        return redirect()->route('login')->with('status', 'Your password has been reset!');
    }
}
