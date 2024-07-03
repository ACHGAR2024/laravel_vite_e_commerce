<x-guest-layout>
    <div class="flex items-center justify-center bg-gray-100 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
        <div class="m-auto w-1/2 space-y-8 bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="BoutiqueChic">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900 dark:text-white">
                    Créez votre compte
                </h2>
            </div>
            <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                    <div>
                        <x-input-label for="name" :value="__('Nom')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>

                    <div>
                        <x-input-label for="prenom" :value="__('Prénom')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="prenom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="text" name="prenom" :value="old('prenom')" required autocomplete="prenom" />
                        <x-input-error :messages="$errors->get('prenom')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>

                    <div class="col-span-2">
                        <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>

                    <div>
                        <x-input-label for="password" :value="__('Mot de passe')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>

                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>

                    <div>
                        <x-input-label for="telephone" :value="__('Téléphone')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="telephone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="text" name="telephone" :value="old('telephone')" autocomplete="telephone" />
                        <x-input-error :messages="$errors->get('telephone')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>

                    <div>
                        <x-input-label for="adresse" :value="__('Adresse')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="adresse" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="text" name="adresse" :value="old('adresse')" required autocomplete="adresse" />
                        <x-input-error :messages="$errors->get('adresse')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>

                    <div>
                        <x-input-label for="code_postal" :value="__('Code Postal')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="code_postal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="text" name="code_postal" :value="old('code_postal')" required autocomplete="code_postal" />
                        <x-input-error :messages="$errors->get('code_postal')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>

                    <div>
                        <x-input-label for="ville" :value="__('Ville')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="ville" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="text" name="ville" :value="old('ville')" required autocomplete="ville" />
                        <x-input-error :messages="$errors->get('ville')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>

                    <div>
                        <x-input-label for="pays" :value="__('Pays')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="pays" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="text" name="pays" :value="old('pays')" required autocomplete="pays" />
                        <x-input-error :messages="$errors->get('pays')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>

                    <div>
                        <x-input-label for="pseudo" :value="__('Pseudo')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <x-text-input id="pseudo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white" type="text" name="pseudo" :value="old('pseudo')" autocomplete="pseudo" />
                        <x-input-error :messages="$errors->get('pseudo')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>

                    <div class="col-span-2">
                        <x-input-label for="image" :value="__('Image de profil')" class="block text-sm font-medium text-gray-700 dark:text-gray-300" />
                        <input id="image" name="image" type="file" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 dark:file:bg-gray-700 dark:file:text-gray-300">
                        <x-input-error :messages="$errors->get('image')" class="mt-2 text-sm text-red-600 dark:text-red-400" />
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('S\'inscrire') }}
                    </button>
                </div>
            </form>

            <div class="text-sm text-center">
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                    {{ __('Déjà inscrit ? Connectez-vous') }}
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
