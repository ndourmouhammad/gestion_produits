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
            'telephone' => 'required|string|regex:/^\+\d{1,14}$/',
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

    public function edit($id)
    {
        $commande = Commande::with('produits')->findOrFail($id);
        if ($commande->user_id != Auth::id()) {
            return redirect()->route('commandes')->with('error', 'Vous ne pouvez pas modifier cette commande.');
        }

        return view('utilisateurs.commandes.commandemodif', compact('commande'));
    }
    
    public function update(Request $request, $id)
    {
        $commande = Commande::findOrFail($id);
        if ($commande->user_id != Auth::id()) {
            return redirect()->route('commandes')->with('error', 'Vous ne pouvez pas modifier cette commande.');
        }

        $request->validate([
            'adresse_livraison' => 'required|string|max:255',
            'telephone' => 'required|string|max:15',
            'etat_commande' => 'required|',
        ]);

        $commande->update([
            'adresse_livraison' => $request->adresse_livraison,
            'telephone' => $request->telephone,
            'etat_commande' => $request->etat_commande,
        ]);

        return redirect()->route('commandes')->with('success', 'Commande mise à jour avec succès.');
    }


    public function editEtat($id)
    {
        $commande = Commande::with('produits')->findOrFail($id);
        return view('admins.commandes.etatform', compact('commande'));
    }

    public function modifier_etat(Request $request, $id)
    {
        $commande = Commande::findOrFail($id);

        $request->validate([
            'etat_commande' => 'required|',
        ]);

        $commande->update([
            'etat_commande' => $request->etat_commande,
        ]);

        return redirect()->route('dashboard')->with('success', 'Commande mise à jour avec succès.');
    }

    public function supprimer($id)
    {
        $commande = Commande::findOrFail($id);

        $commande->delete();
        return redirect()->route('dashboard')->with('success', 'Commande supprimée avec succès.');
    }

}
