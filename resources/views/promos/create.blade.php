@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-400 to-indigo-600 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6">
            <h1 class="text-3xl font-extrabold text-white text-center">
                Créer une Promo
                <i class="fas fa-plus-circle ml-2"></i>
            </h1>
        </div>
        
        <form action="{{ route('promos.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="reduction" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-percent mr-2"></i>Réduction
                    </label>
                    <input type="number" name="reduction" id="reduction" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="nom_promo" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-tag mr-2"></i>Nom Promo
                    </label>
                    <input type="text" name="nom_promo" id="nom_promo" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">
                    <i class="fas fa-align-left mr-2"></i>Description
                </label>
                <textarea name="description" id="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="date_debut" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-calendar-alt mr-2"></i>Date Début
                    </label>
                    <input type="date" name="date_debut" id="date_debut" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="date_fin" class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-calendar-check mr-2"></i>Date Fin
                    </label>
                    <input type="date" name="date_fin" id="date_fin" required class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">
                    <i class="fas fa-image mr-2"></i>Image
                </label>
                <input type="file" name="image" id="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('promos.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-full inline-flex items-center transition duration-300">
                    <i class="fas fa-times mr-2"></i>Annuler
                </a>
                <button type="submit" class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 text-white font-bold py-2 px-4 rounded-full inline-flex items-center transition duration-300">
                    <i class="fas fa-save mr-2"></i>Créer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection