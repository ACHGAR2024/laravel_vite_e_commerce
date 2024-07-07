<header class="bg-white dark:bg-gray-800 shadow w-full">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
            <span class="text-indigo-600 dark:text-indigo-400">Bonjour : {{ Auth::user()->name }}</span>
        </h1>

        <!-- // Panier // -->
        <a class="nav-link" href="{{ route('panier.index') }}">
            <i
                class="fas fa-shopping-cart bg-white dark:bg-gray-800 p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"></i>
            <span
                class="badge badge-pill badge-primary text-white bg-indigo-600 rounded-3xl p-2">{{ count((array) session('panier')) }}</span>
        </a>
        <button @click="darkMode = !darkMode"
            class="text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
            <i class="fas" :class="{ 'fa-sun': darkMode, 'fa-moon': !darkMode }" style="font-size: 20px;"></i>
        </button>
        @if (Auth::user()->name === 'admin')
            <img src="{{ asset('storage/' . Auth::user()->image) }}" alt="User Image" class="w-9 h-9 rounded-full" />
        @endif
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="text-gray-500 dark:text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                <i class="fas fa-sign-out-alt text-gray-900 dark:text-white " style="font-size: 20px;"></i>
            </button>
        </form>




    </div>
</header>
