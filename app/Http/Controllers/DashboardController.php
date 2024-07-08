<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\User;
use App\Models\Campaign;

class DashboardController extends Controller
{
    public function index()
    {
        $commandesParMois = Commande::selectRaw('MONTH(created_at) as month, SUM(total) as total')
                                    ->groupBy('month')
                                    ->orderBy('month')
                                    ->get();
        $users = User::all();
        $commandes = Commande::all();
        $campaigns = Campaign::all();
        $featuredProducts = Produit::inRandomOrder()->orderBy('id', 'desc')->limit(1)->get();
        return view('dashboard', compact('commandes', 'featuredProducts', 'users', 'commandesParMois', 'campaigns'));
    }
}