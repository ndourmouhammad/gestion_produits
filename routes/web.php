<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;


// user simple
Route::get('/', [CategorieController::class, 'index'])->name('home');



// admin
Route::get('/admin', [CategorieController::class, 'dashboard'])->name('dashboard');

