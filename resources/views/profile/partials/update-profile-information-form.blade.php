<div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6 rounded-lg shadow-lgg">
    <h1 class="text-3xl font-bold text-center text-white"><i class="fas fa-user mr-2"></i>Informations
        personnelles</h1>
</div>
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 w-full">

        <!-- Carte 1 : Informations de profil -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden lg:col-span-2">
            <div class="p-8">


                <div class="flex flex-col md:flex-row gap-8">
                    <div class="md:w-1/3">
                        <img src="/storage/{{ $user->image }}" alt="Profile Image"
                            class="w-full h-auto object-cover rounded-lg">
                    </div>
                    <div class="md:w-2/3">
                        <form method="post" action="{{ route('profile.imageUpdate') }}" class="space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div>
                                <label for="image"
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-900 mb-2">Modifier
                                    l'image de profil :</label>
                                <input id="image" name="image" type="file"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 dark:bg-gray-900 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                                    {{ __('Sauvegarder') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carte 2 : Informations personnelles -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden lg:col-span-2">
            <div class="p-8">

                <form method="post" action="{{ route('profile.updateInfo') }}" class="space-y-6">
                    @csrf
                    @method('patch')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nom :</label>
                            <input id="name" name="name" type="text"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div>
                            <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2">Prénom :</label>
                            <input id="prenom" name="prenom" type="text"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('prenom', $user->prenom) }}" required>
                        </div>
                        <div>
                            <label for="pseudo" class="block text-sm font-medium text-gray-700 mb-2">Pseudo :</label>
                            <input id="pseudo" name="pseudo" type="text"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('pseudo', $user->pseudo) }}" required>
                        </div>
                        <div>
                            <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">Téléphone
                                :</label>
                            <input id="telephone" name="telephone" type="text"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('telephone', $user->telephone) }}" required>
                        </div>
                        <div class="md:col-span-2">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email :</label>
                            <input id="email" name="email" type="email"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                            {{ __('Sauvegarder') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Carte 3 : Liste des adresses -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden lg:col-span-2">
            <div class="p-8">
                <div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6 rounded-lg shadow-lgg">
                    <h1 class="text-3xl font-bold text-center text-white"><i class="fas fa-home mr-2"></i>Liste des
                        Adresses</h1>
                </div>
                <ul class="space-y-4">
                    @foreach ($user->adresses as $adress)
                        <li class="flex items-center justify-between py-3 border-b border-gray-200 last:border-b-0">
                            <span class="flex items-center">
                                <i class="fas fa-map-marker-alt text-gray-500 mr-3"></i>
                                <span>
                                    <strong>{{ $adress->nom_adresse }}</strong><br>
                                    {{ $adress->adresse }} - {{ $adress->ville }}, {{ $adress->pays }}
                                </span>
                            </span>
                            <div class="flex space-x-4">
                                <a href="{{ route('adresses.show', $adress->id) }}"
                                    class="text-blue-500 hover:text-blue-600 transition duration-300">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('adresses.edit', $adress->id) }}"
                                    class="text-green-500 hover:text-green-600 transition duration-300">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('adresses.destroy', $adress->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-600 transition duration-300">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('adresses.create') }}"
                    class="inline-block mt-6 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                    <i class="fas fa-plus mr-2"></i> Ajouter une adresse
                </a>
            </div>
        </div>

    </div>
</div>
