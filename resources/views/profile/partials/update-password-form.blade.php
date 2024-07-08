<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-8">
        <div class="bg-gradient-to-r from-pink-500 to-orange-500 p-6 rounded-lg shadow-lgg">
            <h1 class="text-3xl font-bold text-center text-white"><i class="fas fa-user mr-2"></i>Mise à jour du mot de
                passe</h1>
        </div>


        <p class="text-sm text-gray-600 mb-6">
            Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.
        </p>

        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
            @csrf
            @method('put')

            <div>
                <label for="update_password_current_password" class="block text-sm font-medium text-gray-700 mb-2">Mot de
                    passe actuel</label>
                <input id="update_password_current_password" name="current_password" type="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    autocomplete="current-password">
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>

            <div>
                <label for="update_password_password" class="block text-sm font-medium text-gray-700 mb-2">Nouveau mot
                    de passe</label>
                <input id="update_password_password" name="password" type="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    autocomplete="new-password">
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <div>
                <label for="update_password_password_confirmation"
                    class="block text-sm font-medium text-gray-700 mb-2">Confirmer le mot de passe</label>
                <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    autocomplete="new-password">
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-md transition duration-300">
                    Sauvegarder
                </button>

                @if (session('status') === 'password-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-green-600">Sauvegardé.</p>
                @endif
            </div>
        </form>
    </div>
</div>
