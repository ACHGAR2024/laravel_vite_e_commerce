<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\User; // Mettre à jour cette ligne pour utiliser le modèle User
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function index()
    {
        $commandes = Commande::with('user')->get(); // Mettre à jour pour utiliser user
        return view('commandes.index', compact('commandes'));
    }

    public function create()
    {
        $produits = Produit::all();
        return view('commandes.create', compact('produits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_client' => 'required|exists:users,id', // Mettre à jour pour utiliser users
            'produits' => 'required|array',
            'produits.*.id' => 'required|exists:produits,id',
            'produits.*.quantite' => 'required|numeric|min:1',
            'produits.*.prix' => 'required|numeric|min:0'
        ]);

        $commande = new Commande();
        $commande->id_client = $request->id_client;
        $commande->total = collect($request->produits)->sum(function ($produit) {
            return $produit['quantite'] * $produit['prix'];
        });
        $commande->statut = 'en cours';
        $commande->save();

        foreach ($request->produits as $produit) {
            $commande->produits()->attach($produit['id'], [
                'quantite' => $produit['quantite'],
                'prix' => $produit['prix']
            ]);
        }

        return redirect()->route('commandes.index')->with('success', 'Commande créée avec succès.');
    }

    public function show($id)
    {
        $commande = Commande::with('produits', 'user')->findOrFail($id); // Mettre à jour pour utiliser user
        return view('commandes.show', compact('commande'));
    }

    public function edit($id)
    {
        $commande = Commande::with('produits')->findOrFail($id);
        $produits = Produit::all();
        return view('commandes.edit', compact('commande', 'produits'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_client' => 'required|exists:users,id', // Mettre à jour pour utiliser users
            'produits' => 'required|array',
            'produits.*.id' => 'required|exists:produits,id',
            'produits.*.quantite' => 'required|numeric|min:1',
            'produits.*.prix' => 'required|numeric|min:0'
        ]);

        $commande = Commande::findOrFail($id);
        $commande->id_client = $request->id_client;
        $commande->total = collect($request->produits)->sum(function ($produit) {
            return $produit['quantite'] * $produit['prix'];
        });
        $commande->statut = $request->input('statut', 'en cours');
        $commande->save();

        $commande->produits()->detach();
        foreach ($request->produits as $produit) {
            $commande->produits()->attach($produit['id'], [
                'quantite' => $produit['quantite'],
                'prix' => $produit['prix']
            ]);
        }

        return redirect()->route('commandes.index')->with('success', 'Commande mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->produits()->detach();
        $commande->delete();

        return redirect()->route('commandes.index')->with('success', 'Commande supprimée avec succès.');
    }
}
