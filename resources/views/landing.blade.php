<x-landing-layout>
    <!-- HERO SECTION (Komdigi Style) -->
    <section class="relative w-full h-[600px] lg:h-[700px] bg-slate-900 overflow-hidden" x-data="{ 
        activeSlide: 0, 
        slides: [
            { 
                image: 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop', 
                category: 'BERITA UTAMA',
                title: 'Transformasi Digital Pemerintahan untuk Pelayanan Publik yang Lebih Cepat dan Efisien',
                desc: 'Pemerintah Kabupaten Banggai Kepulauan terus berkomitmen meningkatkan kualitas infrastruktur digital.' 
            },
            { 
                image: 'https://images.unsplash.com/photo-1573164713712-03790a178651?q=80&w=2069&auto=format&fit=crop', 
                category: 'PROGRAM UNGGULAN',
                title: 'Peluncuran Program Internet Desa: Menjangkau yang Tidak Terjangkau',
                desc: 'Memastikan akses informasi merata hingga ke pelosok desa.' 
            },
            { 
                image: 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=2070&auto=format&fit=crop', 
                category: 'ARTIKEL GPR',
                title: 'Sinergi Lintas Sektoral dalam Mewujudkan Smart City Banggai Kepulauan',
                desc: 'Kolaborasi antar dinas untuk satu data yang terintegrasi.' 
            }
        ],
        timer: null,
        next() { this.activeSlide = (this.activeSlide + 1) % this.slides.length },
        startTimer() { this.timer = setInterval(() => this.next(), 6000) }
    }" x-init="startTimer()">

        <!-- Slides -->
        <template x-for="(slide, index) in slides" :key="index">
            <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out" 
                 x-show="activeSlide === index"
                 x-transition:enter="opacity-0"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="opacity-100"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                
                <!-- Background Image -->
                <div class="absolute inset-0">
                    <img :src="slide.image" class="w-full h-full object-cover" alt="Hero Image">
                    <!-- Gradient Overlay (Darker at bottom/left like reference) -->
                    <div class="absolute inset-0 bg-gradient-to-r from-slate-900/90 via-slate-900/40 to-transparent"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
                </div>

                <!-- Content -->
                <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center pb-20">
                    <div class="max-w-3xl animate-fade-up">
                        <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md border border-white/30 rounded text-[10px] font-bold tracking-widest text-white mb-4 uppercase" x-text="slide.category"></span>
                        <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6 drop-shadow-lg" x-text="slide.title"></h1>
                        <p class="text-white/80 text-lg mb-8 line-clamp-2 max-w-2xl" x-text="slide.desc"></p>
                        
                        <a href="#" class="group inline-flex items-center gap-3 text-white font-semibold hover:text-primary transition-colors">
                            <div class="w-12 h-12 rounded-full border border-white/30 flex items-center justify-center group-hover:bg-primary group-hover:border-primary transition-all">
                                <iconify-icon icon="solar:arrow-right-linear" width="24"></iconify-icon>
                            </div>
                            <span>Baca Selengkapnya</span>
                        </a>
                    </div>
                </div>
            </div>
        </template>
        
        <!-- Pagination Indicators -->
        <div class="absolute bottom-[280px] lg:bottom-40 right-4 lg:right-20 flex gap-4 z-10">
            <template x-for="(slide, index) in slides" :key="index">
                <button @click="activeSlide = index" 
                        class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm border transition-all duration-300 backdrop-blur-sm"
                        :class="activeSlide === index ? 'bg-primary border-primary text-white scale-110' : 'bg-transparent border-white/30 text-white hover:bg-white/10'">
                    <span x-text="index + 1"></span>
                </button>
            </template>
        </div>

        <!-- Bottom Overlay: Popular News -->
        <div class="absolute bottom-0 left-0 w-full z-20 bg-gradient-to-t from-slate-950 to-slate-900/80 backdrop-blur-sm border-t border-white/5 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">
                    <div class="shrink-0 mb-4 lg:mb-0">
                        <h3 class="text-white font-bold text-lg mb-1">Berita Populer</h3>
                        <div class="h-1 w-12 bg-primary rounded-full"></div>
                    </div>
                    
                    <div class="flex-1 w-full overflow-x-auto pb-2 scrollbar-hide">
                        <div class="flex gap-6">
                            <!-- Pop Item 1 -->
                            <a href="#" class="group flex gap-4 min-w-[300px] hover:bg-white/5 p-2 rounded-lg transition-colors">
                                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=200&auto=format&fit=crop" class="w-20 h-14 object-cover rounded-md brightness-75 group-hover:brightness-100 transition-all">
                                <div class="flex flex-col justify-center">
                                    <span class="text-[10px] text-primary font-bold uppercase mb-1">[HOAKS] Tautan Pendaftaran...</span>
                                    <p class="text-white text-xs font-semibold line-clamp-2 leading-relaxed opacity-90 group-hover:opacity-100 group-hover:text-primary transition-colors">Klarifikasi Hoaks: Pendaftaran CPNS 2026</p>
                                    <span class="text-[10px] text-slate-400 mt-1">Sebulan lalu</span>
                                </div>
                            </a>
                             <!-- Pop Item 2 -->
                            <a href="#" class="group flex gap-4 min-w-[300px] hover:bg-white/5 p-2 rounded-lg transition-colors">
                                <div class="w-20 h-14 bg-blue-900/50 rounded-md flex items-center justify-center text-blue-400 group-hover:text-white transition-colors">
                                    <iconify-icon icon="solar:globus-bold-duotone" width="24"></iconify-icon>
                                </div>
                                <div class="flex flex-col justify-center">
                                    <span class="text-[10px] text-white font-bold uppercase mb-1">Siaran Pers</span>
                                    <p class="text-white text-xs font-semibold line-clamp-2 leading-relaxed opacity-90 group-hover:opacity-100 group-hover:text-primary transition-colors">Konsultasi Publik RPM Pelaksanaan...</p>
                                    <span class="text-[10px] text-slate-400 mt-1">Sebulan lalu</span>
                                </div>
                            </a>
                            <!-- Pop Item 3 -->
                            <a href="#" class="group flex gap-4 min-w-[300px] hover:bg-white/5 p-2 rounded-lg transition-colors">
                                <img src="https://images.unsplash.com/photo-1593113598340-068716101f7e?q=80&w=200&auto=format&fit=crop" class="w-20 h-14 object-cover rounded-md brightness-75 group-hover:brightness-100 transition-all">
                                <div class="flex flex-col justify-center">
                                    <span class="text-[10px] text-white font-bold uppercase mb-1">Berita Pemerintah</span>
                                    <p class="text-white text-xs font-semibold line-clamp-2 leading-relaxed opacity-90 group-hover:opacity-100 group-hover:text-primary transition-colors">Tinjau Langsung Daerah Bencana...</p>
                                    <span class="text-[10px] text-slate-400 mt-1">Sebulan lalu</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="hidden lg:flex shrink-0 gap-3">
                         <button class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center text-white hover:bg-primary hover:border-primary transition-all">
                            <iconify-icon icon="solar:arrow-up-linear" width="20"></iconify-icon>
                         </button>
                         <button class="w-10 h-10 rounded-full bg-primary flex items-center justify-center text-white hover:bg-primary-light transition-all box-shadow-lg shadow-primary/50">
                            <iconify-icon icon="solar:accessibility-bold" width="20"></iconify-icon>
                         </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION (Komdigi Style) -->
    <section class="relative py-20 overflow-hidden">
        <!-- Background Wrapper with dark blue rounded container -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative bg-[#0F172A] rounded-[40px] p-8 lg:p-16 overflow-hidden">
                <!-- Background decorative elements -->
                <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600/20 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
                <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-indigo-600/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>
                
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-10 text-center lg:text-left">Layanan Berkualitas untuk Masa Depan Digital</h2>

                <div class="flex flex-nowrap overflow-x-auto pb-4 gap-4 md:grid md:grid-cols-2 lg:grid-cols-5 md:overflow-visible scrollbar-hide snap-x">
                    <!-- Service 1: Sertifikasi -->
                    <div class="group relative bg-[#1E3A8A] min-w-[280px] lg:min-w-0 snap-center hover:bg-gradient-to-br hover:from-blue-600 hover:to-blue-800 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 cursor-pointer overflow-hidden border border-white/5 hover:shadow-xl hover:shadow-blue-900/50">
                        <div class="relative z-10 h-full flex flex-col justify-between min-h-[280px]">
                            <!-- Icon -->
                            <div class="w-14 h-14 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform">
                                <iconify-icon icon="solar:verified-check-bold" width="32"></iconify-icon>
                            </div>
                            
                            <div>
                                <h3 class="text-lg font-bold text-white mb-2 tracking-wide uppercase">Sertifikasi</h3>
                                <p class="text-xs text-blue-100/80 leading-relaxed mb-6 group-hover:text-white transition-colors">
                                    Pembuatan Sertifikat menjadi lebih mudah dengan digital
                                </p>
                            </div>

                            <!-- Arrow -->
                             <div class="flex justify-start">
                                <div class="w-8 h-8 rounded-full border border-white/30 flex items-center justify-center text-white group-hover:bg-white group-hover:text-blue-700 transition-all">
                                    <iconify-icon icon="solar:arrow-right-linear" width="18"></iconify-icon>
                                </div>
                            </div>
                        </div>
                        <!-- Decorative bg -->
                        <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/5 rounded-full blur-2xl group-hover:bg-white/10 transition-all"></div>
                    </div>

                    <!-- Service 2: Pemerintahan -->
                    <div class="group relative bg-[#1E3A8A] min-w-[280px] lg:min-w-0 snap-center hover:bg-gradient-to-br hover:from-blue-600 hover:to-blue-800 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 cursor-pointer overflow-hidden border border-white/5 hover:shadow-xl hover:shadow-blue-900/50">
                        <div class="relative z-10 h-full flex flex-col justify-between min-h-[280px]">
                            <div class="w-14 h-14 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform">
                                <iconify-icon icon="solar:city-bold" width="32"></iconify-icon>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white mb-2 tracking-wide uppercase">Pemerintahan</h3>
                                <p class="text-xs text-blue-100/80 leading-relaxed mb-6 group-hover:text-white transition-colors">
                                    Layanan untuk instansi pemerintah
                                </p>
                            </div>
                            <div class="flex justify-start">
                                <div class="w-8 h-8 rounded-full border border-white/30 flex items-center justify-center text-white group-hover:bg-white group-hover:text-blue-700 transition-all">
                                    <iconify-icon icon="solar:arrow-right-linear" width="18"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Service 3: Perizinan -->
                    <div class="group relative bg-[#1E3A8A] min-w-[280px] lg:min-w-0 snap-center hover:bg-gradient-to-br hover:from-blue-600 hover:to-blue-800 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 cursor-pointer overflow-hidden border border-white/5 hover:shadow-xl hover:shadow-blue-900/50">
                        <div class="relative z-10 h-full flex flex-col justify-between min-h-[280px]">
                            <div class="w-14 h-14 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform">
                                <iconify-icon icon="solar:document-text-bold" width="32"></iconify-icon>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white mb-2 tracking-wide uppercase">Perizinan</h3>
                                <p class="text-xs text-blue-100/80 leading-relaxed mb-6 group-hover:text-white transition-colors">
                                    Perizinan menjadi lebih mudah dengan digital
                                </p>
                            </div>
                            <div class="flex justify-start">
                                <div class="w-8 h-8 rounded-full border border-white/30 flex items-center justify-center text-white group-hover:bg-white group-hover:text-blue-700 transition-all">
                                    <iconify-icon icon="solar:arrow-right-linear" width="18"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Service 4: Pengembangan SDM -->
                     <div class="group relative bg-[#1E3A8A] min-w-[280px] lg:min-w-0 snap-center hover:bg-gradient-to-br hover:from-blue-600 hover:to-blue-800 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 cursor-pointer overflow-hidden border border-white/5 hover:shadow-xl hover:shadow-blue-900/50">
                        <div class="relative z-10 h-full flex flex-col justify-between min-h-[280px]">
                            <div class="w-14 h-14 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform">
                                <iconify-icon icon="fluent:hat-graduation-28-filled" width="32"></iconify-icon>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white mb-2 tracking-wide uppercase">Pengembangan SDM</h3>
                                <p class="text-xs text-blue-100/80 leading-relaxed mb-6 group-hover:text-white transition-colors">
                                    Layanan beasiswa dan pelatihan digital
                                </p>
                            </div>
                            <div class="flex justify-start">
                                <div class="w-8 h-8 rounded-full border border-white/30 flex items-center justify-center text-white group-hover:bg-white group-hover:text-blue-700 transition-all">
                                    <iconify-icon icon="solar:arrow-right-linear" width="18"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Service 5: Umum -->
                    <div class="group relative bg-[#1E3A8A] min-w-[280px] lg:min-w-0 snap-center hover:bg-gradient-to-br hover:from-blue-600 hover:to-blue-800 rounded-2xl p-6 transition-all duration-300 hover:-translate-y-1 cursor-pointer overflow-hidden border border-white/5 hover:shadow-xl hover:shadow-blue-900/50">
                        <div class="relative z-10 h-full flex flex-col justify-between min-h-[280px]">
                            <div class="w-14 h-14 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform">
                                <iconify-icon icon="solar:users-group-rounded-bold" width="32"></iconify-icon>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white mb-2 tracking-wide uppercase">Umum</h3>
                                <p class="text-xs text-blue-100/80 leading-relaxed mb-6 group-hover:text-white transition-colors">
                                    Layanan untuk seluruh kalangan masyarakat
                                </p>
                            </div>
                            <div class="flex justify-start">
                                <div class="w-8 h-8 rounded-full border border-white/30 flex items-center justify-center text-white group-hover:bg-white group-hover:text-blue-700 transition-all">
                                    <iconify-icon icon="solar:arrow-right-linear" width="18"></iconify-icon>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- STRATEGIC PLAN BANNER -->
    <section class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-[#1A56DB] to-[#3B82F6] rounded-3xl overflow-hidden shadow-2xl relative">
                 <!-- Background Patterns -->
                 <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10"></div>
                 <div class="absolute right-0 bottom-0 w-1/3 h-full bg-white/5 skew-x-12 pointer-events-none"></div>

                 <div class="flex flex-col lg:flex-row items-stretch">
                    <!-- Column 1: Terhubung -->
                    <div class="flex-1 p-8 lg:p-12 border-b lg:border-b-0 lg:border-r border-white/10 relative group hover:bg-white/5 transition-colors">
                        <h3 class="text-2xl font-bold text-white mb-6">Terhubung</h3>
                        <p class="text-sm text-blue-100 mb-6 font-medium">Konektivitas digital yang inklusif untuk semua, dari kota hingga desa terpencil.</p>
                        
                        <div class="space-y-4">
                            <div>
                                <div class="text-3xl font-bold text-white">98%</div>
                                <div class="text-xs text-blue-200">Sinyal Internet menjangkau wilayah</div>
                            </div>
                             <div>
                                <div class="text-3xl font-bold text-white">100 Mbps</div>
                                <div class="text-xs text-blue-200">Kecepatan internet rata-rata</div>
                            </div>
                        </div>
                    </div>

                     <!-- Column 2: Tumbuh -->
                     <div class="flex-1 p-8 lg:p-12 border-b lg:border-b-0 lg:border-r border-white/10 relative group hover:bg-white/5 transition-colors">
                        <h3 class="text-2xl font-bold text-white mb-6">Tumbuh</h3>
                        <p class="text-sm text-blue-100 mb-6 font-medium">Ekosistem digital yang memberdayakan ekonomi lokal.</p>
                        
                        <div class="space-y-4">
                            <div>
                                <div class="text-3xl font-bold text-white">10 Kota</div>
                                <div class="text-xs text-blue-200">Menciptakan ekosistem startup</div>
                            </div>
                             <div>
                                <div class="text-3xl font-bold text-white">4.4%</div>
                                <div class="text-xs text-blue-200">Kontribusi sektor TIK ke ekonomi</div>
                            </div>
                             <div>
                                <div class="text-3xl font-bold text-white">200.300</div>
                                <div class="text-xs text-blue-200">Pengembangan talenta digital</div>
                            </div>
                        </div>
                    </div>

                     <!-- Column 3: Terjaga -->
                     <div class="flex-1 p-8 lg:p-12 border-b lg:border-b-0 lg:border-r border-white/10 relative group hover:bg-white/5 transition-colors">
                        <h3 class="text-2xl font-bold text-white mb-6">Terjaga</h3>
                        <p class="text-sm text-blue-100 mb-6 font-medium">Ruang digital aman, terpercaya, dan berdaulat.</p>
                        
                        <div class="space-y-4">
                             <div>
                                <div class="text-3xl font-bold text-white">3.5 / 5</div>
                                <div class="text-xs text-blue-200">Skor indeks keamanan informasi</div>
                            </div>
                             <div class="opacity-80">
                                <iconify-icon icon="solar:shield-check-bold-duotone" width="48" class="text-blue-200"></iconify-icon>
                            </div>
                        </div>
                    </div>

                     <!-- Header Column -->
                     <div class="flex-1 p-8 lg:p-12 bg-white/10 backdrop-blur-sm flex flex-col justify-center">
                        <h2 class="text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-2">Rencana <br> Strategis</h2>
                        <p class="text-blue-100 font-bold tracking-widest mb-6">2029-2030</p>
                        <p class="text-xs text-blue-200">Dinas Komunikasi dan Informatika <br> Kabupaten Banggai Kepulauan</p>
                        
                        <div class="mt-8 flex justify-end">
                            <iconify-icon icon="solar:compass-bold-duotone" class="text-white/20 rotate-12" width="120"></iconify-icon>
                        </div>
                     </div>
                 </div>
            </div>
        </div>
    </section>

    <!-- LATEST NEWS / PROGRAMS -->
    <section class="py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-primary font-bold tracking-wider uppercase text-xs mb-2 block">Informasi Terkini</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-slate-900 dark:text-white mb-4">Berita & Program Unggulan</h2>
                <p class="text-slate-600 dark:text-slate-400">Ikuti perkembangan terbaru kegiatan dan program kerja Dinas Komunikasi dan Informatika.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- News Card 1 -->
                <article class="bg-white dark:bg-dark-surface rounded-2xl overflow-hidden shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 hover:shadow-xl transition-all duration-300 group flex flex-col h-full border border-slate-100 dark:border-white/5">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-colors z-10"></div>
                        <img src="https://source.unsplash.com/random/800x600/?technology" alt="News" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
                            <span class="bg-primary/10 text-primary px-2 py-1 rounded font-semibold">Program</span>
                            <span>•</span>
                            <span>12 Feb 2026</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-primary transition-colors">Peluncuran Jaringan Fiber Optic Desa</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm mb-4 line-clamp-3">
                            Perluasan jaringan internet ke wilayah pedesaan untuk mendukung ekonomi digital masyarakat.
                        </p>
                        <a href="#" class="mt-auto inline-flex items-center text-primary font-semibold text-sm hover:underline">
                            Baca Selengkapnya <iconify-icon icon="solar:arrow-right-linear" class="ml-1"></iconify-icon>
                        </a>
                    </div>
                </article>

                <!-- News Card 2 -->
                <article class="bg-white dark:bg-dark-surface rounded-2xl overflow-hidden shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 hover:shadow-xl transition-all duration-300 group flex flex-col h-full border border-slate-100 dark:border-white/5">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-colors z-10"></div>
                        <img src="https://source.unsplash.com/random/800x600/?coding" alt="News" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
                            <span class="bg-primary/10 text-primary px-2 py-1 rounded font-semibold">Berita</span>
                            <span>•</span>
                            <span>10 Feb 2026</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-primary transition-colors">Workshop Kemanan Siber untuk ASN</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm mb-4 line-clamp-3">
                            Meningkatkan kesadaran keamanan informasi di lingkungan pemerintahan daerah.
                        </p>
                        <a href="#" class="mt-auto inline-flex items-center text-primary font-semibold text-sm hover:underline">
                            Baca Selengkapnya <iconify-icon icon="solar:arrow-right-linear" class="ml-1"></iconify-icon>
                        </a>
                    </div>
                </article>

                <!-- News Card 3 -->
                <article class="bg-white dark:bg-dark-surface rounded-2xl overflow-hidden shadow-lg shadow-slate-200/50 dark:shadow-none hover:-translate-y-1 hover:shadow-xl transition-all duration-300 group flex flex-col h-full border border-slate-100 dark:border-white/5">
                    <div class="relative h-48 overflow-hidden">
                        <div class="absolute inset-0 bg-primary/20 group-hover:bg-transparent transition-colors z-10"></div>
                        <img src="https://source.unsplash.com/random/800x600/?meeting" alt="News" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-2 text-xs text-slate-500 mb-3">
                            <span class="bg-primary/10 text-primary px-2 py-1 rounded font-semibold">Agenda</span>
                            <span>•</span>
                            <span>05 Feb 2026</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 group-hover:text-primary transition-colors">Rapat Koordinasi SPBE Tahunan</h3>
                        <p class="text-slate-600 dark:text-slate-400 text-sm mb-4 line-clamp-3">
                            Evaluasi kinerja dan perencanaan strategis pengembangan sistem pemerintahan berbasis elektronik.
                        </p>
                        <a href="#" class="mt-auto inline-flex items-center text-primary font-semibold text-sm hover:underline">
                            Baca Selengkapnya <iconify-icon icon="solar:arrow-right-linear" class="ml-1"></iconify-icon>
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- CALL TO ACTION -->
    <section class="py-20 relative overflow-hidden">
        <div class="absolute inset-0 bg-primary"></div>
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20 mix-blend-overlay"></div>
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-3xl lg:text-5xl font-extrabold text-white mb-6">Siap untuk Berkolaborasi?</h2>
            <p class="text-lg text-white/80 mb-10 max-w-2xl mx-auto">
                Kami terbuka untuk kritik, saran, dan pengaduan layanan demi kemajuan Kabupaten Banggai Kepulauan.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('landing.contact') }}" class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-primary bg-white rounded-xl shadow-lg hover:bg-slate-50 hover:-translate-y-1 transition-all duration-300">
                    Hubungi Kami Sekarang
                </a>
            </div>
        </div>
    </section>
</x-landing-layout>
