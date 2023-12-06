<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class, 'form']);
Route::post('/', [LoginController::class, 'login'])
    ->name('login');
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('authenticate')
    ->name('dashboard');

