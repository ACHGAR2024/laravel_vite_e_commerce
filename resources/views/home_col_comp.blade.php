@include('components.frontend.haut')
<main class="flex-grow">
    <!-- Hero Section ... -->

    <!-- Section Campagnes -->
    <section id="campaigns" class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Campagnes</h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                @foreach ($campaigns as $campaign)
                    <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $campaign->name }}</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $campaign->description }}</p>
                            <p class="mt-2 text-base text-gray-700 dark:text-gray-300">Du {{ $campaign->start_date }}
                                au {{ $campaign->end_date }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Section Collections -->
    <section id="collections" class="py-12 bg-gray-50 dark:bg-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Collections</h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-3 xl:gap-x-8">
                @foreach ($collections as $collection)
                    <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $collection->name }}
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $collection->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Section Produits -->
    <section id="products" class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Nos produits phares</h2>
            <div class="mt-6 grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($featuredProducts as $produit)
                    <div class="group relative">
                        <div
                            class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                            @foreach ($produit->images as $productImage)
                                <img src="{{ asset('storage/' . $productImage->image) }}" alt="{{ $produit->nom }}"
                                    class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                            @endforeach
                        </div>
                        <div class="mt-4 flex justify-between">
                            <div>
                                <h3 class="text-sm text-gray-700 dark:text-gray-200">
                                    <a href="#">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $produit->nom }}
                                    </a>
                                </h3>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">{{ $produit->color }}</p>
                            </div>
                            <p class="text-sm font-medium text-gray-900 dark:text-gray-100">{{ $produit->prix }} €</p>
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
                @foreach ($promotions as $promo)
                    <div class="group relative bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                        <div class="w-full h-60 bg-gray-200 aspect-w-1 aspect-h-1 group-hover:opacity-75">
                            <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->nom_promo }}"
                                class="w-full h-full object-center object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $promo->nom_promo }}
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Promotion valide jusqu'au
                                {{ $promo->date_fin }}</p>
                            <p class="mt-2 text-xl font-bold text-indigo-600 dark:text-indigo-400">
                                {{ $promo->reduction }}% de réduction</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



</main>

@include('components.frontend.bas')
