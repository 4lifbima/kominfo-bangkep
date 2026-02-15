<x-app-layout>
    <x-slot:title>Edit Data Statistik</x-slot>

    <!-- Header -->
    <div class="flex items-center gap-4 animate-fade-up">
        <a href="{{ route('statistics.index') }}" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-white/5 transition-colors">
            <iconify-icon icon="solar:arrow-left-linear" width="24"></iconify-icon>
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Edit Data Statistik</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Perbarui data statistik atau indikator kinerja.</p>
        </div>
    </div>

    <!-- Form Section -->
    <div class="glass-panel rounded-2xl p-6 shadow-glass animate-fade-up mt-6 max-w-3xl" style="animation-delay: 0.1s;">
        <form action="{{ route('statistics.update', $statistic->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Label -->
            <div>
                <label for="label" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Label Indikator</label>
                <input type="text" name="label" id="label" value="{{ old('label', $statistic->label) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                @error('label') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Value & Unit -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="value" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nilai</label>
                    <input type="text" name="value" id="value" value="{{ old('value', $statistic->value) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                </div>
                <div>
                    <label for="unit" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Satuan (Opsional)</label>
                    <input type="text" name="unit" id="unit" value="{{ old('unit', $statistic->unit) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5">
                </div>
            </div>

            <!-- Year & Category -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="year" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Tahun Data</label>
                    <input type="number" name="year" id="year" value="{{ old('year', $statistic->year) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Kategori</label>
                    <select name="category" id="category" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5">
                        <option value="IKU" {{ $statistic->category == 'IKU' ? 'selected' : '' }}>Indikator Kinerja Utama (IKU)</option>
                        <option value="Infrastruktur" {{ $statistic->category == 'Infrastruktur' ? 'selected' : '' }}>Data Infrastruktur</option>
                        <option value="Kependudukan" {{ $statistic->category == 'Kependudukan' ? 'selected' : '' }}>Kependudukan</option>
                        <option value="Anggaran" {{ $statistic->category == 'Anggaran' ? 'selected' : '' }}>Keuangan & Anggaran</option>
                        <option value="Lainnya" {{ $statistic->category == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-white/5">
                <a href="{{ route('statistics.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-300 dark:border-white/10 text-slate-700 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 transition-colors">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white text-sm font-medium hover:bg-primary-light transition-colors shadow-lg shadow-indigo-500/20">Perbarui Data</button>
            </div>
        </form>
    </div>
</x-app-layout>
