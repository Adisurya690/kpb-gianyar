<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users|unique:internals',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:15',
            'verification_code' => 'required|string', // Kode verifikasi wajib diisi
        ];
    }

    public function messages()
    {
        return [
            'verification_code.required' => 'Kode verifikasi tidak boleh kosong!',
        ];
    }
}
