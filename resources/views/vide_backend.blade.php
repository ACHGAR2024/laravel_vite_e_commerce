@extends('layouts.app')

@section('title', 'xxxxxxxxxxxxxxxxx')

@section('style')
<style>
     
</style>
@endsection

@section('content')

 

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900 p-7">
    <!--/// Contenu ici ////// -->
   
</main>

@endsection

@push('scripts')
<script>
    
        // Gestion du mode sombre
        function applyDarkMode(darkMode) {
            if (darkMode) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        }

        // Écouteur pour le changement de mode
        Alpine.effect(() => {
            applyDarkMode(Alpine.store('darkMode'));
        });

</script>
@endpush