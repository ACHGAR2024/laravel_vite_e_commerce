<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-100 dark:bg-gray-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord - BoutiqueChic Client</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body class="h-full" x-data="{ sidebarOpen: false, darkMode: false, profileEdit: false }">
    <div class="flex h-full">
        <!-- Sidebar -->
        <div class="w-32 flex flex-col border-r border-gray-200 dark:border-gray-700 pt-5 pb-4 bg-white dark:bg-gray-800 overflow-y-auto"
            :class="{ 'hidden': !sidebarOpen, 'w-64': sidebarOpen, 'w-20': !sidebarOpen }">
            <div class="flex items-center flex-shrink-0 px-4">
                <a href="/">
                    <img class="h-8 w-auto"
                        src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg"
                        alt="BoutiqueChic">
                </a>
            </div>
            <div class="mt-5 flex-grow flex flex-col">
                <nav class="flex-1 px-2 space-y-1">
                    <a href="#"
                        class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
                        <i class="fas fa-user mr-3 text-gray-500 dark:text-gray-400"></i>
                        <span :class="{ 'hidden': !sidebarOpen }">Profil</span>
                    </a>
                    <a href="#"
                        class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-box mr-3 text-gray-500 dark:text-gray-400"></i>
                        <span :class="{ 'hidden': !sidebarOpen }">Commandes</span>
                    </a>
                    <a href="#"
                        class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-heart mr-3 text-gray-500 dark:text-gray-400"></i>
                        <span :class="{ 'hidden': !sidebarOpen }">Favoris</span>
                    </a>
                    <a href="#"
                        class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-star mr-3 text-gray-500 dark:text-gray-400"></i>
                        <span :class="{ 'hidden': !sidebarOpen }">Avis</span>
                    </a>
                </nav>
            </div>
        </div>
        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <button @click="sidebarOpen = !sidebarOpen"
                        class="text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Tableau de bord <span
                            class="text-indigo-600 dark:text-indigo-400">Client {{ Auth::user()->name }}</span> </h1>
                    <button @click="darkMode = !darkMode"
                        class="text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                        <i class="fas" :class="{ 'fa-sun': darkMode, 'fa-moon': !darkMode }"></i>
                    </button>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>
                                        @if (Auth::user()->image)
                                            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="User Image"
                                                class="w-10 h-10 rounded-full" />
                                        @endif
                                    </div>

                                    <div class="ms-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <span class="block px-4 py-2 text-xs text-gray-400">Bonjour :
                                    {{ Auth::user()->name }}</span>
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('dashboard_admin')">
                                    {{ __('Page admin') }}
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
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <!-- Profile Section -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg mb-8">
                        <div class="p-5 flex justify-between items-center">
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Modifier le
                                    profil</h3>
                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Gérez vos informations
                                    personnelles</p>
                            </div>
                            <button @click="profileEdit = !profileEdit"
                                class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600">
                                <i class="fas fa-edit"></i>
                            </button>
                        </div>
                        <div x-show="profileEdit" class="p-5 border-t border-gray-200 dark:border-gray-700">
                            <form class="space-y-4">
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                                    <input type="text"
                                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                </div>
                                <div>
                                    <label
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                    <input type="email"
                                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mot de
                                        passe</label>
                                    <input type="password"
                                        class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                </div>
                                <div class="text-right">
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                        Enregistrer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Orders Section -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg mb-8">
                        <div class="p-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Commandes</h3>
                            <div class="mt-4">
                                <ul class="space-y-4">
                                    <li
                                        class="bg-gray-50 dark:bg-gray-700 p-4 rounded-md shadow-sm flex items-center justify-between">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">Commande
                                                #12345</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-300">Date: 01/06/2024</p>
                                            <p class="text-sm text-gray-600 dark:text-gray-300">Total: 120,00 €</p>
                                        </div>
                                        <button
                                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-400 dark:hover:text-indigo-600">
                                            Voir détails
                                        </button>
                                    </li>
                                    <!-- Autres commandes... -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Favorites Section -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg mb-8">
                        <div class="p-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Favoris</h3>
                            <div class="mt-4">
                                <ul class="space-y-4">
                                    <li
                                        class="bg-gray-50 dark:bg-gray-700 p-4 rounded-md shadow-sm flex items-center justify-between">
                                        <div>
                                            <h4 class="text-sm font-medium text-gray-900 dark:text-white">T-shirt
                                                Premium</h4>
                                            <p class="text-sm text-gray-600 dark:text-gray-300">35,00 €</p>
                                        </div>
                                        <button
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-600">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </li>
                                    <!-- Autres favoris... -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Section -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg mb-8">
                        <div class="p-5">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Avis</h3>
                            <div class="mt-4">
                                <form class="space-y-4">
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Produit</label>
                                        <select
                                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                            <option>T-shirt Premium</option>
                                            <!-- Autres produits... -->
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Votre
                                            avis</label>
                                        <textarea rows="4"
                                            class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"></textarea>
                                    </div>
                                    <div>
                                        <label
                                            class="block text-sm font-medium text-gray-700 dark:text-gray-300">Note</label>
                                        <div class="flex items-center">
                                            <input type="number" min="1" max="5"
                                                class="mt-1 block w-20 shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">
                                            <span class="ml-2 text-gray-600 dark:text-gray-300">/ 5</span>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700">
                                            Poster avis
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
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
