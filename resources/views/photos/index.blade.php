<!-- resources/views/photos/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-400 to-indigo-600 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6">
            <h1 class="text-3xl font-extrabold text-white text-center">
                Album photos : {{ $produit->nom }}
                <i class="fas fa-images ml-2"></i>
            </h1>
        </div>
        
        <div class="p-6 space-y-8">
            <!-- Galerie de photos -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($photos as $photo)
                <div class="relative group">
                    <img src="{{ asset('storage/' . $photo->nom_image) }}" alt="Photo du produit" class="w-full h-64 object-cover rounded-lg shadow-md transition duration-300 group-hover:shadow-xl">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <form action="{{ route('photos.destroy', [$produit->id, $photo->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full transition duration-300">
                                <i class="fas fa-trash-alt mr-2"></i>Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Formulaire d'ajout de photos -->
            <div class="mt-8 bg-gray-100 rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">Ajouter des photos</h2>
                <form action="{{ route('photos.store', $produit->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label for="photos" class="block text-sm font-medium text-gray-700">Sélectionner des fichiers</label>
                        <input type="file" name="photos[]" id="photos" multiple class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <button type="submit" class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 text-white font-bold py-2 px-4 rounded-full transition duration-300">
                        <i class="fas fa-upload mr-2"></i>Uploader
                    </button>
                </form>
            </div>

            <!-- Bouton de retour -->
            <div class="flex justify-center mt-6">
                <a href="{{ route('produits.index') }}" class="bg-gradient-to-r from-yellow-400 to-red-500 hover:from-yellow-500 hover:to-red-600 text-white font-bold py-2 px-4 rounded-full inline-flex items-center transition duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Retour aux produits
                </a>
            </div>
        </div>
    </div>
</div>
@endsection