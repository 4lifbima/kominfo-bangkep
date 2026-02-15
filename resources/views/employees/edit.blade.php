<x-app-layout>
    <x-slot:title>Edit Data Pegawai</x-slot>

    <!-- Header -->
    <div class="flex items-center gap-4 animate-fade-up">
        <a href="{{ route('employees.index') }}" class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-white/5 transition-colors">
            <iconify-icon icon="solar:arrow-left-linear" width="24"></iconify-icon>
        </a>
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Edit Pegawai</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Perbarui data pegawai.</p>
        </div>
    </div>

    <!-- Form Section -->
    <div class="glass-panel rounded-2xl p-6 shadow-glass animate-fade-up mt-6 max-w-3xl" style="animation-delay: 0.1s;">
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <!-- Avatar Upload -->
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Foto Profil</label>
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 rounded-full bg-slate-100 dark:bg-white/10 flex items-center justify-center text-slate-400 overflow-hidden border border-slate-200 dark:border-white/10" id="avatarPreview">
                        @if($employee->avatar)
                            <img src="{{ asset('storage/' . $employee->avatar) }}" class="w-full h-full object-cover">
                        @else
                            <iconify-icon icon="solar:user-bold" width="32"></iconify-icon>
                        @endif
                    </div>
                    <div>
                        <input type="file" name="avatar" id="avatar" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20" accept="image/*" onchange="previewImage(this)">
                        <p class="text-xs text-slate-500 mt-1">PNG, JPG, JPEG (Max. 2MB)</p>
                    </div>
                </div>
                @error('avatar') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Name & NIP -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Nama Lengkap</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $employee->name) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                    @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label for="nip" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">NIP (Opsional)</label>
                    <input type="text" name="nip" id="nip" value="{{ old('nip', $employee->nip) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5">
                </div>
            </div>

            <!-- Position & Status -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="position" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Jabatan</label>
                    <input type="text" name="position" id="position" value="{{ old('position', $employee->position) }}" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5" required>
                </div>
                 <div>
                    <label for="type" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Jenis Pegawai</label>
                    <select name="type" id="type" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5">
                        <option value="PNS" {{ $employee->type == 'PNS' ? 'selected' : '' }}>PNS</option>
                        <option value="PPPK" {{ $employee->type == 'PPPK' ? 'selected' : '' }}>PPPK</option>
                        <option value="Honorer" {{ $employee->type == 'Honorer' ? 'selected' : '' }}>Honorer / Kontrak</option>
                        <option value="Magang" {{ $employee->type == 'Magang' ? 'selected' : '' }}>Magang</option>
                    </select>
                </div>
            </div>

             <div>
                <label for="status" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Status Kepegawaian</label>
                <select name="status" id="status" class="w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20 p-2.5">
                    <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active (Aktif bekerja)</option>
                    <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive (Cuti/Keluar/Pensiun)</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100 dark:border-white/5">
                <a href="{{ route('employees.index') }}" class="px-5 py-2.5 rounded-lg border border-slate-300 dark:border-white/10 text-slate-700 dark:text-slate-300 text-sm font-medium hover:bg-slate-50 transition-colors">Batal</a>
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white text-sm font-medium hover:bg-primary-light transition-colors shadow-lg shadow-indigo-500/20">Perbarui Data</button>
            </div>
        </form>
    </div>

    @push('scripts')
    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#avatarPreview').html('<img src="' + e.target.result + '" class="w-full h-full object-cover">');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @endpush
</x-app-layout>
