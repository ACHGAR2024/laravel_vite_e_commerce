@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-purple-400 to-indigo-600 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6">
            <h1 class="text-3xl font-extrabold text-white text-center">
                Liste des Promos
                <i class="fas fa-percentage ml-2"></i>
            </h1>
        </div>
        
        <div class="p-6 space-y-4">
            <div class="flex justify-center">
                <a href="{{ route('promos.create') }}" class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 text-white font-bold py-2 px-4 rounded-full inline-flex items-center transition duration-300">
                    <i class="fas fa-plus-circle mr-2"></i>
                    Créer une Promo
                </a>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Réduction</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Début</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Fin</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($promos as $promo)
                        <tr class="hover:bg-gray-50 transition duration-150">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $promo->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $promo->nom_promo }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $promo->reduction }}%</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $promo->date_debut }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $promo->date_fin }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                @if($promo->image)
                                    <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->nom_promo }}" class="h-10 w-10 rounded-full object-cover">
                                @else
                                    <span class="text-gray-400"><i class="fas fa-image"></i></span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('promos.show', $promo->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-info-circle"></i> Détails
                                </a>
                                <a href="{{ route('promos.edit', $promo->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <form action="{{ route('promos.destroy', $promo->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette promo ?')">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
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