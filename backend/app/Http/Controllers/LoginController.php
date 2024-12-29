<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function showLoginForm()
    {
        return view('form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:4|max:50|',
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        $credentials = $request->only('username', 'email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.index');
            } elseif (Auth::user()->role === 'user') {
                return redirect()->route('user.dashboard');
            }
        }

        return redirect()->back()->withErrors([
            'username' => 'Username salah',
            'email' => 'Email salah',
            'password' => 'Password salah',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
