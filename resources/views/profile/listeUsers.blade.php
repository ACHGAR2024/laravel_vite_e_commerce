<!-- resources/views/profile/listeUsers.blade.php -->

@extends('layouts.app')

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900 p-7">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold mb-6 bg-blue-900 text-white p-3 rounded-md">Liste des clients</h2>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-900 text-white dark:bg-gray-800 dark:text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ville</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de création</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Activer / Desactiver</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><img src="{{ asset('storage/' . $user->image) }}" alt="User Image" class="w-9 h-9 rounded-full" /></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->prenom }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->ville }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            
                            
                            
                            <!-- Formulaire pour supprimer l'utilisateur -->
                            
                                
                                <button type="submit" class="text-green-600 hover:text-red-900">
                                    <i class="fas fa-virus text-green-500 hover:text-red-900 text-2xl" ></i>
                                </button>
                           
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
