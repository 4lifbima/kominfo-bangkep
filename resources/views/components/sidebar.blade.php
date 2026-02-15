<aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-[280px] bg-white dark:bg-dark-surface border-r border-indigo-100 dark:border-indigo-900/30 transform -translate-x-full lg:translate-x-0 sidebar-transition flex flex-col h-full shadow-2xl lg:shadow-none">
    
    <!-- Logo Section -->
    <div class="h-[80px] flex items-center px-6 border-b border-dashed border-indigo-100 dark:border-indigo-900/30">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-primary flex items-center justify-center text-white shadow-lg shadow-indigo-500/30">
                <iconify-icon icon="solar:city-bold" width="20"></iconify-icon>
            </div>
            <div>
                <h1 class="font-bold text-lg tracking-tight leading-none text-slate-900 dark:text-white">KOMINFO</h1>
                <p class="text-xs font-medium text-slate-500 tracking-[0.1em] uppercase">Bangkep</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-1">
        <p class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-widest mb-3">Pemerintahan</p>
        
        <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
            <iconify-icon icon="solar:widget-2-linear" width="22" stroke-width="1.5"></iconify-icon>
            <span class="font-medium text-sm">Dashboard Utama</span>
        </x-nav-link>

        <x-nav-link href="{{ route('infrastructure.index') }}" :active="request()->routeIs('infrastructure.*')">
            <iconify-icon icon="solar:server-square-linear" width="22" stroke-width="1.5"></iconify-icon>
            <span class="font-medium text-sm">Infrastruktur TIK</span>
        </x-nav-link>

        <x-nav-link href="{{ route('statistics.index') }}" :active="request()->routeIs('statistics.*')">
            <iconify-icon icon="solar:chart-square-linear" width="22" stroke-width="1.5"></iconify-icon>
            <span class="font-medium text-sm">Statistik & Data</span>
        </x-nav-link>

        <x-nav-link href="{{ route('programs.index') }}" :active="request()->routeIs('programs.*')">
            <iconify-icon icon="solar:clipboard-list-linear" width="22" stroke-width="1.5"></iconify-icon>
            <span class="font-medium text-sm">Program Kerja</span>
        </x-nav-link>

        <x-nav-link href="{{ route('budget.index') }}" :active="request()->routeIs('budget.*')">
            <iconify-icon icon="solar:wallet-money-linear" width="22" stroke-width="1.5"></iconify-icon>
            <span class="font-medium text-sm">Anggaran & Realisasi</span>
        </x-nav-link>

        <x-nav-link href="{{ route('services.index') }}" :active="request()->routeIs('services.*')">
            <iconify-icon icon="solar:users-group-rounded-linear" width="22" stroke-width="1.5"></iconify-icon>
            <span class="font-medium text-sm">Layanan Publik</span>
        </x-nav-link>

        <p class="px-3 text-xs font-semibold text-slate-400 uppercase tracking-widest mt-8 mb-3">Manajemen</p>

        <x-nav-link href="{{ route('employees.index') }}" :active="request()->routeIs('employees.*')">
            <iconify-icon icon="solar:user-id-linear" width="22" stroke-width="1.5"></iconify-icon>
            <span class="font-medium text-sm">SDM & ASN</span>
        </x-nav-link>
        
        <x-nav-link href="{{ route('archives.index') }}" :active="request()->routeIs('archives.*')">
            <iconify-icon icon="solar:folder-with-files-linear" width="22" stroke-width="1.5"></iconify-icon>
            <span class="font-medium text-sm">Arsip & Dokumen</span>
        </x-nav-link>
    </nav>

    <!-- Version Badge -->
    <div class="p-6 border-t border-dashed border-indigo-100 dark:border-indigo-900/30">
        <div class="flex items-center gap-3 p-3 rounded-xl bg-indigo-50 dark:bg-indigo-900/10 border border-indigo-100 dark:border-indigo-900/20">
            <div class="w-8 h-8 rounded-full bg-white dark:bg-indigo-900 flex items-center justify-center text-primary shadow-sm">
                <iconify-icon icon="solar:shield-check-linear"></iconify-icon>
            </div>
            <div>
                <p class="text-xs font-bold text-slate-800 dark:text-white">SI-PEMERINTAHAN</p>
                <p class="text-xs text-slate-500">Versi 1.0 Stable</p>
            </div>
        </div>
    </div>
</aside>
