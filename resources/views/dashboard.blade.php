@extends('layouts.app')

@section('title', 'Tableau de bord - BoutiqueChic Admin')

@section('style')
    <style>

    </style>
@endsection

@section('content')



    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900 p-7">
        <!--/// resources/views/dashboard.blade.php content page Administrateur ////// -->
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                        <i class="fas fa-euro-sign text-white"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total des achats</dt>
                            @php
                                $totalCommandes = 0;
                                $nbCommandes = 0;
                            @endphp
                            @foreach ($commandes as $commande)
                                @if ($commande->id_client == Auth::user()->id)
                                    @php
                                        $nbCommandes++;
                                        $totalCommandes += $commande->total;
                                    @endphp
                                @endif
                            @endforeach
                            @if ($nbCommandes > 0)
                                <dd class="text-xl font-bold text-gray-900 dark:text-white">
                                    {{ number_format($totalCommandes, 2) }} €
                                </dd>
                            @else
                                <dd class="text-xl font-bold text-gray-900 dark:text-white">
                                    Aucune commande
                                </dd>
                            @endif
                        </dl>
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Moyenne des achats
                            </dt>
                            @php
                                $totalCommandes = 0;
                                $nbCommandes = 0;
                            @endphp
                            @foreach ($commandes as $commande)
                                @if ($commande->id_client == Auth::user()->id)
                                    @php
                                        $nbCommandes++;
                                        $totalCommandes += $commande->total;
                                    @endphp
                                @endif
                            @endforeach
                            @if ($nbCommandes > 0)
                                <dd class="text-xl font-bold text-gray-900 dark:text-white">
                                    {{ number_format($totalCommandes / $nbCommandes, 2) }} €
                                </dd>
                            @else
                                <dd class="text-xl font-bold text-gray-900 dark:text-white">
                                    Aucune commande
                                </dd>
                            @endif
                        </dl>
                    </div>
                </div>
            </div>
        </div>



        <!-- Graphique des ventes -->
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Achats mensuelles</h3>
                <div class="mt-4">
                    <canvas id="salesChart" height="200"></canvas>
                </div>
            </div>
        </div>



        <!-- Autres Compagnes... -->
        <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Campaigns récentes -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    @foreach ($campaigns as $campaign)
                        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">



                            {{ $campaign->start_date }} -->
                            {{ $campaign->end_date }}<br>
                            {{ $campaign->reduction }}%

                        </h3>
                        <ul class="mt-4 space-y-4">
                            <li class="flex items-center">
                                <i class="fas fa-tag text-indigo-500 mr-3"></i>
                                <span class="text-sm text-gray-600 dark:text-gray-300">{{ $campaign->name }}</span>
                            </li>
                            <!-- Autres Campaigns... -->
                        </ul>
                    @endforeach
                </div>
            </div>

            <!-- Articles récents -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Articles récents</h3>
                    @foreach ($featuredProducts as $produit)
                        <ul class="mt-4 space-y-4">

                            <li class="flex items-center">
                                <i class="fas fa-box text-indigo-500 mr-3"></i>
                                <span class="text-sm text-gray-600 dark:text-gray-300">{{ $produit->nom }}</span>
                            </li>

                        </ul>
                        <ul class="mt-4 space-y-4">
                            <li class="flex items-center">
                                <i class="fas fa-euro-sign text-indigo-500 mr-3"></i>
                                <span class="text-sm text-gray-600 dark:text-gray-300">{{ $produit->prix }}€</span>
                            </li>
                            <!-- Autres articles... -->
                        </ul>
                </div>
                @endforeach
            </div>

            <!-- Gammes récentes -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Gammes récentes</h3>
                    <ul class="mt-4 space-y-4">
                        <li class="flex items-center">
                            <i class="fas fa-layer-group text-indigo-500 mr-3"></i>
                            <span class="text-sm text-gray-600 dark:text-gray-300">Collection Été</span>
                        </li>
                        <!-- Autres gammes... -->
                    </ul>
                </div>
            </div>
        </div>

    </main>

@endsection

@push('scripts')
    <script>
        // Graphique des ventes

        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Nombre de commandes',
                    data: [6, 0, 3, 5, 2, {{ $nbCommandes }}],
                    borderColor: 'rgb(79, 70, 229)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush
