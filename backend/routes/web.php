<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'showLoginForm')->name('home');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');

    // Register account
    Route::get('/register', 'createAccount')->name('register.form');
    Route::post('/register', 'registerAccount')->name('register.submit');
});

Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('/forgot-password', 'showForgotPasswordForm');
    Route::post('/forgot-password', 'sendResetLink');
    Route::get('/password/reset/{token}', 'showResetPasswordForm');
    Route::post('/password/reset', 'resetPassword');
});

Route::middleware(['isAdmin'])->group(function () {
    Route::resource('admin', AdminController::class);
});

Route::middleware(['isUser'])->group(function () {
    Route::resource('user', UserController::class);
});
