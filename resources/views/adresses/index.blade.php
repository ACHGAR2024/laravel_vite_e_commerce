@extends('layouts.app')

@section('content')
    @if (Auth::user()->isAdmin())
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900 p-7">

            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h2 class="text-2xl font-semibold mb-6  bg-blue-900 text-white p-3 rounded-md">Liste des adresses</h2>
                <a href="{{ route('profile.edit') }}"
                    class="inline-block mt-6 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                    <i class="fas fa-arrow-left mr-2 "></i> Retour à mon profil
                </a>
                <div class="px-6 text-right m-4">
                    <a href="{{ route('adresses.create') }}"
                        class="inline-block mt-6 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                        <i class="fas fa-plus mr-2"></i> Ajouter une adresse
                    </a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-900 text-white  dark:bg-gray-800 dark:text-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nom Adresse</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Adresse</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Code Postal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ville</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pays</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($adresses as $adresse)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $adresse->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $adresse->nom_adresse }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $adresse->adresse }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $adresse->code_postal }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $adresse->ville }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $adresse->pays }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('adresses.show', $adresse->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 mr-2">
                                            <i class="fas fa-eye text-blue-500"></i>
                                        </a>
                                        <a href="{{ route('adresses.edit', $adresse->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900 mr-2">
                                            <i class="fas fa-edit text-yellow-500"></i>
                                        </a>
                                        <form action="{{ route('adresses.destroy', $adresse->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash-alt text-red-500"></i>
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    @endif
@endsection
