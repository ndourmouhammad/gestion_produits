<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware;


// Authentification
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');


// Routes pour les utilisateurs simples
Route::get('/', [ProduitController::class, 'index'])->name('accueil');
    Route::get('/categories', [CategorieController::class, 'categories'])->name('categories');
    Route::get('/produits',[ProduitController::class, 'afficher'])->name('produits');
    Route::get('/produit/{id}', [ProduitController::class, 'detail'])->name('detail')->where('id', '[0-9]+');


Route::middleware(['role:user_simple'])->group(function() {
    //
});

// Routes pour les administrateurs
Route::middleware('App\Http\Middleware\CheckRole:admin')->group(function () {
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
});


