<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|max:100',
            'description' => 'nullable',
        ]);

        Categorie::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Categorie créée avec succès.');
    }

    public function edit(Categorie $category)
    {
        return view('categories.edit', compact('category'));
    }

    
    public function update(Request $request, $id)
{
    $request->validate([
        'nom' => 'required|max:100',
        'description' => 'nullable',
    ]);

    $category = Categorie::findOrFail($id);
    $category->update($request->all());

    return redirect()->route('categories.edit', $category)->with('success', 'Catégorie mise à jour avec succès.');
}

    public function destroy($id)
    {
        $category = Categorie::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categorie supprimée avec succès.');
    }
    public function show(Categorie $category)
    {
        return view('categories.show', compact('category'));
    }
}
