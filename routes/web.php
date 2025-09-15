<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

Route::resource('users', UserController::class);

Route::resource('categories', CategoryController::class);
