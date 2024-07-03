<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-100 dark:bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BoutiqueChic Admin')</title>
   
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
     <!-- Inclure Alpine.js -->
     <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0" defer></script>
     <!-- Inclure FontAwesome -->
     <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
     <!-- Inclure Alpine.js -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
@vite('resources/css/app.css')
   
    
    

<style>
    .dark-mode-toggle {
        cursor: pointer;
        font-size: 20px;
    }
</style>

<script>
    function darkModeData() {
        return {
            darkMode: false,
            initializeDarkMode() {
                this.darkMode = JSON.parse(localStorage.getItem('darkMode')) || false;
                this.updateDarkMode();
            },
            toggleDarkMode() {
                this.darkMode = !this.darkMode;
                localStorage.setItem('darkMode', JSON.stringify(this.darkMode));
                this.updateDarkMode();
            },
            updateDarkMode() {
                if (this.darkMode) {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }
        }
    }
</script>
    
    @yield('style')
</head>
<body class="h-full dark:bg-gray-900 bg-slate-300" >

    <div class="flex h-full w-full dark:bg-gray-900 bg-gray-300">
        <x-backend.sidebar />
        
        <div class="flex-1 flex flex-col overflow-hidden dark:bg-gray-900 bg-slate-300">
            <x-backend.header />
            
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-300 dark:bg-gray-900">
                @if (session('success'))
          <div role="alert" class="m-4">
            <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
              Success
            </div>
            <div class="border border-t-0 border-green-400 rounded-b bg-red-100 px-4 py-3 text-green-700">
              <p>{{ session('success') }}</p>
            </div>
          </div>
          @endif
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
    <script>
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

        
    </script>
</body>
</html>