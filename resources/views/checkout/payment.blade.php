@include('components.frontend.haut')
<div class="bg-gradient-to-r from-green-400 to-blue-500 h-full p-6 flex flex-col items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="bg-gradient-to-r from-green-400 to-blue-500 p-6 rounded-lg">
        <h1 class="text-3xl font-bold text-center text-white"><i class="fas fa-credit-card mr-2"></i>Méthode de Paiement</h1>
    </div>
    <form action="{{ route('checkout.payment.store') }}" method="POST" class="mx-auto max-w-xl rounded-lg bg-white p-6 shadow-md">
        @csrf
        <div class="mb-4">
            <label for="methode_paiement" class="block text-gray-700 font-bold mb-2">
                <i class="fas fa-credit-card mr-2"></i>Méthode de Paiement
            </label>
            <select name="methode_paiement" class="form-select block w-full rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                <option value="carte_credit">Carte de Crédit</option>
                <option value="paypal">PayPal</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="statut_paiement" class="block text-gray-700 font-bold mb-2">
                <i class="fas fa-check-circle mr-2"></i>Statut de Paiement
            </label>
            <select name="statut_paiement" class="form-select block w-full rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" required>
                <option value="en_attente">En Attente</option>
                <option value="completé">Complété</option>
            </select>
        </div>
        <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg w-full mt-4">
            Finaliser la commande
        </button>
        <div class="flex justify-between mt-4">
            <a href="{{ route('checkout.address') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-lg">
                <i class="fas fa-arrow-left mr-2"></i>Retour
            </a>
            <a href="{{ route('checkout.payment') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg">
                <i class="fas fa-pen mr-2"></i>Modifier
            </a>
        </div>
    </form>
</div>
</div>
@include('components.frontend.bas')
