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


Route::get('/form-ajout-categorie', [CategorieController::class, 'ajoutCategorieForm'])->name('ajoutCategorieForm');
Route::post('/ajout-categorie', [CategorieController::class, 'ajoutCategorie'])->name('ajout-categorie');

Route::get('/form-modif-categorie/{id}', [CategorieController::class, 'modifierCategorieForm'])->name('modifierCategorieForm')->where('id', '[0-9]+');
Route::post('/modifier-categorie/{id}', [CategorieController::class, 'modifierCategorie'])->name('modifier-categorie');
Route::get('/supprimer-categorie/{id}', [CategorieController::class, 'supprimerCategorie'])->name('supprimer-categorie');

Route::get('/form-ajout-produit', [ProduitController::class, 'ajoutProduitForm'])->name('ajoutProduitForm');
Route::post('/ajout-produit', [ProduitController::class, 'ajoutProduit'])->name('ajout-produit');

Route::get('/form-modif-produit/{id}', [ProduitController::class, 'modifierProduitForm'])->name('modifierProduitForm')->where('id', '[0-9]+');
Route::post('/modifier-produit/{id}', [ProduitController::class, 'modifierProduit'])->name('modifier-produit');
Route::get('/supprimer-produit/{id}', [ProduitController::class, 'supprimerProduit'])->name('supprimer-produit');
