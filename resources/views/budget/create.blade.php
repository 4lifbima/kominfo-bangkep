<x-app-layout>
    <x-slot:title>Tambah Data Anggaran</x-slot>

    <!-- Header -->
    <div class="flex items-center gap-4 animate-fade-up">
        <a href="{{ route('budget.index') }}" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-white/5 transition-colors">
            <iconify-icon icon="solar:arrow-left-linear" width="24"></iconify-icon>
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Tambah Data Anggaran</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Input data pagu dan realisasi anggaran baru.</p>
        </div>
    </div>

    <!-- Form Section -->
    <div class="glass-panel rounded-2xl p-6 shadow-glass animate-fade-up mt-6 max-w-3xl" style="animation-delay: 0.1s;">
        <form action="{{ route('budget.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <!-- Year -->
            <div>
                <label for="year" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Tahun Anggaran</label>
                <input type="number" name="year" id="year" value="{{ date('Y') }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
            </div>

            <!-- Budget & Realized -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="total_budget" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Pagu Anggaran (Rp)</label>
                    <input type="number" name="total_budget" id="total_budget" min="0" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" placeholder="Contoh: 1500000000" required>
                </div>
                <div>
                    <label for="realized" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Realisasi (Rp)</label>
                    <input type="number" name="realized" id="realized" min="0" value="0" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                </div>
            </div>

            <!-- Description -->
             <div>
                <label for="description" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Keterangan (Opsional)</label>
                <textarea name="description" id="description" rows="3" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" placeholder="Contoh: Anggaran DPA Perubahan"></textarea>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-white/5">
                <a href="{{ route('budget.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-300 dark:border-white/10 text-slate-700 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 transition-colors">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white text-sm font-medium hover:bg-primary-light transition-colors shadow-lg shadow-indigo-500/20">Simpan Data</button>
            </div>
        </form>
    </div>
</x-app-layout>
