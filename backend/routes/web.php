<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\USerMiddleware;
use Illuminate\Support\Facades\Route;

Route::controller(LoginController::class)->group(function(){
    Route::get('/', 'showLoginForm');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout');
});

Route::middleware([AdminMiddleware::class])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware([USerMiddleware::class])->group(function(){
    Route::get('/dashboard',[UserController::class, 'index'])->name('user.dashboard');
});