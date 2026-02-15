<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ('Kominfo Bangkep') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased text-slate-600 dark:text-slate-400 bg-white dark:bg-dark-bg selection:bg-primary selection:text-white">
    
    <!-- Accessibility / Top Bar -->
    <div class="sr-only">Skip to main content</div>

    <!-- Main Header -->
    <header class="bg-white sticky top-0 z-50 shadow-sm font-sans" x-data="{ searchOpen: false, navOpen: false }">
        <!-- Top Row: Logos & Utilities -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-4">
                <!-- Left: Logos -->
                <div class="flex items-center gap-6 self-start lg:self-center">
                    <!-- Main Logo -->
                    <a href="{{ route('landing') }}" class="flex items-center gap-3">
                        <img src="https://disdik.tulungagung.go.id/wp-content/uploads/2022/01/logo-kominfo.png" alt="Logo Kominfo" class="h-10 lg:h-12 w-auto">
                        <div class="flex flex-col">
                            <span class="text-lg lg:text-xl font-bold text-slate-800 leading-none tracking-tight">KOMINFO</span>
                            <span class="text-[10px] items-center font-bold text-slate-500 tracking-wider uppercase">Kab. Banggai Kepulauan</span>
                        </div>
                    </a>
                    
                    <!-- Divider -->
                    <div class="hidden md:block h-8 w-px bg-slate-200"></div>

                    <!-- Partner Logos -->
                    <div class="hidden md:flex items-center gap-4 opacity-90">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/eb/Logo_BerAKHLAK.png/800px-Logo_BerAKHLAK.png" alt="BerAKHLAK" class="h-8 w-auto">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f2/Bangga_Melayani_Bangsa.png" alt="Bangga Melayani Bangsa" class="h-8 w-auto">
                    </div>
                </div>

                <!-- Right: Search & Tools -->
                <div class="flex items-center gap-4 w-full lg:w-auto mt-2 lg:mt-0">
                    <!-- Search Bar -->
                    <div class="relative w-full lg:w-[400px]">
                        <iconify-icon icon="solar:magnifer-linear" class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 font-bold" width="18"></iconify-icon>
                        <input type="text" placeholder="Cari berita dan layanan Kominfo..." class="w-full pl-11 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-full text-sm focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary transition-all">
                    </div>

                    <div class="hidden lg:flex items-center gap-3 text-sm font-semibold text-slate-600">
                        <div class="flex items-center gap-1 cursor-pointer hover:text-primary">
                            <iconify-icon icon="flag:id-4x3" width="20" class="rounded-sm box-shadow-sm"></iconify-icon>
                            <span>ID</span>
                            <iconify-icon icon="solar:alt-arrow-down-linear" width="12"></iconify-icon>
                        </div>
                        <button class="p-2 hover:bg-slate-100 rounded-lg transition-colors text-primary">
                           <iconify-icon icon="solar:menu-dots-square-bold" width="24"></iconify-icon>
                        </button>
                    </div>

                    <!-- Mobile Menu Toggle -->
                    <button @click="navOpen = !navOpen" class="lg:hidden p-2 text-slate-600">
                        <iconify-icon icon="solar:hamburger-menu-linear" width="28"></iconify-icon>
                    </button>
                </div>
            </div>
        </div>

        <!-- Bottom Row: Navigation (Desktop) -->
        <nav class="hidden lg:block border-t border-slate-100 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <ul class="flex items-center justify-between text-[13px] font-bold tracking-wide text-slate-600 uppercase">
                    <li>
                        <a href="{{ route('landing') }}" class="block py-4 hover:text-primary border-b-2 {{ request()->routeIs('landing') ? 'border-primary text-primary' : 'border-transparent' }}">
                           <iconify-icon icon="solar:home-2-bold" width="20"></iconify-icon>
                        </a>
                    </li>
                    <li class="group relative">
                        <a href="#" class="flex items-center gap-1 py-4 hover:text-primary border-b-2 border-transparent hover:border-primary transition-all">
                            Berita <iconify-icon icon="solar:alt-arrow-down-linear" width="12"></iconify-icon>
                        </a>
                        <!-- Mega Menu / Dropdown can be added here -->
                    </li>
                    <li class="group relative">
                        <a href="{{ route('landing.about') }}" class="flex items-center gap-1 py-4 hover:text-primary border-b-2 {{ request()->routeIs('landing.about') ? 'border-primary text-primary' : 'border-transparent' }} transition-all">
                            Profil <iconify-icon icon="solar:alt-arrow-down-linear" width="12"></iconify-icon>
                        </a>
                    </li>
                    <li class="group relative">
                         <a href="#" class="flex items-center gap-1 py-4 hover:text-primary border-b-2 border-transparent hover:border-primary transition-all">
                            Kinerja <iconify-icon icon="solar:alt-arrow-down-linear" width="12"></iconify-icon>
                        </a>
                    </li>
                    <li class="group relative">
                        <a href="{{ route('landing.services') }}" class="flex items-center gap-1 py-4 hover:text-primary border-b-2 {{ request()->routeIs('landing.services') ? 'border-primary text-primary' : 'border-transparent' }} transition-all">
                            Layanan <iconify-icon icon="solar:alt-arrow-down-linear" width="12"></iconify-icon>
                        </a>
                    </li>
                    <li class="group relative">
                        <a href="#" class="flex items-center gap-1 py-4 hover:text-primary border-b-2 border-transparent hover:border-primary transition-all">
                            Transformasi Digital <iconify-icon icon="solar:alt-arrow-down-linear" width="12"></iconify-icon>
                        </a>
                    </li>
                    <li class="group relative">
                        <a href="#" class="flex items-center gap-1 py-4 hover:text-primary border-b-2 border-transparent hover:border-primary transition-all">
                            Informasi Publik <iconify-icon icon="solar:invoice-linear" width="14" class="mb-0.5"></iconify-icon>
                        </a>
                    </li>
                   <li>
                        <a href="#" class="flex items-center gap-1 py-4 hover:text-primary border-b-2 border-transparent hover:border-primary transition-all">
                            Regulasi <iconify-icon icon="solar:square-arrow-right-up-linear" width="14"></iconify-icon>
                        </a>
                    </li>
                    <li>
                         <a href="{{ route('landing.contact') }}" class="flex items-center gap-1 py-4 hover:text-primary border-b-2 {{ request()->routeIs('landing.contact') ? 'border-primary text-primary' : 'border-transparent' }} transition-all">
                             Pengaduan <iconify-icon icon="solar:square-arrow-right-up-linear" width="14"></iconify-icon>
                         </a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Mobile Navigation Menu -->
        <div x-show="navOpen" x-transition class="lg:hidden border-t border-slate-100 bg-white shadow-lg overflow-y-auto max-h-[80vh]">
            <ul class="flex flex-col text-slate-700 font-medium">
                <li><a href="{{ route('landing') }}" class="block px-6 py-3 hover:bg-slate-50 border-l-4 {{ request()->routeIs('landing') ? 'border-primary text-primary bg-primary/5' : 'border-transparent' }}">Beranda</a></li>
                <li><a href="{{ route('landing.about') }}" class="block px-6 py-3 hover:bg-slate-50 border-l-4 {{ request()->routeIs('landing.about') ? 'border-primary text-primary bg-primary/5' : 'border-transparent' }}">Profil</a></li>
                <li><a href="{{ route('landing.services') }}" class="block px-6 py-3 hover:bg-slate-50 border-l-4 {{ request()->routeIs('landing.services') ? 'border-primary text-primary bg-primary/5' : 'border-transparent' }}">Layanan</a></li>
                <li><a href="{{ route('landing.contact') }}" class="block px-6 py-3 hover:bg-slate-50 border-l-4 {{ request()->routeIs('landing.contact') ? 'border-primary text-primary bg-primary/5' : 'border-transparent' }}">Kontak / Pengaduan</a></li>
                <li class="border-t border-slate-100 mt-2 p-4">
                    @auth
                         <a href="{{ route('dashboard') }}" class="block w-full text-center py-2.5 bg-primary text-white rounded-lg font-bold">Dashboard</a>
                    @else
                         <a href="{{ route('login') }}" class="block w-full text-center py-2.5 bg-primary text-white rounded-lg font-bold">Masuk Internal</a>
                    @endauth
                </li>
            </ul>
        </div>
    </header>

    <!-- Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 py-12 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/Lambang_Kabupaten_Banggai_Kepulauan.png/640px-Lambang_Kabupaten_Banggai_Kepulauan.png" alt="Logo" class="h-10 w-auto brightness-0 invert">
                        <div class="flex flex-col">
                            <span class="text-xl font-bold text-white leading-none tracking-tight">KOMINFO</span>
                            <span class="text-[10px] font-medium text-slate-500 tracking-wide uppercase mt-0.5">Kab. Banggai Kepulauan</span>
                        </div>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-400 max-w-sm">
                        Mewujudkan tata kelola pemerintahan berbasis elektronik yang terintegrasi, aman, dan efisien untuk pelayanan publik yang prima di Kabupaten Banggai Kepulauan.
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('landing') }}" class="hover:text-primary transition-colors">Beranda</a></li>
                        <li><a href="{{ route('landing.about') }}" class="hover:text-primary transition-colors">Tentang Kami</a></li>
                        <li><a href="{{ route('landing.services') }}" class="hover:text-primary transition-colors">Layanan Publik</a></li>
                        <li><a href="{{ route('landing.contact') }}" class="hover:text-primary transition-colors">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Kontak</h4>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-3">
                            <iconify-icon icon="solar:map-point-linear" class="mt-0.5 shrink-0 text-primary"></iconify-icon>
                            <span>Jl. Bukit Trikora No. 1, Salakan, Banggai Kepulauan, Sulawesi Tengah</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <iconify-icon icon="solar:phone-calling-linear" class="shrink-0 text-primary"></iconify-icon>
                            <span>(0462) 21xxx</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <iconify-icon icon="solar:letter-linear" class="shrink-0 text-primary"></iconify-icon>
                            <span>diskominfo@bangkepkab.go.id</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} Dinas Komunikasi dan Informatika Kab. Banggai Kepulauan. All rights reserved.</p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-white transition-colors"><iconify-icon icon="mdi:facebook" width="20"></iconify-icon></a>
                    <a href="#" class="hover:text-white transition-colors"><iconify-icon icon="mdi:instagram" width="20"></iconify-icon></a>
                    <a href="#" class="hover:text-white transition-colors"><iconify-icon icon="mdi:twitter" width="20"></iconify-icon></a>
                    <a href="#" class="hover:text-white transition-colors"><iconify-icon icon="mdi:youtube" width="20"></iconify-icon></a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
