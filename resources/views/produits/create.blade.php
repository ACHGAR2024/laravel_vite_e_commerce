<!-- resources/views/produits/create.blade.php -->

@extends('layouts.app')

@section('content')
    @if (Auth::user()->isAdmin())
        <div class="min-h-screen bg-gradient-to-br from-purple-400 to-indigo-600 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6">
                    <h1 class="text-3xl font-extrabold text-white text-center">
                        Ajouter un nouveau produit
                        <i class="fas fa-box-open ml-2"></i>
                    </h1>
                </div>
                <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700">
                                <i class="fas fa-tag mr-2"></i>Nom
                            </label>
                            <input id="nom" name="nom" type="text"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                        </div>
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">
                                <i class="fas fa-align-left mr-2"></i>Description
                            </label>
                            <textarea id="description" name="description" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required></textarea>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="prix" class="block text-sm font-medium text-gray-700">
                                <i class="fas fa-euro-sign mr-2"></i>Prix
                            </label>
                            <input id="prix" name="prix" type="number" step="0.01"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                        </div>
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">
                                <i class="fas fa-cubes mr-2"></i>Stock
                            </label>
                            <input id="stock" name="stock" type="number"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                required>
                        </div>
                    </div>
                    <div>
                        <label for="categorie_id" class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-folder mr-2"></i>Catégorie
                        </label>
                        <select id="categorie_id" name="categorie_id"
                            class="p-2 pl-3 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-image mr-2"></i>Image
                        </label>
                        <input id="image" name="image" type="file"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            <i class="fas fa-save mr-2"></i>Enregistrer le produit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
