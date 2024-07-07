<?php
// app/Http/Controllers/ProduitController.php
// app/Http/Controllers/ProduitController.php
// app/Http/Controllers/ProduitController.php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Image;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class ProduitController extends Controller
{
    public function index()
    {
        
        $produits = Produit::all();
        return view('produits.index', compact('produits'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('produits.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    
        $produit = Produit::create($request->all());
    
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('images/produits/' . $produit->id, $imageName, 'public');
    
            Image::create([
                'produit_id' => $produit->id,
                'nom_image' => 'images/produits/' . $produit->id . '/' . $imageName
            ]);
        }
    
        return redirect()->route('produits.index');
    }

    public function edit(Produit $produit)
    {
        $categories = Categorie::all();
        return view('produits.edit', compact('produit', 'categories'));
    }

    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'stock' => 'required|integer',
            'categorie_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $produit->update($request->all());

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('images/produits/' . $produit->id, $imageName, 'public');

            Image::create([
                'produit_id' => $produit->id,
                'nom_image' => 'images/produits/' . $produit->id . '/' . $imageName
            ]);
        }

        return redirect()->route('produits.index');
    }

    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index');
    }
    // App\Http\Controllers\ProduitController.php

public function achat(Request $request)
{
    $categories = Categorie::all();
    $search = $request->input('search');

    if ($search) {
        $produits = Produit::with(['firstImage'])->where('nom', 'like', "%{$search}%")->paginate(12);
    } else {
        $produits = Produit::with(['firstImage'])->paginate(12);
    }

    return view('achat', compact('produits', 'categories'));
}

public function show($id)
    {

        $campaigns = Campaign::all();
        
        Session::put('campaigns', $campaigns);
      
        $categories = Categorie::all();
        $produit = Produit::findOrFail($id);
        return view('produits.show', compact('produit', 'categories', 'campaigns'));
        
    }
      
    }