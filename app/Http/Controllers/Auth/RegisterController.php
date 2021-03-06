<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required|string|min:3',
                'username' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|confirmed',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'nama.string' => 'Nama harus berupa karakter',
                'nama.min' => 'Nama tidak boleh kurang dari 3 huruf',
                'username.required' => 'Username tidak boleh kosong',
                'username.string' => 'Username harus berupa karakter',
                'email.required' => 'Email tidak boleh kosong',
                'email.email' => 'Email tidak valid',
                'password.required' => 'Password tidak boleh kosong',
                'password.min' => 'Password tidak boleh kurang dari 6 karakter',
            ]
        );

        Auth::login($user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_level' => 2 // id pelanggan
        ]), true);
        return redirect()->route('login')->withSuccess('Registrasi Berhasil!');
    }
}
