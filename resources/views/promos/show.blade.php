@extends('layouts.app')

@section('content')
<div class=" bg-gray-100 py-1 flex flex-col justify-center sm:py-2">
    <div class="relative py-3 sm:max-w-xl sm:mx-auto">
        <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
            <div class="max-w-md mx-auto">
                <h1 class="text-2xl font-semibold text-center text-gray-800">{{ $promo->nom_promo }}</h1>
                <div class="divide-y divide-gray-200">
                    <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        <p class="flex items-center">
                           
                            <span class="text-red-600 font-bold text-4xl">{{ $promo->reduction }}%</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-align-left mr-2 text-gray-400"></i>
                            <span>Description: {{ $promo->description }}</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-calendar-alt mr-2 text-gray-400"></i>
                            <span>Date Début: {{ $promo->date_debut }}</span>
                        </p>
                        <p class="flex items-center">
                            <i class="fas fa-calendar-check mr-2 text-gray-400"></i>
                            <span>Date Fin: {{ $promo->date_fin }}</span>
                        </p>
                        @if($promo->image)
                            <div class="flex justify-center mt-4">
                                <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->nom_promo }}" width="200" class="rounded-full">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

