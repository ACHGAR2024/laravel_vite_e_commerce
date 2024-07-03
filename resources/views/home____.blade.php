<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoutiqueChic - Votre e-commerce de luxe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gray-100 dark:bg-gray-900 transition-colors duration-300" x-data="{ darkMode: false, cartOpen: false }">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white dark:bg-gray-800 shadow-lg" x-data="{ open: false }">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="BoutiqueChic">
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                            <a href="#" class="border-indigo-500 text-gray-900 dark:text-white inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Accueil</a>
                            <a href="#products" class="border-transparent text-gray-500 dark:text-gray-300 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Produits</a>
                            <a href="#promotions" class="border-transparent text-gray-500 dark:text-gray-300 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Promotions</a>
                            <a href="#popular" class="border-transparent text-gray-500 dark:text-gray-300 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Populaires</a>
                        </div>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:items-center">
                        <button @click="darkMode = !darkMode" class="bg-white dark:bg-gray-800 p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Mode sombre</span>
                            <i class="fas fa-moon"></i>
                        </button>
                        <div class="ml-3 relative">
                            <button @click="cartOpen = !cartOpen" class="bg-white dark:bg-gray-800 p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Panier</span>
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                        <div class="ml-3 relative">
                            <button @click="loginOpen = !loginOpen" class="bg-white dark:bg-gray-800 p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Connexion</span>
                                <i class="fas fa-sign-in-alt"></i>
                            </button>
                        </div>
                        <div class="ml-3 relative">
                            <button @click="registerOpen = !registerOpen" class="bg-white dark:bg-gray-800 p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <span class="sr-only">Inscription</span>
                                <i class="fas fa-user-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <span class="sr-only">Menu principal</span>
                            <svg class="h-6 w-6" x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="h-6 w-6" x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div x-show="open" class="sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="#" class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Accueil</a>
                    <a href="#products" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Produits</a>
                    <a href="#promotions" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Promotions</a>
                    <a href="#popular" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Populaires</a>
                </div>
            </div>
        </nav>

        <!-- Contenu principal -->
        <main class="flex-grow ">
            <!-- Hero Section avec Carousel -->
            <div x-data="{ activeSlide: 1 }" class="relative bg-transparent  overflow-hidden" >
                <div class="max-w-8xl mx-auto">
                    <div class="relative z-10 pb-8 bg-gray-900 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                        <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                            <div class="sm:text-center lg:text-left">
                                <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                                    <span class="block xl:inline">BoutiqueChic</span>
                                    <span class="block text-indigo-600 xl:inline">Votre style, notre passion</span>
                                </h1>
                                <p class="mt-3 text-base text-gray-300 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                    Découvrez notre collection exclusive de vêtements et accessoires haut de gamme.
                                </p>
                                <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                    <div class="rounded-md shadow">
                                        <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                            Acheter maintenant
                                        </a>
                                    </div>
                                    <div class="mt-3 sm:mt-0 sm:ml-3">
                                        <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10">
                                            En savoir plus
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
                <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <div class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full">
                        <div x-show="activeSlide === 0" class="absolute inset-0 w-full h-full bg-center bg-cover transition-opacity duration-700" style="background-image: url(https://picsum.photos/id/1001/1200/800)"></div>
                        <div x-show="activeSlide === 1" class="absolute inset-0 w-full h-full bg-center bg-cover transition-opacity duration-700" style="background-image: url(https://picsum.photos/id/1002/1200/800)"></div>
                        <div x-show="activeSlide === 2" class="absolute inset-0 w-full h-full bg-center bg-cover transition-opacity duration-700" style="background-image: url(https://picsum.photos/id/1003/1200/800)"></div>
                   </div>
                </div>
                <div class="absolute bottom-0 left-0 right-0 flex justify-center p-4">
                    <button @click="activeSlide = 0" :class="{ 'bg-white': activeSlide === 0, 'bg-gray-300': activeSlide !== 0 }" class="w-3 h-3 rounded-full mx-2 focus:outline-none"></button>
                    <button @click="activeSlide = 1" :class="{ 'bg-white': activeSlide === 1, 'bg-gray-300': activeSlide !== 1 }" class="w-3 h-3 rounded-full mx-2 focus:outline-none"></button>
                    <button @click="activeSlide = 2" :class="{ 'bg-white': activeSlide === 2, 'bg-gray-300': activeSlide !== 2 }" class="w-3 h-3 rounded-full mx-2 focus:outline-none"></button>
                </div>
            </div>

            <!-- Section Produits -->
            <section id="products" class="py-12 bg-white dark:bg-gray-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Nos produits phares</h2>
                    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                        <!-- Répéter pour chaque produit -->
                        <div class="group relative">
                            <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                                <img src="https://picsum.photos/id/1001/600/300" alt="Produit" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                            </div>
                            <div class="mt-4 flex justify-between">
                                <div>
                                    <h3 class="text-sm text-gray-700 dark:text-gray-200">
                                        <a href="#">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            Produit Luxueux
                                        </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Noir</p>
                                </div>
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">199 €</p>
                            </div>
                        </div>
                        <!-- Répéter pour d'autres produits -->
                    </div>
                </div>
            </section>

            <!-- Section Promotions -->
            <section id="promotions" class="py-12 bg-gray-50 dark:bg-gray-700">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Promotions en cours</h2>
                    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                        <!-- Répéter pour chaque promotion -->
                        <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                            <div class="w-full h-60 bg-gray-200 aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                <img src="https://picsum.photos/id/1001/1200/800" alt="Promotion" class="w-full h-full object-center object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Soldes d'été</h3>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Du 8 juillet au 31 août</p>
                                <p class="mt-2 text-xl font-bold text-indigo-600 dark:text-indigo-400">Jusqu'à -50%</p>
                            </div>
                        </div>
                        <!-- Répéter pour d'autres promotions -->
                    </div>
                </div>
            </section>

            <!-- Section Produits Populaires -->
            <section id="popular" class="py-12 bg-white dark:bg-gray-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Produits populaires</h2>
                    <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                        <!-- Répéter pour chaque produit populaire -->
                        <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                            <div class="w-full h-60 bg-gray-200 aspect-w-1 aspect-h-1 group-hover:opacity-75">
                                <img src="https://picsum.photos/id/1001/1200/800" alt="Produit populaire" class="w-full h-full object-center object-cover">
                            </div>
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Jupes crochetées</h3>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Crochetées, étirées, à fleurs ou simplement chic</p>
                                <p class="mt-2 text-xl font-bold text-indigo-600 dark:text-indigo-400">79 €</p>
                                <a href="#" class="text-base font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">Voir le produit</a>
                            </div>
                        </div>
                        <!-- Répéter pour d'autres produits populaires -->
                    </div>
                </div>
            </section>

        </main>

        <footer class="bg-gray-100 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                    <div class="space-y-8 xl:col-span-1">
                        <img class="h-10" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="BoutiqueChic">
                        <p class="text-gray-500 dark:text-gray-400 text-base">
                            Votre destination pour la mode de luxe et le style intemporel.
                        </p>
                        <div class="flex space-x-6">
                            <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <span class="sr-only">Facebook</span>
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <span class="sr-only">Instagram</span>
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                                <span class="sr-only">Twitter</span>
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                    <div class="mt-12 grid grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Navigation</h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Accueil</a>
                                    </li>
                                    <li>
                                        <a href="#products" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Produits</a>
                                    </li>
                                    <li>
                                        <a href="#promotions" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Promotions</a>
                                    </li>
                                    <li>
                                        <a href="#popular" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Populaires</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Support</h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Contact</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Livraison</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Retours</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 md:gap-8">
                            <div>
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Entreprise</h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">À propos</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Carrières</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Partenaires</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Presse</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-12 md:mt-0">
                                <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase">Légal</h3>
                                <ul class="mt-4 space-y-4">
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Confidentialité</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-base text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Conditions d'utilisation</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-12 border-t border-gray-200 dark:border-gray-700 pt-8">
                    <p class="text-base text-gray-400 xl:text-center">&copy; 2024 BoutiqueChic. Tous droits réservés.</p>
                </div>
            </div>
        </footer>
    </body>
</html>