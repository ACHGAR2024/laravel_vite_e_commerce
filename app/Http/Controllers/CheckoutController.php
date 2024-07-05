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
        $user = auth()->user();
        $adresses = $user->adresses;
        $adresseParDefaut = $adresses->where('nom_adresse', 'Adresse par défaut')->first();

        return view('checkout.address', compact('adresses', 'adresseParDefaut'));
    }

    public function storeAddress(Request $request)
    {
        $request->validate([
            'selected_address' => 'required_without_all:adresse,ville,code_postal,pays|exists:adresses,id',
            'adresse' => 'required_without:selected_address|string|max:255',
            'ville' => 'required_without:selected_address|string|max:255',
            'code_postal' => 'required_without:selected_address|string|max:10',
            'pays' => 'required_without:selected_address|string|max:255'
        ]);
    
        if ($request->has('selected_address')) {
            // Utiliser une adresse existante
            $adresse = Adresse::findOrFail($request->input('selected_address'));
            Session::put('adresse', $adresse->only('id', 'adresse', 'ville', 'code_postal', 'pays'));
        } else {
            // Ajouter une nouvelle adresse
            $adresse = new Adresse();
            $adresse->adresse = $request->input('adresse');
            $adresse->ville = $request->input('ville');
            $adresse->code_postal = $request->input('code_postal');
            $adresse->pays = $request->input('pays');
            $adresse->user_id = auth()->user()->id;
            $adresse->save();
    
            Session::put('adresse', $adresse->only('id', 'adresse', 'ville', 'code_postal', 'pays'));
        }
    
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

    $adresse = Session::get('adresse');
    $adresseModel = Adresse::where([
        'adresse' => $adresse['adresse'],
        'ville' => $adresse['ville'],
        'code_postal' => $adresse['code_postal'],
        'pays' => $adresse['pays'],
    ])->first();

    if (!$adresseModel) {
        $adresseModel = new Adresse();
        $adresseModel->adresse = $adresse['adresse'];
        $adresseModel->ville = $adresse['ville'];
        $adresseModel->code_postal = $adresse['code_postal'];
        $adresseModel->pays = $adresse['pays'];
        $adresseModel->user_id = auth()->user()->id;
        $adresseModel->save();
    }

    $commande = new Commande();
    $commande->id_client = auth()->user()->id;
    $commande->total = collect(Session::get('panier'))->sum(function ($item) {
        return $item['quantite'] * $item['prix'];
    });
    $commande->statut = 'en cours';
    $commande->id_adresse = $adresseModel->id;
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
