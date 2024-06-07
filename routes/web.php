<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;


// user simple
Route::get('/', [CategorieController::class, 'index'])->name('accueil');
Route::get('/categories', [CategorieController::class, 'categories'])->name('categories');



// admin
Route::get('/admin', [CategorieController::class, 'dashboard'])->name('dashboard');

