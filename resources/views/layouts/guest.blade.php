<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-50 dark:bg-dark-bg">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ ('Kominfo Bangkep') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
        
        <!-- Iconify Web Component -->
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full antialiased font-sans text-slate-600 dark:text-slate-400 bg-slate-50 dark:bg-dark-bg flex items-center justify-center min-h-screen selection:bg-primary selection:text-white relative overflow-hidden">
        
        <!-- Background Patterns -->
        <div class="fixed inset-0 -z-10 transition-all duration-300">
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/50 to-white dark:via-dark-bg/50 dark:to-dark-bg"></div>
            <div class="absolute top-0 left-0 right-0 h-96 bg-gradient-to-b from-primary/5 to-transparent blur-3xl rounded-full transform -translate-y-1/2"></div>
        </div>

        {{ $slot }}
    </body>
</html>
