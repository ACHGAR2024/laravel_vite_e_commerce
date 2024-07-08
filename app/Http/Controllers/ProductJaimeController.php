<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Jaime;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; 

class ProductJaimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function jaime(Produit $produit)
    {
        $jaime = Jaime::updateOrCreate(
            ['user_id' => Auth::id(), 'produit_id' => $produit->id],
            ['jaime' => true]
        );

        return back();
    }

    public function dislike(Produit $produit)
    {
        $jaime = Jaime::updateOrCreate(
            ['user_id' => Auth::id(), 'produit_id' => $produit->id],
            ['jaime' => false]
        );

        return back();
    }

    public function likedProducts()
    {
        $user_id = Auth::id();
        $likedProducts = Produit::whereHas('jaimes', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)->where('jaime', true);
        })->get();

        return view('produits.liked', compact('likedProducts'));
    }

}