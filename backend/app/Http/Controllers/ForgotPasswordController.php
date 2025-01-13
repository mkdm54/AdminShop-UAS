<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController
{
    public function showForgotPasswordForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => ['bail', 'required', 'email']
        ]);

        $status = Password::sendResetLink($request->only('email'));
        Log::info('Email yang dikirim: ' . json_encode($status)); // Tambahkan log untuk melihat email yang dikirim

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['status' => __($status), 'success' => 'Link reset password telah dikirim ke email Anda.'], 200);
        } else {
            return response()->json(['status' => __($status), 'error' => 'Email tidak ditemukan.', 'redirect' => route('password.request')], 422);
        }
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => ['required', 'email'],
            'password' => ['bail', 'required', 'string', 'min:6', 'confirmed']
        ]);

        $status = Password::reset(
            $request->only('token', 'email', 'password_confirmation', 'password'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json(['status' => __($status), 'success' => 'Password berhasil direset.', 'redirect' => route('home')], 200);
        } else {
            return response()->json(['status' => __($status), 'error' => 'Gagal mereset password.'], 422);
        }
    }
}
