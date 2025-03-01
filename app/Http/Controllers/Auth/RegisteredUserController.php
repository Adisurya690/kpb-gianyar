<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Internal;
use App\Models\Role;
use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|unique:internals',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Simpan data sementara di session (tanpa menyimpan ke database)
        $userData = $request->only(['name', 'nickname', 'email', 'password', 'phone_number', 'address']);
        $userData['password'] = Hash::make($userData['password']); // Hash password sebelum disimpan
        session(['register_data' => $userData]);

        // Buat kode verifikasi
        $verificationCode = mt_rand(100000, 999999);
        session(['verification_code' => $verificationCode]);

        // Kirim kode ke email
        Mail::to($request->email)->send(new VerificationMail($verificationCode));

        return redirect()->route('verify.code.form')->with('success', 'Kode verifikasi telah dikirim ke email Anda.');
    }

    public function showVerificationForm()
    {
        return view('auth.verify-code');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'verification_code' => 'required|string',
        ]);

        $enteredCode = $request->verification_code;
        $userData = session('register_data');

        if (!$userData) {
            return redirect()->route('register')->withErrors(['error' => 'Silakan daftar kembali.']);
        }

        // Jika kode yang dimasukkan adalah KPBGNYR25, arahkan ke form tambahan internal
        if ($enteredCode === 'KPBG25') {
            session(['internal_data' => $userData]);
            session()->forget(['register_data', 'verification_code']);
            return redirect()->route('internal.complete.form');
        }

        // Jika kode yang dimasukkan salah
        if ($enteredCode != session('verification_code')) {
            return back()->withErrors(['verification_code' => 'Kode yang dimasukkan salah.']);
        }

        // Jika kode benar, proses sebagai user biasa
        $role = Role::where('name', 'user')->first();
        if (!$role) {
            return back()->withErrors(['role' => 'Role user tidak ditemukan di database.']);
        }

        $user = User::create(array_merge($userData, ['role_id' => $role->id]));

        session()->forget(['register_data', 'verification_code']);
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Akun Anda berhasil diverifikasi.');
    }

    public function showInternalForm()
    {
        $internalData = session('internal_data');

        if (!$internalData) {
            return redirect()->route('register')->withErrors(['error' => 'Silakan daftar kembali.']);
        }

        return view('auth.internal-form', compact('internalData'));
    }

    // public function completeInternalRegistration(Request $request)
    // {
    //     // Pastikan ada data di session
    //     $internalData = session('internal_data');
    //     if (!$internalData) {
    //         return redirect()->route('register')->withErrors(['error' => 'Silakan daftar kembali.']);
    //     }

    //     // Validasi form tambahan
    //     $request->validate([
    //         'nia' => 'required|string|max:20|unique:internals',
    //         'position' => 'required|string|max:255',
    //         'kpbprov' => 'nullable|string|max:255',
    //     ]);

    //     // Ambil role internal
    //     $role = Role::where('name', 'internal')->first();

    //     // Simpan ke database
    //     $internal = Internal::create(array_merge($internalData, [
    //         'role_id' => $role->id,
    //         'nia' => $request->nia,
    //         'position' => $request->position,
    //         'kpbprov' => $request->kpbprov,
    //     ]));

    //     // Hapus session setelah penyimpanan
    //     session()->forget('internal_data');

    //     // Login otomatis
    //     Auth::login($internal);

    //     return redirect()->route('internal.dashboard')->with('success', 'Registrasi berhasil. Selamat datang di sistem!');
    // }
    public function storeInternalData(Request $request)
    {
        $request->validate([
            'nia' => 'required|string|max:20',
            'position' => 'required|string|max:255',
            'kpbprov' => 'nullable|string|max:255',
        ]);

        $internalData = session('internal_data');

        if (!$internalData) {
            return redirect()->route('register')->withErrors(['error' => 'Silakan daftar kembali.']);
        }

        // Ambil role internal
        $role = Role::where('name', 'internal')->first();
        if (!$role) {
            return back()->withErrors(['role' => 'Role internal tidak ditemukan di database.']);
        }

        // Simpan data internal ke database
        $internal = Internal::create([
            'name' => $internalData['name'],
            'nickname' => $internalData['nickname'],
            'email' => $internalData['email'],
            'password' => $internalData['password'],
            'phone_number' => $internalData['phone_number'],
            'nia' => $request->nia,
            'position' => $request->position,
            'kpbprov' => $request->kpbprov,
            'role_id' => $role->id,
        ]);

        // Hapus session setelah data disimpan
        session()->forget(['internal_data']);

        // Login user internal
        Auth::login($internal);

        return redirect()->route('dashboard')->with('success', 'Akun internal berhasil dibuat.');
    }
}
