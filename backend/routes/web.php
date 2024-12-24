<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\USerMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([AdminMiddleware::class])->group(function(){
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware([USerMiddleware::class])->group(function(){
    Route::get('/dashboard',[UserController::class, 'index'])->name('user.dashboard');
});