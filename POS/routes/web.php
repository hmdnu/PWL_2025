<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authorize;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth'])->get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin:admin'])->prefix('dashboard')->group(function () {
        Route::get('/', fn() => view('admin.dashboard'));
    });

    Route::middleware(['tenant:admin,tenant'])->group(function () {
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/room/{id}', [HomeController::class, 'room']);
    });
});
