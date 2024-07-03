@extends('layouts.app')

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900 p-7">

  <div class="m-auto w-1/2 bg-slate-300 p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6  bg-blue-900 text-white p-3 rounded-md">Modifier l'adresse</h2>
              
              
              <form action="{{ route('adresses.update', $adress->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div>
                  <label for="nom_adresse" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-tag text-blue-500 mr-2"></i>Nom de l'adresse
                  </label>
                  <input type="text" id="nom_adresse" name="nom_adresse" value="{{ $adress->nom_adresse }}" required
                         class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                <div>
                  <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>Adresse
                  </label>
                  <input type="text" id="adresse" name="adresse" value="{{ $adress->adresse }}" required
                         class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div>
                    <label for="code_postal" class="block text-sm font-medium text-gray-700 mb-2">
                      <i class="fas fa-mail-bulk text-green-500 mr-2"></i>Code Postal
                    </label>
                    <input type="text" id="code_postal" name="code_postal" value="{{ $adress->code_postal }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                  </div>
                  
                  <div>
                    <label for="ville" class="block text-sm font-medium text-gray-700 mb-2">
                      <i class="fas fa-city text-purple-500 mr-2"></i>Ville
                    </label>
                    <input type="text" id="ville" name="ville" value="{{ $adress->ville }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                  </div>
                </div>
                
                <div>
                  <label for="pays" class="block text-sm font-medium text-gray-700 mb-2">
                    <i class="fas fa-globe-europe text-indigo-500 mr-2"></i>Pays
                  </label>
                  <input type="text" id="pays" name="pays" value="{{ $adress->pays }}" required
                         class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                
                
                

                <div class="flex justify-end">
                  <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                    <i class="fas fa-save mr-2"></i>Mettre à jour
                  </button>
                </div>
              </form>
            </div>
          </div>
    </div>
@endsection
