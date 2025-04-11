<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

Route::pattern('id', '[0-9]+');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);
route::get('/logout', [AuthController::class, 'logout']);


Route::middleware(['auth'])->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);

    Route::middleware(['authorize:ADM,MNG'])->group(function () {
        Route::get('/level', [LevelController::class, 'index']);
        Route::post('/level/list', [LevelController::class, 'list']); // untuk list json datatables
        Route::get('/level/create', [LevelController::class, 'create']);
        Route::post('/level', [LevelController::class, 'store']);
        Route::get('/level/{id}/edit', [LevelController::class, 'edit']); // untuk tampilkan form edit
        Route::put('/level/{id}', [LevelController::class, 'update']); // untuk proses update data
        Route::delete('/level/{id}', [LevelController::class, 'destroy']); // untuk proses hapus data
    });
});


Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/list', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/', [UserController::class, 'store']);
    Route::get('/create_ajax', [UserController::class, 'create_ajax']);
    Route::post('/ajax', [UserController::class, 'store_ajax']);
    Route::get('/{id}', [UserController::class, 'show']);
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
    Route::delete('/{id}', [UserController::class, 'destroy']);
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);
    Route::post('/list', [LevelController::class, 'list']);
    Route::get('/create', [LevelController::class, 'create']);
    Route::post('/', [LevelController::class, 'store']);
    Route::get('/create_ajax', [LevelController::class, 'create_ajax']);
    Route::post('/ajax', [LevelController::class, 'store_ajax']);
    Route::get('/{id}', [LevelController::class, 'show']);
    Route::get('/{id}/edit', [LevelController::class, 'edit']);
    Route::put('/{id}', [LevelController::class, 'update']);
    Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']);
    Route::delete('/{id}', [LevelController::class, 'destroy']);
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/list', [CategoryController::class, 'list']);
    Route::get('/create', [CategoryController::class, 'create']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::get('/create_ajax', [CategoryController::class, 'create_ajax']);
    Route::post('/ajax', [CategoryController::class, 'store_ajax']);
    Route::get('/{id}', [CategoryController::class, 'show']);
    Route::get('/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::get('/{id}/edit_ajax', [CategoryController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [CategoryController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [CategoryController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [CategoryController::class, 'delete_ajax']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});

Route::group(['prefix' => 'supplier'], function () {
    Route::get('/', [SupplierController::class, 'index']);
    Route::post('/list', [SupplierController::class, 'list']);
    Route::get('/create', [SupplierController::class, 'create']);
    Route::post('/', [SupplierController::class, 'store']);
    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
    Route::post('/ajax', [SupplierController::class, 'store_ajax']);
    Route::get('/{id}', [SupplierController::class, 'show']);
    Route::get('/{id}/edit', [SupplierController::class, 'edit']);
    Route::put('/{id}', [SupplierController::class, 'update']);
    Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
    Route::delete('/{id}', [SupplierController::class, 'destroy']);
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [ItemController::class, 'index']);
    Route::post('/list', [ItemController::class, 'list']);
    Route::get('/create', [ItemController::class, 'create']);
    Route::post('/', [ItemController::class, 'store']);
    Route::get('/create_ajax', [ItemController::class, 'create_ajax']);
    Route::post('/ajax', [ItemController::class, 'store_ajax']);
    Route::get('/{id}', [ItemController::class, 'show']);
    Route::get('/{id}/edit', [ItemController::class, 'edit']);
    Route::put('/{id}', [ItemController::class, 'update']);
    Route::get('/{id}/edit_ajax', [ItemController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [ItemController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [ItemController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [ItemController::class, 'delete_ajax']);
    Route::delete('/{id}', [ItemController::class, 'destroy']);
    Route::get('/import', [ItemController::class, 'import']);
    Route::post('/import_ajax', [ItemController::class, 'import_ajax']);
    Route::get('/export_excel', [ItemController::class, 'export_excel']);
    Route::get('/barang/export_pdf', [ItemController::class, 'export_pdf']);
});
