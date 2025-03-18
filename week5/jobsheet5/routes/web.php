<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/level", [LevelController::class, "index"]);

Route::get("/kategori", [KategoriController::class, "index"])->name("kategori.index");
Route::get("/kategori/create", [KategoriController::class, "create"])->name("kategori.create");
Route::post("/kategori", [KategoriController::class, "store"])->name("kategori.store");

Route::get("/kategori/ubah/{id}", [KategoriController::class, "edit"])->name("kategori.edit");
Route::put("/kategori/ubah_simpan/{id}", [KategoriController::class, "update"])->name("kategori.update");
Route::get("/kategori/hapus/{id}", [KategoriController::class, "destroy"])->name("kategori.destroy");

// Route untuk User
Route::get("/user", [UserController::class, "index"]);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah-simpan', [UserController::class, 'tambah_simpan']);

Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put("/user/ubah_simpan/{id}", [UserController::class, 'ubah_simpan']);
Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
