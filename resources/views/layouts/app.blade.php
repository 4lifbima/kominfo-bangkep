<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard Eksekutif' }} - Kominfo Banggai Kepulauan</title>
    
    <!-- Fonts: Plus Jakarta Sans (Primary) & Inter (Data) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    
    <!-- Iconify Web Component -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- Chart.js (For Data Visualization) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- jQuery for DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <!-- DataTables & Extensions -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.tailwindcss.css">
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.tailwindcss.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom Styles for Glassmorphism & Details */
        :root {
            --glass-border: rgba(255, 255, 255, 0.5);
            --glass-bg: rgba(255, 255, 255, 0.85);
        }
        
        .dark :root {
            --glass-border: rgba(107, 68, 255, 0.2);
            --glass-bg: rgba(20, 24, 47, 0.85);
        }

        .glass-panel {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
        }

        .text-gradient {
            background: linear-gradient(135deg, #2c04b3 0%, #4a20d6 50%, #6b44ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .dark .text-gradient {
            background: linear-gradient(135deg, #6b44ff 0%, #9370ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #2c04b3 0%, #4a20d6 50%, #6b44ff 100%);
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        .dark ::-webkit-scrollbar-thumb {
            background: #334155;
        }
        
        /* Sidebar transition */
        .sidebar-transition {
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Animation */
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up {
            animation: fade-in-up 0.5s ease-out forwards;
        }

        /* DataTables Customization */
        .dt-container .dt-length select,
        .dt-container .dt-search input {
            background-color: transparent;
            border-color: #e2e8f0;
            border-radius: 0.5rem;
            padding-top: 0.25rem;
            padding-bottom: 0.25rem;
            font-size: 0.875rem;
        }
        .dark .dt-container .dt-length select,
        .dark .dt-container .dt-search input {
            border-color: rgba(255,255,255,0.1);
            color: white;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-primary-surface text-slate-800 antialiased dark:bg-dark-bg dark:text-dark-text transition-colors duration-300 relative overflow-x-hidden">

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden backdrop-blur-sm transition-opacity" onclick="toggleSidebar()"></div>

    <div class="flex h-screen overflow-hidden">
        
        <!-- SIDEBAR -->
        <x-sidebar />

        <!-- MAIN CONTENT -->
        <main class="flex-1 flex flex-col h-full overflow-hidden relative">
            
            <!-- HEADER -->
            <x-navbar />

            <!-- CONTENT WRAPPER -->
            <div class="flex-1 overflow-y-auto p-4 lg:p-8 space-y-8">
                {{ $slot }}

                <!-- Footer -->
                <footer class="mt-8 py-6 border-t border-slate-200 dark:border-white/5 text-center text-xs text-slate-500">
                    <p>&copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Kabupaten Banggai Kepulauan. All rights reserved.</p>
                </footer>
            </div>
        </main>
    </div>

    <script>
        // Sidebar Toggle for Mobile
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobile-overlay');
        
        function toggleSidebar() {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Dark Mode Toggle
        const html = document.documentElement;
        const themeIcon = document.getElementById('theme-icon');
        
        function toggleTheme() {
            if (html.classList.contains('dark')) {
                html.classList.remove('dark');
                localStorage.theme = 'light';
                themeIcon.setAttribute('icon', 'solar:moon-linear');
                if(typeof updateChartColor === 'function') updateChartColor('light');
            } else {
                html.classList.add('dark');
                localStorage.theme = 'dark';
                themeIcon.setAttribute('icon', 'solar:sun-2-linear');
                if(typeof updateChartColor === 'function') updateChartColor('dark');
            }
        }

        // Check system preference
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
            if(themeIcon) themeIcon.setAttribute('icon', 'solar:sun-2-linear');
        }

        // Live Clock
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
            const dateString = now.toLocaleDateString('id-ID', { weekday: 'long', day: 'numeric', month: 'short' });
            
            const clockTime = document.getElementById('clock-time');
            const clockDate = document.getElementById('clock-date');

            if(clockTime) clockTime.textContent = timeString;
            if(clockDate) clockDate.textContent = dateString;
        }
        setInterval(updateTime, 1000);
        updateTime();
    </script>
    @stack('scripts')
</body>
</html>
