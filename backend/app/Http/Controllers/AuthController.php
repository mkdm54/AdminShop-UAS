<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
            return response()->json([
                'error' => 'username tidak ditemukan',
                'redirect' => route('home'),
            ], 404);
        }

        if (!Auth::attempt($request->only('username', 'password'))) {
            return response()->json([
                'error' => 'Password salah',
                'redirect' => route('home'),
            ], 401);
        }

        $user = Auth::user();
        if ($user instanceof User) {
            $user->is_active = true;
            $user->save();
            $request->session()->regenerate();

            if ($user->role === 'admin') {
                return response()->json([
                    'success' => 'Login berhasil sebagai Admin.',
                    'redirect' => route('admin.index'),
                ]);
            } elseif ($user->role === 'user') {
                return response()->json([
                    'success' => 'Login berhasil sebagai User.',
                    'redirect' => route('user.index'),
                ]);
            }

            return response()->json([
                'error' => 'Terjadi kesalahan tidak terduga.'
            ], 500);
        } else {
            return response()->json([
                'error' => 'Autentikasi gagal',
                'redirect' => route('home'),
            ], 500);
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
        try {
            $request->validate([
                'username' => ['required', 'string', 'min:4', 'max:50', 'unique:users,username'],
                'password' => ['required', 'string', 'min:6'],
            ], [
                'username.unique' => 'Username sudah digunakan',
            ]);

            $defaultEmail = $request->input('username') . '@gmail.com';

            $user = new \App\Models\User();
            $user->username = $request->input('username');
            $user->email =  $defaultEmail;
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return response()->json([
                'success' => 'Akun berhasil dibuat',
                'redirect' => route('home')
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => $e->errors()['username'][0],
                'redirect' => route('register.form')
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan server',
                'redirect' => route('register.form')
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        if ($user instanceof User) {
            $user->is_active = false;
            $user->save();
        }
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
