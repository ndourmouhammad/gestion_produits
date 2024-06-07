<?php

use App\Http\Controllers\CategorieController;
use Illuminate\Support\Facades\Route;


// user simple
Route::get('/', [CategorieController::class, 'index'])->name('accueil');
Route::get('/categories', [CategorieController::class, 'categories'])->name('categories');



// admin
Route::get('/admin', [CategorieController::class, 'dashboard'])->name('dashboard');

Route::get('/admin-category', [CategorieController::class, 'detail'])->name('detail');

Route::post('/ajout-categorie', [CategorieController::class, 'ajoutCategorie'])->name('ajout-categorie');
Route::post('/modifier-categorie/{id}', [CategorieController::class, 'modifierCategorie'])->name('modifier-categorie');
Route::post('/supprimer-categorie/{id}', [CategorieController::class, 'supprimerCategorie'])->name('supprimer-categorie');
