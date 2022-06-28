<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.index');
})->name('home');

Route::get('users/{user}/posts', [ UserPostController::class, 'index' ])->name('users.posts');

Route::get('register', [ RegisterController::class, 'index' ])->name('register');
Route::post('register', [ RegisterController::class, 'store' ]);

Route::get('login', [ LoginController::class, 'index' ])->name('login');
Route::post('login', [ LoginController::class, 'store' ]);

Route::post('logout', [ LogoutController::class, 'index' ])->name('logout');

Route::get('dashboard', [ DashboardController::class, 'index' ])
    ->name('dashboard')
    ->middleware('auth');

Route::get('posts', [ PostController::class, 'index' ])->name('posts');
Route::post('posts', [ PostController::class, 'store' ]);
Route::delete('posts/{post}', [ PostController::class, 'destroy' ])->name('posts.destroy');
Route::post('posts/{post}/likes', [ LikeController::class, 'store' ])->name('posts.likes');
Route::delete('posts/{post}/likes', [ LikeController::class, 'destroy' ])->name('posts.likes');
