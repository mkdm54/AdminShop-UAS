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

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.index');
            } elseif (Auth::user()->role === 'user') {
                return redirect()->route('user.index');
            }
        }

        return redirect()->back()->withErrors([
            'login' => 'Username, email, atau password tidak cocok dengan catatan kami.',
        ])->withInput();
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
