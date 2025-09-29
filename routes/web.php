<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';


Route::get(
    '/blog',
    [BlogController::class, 'index']
)->name('halaman-utama');


Route::get("blog/add", [BlogController::class, 'add']);
Route::post("blog/create", [BlogController::class, 'create']);
// ini akan masuk ke hal detail sesuai id
// dan {id} ini otomatis akan menangkap parameter id dari url
// lalu dikirim ke parameter di fungsi detail di BlogController
Route::get("blog/{id}/detail", [BlogController::class, 'detail']);



Route::get("blog/{id}/edit", [BlogController::class, 'edit']);

// karena kita mau update
Route::patch("blog/{id}/update", [BlogController::class, 'update']);


Route::get("blog/{id}/delete", [BlogController::class, 'delete']);


// disini ktia pengen nampilin data yang udah kehapus
Route::get("blog/{id}/trash", [BlogController::class, 'trash']);

// users

Route::get("/users", [UserController::class, 'index']);

Route::get('users/add', [UserController::class, 'add']);
Route::post('users/create', [UserController::class, 'create']);
Route::get('users/{id}/detail', [UserController::class, 'detail']);
Route::get('users/{id}/edit', [UserController::class, 'edit']);
Route::patch("users/{id}/update", [UserController::class, 'update']);