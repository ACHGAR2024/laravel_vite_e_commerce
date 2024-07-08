<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-8">
        <div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6 rounded-lg shadow-lgg">
            <h1 class="text-3xl font-bold text-center text-white"><i class="fas fa-user mr-2"></i>Supprimer le compte</h1>
        </div>


        <p class="text-sm text-gray-600 mb-6">
            Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Avant de
            supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez
            conserver.
        </p>

        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
            class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-md transition duration-300">
            Supprimer le compte
        </button>

        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-xl font-semibold mb-4 text-gray-900">
                    Êtes-vous sûr de vouloir supprimer votre compte ?
                </h2>

                <p class="text-sm text-gray-600 mb-6">
                    Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.
                    Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre
                    compte.
                </p>

                <div class="mb-6">
                    <label for="password" class="sr-only">Mot de passe</label>
                    <input id="password" name="password" type="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Mot de passe" />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="flex justify-end space-x-4">
                    <button type="button" x-on:click="$dispatch('close')"
                        class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-6 rounded-md transition duration-300">
                        Annuler
                    </button>
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                        Supprimer le compte
                    </button>
                </div>
            </form>
        </x-modal>
    </div>
</div>
