@extends('layouts.app')

@section('content')
    <div class="container bg-white shadow-lg rounded-lg p-4">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Facture</h1>
        <div class="mb-4">
            <button onclick="window.print()"
                class="bg-blue-500 text-white hover:bg-blue-700 py-2 px-4 rounded">Imprimer</button>
        </div>
        <div class="invoice-content">
            <p><strong>N° de la commande :</strong> {{ $commande->id }}{{ date('dmY', strtotime($commande->created_at)) }}
            </p>
            <p><strong>Client :</strong> {{ $commande->user->name }}</p>
            <p><strong>Adresse de livraison :</strong> {{ $commande->adresse->nom_adresse }},
                {{ $commande->adresse->adresse }}, {{ $commande->adresse->ville }}, {{ $commande->adresse->code_postal }},
                {{ $commande->adresse->pays }}</p>

            <p><strong>Date de création :</strong> {{ $commande->created_at }}</p>
            <p><strong>Total :</strong> {{ $commande->total }} €</p>
            <p><strong>Réduction :</strong> {{ $reductionshow }} %</p> <!-- Ajout de l'affichage de la réduction -->

            <h2 class="text-xl font-bold text-gray-800 mt-4 mb-2">Produits</h2>
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
                    @foreach ($commande->produits as $produit)
                        <tr class="bg-gray-100">
                            <td class="px-4 py-2">{{ $produit->nom }}</td>
                            <td class="px-4 py-2">{{ $produit->pivot->quantite }}</td>
                            <td class="px-4 py-2">{{ $produit->pivot->prix }} €</td>
                            <td class="px-4 py-2">{{ $produit->pivot->quantite * $produit->pivot->prix }} €</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div class="mb-4 text-right mr-8">
                <h2 class="text-xl font-semibold text-gray-800">Total HT</h2>
                <p class="text-gray-600">{{ number_format($commande->total / 1.2, 2) }} €</p>
                <h2 class="text-xl font-semibold text-gray-800">TVA (20%)</h2>
                <p class="text-gray-600">{{ number_format(($commande->total / 1.2) * 0.2, 2) }} €</p>
                <h2 class="text-xl font-semibold text-gray-800">Réduction</h2>
                <p class="text-gray-600">{{ $reductionshow }} %</p>
                <h2 class="text-xl font-semibold text-gray-800">Total TTC</h2>
                <p class="text-gray-600 text-2xl font-bold">{{ number_format($commande->total, 2) }} €</p>
            </div>
        </div>
    </div>
@endsection
