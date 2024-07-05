@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 text-gray-200">
    

    <div class="sticky top-0 w-full bg-slate-400 rounded-md p-4 shadow">
        <form action="{{ route('achat') }}" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Rechercher un produit" class="border p-2 rounded-l-md focus:outline-none focus:ring-1 focus:ring-indigo-600" value="{{ request('search') }}">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-r-md hover:bg-indigo-700 focus:outline-none focus:ring-1 focus:ring-indigo-600">Rechercher</button>
        </form>
    </div>
<h1 class="text-2xl font-semibold mb-6 mt-5">Nos Produits</h1>
    @foreach ($categories as $categorie)
        <h2 class="text-xl font-semibold mb-4">{{ $categorie->nom }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mb-8">
            @foreach ($produits->where('categorie_id', $categorie->id) as $produit)
                <div class="bg-white shadow-md rounded-md overflow-hidden">
                    <a href="{{ route('produits.show', $produit->id) }}">
                        @if($produit->firstImage)
                            <img src="{{ asset('storage/' . $produit->firstImage->nom_image) }}" alt="{{ $produit->nom }}" class="w-full h-96 object-cover">
                        @else
                            <img src="{{ asset('storage/default.jpg') }}" alt="{{ $produit->nom }}" class="w-full h-48 object-cover">
                        @endif
                    </a>
                    <div class="p-4">
                        <h2 class="text-lg font-semibold mb-2  text-gray-950 bold">{{ $produit->nom }}</h2>
                        <p class="text-gray-600 mb-4">{{ $categorie->nom }}</p>
                        <p class="text-lg font-semibold text-indigo-600">{{ $produit->prix }} €</p>
                        <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 focus:outline-none focus:ring-1 focus:ring-indigo-600">Ajouter au Panier</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="mt-6">
        {{ $produits->links() }}
    </div>
</div>
@endsection
