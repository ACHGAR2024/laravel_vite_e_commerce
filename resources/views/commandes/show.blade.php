@extends('layouts.app')

@section('content')
<div class="container bg-white shadow-lg rounded-lg p-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Détails de la Commande #{{ $commande->id }}{{ date('dmY', strtotime($commande->created_at)) }}</h1>
    <div class="mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Client</h2>
        <p class="text-gray-600">{{ $commande->user->name }}</p>
        <p class="text-gray-600">{{ $commande->user->email }}</p>
    </div>
    <div class="mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Statut de la commande</h2>
        <p class="text-gray-600">{{ $commande->statut }}</p>
    </div>
    <div class="mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Produits</h2>
        <table class="table-auto w-full text-gray-800 border-separate">
            <thead class="bg-gray-300">
                <tr>
                    <th class="px-4 py-2">Produit</th>
                    <th class="px-4 py-2">Quantité</th>
                    <th class="px-4 py-2">Prix</th>
                    <th class="px-4 py-2">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commande->produits as $produit)
                <tr class="bg-gray-100">
                    <td class="px-4 py-2">{{ $produit->nom }}</td>
                    <td class="px-4 py-2">{{ $produit->pivot->quantite }}</td>
                    <td class="px-4 py-2">{{ $produit->pivot->prix }} €</td>
                    <td class="px-4 py-2">{{ $produit->pivot->quantite * $produit->pivot->prix }} €</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Total</h2>
        <p class="text-gray-600">{{ $commande->total }} €</p>
    </div>
    <div class="mb-4">
        <a href="{{ route('commandes.index') }}" class="bg-gray-200 text-gray-800 hover:bg-gray-300 hover:text-gray-900 py-2 px-4 rounded-lg">Retour à la liste des commandes</a>
    </div>
</div>
@endsection
