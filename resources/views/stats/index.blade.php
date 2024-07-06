@extends('layouts.app')

@section('content')
    <div class="p-10">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg ">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                        <i class="fas fa-credit-card text-white"></i>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Ventes totales</dt>
                            <dd class="text-3xl font-semibold text-gray-900 dark:text-white">
                                {{ number_format($totalSales, 2, ',', ' ') }} €</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Ventes mensuelles</h3>
                <div class="mt-4">
                    <canvas id="salesChart" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Campagnes récentes -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Campagnes récentes</h3>
                    <ul class="mt-4 space-y-4">

                        <li class="flex items-center">
                            <i class="fas fa-tag text-indigo-500 mr-3"></i>
                            <span class="text-sm text-gray-600 dark:text-gray-300">Soldes d'été</span>
                        </li>

                    </ul>
                </div>
            </div>

            <!-- Articles récents -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Articles récents</h3>
                    <ul class="mt-4 space-y-4">
                        @foreach ($recentProducts as $produit)
                            <li class="flex items-center">
                                <i class="fas fa-box text-indigo-500 mr-3"></i>
                                <span class="text-sm text-gray-600 dark:text-gray-300">{{ $produit->id }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
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

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json(array_keys($monthlySales)),
                    datasets: [{
                        label: 'Ventes',
                        data: @json(array_values($monthlySales)),
                        borderColor: 'rgb(79, 70, 229)',
                        tension: 0,
                        animation: {
                            duration: 0
                        }
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: false

                        }
                    }
                }
            });
        });
    </script>
@endpush
