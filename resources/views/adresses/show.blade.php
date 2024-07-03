@extends('layouts.app')

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900 p-7">

  <div class="m-auto w-1/2 bg-slate-300 p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-6  bg-blue-900 text-white p-3 rounded-md">Détails de l'adresse</h2>
  
   

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <div class="p-8">
        <h2 class="text-2xl font-semibold mb-6 text-gray-900">Détails de l'adresse</h2>
        
        <div class="space-y-6">
          <div>
            <label for="nom_adresse" class="block text-sm font-medium text-gray-700 mb-2">
              <i class="fas fa-tag text-blue-500 mr-2"></i>Nom de l'adresse
            </label>
            <input type="text" id="nom_adresse" name="nom_adresse" value="{{ $adress->nom_adresse }}" readonly
                   class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
          </div>
          
          <div>
            <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">
              <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>Adresse
            </label>
            <input type="text" id="adresse" name="adresse" value="{{ $adress->adresse }}" readonly
                   class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="code_postal" class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-mail-bulk text-green-500 mr-2"></i>Code Postal
              </label>
              <input type="text" id="code_postal" name="code_postal" value="{{ $adress->code_postal }}" readonly
                     class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            
            <div>
              <label for="ville" class="block text-sm font-medium text-gray-700 mb-2">
                <i class="fas fa-city text-purple-500 mr-2"></i>Ville
              </label>
              <input type="text" id="ville" name="ville" value="{{ $adress->ville }}" readonly
                     class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
          </div>
          
          <div>
            <label for="pays" class="block text-sm font-medium text-gray-700 mb-2">
              <i class="fas fa-globe-europe text-indigo-500 mr-2"></i>Pays
            </label>
            <input type="text" id="pays" name="pays" value="{{ $adress->pays }}" readonly
                   class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
          </div>
          
          <div>
            <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">
              <i class="fas fa-user text-yellow-500 mr-2"></i>ID du client
            </label>
            <input type="number" id="user_id" name="user_id" value="{{ $adress->user_id }}" readonly
                   class="w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
          </div>
        </div>
        
        <div class="mt-8 flex justify-end">
          <a href="{{ route('adresses.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded-md transition duration-300">
            <i class="fas fa-arrow-left mr-2"></i>Retour
          </a>
        </div>
      </div>
    </div>
      
      
      </div>
    </div>
  </div>
</main>
@endsection
