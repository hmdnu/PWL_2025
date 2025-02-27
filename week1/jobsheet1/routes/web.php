<?php

// Mengimpor kelas Route dari Laravel untuk mendefinisikan rute
use Illuminate\Support\Facades\Route;
// Mengimpor ItemController agar bisa digunakan dalam routing
use App\Http\Controllers\ItemController;

// Mendefinisikan rute GET untuk halaman utama "/"
Route::get("/", function () {
    // Mengembalikan tampilan "welcome" saat halaman utama diakses
    return view("welcome");
});

// Mendefinisikan resource route untuk "items" dengan menggunakan ItemController
Route::resource("items", ItemController::class);
// Ini secara otomatis membuat rute CRUD (Create, Read, Update, Delete) untuk "items"
