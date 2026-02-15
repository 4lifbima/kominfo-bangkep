<x-app-layout>
    <x-slot:title>Edit Infrastruktur</x-slot>

    <!-- Header -->
    <div class="flex items-center gap-4 animate-fade-up">
        <a href="{{ route('infrastructure.index') }}" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-white/5 transition-colors">
            <iconify-icon icon="solar:arrow-left-linear" width="24"></iconify-icon>
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Edit Data Infrastruktur</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Perbarui informasi aset infrastruktur TIK.</p>
        </div>
    </div>

    <!-- Form Section -->
    <div class="glass-panel rounded-2xl p-6 shadow-glass animate-fade-up mt-6 max-w-3xl" style="animation-delay: 0.1s;">
        <form action="{{ route('infrastructure.update', $infrastructure->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nama Aset / Infrastruktur</label>
                <input type="text" name="name" id="name" value="{{ old('name', $infrastructure->name) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Type & Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Tipe Infrastruktur</label>
                    <select name="type" id="type" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5">
                        <option value="Tower" {{ $infrastructure->type == 'Tower' ? 'selected' : '' }}>Tower / BTS</option>
                        <option value="Server" {{ $infrastructure->type == 'Server' ? 'selected' : '' }}>Server Fisik</option>
                        <option value="Fiber Optic" {{ $infrastructure->type == 'Fiber Optic' ? 'selected' : '' }}>Jaringan Fiber Optic</option>
                        <option value="Router" {{ $infrastructure->type == 'Router' ? 'selected' : '' }}>Perangkat Jaringan (Router/Switch)</option>
                        <option value="CCTV" {{ $infrastructure->type == 'CCTV' ? 'selected' : '' }}>CCTV Publlik</option>
                        <option value="Other" {{ $infrastructure->type == 'Other' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Status Operasional</label>
                    <select name="status" id="status" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5">
                        <option value="Active" {{ $infrastructure->status == 'Active' ? 'selected' : '' }}>Active (Beroperasi Normal)</option>
                        <option value="Maintenance" {{ $infrastructure->status == 'Maintenance' ? 'selected' : '' }}>Maintenance (Perbaikan)</option>
                        <option value="Down" {{ $infrastructure->status == 'Down' ? 'selected' : '' }}>Down (Rusak/Mati)</option>
                    </select>
                </div>
            </div>

            <!-- Location & Capacity -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="location" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Lokasi Aset</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $infrastructure->location) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                </div>
                <div>
                    <label for="capacity" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Kapsitas / Spesifikasi (Opsional)</label>
                    <input type="text" name="capacity" id="capacity" value="{{ old('capacity', $infrastructure->capacity) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5">
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-white/5">
                <a href="{{ route('infrastructure.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-300 dark:border-white/10 text-slate-700 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 transition-colors">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white text-sm font-medium hover:bg-primary-light transition-colors shadow-lg shadow-indigo-500/20">Perbarui Data</button>
            </div>
        </form>
    </div>
</x-app-layout>
