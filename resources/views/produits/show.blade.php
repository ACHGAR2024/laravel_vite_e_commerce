@include('components.frontend.haut')

<div class="min-h-screen bg-gradient-to-br from-purple-400 to-indigo-600 py-12 px-4 sm:px-6 lg:px-8">
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
                        <img src="{{ asset('storage/' . $image->nom_image) }}" alt="{{ $produit->nom }}"
                            class="absolute top-0 left-0 w-full h-full object-cover transition-opacity duration-300 ease-in-out"
                            x-show="activeImage === {{ $index }}"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform scale-95"
                            x-transition:enter-end="opacity-100 transform scale-100"
                            @mousemove="showZoom = true; zoomX = $event.clientX - $event.target.getBoundingClientRect().left; zoomY = $event.clientY - $event.target.getBoundingClientRect().top;"
                            @mouseleave="showZoom = false">
                        <div
                            class="absolute top-0 right-0 bg-red-500 text-white px-3 py-5 rounded-b-lg text-lg font-bold">
                            Soldes 50 %
                        </div>
                    @endforeach
                    <div x-show="showZoom" class="absolute top-0 left-0 w-full h-full bg-no-repeat pointer-events-none"
                        :style="`background-image: url('${$refs['mainImage' + activeImage].src}'); background-size: 200%; background-position: ${zoomX / 2}px ${zoomY / 2}px;`">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-between">
                        <button
                            @click="activeImage = (activeImage - 1 + {{ $produit->images->count() }}) % {{ $produit->images->count() }}"
                            class="bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition-all duration-300">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button @click="activeImage = (activeImage + 1) % {{ $produit->images->count() }}"
                            class="bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75 transition-all duration-300">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    @foreach ($produit->images as $index => $image)
                        <img src="{{ asset('storage/' . $image->nom_image) }}" alt="{{ $produit->nom }}"
                            class="w-20 h-20 object-cover rounded-md cursor-pointer transition-all duration-300 hover:shadow-lg transform hover:scale-105"
                            @click="activeImage = {{ $index }}">
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
                        <p class="mt-1 text-3xl font-bold text-green-600">{{ $produit->prix - $produit->prix * 0.5 }} €
                        </p>
                    </div>
                    <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-green-600 text-white px-6 py-3 rounded-full hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-300 transform hover:scale-105">
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
                <!-- Section Liker -->
                <!-- Jaime/Dislike buttons -->
                <div class="flex items-center space-x-4">
                    <form action="{{ route('produit.jaime', $produit) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-thumbs-up text-green-500 text-lg"></i>
                            <span class="ml-2">{{ $produit->jaimes()->where('jaime', true)->count() }}</span>
                        </button>
                    </form>

                    <form action="{{ route('produit.dislike', $produit) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-thumbs-down text-red-500 text-lg"></i>
                            <span class="ml-2">{{ $produit->jaimes()->where('jaime', false)->count() }}</span>
                        </button>
                    </form>
                </div>




            </div>
            <!-- Section Avis des utilisateurs-->
            <!-- resources/views/produits/show.blade.php -->
            <div class="space-y-6">

                <form action="{{ route('avis.store', $produit->id) }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="note" class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-star mr-2"></i>Note :
                        </label>
                        <fieldset class="rating mt-1 block w-full" aria-label="Rating">
                            <input type="radio" id="star1" name="note" value="1" />
                            <label for="star1" title="1 star">&#9733;</label>
                            <input type="radio" id="star2" name="note" value="2" />
                            <label for="star2" title="2 stars">&#9733;&#9733;</label>
                            <input type="radio" id="star3" name="note" value="3" />
                            <label for="star3" title="3 stars">&#9733;&#9733;&#9733;</label>
                            <input type="radio" id="star4" name="note" value="4" />
                            <label for="star4" title="4 stars">&#9733;&#9733;&#9733;&#9733;</label>
                            <input type="radio" id="star5" name="note" value="5" />
                            <label for="star5" title="5 stars">&#9733;&#9733;&#9733;&#9733;&#9733;</label>
                        </fieldset>
                    </div>
                    <div>
                        <label for="commentaire" class="block text-sm font-medium text-gray-700">
                            <i class="fas fa-comment mr-2"></i>Commentaire :
                        </label>
                        <textarea name="commentaire" id="commentaire" rows="4"
                            class="p-3 mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
                            required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary bg-slate-400 rounded-md p-1 px-3">Ajouter <i
                            class="fas fa-plus-circle ml-2"></i></button>
                </form>
                <!-- resources/views/produits/show.blade.php -->


                <div class="flex flex-col gap-4 mt-8" id="avis-container">
                    @foreach ($produit->avis as $avis)
                        <div class="flex flex-row justify-between items-center">
                            <div class="flex flex-col gap-2">
                                <strong class="text-gray-900 dark:text-gray-700">{{ $avis->user->name }} :</strong>
                                <p class="text-gray-500 dark:text-gray-400">{{ $avis->commentaire }}</p>
                            </div>
                            <div class="flex flex-row items-center gap-4">
                                @for ($i = 0; $i < $avis->note; $i++)
                                    <i class="fas fa-star text-yellow-500"></i>
                                @endfor
                                <span class="text-gray-500 dark:text-gray-400">{{ $avis->note }}/5</span>
                            </div>
                        </div>
                        <hr class="border-gray-300 dark:border-gray-700">
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>



<!-- Section Ajouter un avis -->
<!-- resources/views/produits/show.blade.php -->





</div>

@include('components.frontend.bas')

<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

<style>
    .animate-bounce {
        animation: bounce 1s infinite;
    }

    @keyframes bounce {

        0%,
        100% {
            transform: translateY(-25%);
            animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
        }

        50% {
            transform: translateY(0);
            animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
        }
    }
</style>
