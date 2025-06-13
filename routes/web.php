<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/')->middleware('auth')->group(function() {
    Route::resource('dashboard', DashboardController::class);
});


Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');
