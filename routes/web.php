<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Models\Produit;
use Illuminate\Support\Facades\Route;


// user simple
Route::get('/', [ProduitController::class, 'index'])->name('accueil');
Route::get('/categories', [CategorieController::class, 'categories'])->name('categories');
// Route::get('/',[ProduitController::class, 'afficher'])->name('produits');



// admin
Route::get('/admin', [ProduitController::class, 'dashboard'])->name('dashboard');

Route::get('/admin-category', [CategorieController::class, 'detail'])->name('detail');

Route::post('/ajout-categorie', [CategorieController::class, 'ajoutCategorie'])->name('ajout-categorie');
Route::post('/modifier-categorie/{id}', [CategorieController::class, 'modifierCategorie'])->name('modifier-categorie');
Route::post('/supprimer-categorie/{id}', [CategorieController::class, 'supprimerCategorie'])->name('supprimer-categorie');

Route::post('/ajout-produit', [CategorieController::class, 'ajoutProduit'])->name('ajout-produit');
