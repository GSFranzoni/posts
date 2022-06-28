<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home.index');
})->name('home');

Route::get('register', [ RegisterController::class, 'index' ])->name('register');
Route::post('register', [ RegisterController::class, 'store' ]);

Route::get('login', [ LoginController::class, 'index' ])->name('login');
Route::post('login', [ LoginController::class, 'store' ]);

Route::post('logout', [ LogoutController::class, 'index' ])->name('logout');

Route::get('dashboard', [ DashboardController::class, 'index' ])
    ->name('dashboard')
    ->middleware('auth');