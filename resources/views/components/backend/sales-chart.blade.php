<div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
    <div class="p-5">
        <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">Ventes mensuelles</h3>
        <div class="mt-4">
            <canvas id="salesChart" height="200"></canvas>
        </div>
    </div>
</div>

@push('scripts')
<script>
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
</script>
@endpush