@extends('layouts.app')

@section('content')
    @if (Auth::user()->isAdmin())
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6">Ajouter une nouvelle campagne</h1>

            <form action="{{ route('campaigns.store') }}" method="POST" id="campaignForm"
                class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-4">
                    <label for="promo" class="block text-sm font-bold text-gray-700 dark:text-gray-300 mb-2">
                        Sélectionner une promotion
                    </label>
                    <select id="promo" name="promo"
                        class="block w-full px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600"
                        aria-describedby="promoHelp">
                        <option value="">-- Sélectionner une promotion --</option>
                        @foreach ($promos as $promo)
                            <option value="{{ $promo->id }}" data-name="{{ $promo->nom_promo }}"
                                data-id="{{ $promo->id }}" data-image="{{ $promo->image }}"
                                data-url="{{ $promo->url }}" data-description="{{ $promo->description }}"
                                data-description="{{ $promo->description }}" data-start_date="{{ $promo->date_debut }}"
                                data-end_date="{{ $promo->date_fin }}" data-reduction="{{ $promo->reduction }}"
                                class="text-gray-900 dark:text-gray-100">
                                {{ $promo->nom_promo }}
                            </option>
                        @endforeach
                    </select>
                    <small id="promoHelp" class="block text-xs text-gray-600 dark:text-gray-400">
                        Choisissez une promotion parmi les options disponibles.
                    </small>
                </div>


                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="name">
                        Nom
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600"
                        id="name" name="name" type="text" required aria-describedby="nameHelp">
                    <small id="nameHelp" class="text-gray-600 dark:text-gray-400">Entrez le nom de la campagne.</small>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="description">
                        Description
                    </label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600"
                        id="description" name="description" required aria-describedby="descriptionHelp"></textarea>
                    <small id="descriptionHelp" class="text-gray-600 dark:text-gray-400">Entrez une description pour la
                        campagne.</small>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="start_date">
                        Date de début
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600"
                        id="start_date" name="start_date" type="date" required aria-describedby="startDateHelp">
                    <small id="startDateHelp" class="text-gray-600 dark:text-gray-400">Sélectionnez la date de début de la
                        campagne.</small>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="end_date">
                        Date de fin
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600"
                        id="end_date" name="end_date" type="date" required aria-describedby="endDateHelp">
                    <small id="endDateHelp" class="text-gray-600 dark:text-gray-400">Sélectionnez la date de fin de la
                        campagne.</small>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="reduction">
                        Réduction (%)
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600"
                        id="reduction" name="reduction" type="number" min="0" max="100" required
                        aria-describedby="reductionHelp">
                    <small id="reductionHelp" class="text-gray-600 dark:text-gray-400">Entrez la réduction en
                        pourcentage.</small>
                </div>
                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline flex items-center"
                        type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Ajouter
                    </button>
                </div>
            </form>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const promoSelect = document.getElementById('promo');
                const nameInput = document.getElementById('name');
                const descriptionTextarea = document.getElementById('description');
                const startDateInput = document.getElementById('start_date');
                const endDateInput = document.getElementById('end_date');
                const reductionInput = document.getElementById('reduction');

                promoSelect.addEventListener('change', function() {
                    const selectedOption = promoSelect.options[promoSelect.selectedIndex];
                    nameInput.value = selectedOption.getAttribute('data-name') || '';
                    descriptionTextarea.value = selectedOption.getAttribute('data-description') || '';
                    startDateInput.value = selectedOption.getAttribute('data-start_date') || '';
                    endDateInput.value = selectedOption.getAttribute('data-end_date') || '';
                    reductionInput.value = selectedOption.getAttribute('data-reduction') || '';
                });


            });
        </script>
    @endif
@endsection
