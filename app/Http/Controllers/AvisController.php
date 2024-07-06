<?php

// app/Http/Controllers/AvisController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avis;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class AvisController extends Controller
{
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
}