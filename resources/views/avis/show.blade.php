<!-- resources/views/avis/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold">Avis pour le produit : {{ $avis->user->name }}</h1>
                <div class="flex items-center">
                    <a href="{{ route('avis.edit', $avis->id) }}"
                        class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded mr-2">
                        <i class="fas fa-edit mr-2"></i>Modifier
                    </a>
                    <form action="{{ route('avis.destroy', $avis->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                            <i class="fas fa-trash mr-2"></i>Supprimer
                        </button>
                    </form>
                </div>
            </div>
            <div class="flex items-center mb-4">
                <div class="flex items-center">
                    <i class="fas fa-user mr-2 text-gray-500"></i>
                    <p class="font-semibold"> {{ $avis->id_nom }}</p>
                </div>
                <div class="flex items-center ml-4">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fas fa-star {{ $i <= $avis->note ? 'text-yellow-500' : 'text-gray-300' }} mr-1"></i>
                    @endfor
                </div>
            </div>
            <p>Commentaire: {{ $avis->commentaire }}</p>
            <div class="flex justify-end mt-4">
                <a href="{{ route('avis.index') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded">
                    Retour <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
