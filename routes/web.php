<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

Route::resource('users', UserController::class);

Route::resource('categories', CategoryController::class);



// default redirect ke login
Route::redirect('/', '/login');

// auth routes
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register', 'register');
    Route::post('/logout', 'logout')->name('logout');
});

// Form Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Form Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// dashboard sesuai role
Route::middleware(['auth', 'role:admin'])->get('/admin/dashboard', fn() => 'Admin Dashboard')->name('admin.dashboard');
Route::middleware(['auth', 'role:author'])->get('/author/dashboard', fn() => 'Author Dashboard')->name('author.dashboard');
Route::middleware(['auth', 'role:guest'])->get('/guest/home', fn() => 'Guest Home')->name('guest.home');
