<x-app-layout>
    <x-slot:title>Edit Program Kerja</x-slot>

    <!-- Header -->
    <div class="flex items-center gap-4 animate-fade-up">
        <a href="{{ route('programs.index') }}" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-white/5 transition-colors">
            <iconify-icon icon="solar:arrow-left-linear" width="24"></iconify-icon>
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Edit Program Kerja</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Perbarui data program kerja dan progress.</p>
        </div>
    </div>

    <!-- Form Section -->
    <div class="glass-panel rounded-2xl p-6 shadow-glass animate-fade-up mt-6 max-w-3xl" style="animation-delay: 0.1s;">
        <form action="{{ route('programs.update', $program->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nama Program / Kegiatan</label>
                <input type="text" name="name" id="name" value="{{ old('name', $program->name) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Description -->
             <div>
                <label for="description" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Deskripsi & Target</label>
                <textarea name="description" id="description" rows="3" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5">{{ old('description', $program->description) }}</textarea>
            </div>

            <!-- Progress & Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="progress" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Progress (%)</label>
                    <div class="flex items-center gap-3">
                        <input type="number" name="progress" id="progress" min="0" max="100" value="{{ old('progress', $program->progress) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                        <span class="text-slate-500">%</span>
                    </div>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Status Pelaksanaan</label>
                    <select name="status" id="status" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5">
                        <option value="Planned" {{ $program->status == 'Planned' ? 'selected' : '' }}>Planned (Perencanaan)</option>
                        <option value="On Progress" {{ $program->status == 'On Progress' ? 'selected' : '' }}>On Progress (Sedang Berjalan)</option>
                        <option value="Completed" {{ $program->status == 'Completed' ? 'selected' : '' }}>Completed (Selesai)</option>
                    </select>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-white/5">
                <a href="{{ route('programs.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-300 dark:border-white/10 text-slate-700 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 transition-colors">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white text-sm font-medium hover:bg-primary-light transition-colors shadow-lg shadow-indigo-500/20">Perbarui Data</button>
            </div>
        </form>
    </div>
</x-app-layout>
