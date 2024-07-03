@extends('layouts.app')

@section('title', 'Tableau de bord - BoutiqueChic Admin')

@section('style')
<style>
      
</style>
@endsection

@section('content')

 

<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 dark:bg-gray-900 p-7">
    <!--/// resources/views/dashboard.blade.php content page Administrateur ////// -->
    <x-backend.statistic-card title="Ventes totales" value="12,345 €" icon="fas fa-chart-bar" />

    <!-- Graphique des ventes -->
    <x-backend.sales-chart />

    <!-- Autres Compagnes... -->
    <x-backend.recent-items-list />
   
</main>

@endsection

@push('scripts')
<script>
    // script JavaScript pour le graphique et le mode sombre
    // Initialisation du graphique
const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Ventes',
                    data: [12, 19, 3, 5, 2, 3],
                    borderColor: 'rgb(79, 70, 229)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

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