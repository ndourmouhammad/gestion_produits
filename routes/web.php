<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware;


// Authentification
Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// Routes pour les users simples
Route::get('/', [ProduitController::class, 'index'])->name('accueil');
Route::get('/categories', [CategorieController::class, 'categories'])->name('categories');
Route::get('/produits', [ProduitController::class, 'afficher'])->name('produits');
Route::get('/produit/{id}', [ProduitController::class, 'detail'])->name('detail')->where('id', '[0-9]+');


Route::middleware(['auth'])->group(function () {
    Route::get('/produit/{id}/commander', [CommandeController::class, 'showOrderForm'])->name('produit.commander');
    Route::post('/produit/{id}/commander', [CommandeController::class, 'placeOrder'])->name('produit.placeOrder');
    Route::get('/commandes', [CommandeController::class, 'afficher'])->name('commandes');
    Route::get('/commandes/{id}/edit', [CommandeController::class, 'edit'])->name('commandes.edit');
    Route::post('/commandes/{id}', [CommandeController::class, 'update'])->name('commandes.update');
});



// Routes pour les administrateurs
Route::middleware('App\Http\Middleware\CheckRole:admin')->group(function () {
    Route::get('/admin', [ProduitController::class, 'dashboard'])->name('dashboard')->middleware('auth');
    
    // la gestion des catégories
    Route::get('/form-ajout-categorie', [CategorieController::class, 'ajoutCategorieForm'])->name('ajoutCategorieForm');
    Route::post('/ajout-categorie', [CategorieController::class, 'ajoutCategorie'])->name('ajout-categorie');
    Route::get('/form-modif-categorie/{id}', [CategorieController::class, 'modifierCategorieForm'])->name('modifierCategorieForm')->where('id', '[0-9]+');
    Route::post('/modifier-categorie/{id}', [CategorieController::class, 'modifierCategorie'])->name('modifier-categorie');
    Route::get('/supprimer-categorie/{id}', [CategorieController::class, 'supprimerCategorie'])->name('supprimer-categorie');

    // la gestion des produits
    Route::get('/form-ajout-produit', [ProduitController::class, 'ajoutProduitForm'])->name('ajoutProduitForm');
    Route::post('/ajout-produit', [ProduitController::class, 'ajoutProduit'])->name('ajout-produit');
    Route::get('/form-modif-produit/{id}', [ProduitController::class, 'modifierProduitForm'])->name('modifierProduitForm')->where('id', '[0-9]+');
    Route::post('/modifier-produit/{id}', [ProduitController::class, 'modifierProduit'])->name('modifier-produit');
    Route::get('/supprimer-produit/{id}', [ProduitController::class, 'supprimerProduit'])->name('supprimer-produit');

    Route::get('/users', [ProduitController::class, 'users'])->name('users');

    // la gestion des commandes
    Route::get('/modifier-etat/{id}', [CommandeController::class, 'editEtat'])->name('commandes.etat');
    Route::post('/etat-commandes/{id}', [CommandeController::class, 'modifier_etat'])->name('commandes.etat.traitement');
    Route::get('/commandes/{id}', [CommandeController::class, 'supprimer'])->name('commandes.supprimer');
});
