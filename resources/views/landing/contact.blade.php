<x-landing-layout>
    <section class="relative pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <span class="text-primary font-bold tracking-wider uppercase text-xs mb-2 block">Hubungi Kami</span>
                    <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white mb-6">Kami Siap Membantu Anda</h1>
                    <p class="text-lg text-slate-600 dark:text-slate-300 mb-10">
                        Silakan hubungi kami melalui formulir di samping atau kunjungi kantor kami pada jam kerja.
                    </p>

                    <div class="space-y-8">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center shrink-0">
                                <iconify-icon icon="solar:map-point-bold" width="24"></iconify-icon>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Alamat Kantor</h3>
                                <p class="text-slate-600 dark:text-slate-400">
                                    Jl. Bukit Trikora No. 1, Salakan<br>
                                    Kabupaten Banggai Kepulauan<br>
                                    Sulawesi Tengah, 94885
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center shrink-0">
                                <iconify-icon icon="solar:phone-calling-bold" width="24"></iconify-icon>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Telepon & Email</h3>
                                <p class="text-slate-600 dark:text-slate-400">
                                    (0462) 21xxx<br>
                                    diskominfo@bangkepkab.go.id
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-xl bg-primary/10 text-primary flex items-center justify-center shrink-0">
                                <iconify-icon icon="solar:clock-circle-bold" width="24"></iconify-icon>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Jam Operasional</h3>
                                <p class="text-slate-600 dark:text-slate-400">
                                    Senin - Jumat: 08:00 - 16:00 WITA<br>
                                    Sabtu - Minggu: Tutup
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-dark-surface rounded-3xl shadow-xl p-8 border border-slate-100 dark:border-white/5">
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white mb-6">Kirim Pesan</h3>
                    <form class="space-y-5">
                        <div class="grid grid-cols-2 gap-5">
                            <div class="space-y-1.5">
                                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Nama Depan</label>
                                <input type="text" class="block w-full px-4 py-3 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            </div>
                            <div class="space-y-1.5">
                                <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Nama Belakang</label>
                                <input type="text" class="block w-full px-4 py-3 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            </div>
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Email</label>
                            <input type="email" class="block w-full px-4 py-3 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        </div>
                        <div class="space-y-1.5">
                            <label class="text-sm font-medium text-slate-700 dark:text-slate-300">Pesan</label>
                            <textarea rows="4" class="block w-full px-4 py-3 bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-xl text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"></textarea>
                        </div>
                        <button type="submit" class="w-full py-3.5 px-4 text-white font-bold bg-primary rounded-xl shadow-lg shadow-primary/20 hover:bg-primary-light transition-all transform hover:-translate-y-1">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-landing-layout>
