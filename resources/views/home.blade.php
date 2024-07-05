@include('components.frontend.haut')

<!-- Contenu principal -->
<main class="flex-grow">
    <!-- Hero Section avec Carousel -->
    <div x-data="{ activeSlide: 1 }" class="relative bg-transparent overflow-hidden">
        <div class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full">
            @php($i = rand(1, 11))
            <div 
                x-show="activeSlide === 1"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90"
                class="absolute inset-0 w-full h-full bg-center bg-cover"
                style="background-image: url({{ asset('storage/images/images_home/' . $i . '.jpg') }})"
            ></div>
        </div>
        <div class="max-w-8xl mx-auto">
            <div class="relative z-10 pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left bg-transparent bg-slate-200 bg-opacity-75 p-6 rounded-lg">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">BoutiqueChic</span>
                            <span class="block text-indigo-600 xl:inline">Votre style, notre passion</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-700 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Découvrez notre collection exclusive de vêtements et accessoires haut de gamme.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="{{ route('achat') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                    Acheter maintenant
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 md:py-4 md:text-lg md:px-10 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                    En savoir plus
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>

    <!-- Section Produits -->
    <section id="products" class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Nos produits phares</h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach($featuredProducts as $product)
                <div class="group relative transform transition duration-500 hover:scale-105">
                    <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="{{ asset('storage/'.$product->images->first()->nom_image) }}" alt="{{ $product->nom }}" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700 dark:text-gray-200">
                                <a href="#" class="hover:underline">
                                    {{ $product->nom }}
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $product->color }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $product->prix }} €</p>
                    </div>
                    <div class="mt-4">
                        <form action="{{ route('panier.ajouter', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                Ajouter au Panier
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Promotions -->
    <section id="promotions" class="py-12 bg-gray-50 dark:bg-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Promotions en cours</h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                @foreach($promotions as $promo)
                <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition duration-500 hover:scale-105">
                    <div class="w-full h-60 bg-gray-200 aspect-w-1 aspect-h-1 group-hover:opacity-75">
                        <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->nom_promo }}" class="w-full h-full object-center object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $promo->nom_promo }}</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Promotion valide jusqu'au {{ $promo->date_fin }}</p>
                        <p class="mt-2 text-xl font-bold text-indigo-600 dark:text-indigo-400">{{ $promo->reduction }}% de réduction</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Produits Populaires -->
    <section id="popular" class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Produits populaires</h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                @foreach($popularProducts as $product)
                <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition duration-500 hover:scale-105">
                    <div class="w-full h-80 bg-gray-200 aspect-w-1 aspect-h-1 group-hover:opacity-75 ">
                        @if($product->images->count())
                        <img src="{{ asset('storage/'.$product->images->first()->nom_image) }}" alt="{{ $product->nom }}" class="w-full h-full object-center object-cover">
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $product->nom }}</h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $product->description }}</p>
                        <p class="mt-2 text-xl font-bold text-indigo-600 dark:text-indigo-400">{{ $product->prix }} €</p>
                        <form action="{{ route('panier.ajouter', $product->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="mt-4 w-full bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">
                                Ajouter au Panier
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</main>

@include('components.frontend.bas')

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>