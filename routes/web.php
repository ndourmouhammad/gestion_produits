<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Models\Produit;
use Illuminate\Support\Facades\Route;


// user simple
Route::get('/', [ProduitController::class, 'index'])->name('accueil');
Route::get('/categories', [CategorieController::class, 'categories'])->name('categories');
Route::get('/produits',[ProduitController::class, 'afficher'])->name('produits');

Route::get('/produit/{id}', [ProduitController::class, 'detail'])->name('detail')->where('id', '[0-9]+');

// admin
Route::get('/admin', [ProduitController::class, 'dashboard'])->name('dashboard');



Route::post('/ajout-categorie', [CategorieController::class, 'ajoutCategorie'])->name('ajout-categorie');
Route::post('/modifier-categorie/{id}', [CategorieController::class, 'modifierCategorie'])->name('modifier-categorie');
Route::post('/supprimer-categorie/{id}', [CategorieController::class, 'supprimerCategorie'])->name('supprimer-categorie');

Route::post('/ajout-produit', [ProduitController::class, 'ajoutProduit'])->name('ajout-produit');
Route::post('/modifier-produit/{id}', [CategorieController::class, 'modifierProduit'])->name('modifier-produit');
