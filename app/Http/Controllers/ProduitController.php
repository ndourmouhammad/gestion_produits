<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    //

    public function index()
    {
        // Récupérer toutes les catégories avec leurs produits associés
        $categoriesAvecProduits = Categorie::with('produits')->get();

        // Passer les données à la vue
        return view('utilisateurs.index', compact('categoriesAvecProduits'));
    }

    public function afficher()
    {
        $produits = Produit::all();
        return view('utilisateurs.produits.produits', compact('produits'));
    }

    public function dashboard()
    {
        $categories = Categorie::all();
        $produits = Produit::all();
        return view('admins.dashboard', compact('categories', 'produits'));
    }

    public function detail($id)
    {
        $produit = Produit::findOrFail($id);
        return view('utilisateurs.produits.detail', compact('produit'));
    }
}
