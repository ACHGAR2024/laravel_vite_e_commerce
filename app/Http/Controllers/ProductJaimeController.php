<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Jaime;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; // Importez cette classe

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
}