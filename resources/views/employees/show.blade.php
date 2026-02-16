<x-app-layout>
    <x-slot:title>Detail Pegawai</x-slot>

    <div class="mb-6 animate-fade-up">
        <a href="{{ route('employees.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-primary transition-colors mb-4">
            <iconify-icon icon="solar:arrow-left-linear"></iconify-icon>
            <span>Kembali</span>
        </a>
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white mb-1">Detail Pegawai</h2>
                <p class="text-slate-500 dark:text-slate-400 text-sm">Informasi lengkap data pegawai.</p>
            </div>
            <a href="{{ route('employees.edit', $employee->id) }}" class="flex items-center gap-2 px-4 py-2 bg-amber-50 text-amber-600 hover:bg-amber-100 rounded-lg font-medium transition-colors">
                <iconify-icon icon="solar:pen-new-square-linear"></iconify-icon>
                <span>Edit Data</span>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 animate-fade-up" style="animation-delay: 0.1s;">
        <!-- Left Column: Profile Card -->
        <div class="lg:col-span-1">
            <div class="glass-panel p-6 rounded-2xl shadow-glass flex flex-col items-center text-center">
                <div class="w-32 h-32 rounded-full overflow-hidden bg-slate-100 mb-4 border-4 border-white dark:border-white/10 shadow-lg">
                    @if($employee->avatar)
                        <img src="{{ asset('storage/' . $employee->avatar) }}" alt="{{ $employee->name }}" class="w-full h-full object-cover">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($employee->name) }}&background=random&size=128" alt="{{ $employee->name }}" class="w-full h-full object-cover">
                    @endif
                </div>
                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-1">{{ $employee->name }}</h3>
                <p class="text-primary font-medium mb-4">{{ $employee->position }}</p>
                
                <div class="flex flex-wrap justify-center gap-2 mb-6">
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-600 border border-blue-100">
                        {{ $employee->type }}
                    </span>
                    <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $employee->status == 'active' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-slate-50 text-slate-600 border-slate-100' }}">
                        {{ ucfirst($employee->status) }}
                    </span>
                </div>

                <div class="w-full border-t border-slate-100 dark:border-white/5 pt-6 mt-2">
                    <div class="grid grid-cols-2 gap-4 text-left">
                        <div>
                            <span class="text-xs text-slate-400 uppercase tracking-wider block mb-1">NIP / NIK</span>
                            <span class="text-sm font-semibold text-slate-700 dark:text-slate-300 break-words">{{ $employee->nip ?? '-' }}</span>
                        </div>
                        <div>
                            <span class="text-xs text-slate-400 uppercase tracking-wider block mb-1">Bergabung</span>
                            <span class="text-sm font-semibold text-slate-700 dark:text-slate-300">{{ $employee->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Media Side -->
            <div class="glass-panel p-6 rounded-2xl shadow-glass mt-6">
                <h4 class="font-bold text-slate-900 dark:text-white mb-4 flex items-center gap-2">
                    <iconify-icon icon="solar:smartphone-2-bold" class="text-primary"></iconify-icon>
                    Social Media
                </h4>
                @if(!empty($employee->social_media))
                    <ul class="space-y-3">
                        @foreach($employee->social_media as $platform => $url)
                            @if($url)
                            <li>
                                <a href="{{ $url }}" target="_blank" class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 dark:bg-white/5 hover:bg-slate-100 dark:hover:bg-white/10 transition-colors group">
                                    <div class="w-8 h-8 rounded-lg bg-white dark:bg-dark-bg flex items-center justify-center text-slate-500 group-hover:text-primary shadow-sm">
                                        <iconify-icon icon="ri:{{ strtolower($platform) }}-fill"></iconify-icon>
                                    </div>
                                    <span class="text-sm font-medium text-slate-700 dark:text-slate-300 capitalize">{{ $platform }}</span>
                                    <iconify-icon icon="solar:link-circle-linear" class="ml-auto text-slate-400"></iconify-icon>
                                </a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-slate-500 italic text-center py-4">Tidak ada data social media</p>
                @endif
            </div>
        </div>

        <!-- Right Column: Details -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Riwayat Jabatan -->
            <div class="glass-panel p-6 rounded-2xl shadow-glass">
                <h4 class="font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-2 pb-4 border-b border-slate-100 dark:border-white/5">
                    <iconify-icon icon="solar:case-round-bold" class="text-primary"></iconify-icon>
                    Riwayat Jabatan
                </h4>
                
                @if(!empty($employee->job_history) && is_array($employee->job_history))
                <div class="relative pl-4 border-l-2 border-slate-100 dark:border-white/10 space-y-8">
                    @foreach($employee->job_history as $job)
                    <div class="relative pl-6">
                        <div class="absolute -left-[21px] top-1 w-3 h-3 rounded-full bg-primary border-2 border-white dark:border-dark-surface ring-4 ring-primary/20"></div>
                        <h5 class="text-lg font-bold text-slate-800 dark:text-white mb-1">{{ $job['position'] ?? '-' }}</h5>
                        <p class="text-primary font-medium text-sm mb-2">{{ $job['institution'] ?? '-' }}</p>
                        <span class="inline-block px-2 py-1 rounded-md bg-slate-100 dark:bg-white/5 text-xs text-slate-500 font-medium">
                            {{ $job['year'] ?? '-' }}
                        </span>
                    </div>
                    @endforeach
                </div>
                @else
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3 text-slate-300">
                            <iconify-icon icon="solar:case-minimalistic-linear" width="32"></iconify-icon>
                        </div>
                        <p class="text-slate-500 text-sm">Belum ada data riwayat jabatan</p>
                    </div>
                @endif
            </div>

            <!-- Riwayat Pendidikan -->
            <div class="glass-panel p-6 rounded-2xl shadow-glass">
                <h4 class="font-bold text-slate-900 dark:text-white mb-6 flex items-center gap-2 pb-4 border-b border-slate-100 dark:border-white/5">
                    <iconify-icon icon="solar:mortarboard-bold" class="text-primary"></iconify-icon>
                    Riwayat Pendidikan
                </h4>

                @if(!empty($employee->education_history) && is_array($employee->education_history))
                <div class="space-y-4">
                    @foreach($employee->education_history as $edu)
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-slate-50 dark:bg-white/5 hover:bg-slate-100 transition-colors">
                        <div class="w-12 h-12 rounded-lg bg-white dark:bg-dark-bg flex items-center justify-center text-primary shadow-sm shrink-0">
                            <iconify-icon icon="solar:diploma-verified-bold-duotone" width="24"></iconify-icon>
                        </div>
                        <div>
                            <h5 class="font-bold text-slate-800 dark:text-white">{{ $edu['school'] ?? '-' }}</h5>
                            <p class="text-sm text-slate-600 dark:text-slate-400 mb-1">{{ $edu['degree'] ?? '-' }}</p>
                            <span class="text-xs text-slate-400 font-medium">{{ $edu['year'] ?? '-' }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                    <div class="text-center py-8">
                        <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3 text-slate-300">
                            <iconify-icon icon="solar:book-2-linear" width="32"></iconify-icon>
                        </div>
                        <p class="text-slate-500 text-sm">Belum ada data riwayat pendidikan</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
