<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Promo;
use App\Models\Campaign;

use Illuminate\Support\Facades\Session;

use App\Models\ProductImage;

class HomeController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        
        Session::put('campaigns', $campaigns);
        $featuredProducts = Produit::inRandomOrder()->orderBy('id', 'desc')->limit(4)->get();
        $promotions = Promo::all();
        $popularProducts = Produit::inRandomOrder()->orderBy('id', 'desc')->limit(4)->get();

        return view('home', compact('featuredProducts', 'promotions', 'popularProducts', 'campaigns'));
    }
    
}