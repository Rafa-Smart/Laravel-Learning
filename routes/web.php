<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers;
use App\Http\Controllers\BlogController;

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