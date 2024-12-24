<?php

use App\Http\Controllers\admin;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([AdminMiddleware::class])->group(function(){
    Route::get('/admin', [])->name('admin.dashboard');
});
