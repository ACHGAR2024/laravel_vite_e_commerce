<?php
namespace App\Http\Controllers;

use App\Models\Adresse;
use Illuminate\Http\Request;

class AdresseController extends Controller
{
    public function index()
    {
        $adresses = Adresse::all();
        return view('adresses.index', compact('adresses'));
    }

    public function create()
    {
        $message = 'Vous avez ajouter une nouvelle adresse avec succès';
        return view('adresses.create', [
            'user_id' => auth()->user()->id,
            'message' => $message
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_adresse' => 'required|max:255',
            'adresse' => 'required|max:255',
            'code_postal' => 'required|max:5',
            'ville' => 'required|max:255',
            'pays' => 'required|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        Adresse::create($request->all());

        return redirect()->route('adresses.index')
                         ->with('success', 'Adresse ajouter avec succès.');
    }



    
// Affiche une seule adresse
    public function show(Adresse $adress)
    {
       //
       return view('adresses.show', compact('adress'));
    }







    public function edit(Adresse $adress)
    {
        
        return view('adresses.edit', compact('adress'));
    }







    public function update(Request $request, Adresse $adress)
    {
        $request->validate([
            'nom_adresse' => 'required|max:255',
            'adresse' => 'required|max:255',
            'code_postal' => 'required|max:5',
            'ville' => 'required|max:255',
            'pays' => 'required|max:255',
            
        ]);

        $adress->update($request->all());

        return redirect()->route('adresses.index')
                         ->with('success', 'Adresse mise à jour avec succès.');
    }

    public function destroy(Adresse $adress)
    {
        $adress->delete();

        return redirect()->route('adresses.index')
                         ->with('success', 'Adresse supprimer avec succès.');
    }
}
