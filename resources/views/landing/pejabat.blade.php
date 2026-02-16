<x-landing-layout>
    <!-- Header Section (Geometric Blue Background) -->
    <section class="relative bg-[#0F172A] pt-32 pb-20 overflow-hidden">
        <!-- Geometric Shapes -->
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-primary/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-blue-600/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>
        <div class="absolute top-20 left-20 w-32 h-32 border-4 border-white/5 rounded-full pointer-events-none"></div>
        <div class="absolute bottom-20 right-20 w-24 h-24 border-4 border-white/5 rounded-full pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-6 animate-fade-up tracking-tight">DAFTAR PEJABAT</h1>
            <div class="w-24 h-1.5 bg-blue-500 mb-6 animate-fade-up"></div>
            <p class="text-blue-100 max-w-3xl text-lg leading-relaxed animate-fade-up" style="animation-delay: 0.1s">
                Berikut adalah daftar pejabat struktural dan fungsional di Dinas Komunikasi dan Informatika Kabupaten Banggai Kepulauan yang berdedikasi melayani masyarakat.
            </p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 md:py-24 bg-white dark:bg-dark-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24">
            
            <!-- 1. KEPALA DINAS (Highlight) -->
            <div>
                <h3 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white mb-8 border-l-4 border-primary pl-4">Kepala Dinas Menjabat :</h3>
                
                @if($kadis)
                <div class="bg-slate-50 dark:bg-dark-surface rounded-3xl p-6 md:p-10 border border-slate-100 dark:border-white/5 flex flex-col md:flex-row gap-8 items-center md:items-start group hover:shadow-xl transition-shadow duration-300">
                    <!-- Photo -->
                    <div class="shrink-0 w-full md:w-[350px] lg:w-[400px]">
                        <div class="aspect-[4/5] rounded-2xl overflow-hidden bg-slate-200 relative shadow-md">
                            @if($kadis->avatar)
                                <img src="{{ asset('storage/' . $kadis->avatar) }}" alt="{{ $kadis->name }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                            @else
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($kadis->name) }}&background=2c04b3&color=fff&size=512" alt="{{ $kadis->name }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                    </div>

                    <!-- Info -->
                    <div class="flex-1 flex flex-col justify-center py-4">
                        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 dark:text-white mb-2 uppercase tracking-tight">{{ $kadis->name }}</h2>
                        <span class="text-lg text-primary font-bold mb-6 block">{{ $kadis->position }}</span>
                        
                        <div class="space-y-4 mb-8">
                             <div>
                                <span class="text-xs font-bold text-primary uppercase tracking-wider block mb-1">Status Kepegawaian</span>
                                <span class="text-slate-700 dark:text-slate-300 font-medium">{{ $kadis->type }}</span>
                            </div>
                            @if($kadis->nip)
                            <div>
                                <span class="text-xs font-bold text-primary uppercase tracking-wider block mb-1">NIP</span>
                                <span class="text-slate-700 dark:text-slate-300 font-medium">{{ $kadis->nip }}</span>
                            </div>
                            @endif
                            <div>
                                <span class="text-xs font-bold text-primary uppercase tracking-wider block mb-1">Masa Jabatan</span>
                                <span class="text-slate-700 dark:text-slate-300 font-medium">Sekarang</span>
                            </div>
                        </div>

                        <a href="{{ route('landing.pejabat.detail', \Illuminate\Support\Str::slug($kadis->name)) }}" class="inline-flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all hover:text-blue-700">
                            <iconify-icon icon="solar:info-circle-bold" width="20"></iconify-icon>
                            Selengkapnya
                        </a>
                    </div>
                </div>
                @else
                <!-- Dummy Kadis if None -->
                <div class="bg-slate-50 dark:bg-dark-surface rounded-3xl p-6 md:p-10 border border-slate-100 dark:border-white/5 flex flex-col md:flex-row gap-8 items-center md:items-start">
                    <div class="shrink-0 w-full md:w-[350px]">
                        <div class="aspect-[4/5] rounded-2xl overflow-hidden bg-slate-200">
                             <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?q=80&w=1000&auto=format&fit=crop" class="w-full h-full object-cover object-top">
                        </div>
                    </div>
                    <div class="flex-1 py-4">
                         <h2 class="text-3xl font-bold text-slate-900 dark:text-white mb-2 uppercase">Ir. H. Usamah</h2>
                         <span class="text-lg text-primary font-bold mb-6 block">Kepala Dinas</span>
                         <p class="text-slate-600 dark:text-slate-400 mb-6">Data Kepala Dinas belum tersedia di database. Ini adalah tampilan placeholder.</p>
                    </div>
                </div>
                @endif
            </div>

            <!-- 2. PEJABAT STRUKTURAL (List Vertical) -->
            <div>
                <h3 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white mb-8 border-l-4 border-primary pl-4">Pejabat Struktural Menjabat :</h3>
                
                <div class="space-y-6">
                    @forelse($struktural as $pejabat)
                    <div class="bg-slate-50 dark:bg-dark-surface rounded-3xl p-6 md:p-8 border border-slate-100 dark:border-white/5 flex flex-col md:flex-row gap-6 items-center md:items-start group hover:shadow-lg transition-all duration-300">
                        <!-- Photo -->
                        <div class="shrink-0 w-full md:w-[200px]">
                            <div class="aspect-square rounded-2xl overflow-hidden bg-slate-200 shadow-sm">
                                @if($pejabat->avatar)
                                    <img src="{{ asset('storage/' . $pejabat->avatar) }}" alt="{{ $pejabat->name }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($pejabat->name) }}&background=2c04b3&color=fff&size=512" alt="{{ $pejabat->name }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="flex-1 flex flex-col justify-center">
                            <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-1 uppercase">{{ $pejabat->name }}</h2>
                            <span class="text-primary font-semibold mb-4 block">{{ $pejabat->position }}</span>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 text-sm">
                                 <div>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-0.5">NIP</span>
                                    <span class="text-slate-700 dark:text-slate-300 font-medium">{{ $pejabat->nip ?? '-' }}</span>
                                </div>
                                <div>
                                    <span class="text-xs font-bold text-slate-400 uppercase tracking-wider block mb-0.5">Status</span>
                                    <span class="text-slate-700 dark:text-slate-300 font-medium">{{ $pejabat->type }}</span>
                                </div>
                            </div>

                            <a href="{{ route('landing.pejabat.detail', \Illuminate\Support\Str::slug($pejabat->name)) }}" class="inline-flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all text-sm hover:text-blue-700 mt-2">
                                <iconify-icon icon="solar:info-circle-bold" width="18"></iconify-icon>
                                Selengkapnya
                            </a>
                        </div>
                    </div>
                    @empty
                        <!-- Dummy Struktural if Empty -->
                         @if($allEmployees->isEmpty())
                            @php
                                $dummies = [
                                    ['name' => 'Dr. Sarah Amalia', 'pos' => 'Sekretaris Dinas', 'img' => 'https://images.unsplash.com/photo-1573496359-7013ac2bebb4?q=80&w=1000&auto=format&fit=crop'],
                                    ['name' => 'Budi Santoso, S.Kom', 'pos' => 'Kepala Bidang TIK', 'img' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?q=80&w=1000&auto=format&fit=crop'],
                                ];
                            @endphp
                            @foreach($dummies as $dummy)
                                <div class="bg-slate-50 dark:bg-dark-surface rounded-3xl p-6 md:p-8 border border-slate-100 dark:border-white/5 flex flex-col md:flex-row gap-6 items-center md:items-start">
                                    <div class="shrink-0 w-full md:w-[200px]">
                                        <div class="aspect-square rounded-2xl overflow-hidden bg-slate-200">
                                            <img src="{{ $dummy['img'] }}" class="w-full h-full object-cover object-top">
                                        </div>
                                    </div>
                                    <div class="flex-1 flex flex-col justify-center">
                                        <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-1 uppercase">{{ $dummy['name'] }}</h2>
                                        <span class="text-primary font-semibold mb-4 block">{{ $dummy['pos'] }}</span>
                                        <p class="text-slate-600 dark:text-slate-400 text-sm">Data pejabat struktural placeholder.</p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p class="text-slate-500 italic">Tidak ada data pejabat struktural.</p>
                        @endif
                    @endforelse
                </div>
            </div>

            <!-- 3. STAF & FUNGSIONAL (Grid) -->
            <div>
                <h3 class="text-xl md:text-2xl font-bold text-slate-900 dark:text-white mb-8 border-l-4 border-primary pl-4">Staf & Pejabat Lainnya :</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($others as $staff)
                    <div class="bg-white dark:bg-dark-surface rounded-2xl p-4 md:p-6 border border-slate-100 dark:border-white/5 flex gap-4 hover:shadow-lg transition-all duration-300 group">
                        <!-- Photo -->
                        <div class="shrink-0 w-24 h-24 md:w-32 md:h-32">
                            <div class="rounded-xl overflow-hidden bg-slate-200 w-full h-full">
                                @if($staff->avatar)
                                    <img src="{{ asset('storage/' . $staff->avatar) }}" alt="{{ $staff->name }}" class="w-full h-full object-cover object-top group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($staff->name) }}&background=2c04b3&color=fff&size=512" alt="{{ $staff->name }}" class="w-full h-full object-cover">
                                @endif
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="flex-1 flex flex-col justify-center">
                            <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-1 line-clamp-1">{{ $staff->name }}</h4>
                            <span class="text-sm text-primary font-medium mb-3 block line-clamp-1">{{ $staff->position }}</span>
                            
                             <a href="{{ route('landing.pejabat.detail', \Illuminate\Support\Str::slug($staff->name)) }}" class="text-xs font-bold text-slate-400 group-hover:text-primary transition-colors flex items-center gap-1">
                                Lihat Profil <iconify-icon icon="solar:arrow-right-linear"></iconify-icon>
                            </a>
                        </div>
                    </div>
                    @empty
                         @if($allEmployees->isEmpty())
                              <!-- Dummy Staff -->
                               <div class="bg-white dark:bg-dark-surface rounded-2xl p-4 md:p-6 border border-slate-100 dark:border-white/5 flex gap-4">
                                    <div class="shrink-0 w-24 h-24 md:w-32 md:h-32 bg-slate-200 rounded-xl"></div>
                                    <div class="flex-1 flex flex-col justify-center">
                                         <h4 class="text-lg font-bold text-slate-900 mb-1">Ahmad Rizky</h4>
                                         <span class="text-sm text-primary font-medium">Tenaga Teknis</span>
                                    </div>
                               </div>
                         @else
                            <p class="col-span-full text-slate-500 italic">Tidak ada data staf lainnya.</p>
                         @endif
                    @endforelse
                </div>
            </div>

        </div>
    </section>
</x-landing-layout>
