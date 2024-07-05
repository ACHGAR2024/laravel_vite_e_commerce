<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Promo;
use App\Models\ProductImage;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Produit::inRandomOrder()->orderBy('id', 'desc')->limit(4)->get();
        $promotions = Promo::inRandomOrder()->orderBy('id', 'desc')->limit(2)->get();
        $popularProducts = Produit::inRandomOrder()->orderBy('id', 'desc')->limit(4)->get();

        return view('home', compact('featuredProducts', 'promotions', 'popularProducts'));
    }
    
}
