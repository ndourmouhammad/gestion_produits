<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function afficher()
    {
        $commandes = Auth::user()->commandes()->with('produits')->paginate(1);

        return view('utilisateurs.commandes.commandes', compact('commandes'));
    }

    public function showOrderForm($id)
    {
        $produit = Produit::findOrFail($id);
        return view('utilisateurs.commandes.commandeform', compact('produit'));
    }

    public function placeOrder(Request $request, $id)
    {
        $request->validate([
            'adresse_livraison' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
            // 'quantity' => 'required|integer|min:1'
        ]);
    
        $produit = Produit::findOrFail($id);
    
        $commande = Commande::create([
            'reference' => 'CMD-' . uniqid(),
            // 'montant_total' => $produit->prix_unitaire * $request->quantity,
            'montant_total' => $produit->prix_unitaire,
            'date_commande' => now(),
            'adresse_livraison' => $request->adresse_livraison, // Assurez-vous que cette ligne est correcte
            'etat_commande' => 'encours',
            'telephone' => $request->telephone,
            'user_id' => Auth::id()
        ]);
    
        $commande->produits()->attach($id);

        // $commande->produits()->attach($id, ['quantity' => $request->quantity]);
    
        return redirect()->route('commandes')->with('success', 'Commande passée avec succès.');
    }
    

}
