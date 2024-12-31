<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\USerMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'showLoginForm');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::resource('admin', AdminController::class);
});

Route::middleware([USerMiddleware::class])->group(function () {
    Route::resource('user', UserController::class);
});
