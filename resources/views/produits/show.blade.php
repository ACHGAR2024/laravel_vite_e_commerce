@include('components.frontend.haut')

<div class="min-h-screen bg-gradient-to-br from-purple-400 to-indigo-600  py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-2xl overflow-hidden">
        <div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6">
            <h1 class="text-3xl font-extrabold text-white text-center">
                {{ $produit->nom }}
                <i class="fas fa-box-open ml-2 animate-bounce"></i>
            </h1>
        </div>

        <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Album d'images avec zoom -->
            <div class="space-y-4" x-data="{ activeImage: 0, showZoom: false, zoomX: 0, zoomY: 0 }">
                <div class="relative overflow-hidden rounded-lg shadow-lg h-96">
                    @foreach ($produit->images as $index => $image)
                        <img 
                            src="{{ asset('storage/' . $image->nom_image) }}" 
                            alt="{{ $produit->nom }}" 
                            class=" absolute top-0 left-0 w-full h-full object-cover transition-opacity duration-300 ease-in-out"
                            x-show="activeImage === {{ $index }}"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            @mousemove="showZoom = true; zoomX = $event.clientX - $event.target.getBoundingClientRect().left; zoomY = $event.clientY - $event.target.getBoundingClientRect().top;"
                            @mouseleave="showZoom = false"
                        >
                        <div class="absolute top-0 right-0 bg-red-500 text-white px-3 py-5 rounded-b-lg text-lg font-bold grounder-yl-md">
                             Soldes 50 % 
                          </div>
                    @endforeach
                    <div 
                        x-show="showZoom"
                        class="absolute top-0 left-0 w-full h-full bg-no-repeat pointer-events-none"
                        :style="`background-image: url('${$refs['mainImage' + activeImage].src}'); background-size: 200%; background-position: ${zoomX / 2}px ${zoomY / 2}px;`"
                    ></div>
                    <div class="absolute inset-0 flex items-center justify-between">
                        <button @click="activeImage = (activeImage - 1 + {{ $produit->images->count() }}) % {{ $produit->images->count() }}" class="bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition-all duration-300">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button @click="activeImage = (activeImage + 1) % {{ $produit->images->count() }}" class="bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition-all duration-300">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    @foreach ($produit->images as $index => $image)
                        <img 
                            src="{{ asset('storage/' . $image->nom_image) }}" 
                            alt="{{ $produit->nom }}" 
                            class="w-20 h-20 object-cover rounded-md cursor-pointer transition-all duration-300 hover:shadow-lg transform hover:scale-105"
                            @click="activeImage = {{ $index }}"
                        >
                    @endforeach
                </div>
            </div>

            <!-- Informations du produit -->
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-align-left mr-2"></i>Description
                    </label>
                    <p class="mt-1 text-lg text-gray-900">{{ $produit->description }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-euro-sign mr-2"></i>Prix
                        </label>
                        <p class="mt-1 text-3xl font-bold text-red-600 line-through">{{ $produit->prix }} €</p>
                        <p class="mt-1 text-3xl font-bold text-green-600">{{ $produit->prix - $produit->prix * 0.50 }} €</p>
                    </div>
                    <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-full hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-shopping-cart mr-2"></i> Ajouter au Panier
                        </button>
                    </form>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-cubes mr-2"></i>Stock
                    </label>
                    <p class="mt-1 text-lg text-gray-900">{{ $produit->stock }} unités disponibles</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">
                        <i class="fas fa-folder mr-2"></i>Catégorie
                    </label>
                    <p class="mt-1 text-lg text-gray-900">{{ $produit->category->nom }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('components.frontend.bas')

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

<style>
    .animate-bounce {
        animation: bounce 1s infinite;
    }
    @keyframes bounce {
        0%, 100% { transform: translateY(-25%); animation-timing-function: cubic-bezier(0.8, 0, 1, 1); }
        50% { transform: translateY(0); animation-timing-function: cubic-bezier(0, 0, 0.2, 1); }
    }
</style>