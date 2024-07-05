@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-green-400 to-blue-500 h-full p-6 flex flex-col items-center justify-center">
    
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="bg-gradient-to-r from-green-400 to-blue-500 p-6 rounded-lg">
            <h1 class="text-center text-white text-3xl font-semibold"><i class="fas fa-shipping-fast mr-2 text-white"></i>Mode de Livraison</h1>
        </div>
        <form action="{{ route('checkout.shipping.store') }}" method="POST" class="mt-6 space-y-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 m-11">
                <div>
                    <label for="mode_livraison" class="block text-sm font-medium  texte-gray-700"><i class="fas fa-shipping-fast mr-2 text-gray-700"></i>Mode de Livraison</label>
                    <select name="mode_livraison" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        <option value="standard">Standard</option>
                        <option value="express">Express</option>
                    </select>
                </div>
            </div>
            <div class="flex justify-center mt-4 mx-72">
                <button type="submit" class="w-full flex justify-center py-3 px-6 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-500 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    <i class="fas fa-arrow-right mr-2"></i>Continuer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

