<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FurnitureController;

Route::get('/', [FurnitureController::class, 'home'])
    ->name('home');

Route::get('/katalog', [FurnitureController::class, 'index'])
    ->name('furnitures.index');

Route::get('/furniture/{id}', [FurnitureController::class, 'show'])
    ->name('furnitures.show');

Route::get('/tentang', [FurnitureController::class, 'about'])->name('about');
Route::get('/kontak', [FurnitureController::class, 'contact'])->name('contact');
