<x-landing-layout>
    <!-- Header Section -->
    <section class="relative py-16 bg-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-2">Profil Pejabat</h1>
            <div class="flex items-center justify-center gap-2 text-sm text-blue-100">
                <a href="{{ route('landing') }}" class="hover:text-white transition-colors">Beranda</a>
                <span>/</span>
                <a href="{{ route('landing.pejabat') }}" class="hover:text-white transition-colors">Pejabat</a>
                <span>/</span>
                <span class="text-white font-medium truncate">{{ $employee->name }}</span>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 md:py-20 bg-slate-50 dark:bg-dark-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-3 gap-12 items-start">
                
                <!-- Left Column: Photo & Basic Info -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-dark-surface rounded-2xl shadow-lg border border-slate-100 dark:border-white/5 overflow-hidden sticky top-24">
                        <div class="aspect-[3/4] bg-slate-200">
                            @if($employee->avatar)
                                <img src="{{ asset('storage/' . $employee->avatar) }}" alt="{{ $employee->name }}" class="w-full h-full object-cover">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($employee->name) }}&background=2c04b3&color=fff&size=512" alt="{{ $employee->name }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="p-6 text-center">
                            <h2 class="text-xl font-bold text-slate-900 dark:text-white mb-1">{{ $employee->name }}</h2>
                            <p class="text-primary font-medium mb-4">{{ $employee->position }}</p>
                            
                            @if($employee->nip && $employee->nip !== '-')
                            <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-100 dark:bg-white/5 rounded-full text-xs font-semibold text-slate-600 dark:text-slate-400 mb-6">
                                <iconify-icon icon="solar:card-id-linear"></iconify-icon>
                                <span>NIP. {{ $employee->nip }}</span>
                            </div>
                            @endif

                            <div class="flex justify-center gap-3">
                                @if(!empty($employee->social_media))
                                    @if(isset($employee->social_media['facebook']))
                                    <a href="{{ $employee->social_media['facebook'] }}" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-500 hover:bg-blue-600 hover:text-white transition-all">
                                        <iconify-icon icon="ri:facebook-fill" width="20"></iconify-icon>
                                    </a>
                                    @endif
                                    @if(isset($employee->social_media['twitter']))
                                    <a href="{{ $employee->social_media['twitter'] }}" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-500 hover:bg-sky-500 hover:text-white transition-all">
                                        <iconify-icon icon="ri:twitter-x-fill" width="18"></iconify-icon>
                                    </a>
                                    @endif
                                    @if(isset($employee->social_media['linkedin']))
                                    <a href="{{ $employee->social_media['linkedin'] }}" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-500 hover:bg-blue-700 hover:text-white transition-all">
                                        <iconify-icon icon="ri:linkedin-fill" width="20"></iconify-icon>
                                    </a>
                                    @endif
                                    @if(isset($employee->social_media['instagram']))
                                    <a href="{{ $employee->social_media['instagram'] }}" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center text-slate-500 hover:bg-pink-600 hover:text-white transition-all">
                                        <iconify-icon icon="ri:instagram-fill" width="20"></iconify-icon>
                                    </a>
                                    @endif
                                @else
                                    <span class="text-xs text-slate-400 italic">Sosial media tidak tersedia</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Detailed Info -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Biodata / Profile -->
                    <div class="bg-white dark:bg-dark-surface rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 p-8">
                        <div class="flex items-center gap-3 mb-6">
                             <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                                <iconify-icon icon="solar:user-bold" width="24"></iconify-icon>
                             </div>
                             <h3 class="text-xl font-bold text-slate-900 dark:text-white">Tentang Pejabat</h3>
                        </div>
                        <div class="prose prose-slate dark:prose-invert max-w-none text-slate-600 dark:text-slate-400 leading-relaxed">
                            <p>
                                {{ $employee->name }} saat ini menjabat sebagai {{ $employee->position }} di Dinas Komunikasi dan Informatika Kabupaten Banggai Kepulauan. Beliau bertanggung jawab dalam mengelola dan memimpin pelaksanaan tugas di bidang teknologi informasi dan komunikasi pemerintahan.
                            </p>
                            <p>
                                Berdedikasi tinggi dalam mewujudkan pemerintahan yang transparan dan akuntabel melalui pemanfaatan teknologi digital. Memiliki visi untuk meningkatkan kualitas layanan publik berbasis elektronik di Kabupaten Banggai Kepulauan.
                            </p>
                        </div>
                    </div>

                    <!-- Riwayat Pendidikan -->
                    <div class="bg-white dark:bg-dark-surface rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 p-8">
                        <div class="flex items-center gap-3 mb-6">
                             <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                                <iconify-icon icon="solar:mortarboard-bold" width="24"></iconify-icon>
                             </div>
                             <h3 class="text-xl font-bold text-slate-900 dark:text-white">Riwayat Pendidikan</h3>
                        </div>
                        <ul class="space-y-6">
                            @if(!empty($employee->education_history))
                                @foreach($employee->education_history as $edu)
                                <li class="relative pl-8 border-l-2 border-slate-100 dark:border-white/10 pb-6 last:border-0 last:pb-0">
                                    <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-primary border-4 border-white dark:border-dark-surface"></div>
                                    <h4 class="text-lg font-bold text-slate-800 dark:text-white">{{ $edu['school'] }}</h4>
                                    <span class="text-sm text-slate-500 font-medium mb-2 block">{{ $edu['year'] }}</span>
                                    <p class="text-slate-600 dark:text-slate-400">{{ $edu['degree'] }}</p>
                                </li>
                                @endforeach
                            @else
                                <p class="text-slate-500 italic">Data pendidikan belum tersedia.</p>
                            @endif
                        </ul>
                    </div>

                    <!-- Riwayat Jabatan -->
                    <div class="bg-white dark:bg-dark-surface rounded-2xl shadow-sm border border-slate-100 dark:border-white/5 p-8">
                        <div class="flex items-center gap-3 mb-6">
                             <div class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center text-primary">
                                <iconify-icon icon="solar:case-round-bold" width="24"></iconify-icon>
                             </div>
                             <h3 class="text-xl font-bold text-slate-900 dark:text-white">Riwayat Jabatan</h3>
                        </div>
                        <div class="space-y-4">
                            @if(!empty($employee->job_history))
                                @foreach($employee->job_history as $job)
                                <div class="flex gap-4 p-4 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/5 {{ $loop->first ? '' : 'opacity-70' }}">
                                    <div class="shrink-0 mt-1">
                                        <iconify-icon icon="{{ $loop->first ? 'solar:medal-ribbons-star-bold' : 'solar:medal-ribbons-star-linear' }}" class="{{ $loop->first ? 'text-primary' : 'text-slate-400' }}" width="24"></iconify-icon>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-slate-900 dark:text-white">{{ $job['position'] }}</h4>
                                        <p class="text-sm text-slate-500 mb-1">{{ $job['institution'] }} • {{ $job['year'] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            @else
                                <p class="text-slate-500 italic">Data jabatan belum tersedia.</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-landing-layout>
