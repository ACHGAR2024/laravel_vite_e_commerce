@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-400 to-indigo-600 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6">
            <h1 class="text-3xl font-extrabold text-white text-center mb-4"><i class="fas fa-shopping-bag ml-2"></i> Liste des Commandes</h1>
    <table class="min-w-full divide-y divide-gray-200 ">
        <thead class="bg-gray-300 ">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Total</th>
                <th class="px-4 py-2">Statut</th>
                <th class="px-4 py-2">Client</th>
                <th class="px-4 py-2">Date de Création</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
            <tr class="bg-gray-100">
                <td class="px-4 py-2">{{ $commande->id }}</td>
                <td class="px-4 py-2">{{ $commande->total }} €</td>
                <td class="px-4 py-2">{{ $commande->statut }}</td>
                <td class="px-4 py-2">{{ $commande->user->name }}</td> <!-- Mettre à jour pour utiliser user -->
                <td class="px-4 py-2">{{ $commande->created_at }}</td>
                <td class="px-4 py-2 flex justify-center">
                    <a href="{{ route('commandes.show', $commande->id) }}" class="mx-2 bg-gray-200 text-gray-800 hover:bg-gray-300 hover:text-gray-900 py-1 px-2 rounded-lg"><i class="fas fa-eye"></i></a>
                    <a href="#" class="mx-2 bg-green-200 text-green-800 hover:bg-green-300 hover:text-green-900 py-1 px-2 rounded-lg"><i class="fas fa-question"></i> Problème <i class="fas fa-edit"></i></a>
                    <form action="{{ route('commandes.destroy', $commande->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="mx-2 bg-red-200 text-red-800 hover:bg-red-300 hover:text-red-900 py-1 px-2 rounded-lg"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</div>
@endsection
