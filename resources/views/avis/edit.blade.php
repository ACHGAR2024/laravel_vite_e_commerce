<!-- resources/views/avis/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-slate-200 text-gray-950">
        <h1 class="text-3xl font-bold mb-6">Modifier Avis</h1>

        <form action="{{ route('avis.update', $avis->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="note" class="block text-gray-700 font-bold mb-2">Note</label>
                <input type="number" name="note"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="note" value="{{ $avis->note }}" min="1" max="5" required>
            </div>
            <div class="mb-4">
                <label for="commentaire" class="block text-gray-700 font-bold mb-2">Commentaire</label>
                <textarea name="commentaire"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="commentaire" required>{{ $avis->commentaire }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Mettre à
                jour</button>
        </form>
    </div>
@endsection
