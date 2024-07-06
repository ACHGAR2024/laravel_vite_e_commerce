<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande; // Importer le modèle Commande
use App\Models\Campaign;
use App\Models\Produit;
use App\Models\Collection;

class StatController extends Controller
{
    public function index()
    {
        $totalSales = Commande::sum('total'); // Utiliser le modèle Commande
        $monthlySales = Commande::selectRaw('MONTH(created_at) as month, SUM(total) as total')
                            ->groupBy('month')
                            ->pluck('total', 'month')
                            ->all();
       // $recentCampaigns = Campaign::orderBy('created_at', 'desc')->take(5)->get();
        $recentProducts = Commande::orderBy('created_at', 'desc')->take(2)->get();
        //$recentCollections = Collection::orderBy('created_at', 'desc')->take(5)->get();

       // return view('stats.index', compact('totalSales', 'monthlySales', 'recentCampaigns', 'recentProducts', 'recentCollections'));
        return view('stats.index', compact('totalSales', 'monthlySales', 'recentProducts'));
    }
}
