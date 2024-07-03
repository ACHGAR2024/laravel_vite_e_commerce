<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-100 dark:bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - BoutiqueChic Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="h-full" x-data="{ sidebarOpen: false, darkMode: false }">
    <div class="flex h-full ">
        <!-- Sidebar -->
        <div class="w-32 flex flex-col border-r border-gray-200 dark:border-gray-700 pt-5 pb-4 bg-white dark:bg-gray-800 overflow-y-auto" :class="{ 'hidden': !sidebarOpen, 'w-64': sidebarOpen, 'w-20': !sidebarOpen }">
            <div class="flex items-center flex-shrink-0 px-4">
                <a href="/">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="BoutiqueChic">
                </a>
            </div>
            <div class="mt-5 flex-grow flex flex-col ">
                <nav class="flex-1 px-2 space-y-1">
                    <a href="#" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
                        <i class="fas fa-home mr-3 text-gray-500 dark:text-gray-400"></i>
                        <span :class="{ 'hidden': !sidebarOpen }">Tableau de bord</span>
                    </a>
                    <a href="#" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-tag mr-3 text-gray-500 dark:text-gray-400"></i>
                        <span :class="{ 'hidden': !sidebarOpen }">Campagnes</span>
                    </a>
                    <a href="#" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-box mr-3 text-gray-500 dark:text-gray-400"></i>
                        <span :class="{ 'hidden': !sidebarOpen }">Articles</span>
                    </a>
                    <a href="#" class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-layer-group mr-3 text-gray-500 dark:text-gray-400"></i>
                        <span :class="{ 'hidden': !sidebarOpen }">Gammes</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Tableau de bord  <span class="text-indigo-600 dark:text-indigo-400">Administrateur : {{ Auth::user()->name }}</span></h1>
                    <button @click="darkMode = !darkMode" class="text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="fas" :class="{ 'fa-sun': darkMode, 'fa-moon': !darkMode }"></i>
                    </button>
                    <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>@if(Auth::user()->image)
                
                   
                                <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="User Image" class="w-10 h-10 rounded-full" />
                            
                    @endif</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <span class="block px-4 py-2 text-xs text-gray-400">Bonjour : {{ Auth::user()->name }}</span>
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('dashboard_client')">
                            {{ __('Page client') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
                    <!-- Afficher l'image de l'utilisateur -->
                
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- Statistiques -->
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                        <i class="fas fa-chart-bar text-white"></i>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Ventes totales</dt>
                                            <dd class="text-3xl font-semibold text-gray-900 dark:text-white">12,345 €</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Autres statistiques... -->
                        
                    </div>

                    <!-- Graphique des ventes -->
                    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Ventes mensuelles</h3>
                            <div class="mt-4">
                                <canvas id="salesChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Listes des éléments récents -->
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
                                    <!-- Autres campagnes... -->
                                </ul>
                            </div>
                        </div>

                        <!-- Articles récents -->
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                            <div class="p-5">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Articles récents</h3>
                                <ul class="mt-4 space-y-4">
                                    <li class="flex items-center">
                                        <i class="fas fa-box text-indigo-500 mr-3"></i>
                                        <span class="text-sm text-gray-600 dark:text-gray-300">T-shirt Premium</span>
                                    </li>
                                    <!-- Autres articles... -->
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
                                    <!-- Autres gammes... -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Initialisation du graphique
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Ventes',
                    data: [12, 19, 3, 5, 2, 3],
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

        // Gestion du mode sombre
        function applyDarkMode(darkMode) {
            if (darkMode) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }

        // Écouteur pour le changement de mode
        Alpine.effect(() => {
            applyDarkMode(Alpine.store('darkMode'));
        });
    </script>
</body>
</html>