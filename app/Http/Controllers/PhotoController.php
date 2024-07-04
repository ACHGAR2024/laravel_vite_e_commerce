<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Models\Produit;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index($produit_id)
    {
        $produit = Produit::findOrFail($produit_id);
        $photos = ProductImage::where('produit_id', $produit_id)->get();

        return view('photos.index', compact('produit', 'photos'));
    }

    public function store(Request $request, $produit_id)
    {
        $request->validate([
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        foreach ($request->file('photos') as $photo) {
            $path = $photo->store('images/produits/' . $produit_id, 'public');
            ProductImage::create([
                'nom_image' => $path,
                'produit_id' => $produit_id,
            ]);
        }

        return redirect()->route('photos.index', $produit_id)
            ->with('success', 'Photos téléchargées avec succès.');
    }

    public function destroy($produit_id, $photo_id)
    {
        $photo = ProductImage::findOrFail($photo_id);
        $photo->delete();

        return redirect()->route('photos.index', $produit_id)
            ->with('success', 'Photo supprimée avec succès.');
    }
}
