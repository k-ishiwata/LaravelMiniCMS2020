<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostController@index');
Route::resource('posts', 'PostController')->only(['index','show']);
