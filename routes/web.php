<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::middleware('valid')->group(function(){
    Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::post('change-photo', [HomeController::class, 'changePhoto'])->name('changePhoto');
    Route::post('update', [HomeController::class, 'update'])->name('update');


});

Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/sign-up', [HomeController::class, 'signUp'])->name('signUp');

Route::post('sign-up', [AuthController::class, 'signUp'])->name('signingUp');
Route::post('login', [AuthController::class, 'login'])->name('loggingIn');

