<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\UserController;
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
    Route::get('/forgot-password', 'showForgotPasswordForm')->name('password.request');
    Route::post('/forgot-password', 'sendResetLink')->name('password.email');
    Route::get('/password/reset/{token}', 'showResetPasswordForm')->name('password.reset');
    Route::post('/password/reset', 'resetPassword')->name('password.update');
});

Route::middleware(['isAdmin'])->group(function () {
    // custom
    Route::get('/admin/products', [AdminController::class, 'showAllProducts'])->name('admin.products');
    Route::post('/search-product', [AdminController::class, 'searchProduct']);

    Route::resource('admin', AdminController::class);
});

Route::middleware(['isUser'])->group(function () {
    Route::resource('user', UserController::class);
});
