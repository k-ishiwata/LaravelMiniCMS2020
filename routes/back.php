<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController')->name('dashboard');
Route::resource('posts', 'PostController')->except('show');
