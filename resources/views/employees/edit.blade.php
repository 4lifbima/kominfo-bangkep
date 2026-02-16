<x-app-layout>
    <x-slot:title>Edit Pegawai</x-slot>

    <div class="mb-6 animate-fade-up">
        <a href="{{ route('employees.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-primary transition-colors mb-4">
            <iconify-icon icon="solar:arrow-left-linear"></iconify-icon>
            <span>Kembali</span>
        </a>
        <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Edit Data Pegawai</h2>
    </div>

    <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-8 animate-fade-up" style="animation-delay: 0.1s;">
        @csrf
        @method('PUT')
        
        <!-- Left Column: Basic Info & Avatar -->
        <div class="lg:col-span-1 space-y-6">
            <div class="glass-panel p-6 rounded-2xl shadow-glass">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Informasi Dasar</h3>
                
                <!-- Avatar Upload -->
                <div class="mb-6 text-center">
                    <div class="relative w-32 h-32 mx-auto mb-4">
                        <img id="avatarPreview" src="{{ $employee->avatar ? asset('storage/' . $employee->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($employee->name).'&background=random' }}" class="w-full h-full rounded-full object-cover border-4 border-slate-100 dark:border-white/10">
                        <label for="avatar" class="absolute bottom-0 right-0 w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center cursor-pointer hover:bg-blue-600 transition-colors shadow-lg">
                            <iconify-icon icon="solar:camera-minimalistic-bold" width="16"></iconify-icon>
                        </label>
                        <input type="file" name="avatar" id="avatar" class="hidden" accept="image/*" onchange="previewImage(this)">
                    </div>
                </div>

                <!-- Basic Fields -->
                <div class="space-y-4">
                    <div>
                        <x-input-label for="name" value="Nama Lengkap" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $employee->name)" required />
                        @error('name') <x-input-error class="mt-2" :messages="$message" /> @enderror
                    </div>
                    
                    <div>
                        <x-input-label for="nip" value="NIP / NIK" />
                        <x-text-input id="nip" name="nip" type="text" class="mt-1 block w-full" :value="old('nip', $employee->nip)" />
                        @error('nip') <x-input-error class="mt-2" :messages="$message" /> @enderror
                    </div>

                    <div>
                        <x-input-label for="position" value="Jabatan" />
                        <x-text-input id="position" name="position" type="text" class="mt-1 block w-full" :value="old('position', $employee->position)" required />
                        @error('position') <x-input-error class="mt-2" :messages="$message" /> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="employee_type" value="Jenis Kepegawaian" />
                            <select name="employee_type" id="employee_type" class="mt-1 block w-full border-slate-300 dark:border-white/10 dark:bg-dark-surface dark:text-slate-300 focus:border-primary focus:ring-primary rounded-md shadow-sm">
                                <option value="PNS" {{ $employee->type == 'PNS' ? 'selected' : '' }}>PNS</option>
                                <option value="PPPK" {{ $employee->type == 'PPPK' ? 'selected' : '' }}>PPPK</option>
                                <option value="Honorer" {{ $employee->type == 'Honorer' ? 'selected' : '' }}>Honorer</option>
                                <option value="Kontrak" {{ $employee->type == 'Kontrak' ? 'selected' : '' }}>Kontrak</option>
                            </select>
                            @error('employee_type') <x-input-error class="mt-2" :messages="$message" /> @enderror
                        </div>
                        <div>
                            <x-input-label for="status" value="Status" />
                            <select name="status" id="status" class="mt-1 block w-full border-slate-300 dark:border-white/10 dark:bg-dark-surface dark:text-slate-300 focus:border-primary focus:ring-primary rounded-md shadow-sm">
                                <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                             @error('status') <x-input-error class="mt-2" :messages="$message" /> @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media -->
            <div class="glass-panel p-6 rounded-2xl shadow-glass">
                <h3 class="text-lg font-semibold text-slate-900 dark:text-white mb-4">Social Media</h3>
                @php $social = $employee->social_media ?? []; @endphp
                <div class="space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="w-8 flex justify-center"><iconify-icon icon="ri:facebook-fill" class="text-blue-600 text-xl"></iconify-icon></div>
                        <x-text-input name="social_media[facebook]" type="url" class="block w-full text-sm" :value="$social['facebook'] ?? ''" placeholder="URL Facebook" />
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 flex justify-center"><iconify-icon icon="ri:instagram-fill" class="text-pink-600 text-xl"></iconify-icon></div>
                        <x-text-input name="social_media[instagram]" type="url" class="block w-full text-sm" :value="$social['instagram'] ?? ''" placeholder="URL Instagram" />
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 flex justify-center"><iconify-icon icon="ri:twitter-x-fill" class="text-slate-800 dark:text-white text-xl"></iconify-icon></div>
                        <x-text-input name="social_media[twitter]" type="url" class="block w-full text-sm" :value="$social['twitter'] ?? ''" placeholder="URL Twitter/X" />
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-8 flex justify-center"><iconify-icon icon="ri:linkedin-fill" class="text-blue-700 text-xl"></iconify-icon></div>
                        <x-text-input name="social_media[linkedin]" type="url" class="block w-full text-sm" :value="$social['linkedin'] ?? ''" placeholder="URL LinkedIn" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: History & Details -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Riwayat Jabatan (Repeater) -->
            <div class="glass-panel p-6 rounded-2xl shadow-glass" x-data="{ jobs: {{ !empty($employee->job_history) ? json_encode($employee->job_history) : '[{position: \'\', institution: \'\', year: \'\'}]' }} }">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Riwayat Jabatan</h3>
                    <button type="button" @click="jobs.push({position: '', institution: '', year: ''})" class="text-sm text-primary font-bold hover:underline flex items-center gap-1">
                        <iconify-icon icon="solar:add-circle-bold"></iconify-icon> Tambah
                    </button>
                </div>
                
                <div class="space-y-4">
                    <template x-for="(job, index) in jobs" :key="index">
                        <div class="grid grid-cols-1 md:grid-cols-7 gap-3 items-end p-4 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/5 relative group">
                            <div class="md:col-span-3">
                                <label class="text-xs text-slate-500 block mb-1">Jabatan</label>
                                <input type="text" :name="`job_history[${index}][position]`" x-model="job.position" class="block w-full rounded-md border-slate-300 dark:border-white/10 dark:bg-dark-bg text-sm focus:border-primary focus:ring-primary">
                            </div>
                            <div class="md:col-span-2">
                                <label class="text-xs text-slate-500 block mb-1">Instansi</label>
                                <input type="text" :name="`job_history[${index}][institution]`" x-model="job.institution" class="block w-full rounded-md border-slate-300 dark:border-white/10 dark:bg-dark-bg text-sm focus:border-primary focus:ring-primary">
                            </div>
                            <div class="md:col-span-2 relative">
                                <label class="text-xs text-slate-500 block mb-1">Tahun</label>
                                <input type="text" :name="`job_history[${index}][year]`" x-model="job.year" class="block w-full rounded-md border-slate-300 dark:border-white/10 dark:bg-dark-bg text-sm focus:border-primary focus:ring-primary">
                                
                                <button type="button" @click="jobs.splice(index, 1)" class="absolute -top-3 -right-3 w-6 h-6 bg-red-100 text-red-500 rounded-full flex items-center justify-center hover:bg-red-200 transition-colors" x-show="jobs.length > 0">
                                    <iconify-icon icon="solar:close-circle-bold"></iconify-icon>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Riwayat Pendidikan (Repeater) -->
            <div class="glass-panel p-6 rounded-2xl shadow-glass" x-data="{ edus: {{ !empty($employee->education_history) ? json_encode($employee->education_history) : '[{school: \'\', degree: \'\', year: \'\'}]' }} }">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-slate-900 dark:text-white">Riwayat Pendidikan</h3>
                    <button type="button" @click="edus.push({school: '', degree: '', year: ''})" class="text-sm text-primary font-bold hover:underline flex items-center gap-1">
                        <iconify-icon icon="solar:add-circle-bold"></iconify-icon> Tambah
                    </button>
                </div>
                
                <div class="space-y-4">
                    <template x-for="(edu, index) in edus" :key="index">
                        <div class="grid grid-cols-1 md:grid-cols-7 gap-3 items-end p-4 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/5 relative group">
                            <div class="md:col-span-3">
                                <label class="text-xs text-slate-500 block mb-1">Nama Sekolah / Kampus</label>
                                <input type="text" :name="`education_history[${index}][school]`" x-model="edu.school" class="block w-full rounded-md border-slate-300 dark:border-white/10 dark:bg-dark-bg text-sm focus:border-primary focus:ring-primary">
                            </div>
                            <div class="md:col-span-2">
                                <label class="text-xs text-slate-500 block mb-1">Jurusan / Gelar</label>
                                <input type="text" :name="`education_history[${index}][degree]`" x-model="edu.degree" class="block w-full rounded-md border-slate-300 dark:border-white/10 dark:bg-dark-bg text-sm focus:border-primary focus:ring-primary">
                            </div>
                            <div class="md:col-span-2 relative">
                                <label class="text-xs text-slate-500 block mb-1">Tahun</label>
                                <input type="text" :name="`education_history[${index}][year]`" x-model="edu.year" class="block w-full rounded-md border-slate-300 dark:border-white/10 dark:bg-dark-bg text-sm focus:border-primary focus:ring-primary">
                                
                                <button type="button" @click="edus.splice(index, 1)" class="absolute -top-3 -right-3 w-6 h-6 bg-red-100 text-red-500 rounded-full flex items-center justify-center hover:bg-red-200 transition-colors" x-show="edus.length > 0">
                                    <iconify-icon icon="solar:close-circle-bold"></iconify-icon>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end gap-4 pt-6">
                <a href="{{ route('employees.index') }}" class="px-6 py-2.5 rounded-lg border border-slate-300 text-slate-700 hover:bg-slate-50 font-medium transition-colors">Batal</a>
                <button type="submit" class="px-6 py-2.5 rounded-lg bg-primary text-white font-bold hover:bg-blue-700 transition-colors shadow-lg shadow-blue-500/30">
                    Update Data
                </button>
            </div>

        </div>
    </form>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('avatarPreview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</x-app-layout>
