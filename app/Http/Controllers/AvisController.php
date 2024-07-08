<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;
use App\Models\Produit;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class AvisController extends Controller
{
    public function index()
    {
        $avis = Avis::all();
        $products = Produit::all();
        $users = User::all();
        return view('avis.index', compact('avis', 'products', 'users'));
    }

    public function show($id)   
    {
        $avis = Avis::findOrFail($id);
        return view('avis.show', compact('avis'));
    }

    public function edit($id)
    {
        $avis = Avis::findOrFail($id);
        return view('avis.edit', compact('avis'));
    }   

    public function create($produitId)
    {
        $produit = Produit::findOrFail($produitId);
        return view('avis.create', compact('produit'));
    }   
    
    public function store(Request $request, $produitId)
    {
        $request->validate([
            'commentaire' => 'required|string',
            'note' => 'required|integer|min:1|max:5',
        ]);

        Avis::create([
            'commentaire' => $request->commentaire,
            'note' => $request->note,
            'id_products' => $produitId,
            'id_user' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Avis ajouté avec succès');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'commentaire' => 'required|string',
            'note' => 'required|integer|min:1|max:5',
        ]);

        $avis = Avis::findOrFail($id);
        $avis->update([
            'commentaire' => $request->commentaire,
            'note' => $request->note,
        ]);

        return redirect()->route('avis.index')->with('success', 'Avis mis à jour avec succès');
    }
    
    public function destroy($id)
    {
        $avis = Avis::findOrFail($id);
        $avis->delete();
        return redirect()->route('avis.index')->with('success', 'Avis supprimé avec succès');
    }
}