<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Adresse;
use App\Models\Paiement;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function showAddressForm()
    {
        return view('checkout.address');
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'adresse' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|string|max:10',
            'pays' => 'required|string|max:255'
        ]);

        Session::put('adresse', $request->only('adresse', 'ville', 'code_postal', 'pays'));
        return redirect()->route('checkout.shipping');
    }

    public function showShippingForm()
    {
        return view('checkout.shipping');
    }

    public function storeShipping(Request $request)
    {
        $request->validate([
            'mode_livraison' => 'required|string|max:255',
        ]);

        Session::put('mode_livraison', $request->mode_livraison);
        return redirect()->route('checkout.payment');
    }

    public function showPaymentForm()
    {
        return view('checkout.payment');
    }

    public function storePayment(Request $request)
    {
        $request->validate([
            'methode_paiement' => 'required|string|max:255',
            'statut_paiement' => 'required|string|max:255',
        ]);

        $commande = new Commande();
        $commande->id_client = auth()->user()->id;
        $commande->total = collect(Session::get('panier'))->sum(function ($item) {
            return $item['quantite'] * $item['prix'];
        });
        $commande->statut = 'en cours';
        $commande->save();

        foreach (Session::get('panier') as $id => $details) {
            $commande->produits()->attach($id, [
                'quantite' => $details['quantite'],
                'prix' => $details['prix']
            ]);
        }

        $paiement = new Paiement();
        $paiement->id_commande = $commande->id;
        $paiement->montant = $commande->total;
        $paiement->methode_paiement = $request->methode_paiement;
        $paiement->statut_paiement = $request->statut_paiement;
        $paiement->save();

        Session::forget(['panier', 'adresse', 'mode_livraison']);

        return redirect()->route('commandes.index')->with('success', 'Commande validée avec succès.');
    }
}

