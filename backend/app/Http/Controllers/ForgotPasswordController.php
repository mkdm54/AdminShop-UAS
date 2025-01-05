<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Mockery\Generator\StringManipulation\Pass\Pass;

class ForgotPasswordController
{
    public function showForgotPasswordForm()
    {
        return view('auth.password.email');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email' => ['bail', 'required', 'email']
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT ?
            back()->with(['status' => __($status)]) :
            back()->withErrors(['status' => __($status)]);
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

        $status = Password::sendResetLink(
            $request->only('token', 'email', 'password_confirmed', 'password'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        return $status = Password::PASSWORD_RESET ?  
            redirect()->route('home')->with('status', __($status)) : 
            back()->withErrors(['email' => [__($status)]]);
    }
}
