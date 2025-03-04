<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

Route::prefix("/category")->group(function () {
    Route::get("/food-beverage", [ProductController::class, 'foodNbeverage']);
    Route::get("/beauty-health", [ProductController::class, 'beautyHealth']);
    Route::get("/home-care", [ProductController::class, 'homeCare']);
    Route::get("/baby-kid", [ProductController::class, 'babyKid']);
});

Route::get("/user/{id}/name/{name}", [UserController::class, "index"]);