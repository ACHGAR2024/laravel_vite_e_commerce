@include('components.frontend.haut')

<div class="container mx-auto px-4 sm:px-6 lg:px-8 my-8">
    <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 text-gray-800 dark:text-gray-200">
        <h1 class="text-2xl font-bold mb-6"><i class="fas fa-shopping-cart"></i> Votre Panier</h1>

        <div class="overflow-x-auto">
            <table class="w-full table-auto">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-left">Produit</th>
                        <th class="px-4 py-2 text-left">Quantité</th>
                        <th class="px-4 py-2 text-left">Prix</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalHT = 0;
                    @endphp
                    @foreach (session('panier', []) as $id => $details)
                        @php
                            $subtotal = $details['prix'] * $details['quantite'];
                            $totalHT += $subtotal;
                        @endphp
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3">{{ $details['nom'] }}</td>
                            <td class="px-4 py-3">
                                <form action="{{ route('panier.update') }}" method="POST"
                                    class="flex items-center space-x-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <input type="number" name="quantite" value="{{ $details['quantite'] }}"
                                        class="bg-transparent border border-gray-300 text-gray-900 text-center text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <button type="submit"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg text-sm flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                        Mettre à jour
                                    </button>
                                </form>
                            </td>
                            <td class="px-4 py-3">{{ $details['prix'] }} €</td>
                            <td class="px-4 py-3">
                                <form action="{{ route('panier.remove') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-3 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="space-y-2 text-right mr-10 mt-4">
            <div class="flex justify-between"></div>
            <span>Total :</span>
            <span class="font-bold text-2xl  ">{{ number_format($totalHT, 2) }} €</span>
        </div>
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Résumé de la commande</h2>

            @php
                $reduction_total = 0;
            @endphp
            @foreach ($campaigns as $campaign)
                <div class="flex justify-between">
                    <span>{{ $campaign->name }} :</span>
                    <span>-{{ $campaign->reduction }}%</span>
                </div>
                @php
                    $reduction_total += $campaign->reduction;
                @endphp
            @endforeach

            <div class="flex justify-between font-semibold">
                <span>Frais de Livraison :</span>
                <span class="text-green-500">OFFERT</span>
            </div>

            @php
                $tva = $totalHT * 0.2;
                $totalTTC = $totalHT - ($totalHT * $reduction_total) / 100;
            @endphp

            <div class="flex justify-between">
                <span>TVA (20%) :</span>
                <span>{{ number_format($tva, 2) }} €</span>
            </div>
            <div class="flex justify-between font-bold text-lg">
                <span>Total TTC :</span>
                <span class="text-green-500 text-2xl font-semibold">{{ number_format($totalTTC, 2) }} €</span>
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-8 space-x-4">
        <a href="{{ route('achat') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path
                    d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
            </svg>
            Continuer les achats
        </a>
        @if (Auth::check())
            @if ($totalTTC > 0)
                <a href="{{ route('checkout.address') }}"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    Passer à la validation
                </a>
            @endif
        @else
            <a href="{{ route('login') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                        clip-rule="evenodd" />
                </svg>
                Connectez-vous pour valider
            </a>
        @endif
    </div>
</div>
</div>

@include('components.frontend.bas')
