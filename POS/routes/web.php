<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::middleware(['auth'])->get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin:admin'])->prefix('dashboard')->group(function () {
        Route::get('/', fn() => view('admin.dashboard'));

        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'show']);
            Route::delete('/{id}/delete', [UserController::class, 'destroy']);
            Route::patch('/{id}/edit', [UserController::class, 'update']);
            Route::post('/create', [UserController::class, 'store']);
        });
        Route::prefix('room')->group(function () {
            Route::get('/', [RoomController::class, 'show']);
            Route::post('/create', [RoomController::class, 'store']);
            Route::delete('/{id}/delete', [RoomController::class, 'destroy']);
            Route::patch('/{id}/edit', [RoomController::class, 'update']);
        });
        Route::prefix('rental')->group(function () {
            Route::get('/pending', [RentalController::class, 'showPending']);
            Route::get('/history', [RentalController::class, 'showHistory']);
            Route::get('/{id}/approve', [RentalController::class, 'approve']);
            Route::patch('/{id}/edit/status', [RentalController::class, 'updateStatus']);

        });
    });

    Route::middleware(['tenant:admin,tenant'])->group(function () {
        Route::get('/', [HomeController::class, 'show']);
        Route::get('/{tenantId}', [UserController::class, 'user']);
        Route::get('/room/{id}', [HomeController::class, 'room']);
        Route::post('/room/rent/{roomId}/tenant/{tenantId}', [RentalController::class, 'store']);
        Route::get('/rent/end', [RentalController::class, 'end']);
    });
});