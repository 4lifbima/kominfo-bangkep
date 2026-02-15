<header class="h-[80px] bg-white/80 dark:bg-dark-surface/80 backdrop-blur-md border-b border-indigo-100 dark:border-indigo-900/30 flex items-center justify-between px-4 lg:px-8 z-30 sticky top-0">
    <div class="flex items-center gap-4">
        <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-white/10 text-slate-600 dark:text-white">
            <iconify-icon icon="solar:hamburger-menu-linear" width="24"></iconify-icon>
        </button>
        
        <!-- Breadcrumb -->
        <div class="hidden md:flex items-center gap-2 text-sm text-slate-500">
            <iconify-icon icon="solar:folder-linear" class="text-indigo-500"></iconify-icon>
            <span class="dark:text-slate-400">Pemerintahan</span>
            <iconify-icon icon="solar:alt-arrow-right-linear" width="14"></iconify-icon>
            <span class="font-semibold text-primary dark:text-primary-lavender">{{ $title ?? 'Dashboard' }}</span>
        </div>
    </div>

    <div class="flex items-center gap-3 lg:gap-6">
        <!-- Global Search -->
        <div class="hidden lg:flex items-center relative">
            <iconify-icon icon="solar:magnifer-linear" class="absolute left-3 text-slate-400"></iconify-icon>
            <input type="text" placeholder="Cari dokumen, data, atau layanan..." class="pl-10 pr-4 py-2 w-64 rounded-full bg-slate-100 dark:bg-white/5 border-none focus:ring-2 focus:ring-primary text-sm dark:text-white placeholder:text-slate-400">
        </div>

        <!-- Digital Clock -->
        <div class="hidden lg:block text-right">
            <p id="clock-time" class="text-lg font-mono font-bold text-slate-800 dark:text-white leading-none">00:00</p>
            <p id="clock-date" class="text-xs text-slate-500 uppercase tracking-wide">Senin, 1 Jan</p>
        </div>

        <div class="h-8 w-px bg-slate-200 dark:bg-white/10 hidden lg:block"></div>

        <!-- Actions -->
        <div class="flex items-center gap-2">
            <button onclick="toggleTheme()" class="p-2.5 rounded-full hover:bg-slate-100 dark:hover:bg-white/10 text-slate-600 dark:text-white transition-colors relative">
                <iconify-icon id="theme-icon" icon="solar:moon-linear" width="20"></iconify-icon>
            </button>
            
            <button class="p-2.5 rounded-full hover:bg-slate-100 dark:hover:bg-white/10 text-slate-600 dark:text-white transition-colors relative">
                <iconify-icon icon="solar:bell-linear" width="20"></iconify-icon>
                <span class="absolute top-2 right-2.5 w-2 h-2 rounded-full bg-accent-rose border border-white dark:border-dark-bg"></span>
            </button>
            
            <!-- User Dropdown & Logout Modal -->
            <div class="relative" x-data="{ open: false, showLogoutModal: false }">
                
                <!-- Dropdown Trigger -->
                <button @click="open = !open" class="flex items-center gap-3 pl-2 pr-1 py-1 rounded-full hover:bg-slate-50 dark:hover:bg-white/5 transition-colors border border-transparent hover:border-slate-200 dark:border-white/10 ml-2">
                    <div class="hidden md:block text-right">
                        <p class="text-xs font-bold text-slate-800 dark:text-white">{{ Auth::user()->name ?? 'Admin Utama' }}</p>
                        <p class="text-[10px] text-slate-500">Kepala Dinas</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name ?? 'Admin Kominfo') }}&background=2c04b3&color=fff" alt="Profile" class="w-9 h-9 rounded-full ring-2 ring-white dark:ring-white/10">
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" 
                     @click.away="open = false"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-48 bg-white dark:bg-dark-surface rounded-xl shadow-lg border border-slate-100 dark:border-white/10 py-1 z-50 origin-top-right"
                     style="display: none;">
                    
                    <div class="px-4 py-2 border-b border-slate-100 dark:border-white/5">
                        <p class="text-xs font-medium text-slate-500 dark:text-slate-400">Akun</p>
                    </div>
                    
                    <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-white/5 transition-colors">
                        <iconify-icon icon="solar:user-circle-linear" width="18"></iconify-icon>
                        Profile / Settings
                    </a>
                    
                    <button @click="showLogoutModal = true; open = false" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 dark:hover:bg-red-900/10 transition-colors">
                        <iconify-icon icon="solar:logout-2-linear" width="18"></iconify-icon>
                        Keluar
                    </button>
                </div>

                <!-- Logout Confirmation Modal -->
                <template x-teleport="body">
                    <div x-show="showLogoutModal" 
                         style="display: none;"
                         class="fixed inset-0 z-[100] flex items-center justify-center px-4"
                         aria-labelledby="modal-title" role="dialog" aria-modal="true">
                        
                        <!-- Backdrop -->
                        <div x-show="showLogoutModal"
                             x-transition:enter="ease-out duration-300"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-transition:leave="ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="fixed inset-0 bg-gray-500/75 dark:bg-gray-900/80 backdrop-blur-sm transition-opacity" 
                             @click="showLogoutModal = false"></div>

                        <!-- Modal Panel -->
                        <div x-show="showLogoutModal"
                             x-transition:enter="ease-out duration-300"
                             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                             x-transition:leave="ease-in duration-200"
                             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                             class="relative transform overflow-hidden rounded-2xl bg-white dark:bg-dark-surface text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-sm border border-slate-200 dark:border-white/10">
                            
                            <div class="px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/20 sm:mx-0 sm:h-10 sm:w-10">
                                        <iconify-icon icon="solar:danger-triangle-linear" class="text-red-600" width="24"></iconify-icon>
                                    </div>
                                    <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                        <h3 class="text-base font-semibold leading-6 text-slate-900 dark:text-white" id="modal-title">Konfirmasi Keluar</h3>
                                        <div class="mt-2">
                                            <p class="text-sm text-slate-500 dark:text-slate-400">Apakah Anda yakin ingin keluar dari aplikasi? Anda harus masuk kembali untuk mengakses akun Anda.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 dark:bg-gray-800/30 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="inline-flex w-full justify-center rounded-xl bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto transition-colors">
                                        Keluar
                                    </button>
                                </form>
                                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-xl bg-white dark:bg-transparent px-3 py-2 text-sm font-semibold text-slate-900 dark:text-slate-300 shadow-sm ring-1 ring-inset ring-slate-300 dark:ring-white/10 hover:bg-slate-50 dark:hover:bg-white/5 sm:mt-0 sm:w-auto transition-colors" @click="showLogoutModal = false">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </template>

            </div>
        </div>
    </div>
</header>
