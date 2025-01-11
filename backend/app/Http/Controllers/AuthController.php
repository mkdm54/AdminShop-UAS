<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function showLoginForm()
    {
        return view('form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:4', 'max:50'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $user = \App\Models\User::where('username', $request->username)->first();

        if (!$user) {
            return response()->json(['Error' => 'username tidak ditemukan'], 404);
        }

        if (!Auth::attempt($request->only('username', 'password'))) {
            return response()->json(['error' => 'Password salah'], 401);
        }

        $user = Auth::user();

        if ($user->role === 'admin') {
            return response()->json([
                'message' => 'Login berhasil sebagai Admin.',
                'redirect' => route('admin.index'),
            ]);
        } elseif ($user->role === 'user') {
            return response()->json([
                'message' => 'Login berhasil sebagai User.',
                'redirect' => route('user.index'),
            ]);
        }

        return response()->json([
            'error' => 'Terjadi kesalahan tidak terduga.'
        ], 500);
    }

    public function createAccount()
    {
        return view('create-form');
    }

    public function registerAccount(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'min:4', 'max:50', 'unique:users,username'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $defaulteEmail = $request->input('username') . '@gmail.com';

        $user = new \App\Models\User();
        $user->username = $request->input('username');
        $user->email =  $defaulteEmail;
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return response()->json([
            'message' => 'Akun berhasil dibuat',
            'redirect' => route('home')
        ], 200);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
