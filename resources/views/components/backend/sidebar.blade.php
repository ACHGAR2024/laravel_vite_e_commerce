<div x-data="{ sidebarOpen: false }" class="flex h-screen flex-col md:flex-row  bg-gray-200 dark:bg-gray-900 ">
    <!-- Sidebar pour les administrateurs -->
    @if(Auth::user()->name === 'admin')
        <div class="rounded-b-lg md:block hidden w-52 md:w-52 border-r border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
            <div class="flex items-center justify-center h-16">
                <a href="/">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="BoutiqueChic">
                </a>
            </div>
            <nav class="mt-5 flex-grow flex flex-col w-52 p-2">
                <a href="{{ route('dashboard') }}" class="group flex items-center justify-center md:justify-start px-2 py-2 text-sm font-medium rounded-md text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
                    <i class="fas fa-home text-gray-500 dark:text-gray-400"></i>
                    <span class="hidden md:inline ml-3">Tableau de bord</span>
                </a>
                <a href="{{ route('profile.edit') }}" class="group flex items-center justify-center md:justify-start px-2 py-2 text-sm font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <i class="fas fa-user text-gray-500 dark:text-gray-400"></i>
                    <span class="hidden md:inline ml-3">Profil</span>
                </a>
                <a href="{{ route('dashboard_client') }}" class="group flex items-center justify-center md:justify-start px-2 py-2 text-sm font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <i class="fas fa-tag text-gray-500 dark:text-gray-400"></i>
                    <span class="hidden md:inline ml-3">Campagnes</span>
                </a>
                <a href="#" class="group flex items-center justify-center md:justify-start px-2 py-2 text-sm font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <i class="fas fa-box text-gray-500 dark:text-gray-400"></i>
                    <span class="hidden md:inline ml-3">Articles</span>
                </a>
                <a href="#" class="group flex items-center justify-center md:justify-start px-2 py-2 text-sm font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                    <i class="fas fa-layer-group text-gray-500 dark:text-gray-400"></i>
                    <span class="hidden md:inline ml-3">Gammes</span>
                </a>
            </nav>
        </div>
    @else
        <!-- Sidebar pour les clients -->
        <div class="md:block hidden w-20 md:w-32 border-r border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
            <div class="flex items-center justify-center h-16">
                <a href="/">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-600-mark-gray-800-text.svg" alt="BoutiqueChic">
                </a>
            </div>
            <nav class="mt-5 flex-grow flex flex-col">
                <a href="#" class="group flex items-center justify-center md:justify-start px-2 py-2 text-sm font-medium rounded-md text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
                    <i class="fas fa-home text-gray-500 dark:text-gray-400"></i>
                    <span class="hidden md:inline ml-3">Tableau de bord</span>
                </a>
            </nav>
        </div>
    @endif

    <!-- Bouton menu burger -->
    <div class=" md:hidden flex items-center p-4 bg-gray-800 text-white">
        <button @click="sidebarOpen = !sidebarOpen" class="focus:outline-none">
            
            <i class="fas fa-bars text-white" style="font-size: 24px;"></i>
           
        </button>
    </div>

    <!-- Sidebar mobile -->
    <div x-show="sidebarOpen" @click.away="sidebarOpen = false" class="md:hidden fixed inset-0 flex z-40">
        <div class="fixed inset-0">
            <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
        </div>
        <div class="relative flex-1 flex flex-col max-w-xs w-full bg-white dark:bg-gray-800">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button @click="sidebarOpen = false" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:bg-gray-600">
                    <i class="fas fa-times text-white"></i>
                </button>
            </div>
            <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                <div class="flex-shrink-0 flex items-center px-4">
                    <a href="/">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="BoutiqueChic">
                    </a>
                </div>
                <nav class="mt-5 px-2 space-y-1">
                    <a href="{{ route('dashboard') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-gray-900 dark:text-white bg-gray-100 dark:bg-gray-700">
                        <i class="fas fa-home text-gray-500 dark:text-gray-400"></i>
                        <span class="ml-3">Tableau de bord</span>
                    </a>
                    <a href="{{ route('profile.edit') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-user text-gray-500 dark:text-gray-400"></i>
                        <span class="ml-3">Profil</span>
                    </a>
                    <a href="{{ route('dashboard_client') }}" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-tag text-gray-500 dark:text-gray-400"></i>
                        <span class="ml-3">Campagnes</span>
                    </a>
                    <a href="#" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-box text-gray-500 dark:text-gray-400"></i>
                        <span class="ml-3">Articles</span>
                    </a>
                    <a href="#" class="group flex items-center px-2 py-2 text-base leading-6 font-medium rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <i class="fas fa-layer-group text-gray-500 dark:text-gray-400"></i>
                        <span class="ml-3">Gammes</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</div>