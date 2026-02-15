<x-landing-layout>
    <!-- HEADER -->
    <section class="relative pt-32 pb-20 bg-slate-50 dark:bg-white/5 overflow-hidden">
        <div class="absolute inset-0 -z-10">
            <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-emerald-500/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white mb-6">Layanan Publik</h1>
            <p class="text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto">
                Daftar layanan digital yang disediakan oleh Pemerintah Kabupaten Banggai Kepulauan.
            </p>
        </div>
    </section>

    <!-- SERVICES LIST -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="p-8 bg-white dark:bg-dark-surface rounded-2xl shadow-lg border-2 border-transparent hover:border-primary/20 transition-all duration-300 group">
                    <div class="w-16 h-16 rounded-2xl bg-blue-50 dark:bg-white/5 text-blue-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <iconify-icon icon="solar:document-text-bold" width="36"></iconify-icon>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">E-Surat</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 leading-relaxed">
                        Sistem pengelolaan persuratan elektronik untuk efisiensi administrasi perkantoran antar OPD.
                    </p>
                    <a href="#" class="inline-flex items-center text-primary font-bold text-sm hover:underline">
                        Akses Layanan <iconify-icon icon="solar:arrow-right-linear" class="ml-1"></iconify-icon>
                    </a>
                </div>

                <!-- Service 2 -->
                <div class="p-8 bg-white dark:bg-dark-surface rounded-2xl shadow-lg border-2 border-transparent hover:border-emerald-500/20 transition-all duration-300 group">
                    <div class="w-16 h-16 rounded-2xl bg-emerald-50 dark:bg-white/5 text-emerald-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <iconify-icon icon="solar:users-group-two-rounded-bold" width="36"></iconify-icon>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Satu Data Bangkep</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 leading-relaxed">
                        Portal data terpadu yang menyediakan data sektoral akurat dan mutakhir untuk publik.
                    </p>
                    <a href="#" class="inline-flex items-center text-emerald-600 font-bold text-sm hover:underline">
                        Akses Layanan <iconify-icon icon="solar:arrow-right-linear" class="ml-1"></iconify-icon>
                    </a>
                </div>

                <!-- Service 3 -->
                <div class="p-8 bg-white dark:bg-dark-surface rounded-2xl shadow-lg border-2 border-transparent hover:border-amber-500/20 transition-all duration-300 group">
                    <div class="w-16 h-16 rounded-2xl bg-amber-50 dark:bg-white/5 text-amber-600 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <iconify-icon icon="solar:danger-triangle-bold" width="36"></iconify-icon>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Lapor Bangkep!</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm mb-6 leading-relaxed">
                        Layanan aspirasi dan pengaduan online rakyat untuk pengawasan pembangunan daerah.
                    </p>
                    <a href="#" class="inline-flex items-center text-amber-600 font-bold text-sm hover:underline">
                        Akses Layanan <iconify-icon icon="solar:arrow-right-linear" class="ml-1"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-landing-layout>
