<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    //

    public function detail($id)
    {
        $categorie = Categorie::findOrFail($id); // Trouve le bien par son ID ou renvoie une erreur 404
        return view('admins.dashboard', compact('categorie'));
    }

    public function categories()
    {
        $categories = Categorie::all();
        return view('utilisateurs.categories.categories', compact('categories'));

    }

   

    public function ajoutCategorie(Request $request)
    {
        $request->validate([
            'libelle' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required|integer'
        ]);

        Categorie::create($request->all());

        return redirect()->back()->with('success', 'Catégorie ajouté avec succès');
    }

    public function modifierCategorie(Request $request, $id)
    {
        $donneesvalides = $request->validate([
            'libelle' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required|integer'
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->update($donneesvalides);

        return redirect()->back()->with('success', 'Catégorie modifiée avec succès');
    }

    public function supprimerCategorie($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->back()->with('success', 'Catégorie supprimée avec succès');
    }
}
