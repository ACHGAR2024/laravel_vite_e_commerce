<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::all();
        return view('promos.index', compact('promos'));
    }

    public function create()
    {
        return view('promos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'reduction' => 'required|integer',
            'nom_promo' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/promos', 'public');
            $data['image'] = $imagePath;
        }

        Promo::create($data);

        return redirect()->route('promos.index')->with('success', 'La promo a été créer avec succès.');
    }

    public function show($id)
    {
        $promo = Promo::findOrFail($id);
        return view('promos.show', compact('promo'));
    }

    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        return view('promos.edit', compact('promo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reduction' => 'required|integer',
            'nom_promo' => 'required|string|max:50',
            'description' => 'nullable|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $promo = Promo::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($promo->image) {
                Storage::disk('public')->delete($promo->image);
            }
            $imagePath = $request->file('image')->store('images/promos', 'public');
            $data['image'] = $imagePath;
        }

        $promo->update($data);

        return redirect()->route('promos.index')->with('success', 'La promo a été mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);

        if ($promo->image) {
            Storage::disk('public')->delete($promo->image);
        }

        $promo->delete();

        return redirect()->route('promos.index')->with('success', 'La promo a été supprimée avec succès.');
    }
}
