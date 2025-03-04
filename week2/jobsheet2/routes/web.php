<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

Route::resource("photos", PhotoController::class);

Route::get("/", [HomeController::class, "index"]);
Route::get("/about", [AboutController::class, "about"]);
Route::get("/articles/{id}", [ArticleController::class, "articles"]);

Route::get("/hello", [WelcomeController::class, "hello"]);
Route::get("/world", function () {
    return "world";
});

// view
Route::get("/greeting", [WelcomeController::class, "greeting"]);

Route::get("/user/{name}", function (string $name) {
    return "Nama saya " . $name;
});

Route::get("/posts/{post}/comments/{comment}", function (
    string $postId,
    string $commentId
) {
    return "Pos ke-" . $postId . " Komentar ke-: " . $commentId;
});

Route::get("/user/{name?}", function (string|null $name = null) {
    return "Nama saya " . $name;
});

// // route name
// Route::get("/user/profile", function () {
//     //
// })->name("profile");

// // Route::get("/user/profile", [UserProfileController::class, "show"])->name(
// //     "profile"
// // );
// // Generating URLs...
// // $url = route("profile");

Route::middleware(["first", "second"])->group(function () {
    // Route::get("/", function () {
    //     // Uses first & second middleware...
    // });
    // Route::get("/user/profile", function () {
    //     // Uses first & second middleware...
    // });
});

Route::domain("{account}.example.com")->group(function () {
    Route::get("user/{id}", function ($account, $id) {
        //
    });
});

// Route::middleware("auth")->group(function () {
//     Route::get("/user", [UserController::class, "index"]);
//     Route::get("/post", [PostController::class, "index"]);
//     Route::get("/event", [EventController::class, "index"]);
// });

Route::redirect("/here", "/there");

// route prefixes
// Route::prefix("admin")->group(function () {
//     Route::get("/user", [UserController::class, "index"]);
//     Route::get("/post", [PostController::class, "index"]);
//     Route::get("/event", [EventController::class, "index"]);
// });

// // route view
Route::view("/welcome", "welcome");
Route::view("/welcome", "welcome", ["name" => "Taylor"]);

Route::resource("photos", PhotoController::class)->only(["index", "show"]);
Route::resource("photos", PhotoController::class)->except([
    "create",
    "store",
    "update",
    "destroy",
]);
