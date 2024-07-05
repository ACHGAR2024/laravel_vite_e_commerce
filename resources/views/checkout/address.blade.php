@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-green-400 to-blue-500 h-full p-6 flex flex-col items-center justify-center">
    
    
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="bg-gradient-to-r from-green-400 to-blue-500 p-6 rounded-lg">
        <h1 class="text-center text-white text-3xl font-semibold"><i class="fas fa-map-marker-alt mr-2"></i> Adresse de Livraison</h1>
    </div>
    <div class="bg-white rounded-lg shadow-lg p-6 mx-auto w-11/12 my-12">
        <form action="{{ route('checkout.address.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="adresse" class="block text-sm font-medium text-gray-700"><i class="fas fa-map-marker-alt mr-2"></i>Adresse</label>
                    <input type="text" name="adresse" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>
                <div>
                    <label for="ville" class="block text-sm font-medium text-gray-700"><i class="fas fa-city mr-2"></i>Ville</label>
                    <input type="text" name="ville" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>
                <div>
                    <label for="code_postal" class="block text-sm font-medium text-gray-700"><i class="fas fa-map-marked-alt mr-2"></i>Code Postal</label>
                    <input type="text" name="code_postal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>
                <div>
                    <label for="pays" class="block text-sm font-medium text-gray-700"><i class="fas fa-globe-europe mr-2"></i>Pays</label>
                    <input type="text" name="pays" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg"><i class="fas fa-arrow-right mr-2"></i>Continuer</button>
                <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg ml-4"><i class="fas fa-times mr-2"></i>Annuler</button>
            </div>
        </form>
    </div>
</div>
@endsection
