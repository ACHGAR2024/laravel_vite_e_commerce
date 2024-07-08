<!-- resources/views/categories/create.blade.php -->

@extends('layouts.app')

@section('content')
    @if (Auth::user()->isAdmin())
        <div class="min-h-screen bg-gradient-to-br from-purple-400 to-indigo-600 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6">
                    <h1 class="text-3xl font-extrabold text-white text-center">
                        Créer une catégorie
                        <i class="fas fa-folder-plus ml-2"></i>
                    </h1>
                </div>
                <form action="{{ route('categories.store') }}" method="POST" class="p-8 space-y-6">
                    @csrf
                    <div>
                        <label for="nom" class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-tag mr-2"></i>Nom
                        </label>
                        <input type="text" id="nom" name="nom" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-align-left mr-2"></i>Description
                        </label>
                        <textarea id="description" name="description" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                    </div>
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                            <i class="fas fa-plus-circle mr-2"></i>Créer la catégorie
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
