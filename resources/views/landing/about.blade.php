<x-landing-layout>
    <!-- HEADER -->
    <section class="relative pt-32 pb-20 bg-slate-50 dark:bg-white/5 overflow-hidden">
        <div class="absolute inset-0 -z-10">
            <div class="absolute top-0 right-0 w-[400px] h-[400px] bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white mb-6">Tentang Kami</h1>
            <p class="text-lg text-slate-600 dark:text-slate-300 max-w-2xl mx-auto">
                Mengenal lebih dekat Dinas Komunikasi dan Informatika Kabupaten Banggai Kepulauan.
            </p>
        </div>
    </section>

    <!-- VISI MISI -->
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="absolute inset-0 bg-primary/10 rounded-3xl transform rotate-3"></div>
                    <img src="https://source.unsplash.com/random/800x600/?office,modern" alt="Office" class="relative rounded-3xl shadow-xl border-4 border-white dark:border-white/10 w-full object-cover h-[500px]">
                </div>
                <div>
                    <span class="text-primary font-bold tracking-wider uppercase text-xs mb-2 block">Visi & Misi</span>
                    <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-6">Mewujudkan Masyarakat Informasi yang Cerdas dan Sejahtera</h2>
                    
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center shrink-0">
                                <iconify-icon icon="solar:target-bold" width="24"></iconify-icon>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Visi</h3>
                                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">
                                    "Terwujudnya tata kelola pemerintahan yang baik melalui pemanfaatan teknologi informasi dan komunikasi yang terintegrasi."
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                <iconify-icon icon="solar:list-bold" width="24"></iconify-icon>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-2">Misi</h3>
                                <ul class="space-y-3 text-slate-600 dark:text-slate-400 text-sm">
                                    <li class="flex items-start gap-2">
                                        <iconify-icon icon="solar:check-circle-bold" class="mt-1 text-emerald-500 shrink-0"></iconify-icon>
                                        Meningkatkan kualitas infrastruktur TIK daerah.
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <iconify-icon icon="solar:check-circle-bold" class="mt-1 text-emerald-500 shrink-0"></iconify-icon>
                                        Mengembangkan sistem aplikasi layanan publik yang terintegrasi.
                                    </li>
                                    <li class="flex items-start gap-2">
                                        <iconify-icon icon="solar:check-circle-bold" class="mt-1 text-emerald-500 shrink-0"></iconify-icon>
                                        Meningkatkan kapasitas SDM aparatur dan masyarakat di bidang TIK.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-landing-layout>
