<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CryptoController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/crypto', [CryptoController::class, 'index']);

Route::get('/login', function () {
    return view('pages.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('pages.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
