<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Promo;
use App\Models\ProductImage;
use App\Models\Campaign;
use App\Models\Collection;

class Home_col_compController extends Controller
{
    public function index()
    {
        $featuredProducts = Produit::inRandomOrder()->orderBy('id', 'desc')->limit(4)->get();
        $promotions = Promo::inRandomOrder()->orderBy('id', 'desc')->limit(4)->get();
        $popularProducts = Produit::inRandomOrder()->orderBy('id', 'desc')->limit(4)->get();
        $campaigns = Campaign::orderBy('start_date', 'desc')->limit(4)->get();
        $collections = Collection::orderBy('created_at', 'desc')->limit(4)->get();

        return view('Home_col_comp', compact('featuredProducts', 'promotions', 'popularProducts', 'campaigns', 'collections'));
    }
}