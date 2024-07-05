@include('components.frontend.haut')
<div class="bg-gradient-to-r from-green-400 to-blue-500 items-center justify-center m-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        
        <div class="bg-gradient-to-r from-green-400 to-blue-500 p-6 rounded-lg">
            <h1 class="text-center text-white text-3xl font-semibold"><i class="fas fa-map-marker-alt mr-2"></i> Adresse de Livraison</h1>
        </div>
        
        <div class="mt-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4"><i class="fas fa-address-book mr-2"></i>Adresses disponibles</h2>
            <form action="{{ route('checkout.address.store') }}" method="POST">
                @csrf
                <div class="flex flex-wrap">
                    @foreach($adresses as $adresse)
                        <div class="w-full md:w-1/2 p-2">
                            <label class="block bg-gray-100 p-4 rounded-lg shadow-sm">
                                <input type="radio" name="selected_address" value="{{ $adresse->id }}" class="mr-2" {{ $adresse->nom_adresse == 'Adresse par défaut' ? 'checked' : '' }}>
                                <span class="font-semibold">{{ $adresse->nom_adresse }}</span><br>
                                <span>{{ $adresse->adresse }}, {{ $adresse->ville }}, {{ $adresse->code_postal }}, {{ $adresse->pays }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
                
                <div class="flex justify-between mt-6">
                    <a href="{{ route('adresses.create') }}" class="inline-block mt-6 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                        <i class="fas fa-plus mr-2"></i> Ajouter une adresse
                      </a>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="fas fa-arrow-right mr-2"></i>Continuer</button>
                    
                </div>

               
            </form>
        </div>
    </div>
</div>
@include('components.frontend.bas')
