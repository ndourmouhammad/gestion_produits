<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\User;
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
        $users = User::all();
        return view('admins.dashboard', compact('categories', 'produits', 'users'));
    }

    public function detail($id)
    {
        $produit = Produit::findOrFail($id);
        return view('utilisateurs.produits.detail', compact('produit'));
    }

    public function ajoutProduitForm()
    {
        $categories = Categorie::all();
        $produits = Produit::all();
     return view('admins.produits.ajout', compact('categories','produits'));
    }

    public function ajoutProduit(Request $request)
    {
        $request->validate([
            'designation' => 'required|max:255',
            'reference' => 'required',
            'prix_unitaire' => 'required|integer',
            'categorie_id' => 'required|integer',
            'image' => 'required',
            'prix_unitaire' => 'required|integer',
            'etat' => 'required',
            'user_id' => 'required|integer'
        ]);

        Produit::create($request->all());

        return redirect(route('dashboard'))->with('success', 'Produit ajouté avec succès');
    }


    public function modifierProduitForm($id)
    {
        $produit = Produit::findOrFail($id);
        $categories = Categorie::all();
     return view('admins.produits.modification', compact('produit', 'categories'));
    }


    public function modifierProduit(Request $request, $id)
    {
        $donneesvalides = $request->validate([
            'designation' => 'required|max:255',
            'reference' => 'required',
            'prix_unitaire' => 'required|integer',
            'categorie_id' => 'required|integer',
            'image' => 'required',
            'prix_unitaire' => 'required|integer',
            'etat' => 'required',
            'user_id' => 'required|integer'
        ]);

        
        $produit = Produit::findOrFail($id);
        $produit->update($donneesvalides);

        return redirect(route('dashboard'))->with('success', 'Ce produit a été modifiée avec succès');
    }

    

    public function supprimerProduit($id)
{
    $produit = Produit::findOrFail($id);
    $produit->delete();

    return redirect()->back()->with('success', 'Produit supprimé avec succès');
}

}
