<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([AdminMiddleware::class])->group(function(){
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
});
