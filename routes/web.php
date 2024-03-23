<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/sign-up', [HomeController::class, 'signUp'])->name('signUp');

