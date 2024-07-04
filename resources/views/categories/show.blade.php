<!-- resources/views/categories/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-400 to-indigo-600 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6">
            <h1 class="text-3xl font-extrabold text-white text-center">
                Détails de la catégorie
                <i class="fas fa-folder-open ml-2"></i>
            </h1>
        </div>
        <div class="p-8 space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">
                    <i class="fas fa-tag mr-2"></i>Nom
                </label>
                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $category->nom }}</p>
            </div>
            <div>
                <a href="{{ route('categories.edit', $category) }}" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    <i class="fas fa-edit mr-2"></i>Modifier la catégorie
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
