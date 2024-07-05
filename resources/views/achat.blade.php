@include('components.frontend.haut')

<div class="container mx-auto px-4 py-8 text-gray-200">
    <div class="z-50 sticky top-0 w-full bg-slate-400 rounded-md p-4 shadow transition duration-300 ease-in-out hover:shadow-lg">
        <form action="{{ route('achat') }}" method="GET" class="flex">
            @csrf
            <input type="text" name="search" placeholder="Rechercher un produit" class="flex-grow text-gray-900 border p-2 rounded-l-md focus:outline-none focus:ring-2 focus:ring-indigo-600 transition duration-300 ease-in-out" value="{{ request('search') }}">
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-r-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">Rechercher</button>
        </form>
    </div>

    <h1 class="text-3xl font-semibold mb-6 mt-8 text-center">Nos Produits</h1>

    @foreach ($categories as $categorie)
        <h2 class="text-2xl font-semibold mb-4 mt-12 text-indigo-300">{{ $categorie->nom }}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
            @foreach ($produits->where('categorie_id', $categorie->id) as $produit)
                <div class="bg-white shadow-md rounded-lg overflow-hidden transform transition duration-500 hover:scale-105 hover:shadow-xl">
                    <a href="{{ route('produits.show', $produit->id) }}" class="block relative overflow-hidden">
                        @if($produit->firstImage)
                            <img src="{{ asset('storage/' . $produit->firstImage->nom_image) }}" alt="{{ $produit->nom }}" class="w-full h-64 object-cover transform transition duration-300 hover:scale-110">
                        @else
                            <img src="{{ asset('storage/default.jpg') }}" alt="{{ $produit->nom }}" class="w-full h-64 object-cover transform transition duration-300 hover:scale-110">
                        @endif
                        <div class="absolute inset-0 bg-black bg-opacity-25 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white text-lg font-semibold">Voir détails</span>
                        </div>
                    </a>
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2 text-gray-800">{{ $produit->nom }}</h2>
                        <p class="text-gray-600 mb-4">{{ $categorie->nom }}</p>
                        <p class="text-lg font-bold text-indigo-600 mb-4">{{ $produit->prix }} €</p>
                        <form action="{{ route('panier.ajouter', $produit->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-105">
                                Ajouter au Panier
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <div class="mt-12">
        {{ $produits->links() }}
    </div>
</div>

@include('components.frontend.bas')

<script>
    // Animation au défilement
    function revealOnScroll() {
        var reveals = document.querySelectorAll(".grid > div");
        
        for (var i = 0; i < reveals.length; i++) {
            var windowHeight = window.innerHeight;
            var elementTop = reveals[i].getBoundingClientRect().top;
            var elementVisible = 150;
            
            if (elementTop < windowHeight - elementVisible) {
                reveals[i].classList.add("opacity-100");
                reveals[i].classList.remove("opacity-0", "translate-y-10");
            }
        }
    }

    window.addEventListener("scroll", revealOnScroll);
    revealOnScroll(); // Appel initial pour les éléments déjà visibles
</script>