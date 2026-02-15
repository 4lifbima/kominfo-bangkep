<x-app-layout>
    <x-slot:title>Edit Data Anggaran</x-slot>

    <!-- Header -->
    <div class="flex items-center gap-4 animate-fade-up">
        <a href="{{ route('budget.index') }}" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-white/5 transition-colors">
            <iconify-icon icon="solar:arrow-left-linear" width="24"></iconify-icon>
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Edit Data Anggaran</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Perbarui data pagu dan realisasi anggaran.</p>
        </div>
    </div>

    <!-- Form Section -->
    <div class="glass-panel rounded-2xl p-6 shadow-glass animate-fade-up mt-6 max-w-3xl" style="animation-delay: 0.1s;">
        <form action="{{ route('budget.update', $budget->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Year -->
            <div>
                <label for="year" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Tahun Anggaran</label>
                <input type="number" name="year" id="year" value="{{ old('year', $budget->year) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
            </div>

            <!-- Budget & Realized -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="total_budget" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Pagu Anggaran (Rp)</label>
                    <input type="number" name="total_budget" id="total_budget" min="0" value="{{ old('total_budget', $budget->total_budget) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                </div>
                <div>
                    <label for="realized" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Realisasi (Rp)</label>
                    <input type="number" name="realized" id="realized" min="0" value="{{ old('realized', $budget->realized) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                </div>
            </div>

            <!-- Description -->
             <div>
                <label for="description" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Keterangan (Opsional)</label>
                <textarea name="description" id="description" rows="3" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5">{{ old('description', $budget->description) }}</textarea>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-white/5">
                <a href="{{ route('budget.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-300 dark:border-white/10 text-slate-700 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 transition-colors">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white text-sm font-medium hover:bg-primary-light transition-colors shadow-lg shadow-indigo-500/20">Perbarui Data</button>
            </div>
        </form>
    </div>
</x-app-layout>
