@extends('layouts.app')

@section('content')
    <!-- Section Produits Aimés -->
    <section id="liked-products" class="h-full py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Produits Aimés</h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($likedProducts as $produit)
                    <div class="group relative transform transition duration-500 hover:scale-105">
                        <div
                            class="w-full h-60 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75">
                            <a href="{{ route('produits.show', $produit->id) }}" class="block relative overflow-hidden">
                                <img src="{{ asset('storage/' . $produit->images->first()->nom_image) }}"
                                    alt="{{ $produit->nom }}" class="w-full h-full object-center object-cover">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-25 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <span class="text-white text-lg font-semibold">Voir détails</span>
                                </div>
                            </a>
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700 dark:text-gray-200">
                                    <a href="{{ route('produits.show', $produit->id) }}" class="hover:underline">
                                        {{ $produit->nom }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $produit->color }}</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $produit->prix }} €</p>
                        </div>
                        <div class="mt-4">
                            <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="w-full bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                    Ajouter au Panier
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
