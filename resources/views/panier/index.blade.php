<!-- resources/views/cart/show.blade.php -->

@include('components.frontend.haut')
<div class="mx-24 my-5 bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6 text-gray-800 dark:text-gray-200">
    <div class="flex flex-col gap-6 items-center">

        <table class="w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Produit</th>
                    <th class="px-4 py-2">Quantité</th>
                    <th class="px-4 py-2">Prix</th>
                    <th class="px-4 py-2"></th>
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
                    <tr>
                        <td class="border px-4 py-2">{{ $details['nom'] }}</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('panier.update') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="number" name="quantite" value="{{ $details['quantite'] }}"
                                    class="bg-transparent border border-gray-300 text-gray-900 text-center text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg mt-2 text-sm"><i
                                        class="fas fa-save"></i> Mettre à jour mon panier</button>
                            </form>
                        </td>
                        <td class="border px-4 py-2">{{ $details['prix'] }} €</td>
                        <td class="border px-4 py-2">
                            <form action="{{ route('panier.remove') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-lg mt-2"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-full mt-4">
            <div class="flex flex-col gap-4 items-end">
                <div class="w-full flex justify-between">
                    <p class="font-semibold">Frais de Livraison :</p>
                    <p class="font-bold">OFFERT</p>
                </div>

                @php
                    $tva = $totalHT * 0.2;
                    $totalTTC = $totalHT - $tva;
                @endphp
                <div class="w-full flex justify-between">
                    <p class="font-semibold">TVA (20%) :</p>
                    <p class="font-bold">{{ number_format($tva, 2) }} €</p>
                </div>
                <div class="w-full flex justify-between">
                    <p class="font-semibold">Total TTC :</p>
                    <p class="font-bold">{{ number_format($totalHT, 2) }} €</p>
                </div>
            </div>
        </div>
        <div class="flex justify-center mt-6">
            <a href="{{ route('achat') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                <i class="fas fa-shopping-cart mr-2"></i> Continue les achats
            </a>
            @if (Auth::check())
                <a href="{{ route('checkout.address') }}"
                    class="ml-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                    <i class="fas fa-boxes mr-2 "></i> Passer à la validation
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="ml-5 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                    <i class="fas fa-boxes mr-2 "></i> Connectez vous pour valider la commande
                </a>
            @endif
        </div>
    </div>
</div>
@include('components.frontend.bas')
