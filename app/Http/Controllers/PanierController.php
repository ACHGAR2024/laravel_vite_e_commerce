<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Campaign;
use Illuminate\Support\Facades\Session;

class PanierController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        $panier = Session::get('panier', []);
        Session::put('campaigns', $campaigns); // Stocker les campagnes dans la session

        return view('panier.index', compact('panier', 'campaigns'));
    }
    public function add(Request $request)
    {
        
        $produit = Produit::find($request->id);
        $panier = Session::get('panier', []);
        $panier[$produit->id] = [
            "nom" => $produit->nom,
            "quantite" => $request->quantite,
            "prix" => $produit->prix,
            "image" => $produit->image,
            
        ];
        Session::put('panier', $panier);
        
        return redirect()->back()->with('success', 'Produit ajouté au panier!');
    }

    public function ajouter(Request $request, Produit $produit)
{
    $panier = session()->get('panier', []);

    if(isset($panier[$produit->id])) {
        $panier[$produit->id]['quantite']++;
    } else {
        $panier[$produit->id] = [
            "nom" => $produit->nom,
            "quantite" => 1,
            "prix" => $produit->prix,
            "image" => $produit->image
        ];
    }

    session()->put('panier', $panier);

    return redirect()->route('panier.index')->with('success', 'Produit ajouté au panier!');
}


    public function update(Request $request)
    {
        if ($request->id && $request->quantite) {
            $panier = Session::get('panier');
            $panier[$request->id]["quantite"] = $request->quantite;
            Session::put('panier', $panier);
            return redirect()->back()->with('success', 'Panier mis à jour!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $panier = Session::get('panier');
            if (isset($panier[$request->id])) {
                unset($panier[$request->id]);
                Session::put('panier', $panier);
            }
            return redirect()->back()->with('success', 'Produit retiré du panier!');
        }
    }
}