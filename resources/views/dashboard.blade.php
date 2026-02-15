<x-app-layout>
    <x-slot:title>Dashboard Utama</x-slot>

    <!-- Welcome Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 animate-fade-up">
        <div>
            <h2 class="text-2xl lg:text-3xl font-bold tracking-tight text-slate-900 dark:text-white mb-1">Selamat Pagi, Kepala Dinas</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Berikut ringkasan kinerja TIK Kabupaten Banggai Kepulauan hari ini.</p>
        </div>
        <div class="flex gap-3">
            <button class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-dark-surface border border-slate-200 dark:border-white/10 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-300 shadow-sm hover:bg-slate-50 transition-all">
                <iconify-icon icon="solar:printer-linear"></iconify-icon>
                <span>Unduh Laporan</span>
            </button>
            <button class="flex items-center gap-2 px-4 py-2.5 bg-gradient-primary text-white rounded-lg text-sm font-medium shadow-lg shadow-indigo-500/25 hover:opacity-90 transition-all">
                <iconify-icon icon="solar:add-circle-linear"></iconify-icon>
                <span>Input Kegiatan</span>
            </button>
        </div>
    </div>

    <!-- OVERVIEW CARDS GRID -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-6 animate-fade-up" style="animation-delay: 0.1s;">
        <!-- Card 1: Infrastruktur -->
        <div class="glass-panel p-5 rounded-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <iconify-icon icon="solar:server-square-bold" width="60" class="text-primary"></iconify-icon>
            </div>
            <div class="flex items-center gap-2 mb-3">
                <div class="w-2 h-6 rounded-full bg-primary"></div>
                <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Infrastruktur TIK</h3>
            </div>
            <p class="text-3xl font-bold font-mono text-slate-800 dark:text-white">{{ $stats['infrastructure'] }}</p>
            <div class="flex items-center gap-1 mt-2 text-slate-500 text-xs font-medium">
                <span>Unit Terdata</span>
            </div>
        </div>

        <!-- Card 2: Statistik -->
        <div class="glass-panel p-5 rounded-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <iconify-icon icon="solar:chart-square-bold" width="60" class="text-primary-soft"></iconify-icon>
            </div>
            <div class="flex items-center gap-2 mb-3">
                <div class="w-2 h-6 rounded-full bg-primary-soft"></div>
                <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Statistik & Data</h3>
            </div>
            <p class="text-3xl font-bold font-mono text-slate-800 dark:text-white">{{ $stats['statistics'] }}</p>
            <div class="flex items-center gap-1 mt-2 text-slate-500 text-xs font-medium">
                <span>Dataset Tersedia</span>
            </div>
        </div>

        <!-- Card 3: Layanan Publik -->
        <div class="glass-panel p-5 rounded-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <iconify-icon icon="solar:users-group-rounded-bold" width="60" class="text-accent-gold"></iconify-icon>
            </div>
            <div class="flex items-center gap-2 mb-3">
                <div class="w-2 h-6 rounded-full bg-accent-gold"></div>
                <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Layanan Publik</h3>
            </div>
            <p class="text-3xl font-bold font-mono text-slate-800 dark:text-white">{{ $stats['services'] }}</p>
            <div class="flex items-center gap-1 mt-2 text-slate-500 text-xs font-medium">
                <span>Layanan Aktif</span>
            </div>
        </div>

        <!-- Card 4: Anggaran -->
        <div class="glass-panel p-5 rounded-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <iconify-icon icon="solar:wallet-money-bold" width="60" class="text-accent-emerald"></iconify-icon>
            </div>
            <div class="flex items-center gap-2 mb-3">
                <div class="w-2 h-6 rounded-full bg-accent-emerald"></div>
                <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Anggaran</h3>
            </div>
            <p class="text-2xl font-bold font-mono text-slate-800 dark:text-white truncate">Rp {{ number_format($stats['total_budget'] / 1000000000, 1) }} M</p>
            <div class="flex items-center gap-1 mt-2 text-accent-emerald text-xs font-medium">
                <span>Realisasi: Rp {{ number_format($stats['realized_budget'] / 1000000000, 1) }} M</span>
            </div>
        </div>
        
        <!-- Card 5: Program -->
        <div class="glass-panel p-5 rounded-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <iconify-icon icon="solar:clipboard-list-bold" width="60" class="text-cyan-500"></iconify-icon>
            </div>
            <div class="flex items-center gap-2 mb-3">
                <div class="w-2 h-6 rounded-full bg-cyan-500"></div>
                <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Program Kerja</h3>
            </div>
            <p class="text-3xl font-bold font-mono text-slate-800 dark:text-white">{{ $stats['programs'] }}</p>
            <div class="flex items-center gap-1 mt-2 text-slate-500 text-xs font-medium">
                <span>Program Tahun Ini</span>
            </div>
        </div>

        <!-- Card 6: Pegawai -->
        <div class="glass-panel p-5 rounded-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <iconify-icon icon="solar:user-id-bold" width="60" class="text-accent-rose"></iconify-icon>
            </div>
            <div class="flex items-center gap-2 mb-3">
                <div class="w-2 h-6 rounded-full bg-accent-rose"></div>
                <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Total Pegawai</h3>
            </div>
            <p class="text-3xl font-bold font-mono text-slate-800 dark:text-white">{{ $stats['employees'] }}</p>
            <div class="flex items-center gap-1 mt-2 text-slate-500 text-xs font-medium">
                <span>Personil ASN & Honorer</span>
            </div>
        </div>
        
        <!-- Card 7: Arsip -->
        <div class="glass-panel p-5 rounded-2xl relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                <iconify-icon icon="solar:folder-with-files-bold" width="60" class="text-indigo-500"></iconify-icon>
            </div>
            <div class="flex items-center gap-2 mb-3">
                <div class="w-2 h-6 rounded-full bg-indigo-500"></div>
                <h3 class="text-xs font-semibold text-slate-500 uppercase tracking-wider">Arsip Dokumen</h3>
            </div>
            <p class="text-3xl font-bold font-mono text-slate-800 dark:text-white">{{ $stats['archives'] }}</p>
            <div class="flex items-center gap-1 mt-2 text-slate-500 text-xs font-medium">
                <span>File Tersimpan</span>
            </div>
        </div>

        <!-- Card 8: Shortcuts -->
        <div class="glass-panel p-5 rounded-2xl flex flex-col justify-center items-center text-center cursor-pointer hover:bg-slate-50 dark:hover:bg-white/5 transition-colors border-2 border-dashed border-slate-200 dark:border-white/10">
            <div class="w-12 h-12 rounded-full bg-slate-100 dark:bg-white/10 flex items-center justify-center mb-2 text-slate-400">
                <iconify-icon icon="solar:add-circle-linear" width="28"></iconify-icon>
            </div>
            <h3 class="text-sm font-semibold text-slate-600 dark:text-slate-300">Tambah Data</h3>
            <p class="text-xs text-slate-400">Shortcut Cepat</p>
        </div>
    </div>

    <!-- MAIN CHARTS AREA -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 animate-fade-up" style="animation-delay: 0.2s;">
        
        <!-- Left: Connectivity Map/Chart -->
        <div class="lg:col-span-8 glass-panel rounded-2xl p-6 shadow-glass">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-lg font-bold text-slate-800 dark:text-white">Penetrasi Internet & Digitalisasi</h3>
                    <p class="text-sm text-slate-500">Analisis per Kecamatan di Banggai Kepulauan</p>
                </div>
                <select class="bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 rounded-lg text-xs py-2 px-3 text-slate-600 dark:text-slate-300 outline-none focus:ring-1 focus:ring-primary">
                    <option>Tahun 2023</option>
                    <option>Tahun 2022</option>
                </select>
            </div>
            
            <!-- Chart Placeholder (Mockup for design fidelity without external heavy JS) -->
            <div class="h-[300px] w-full relative">
                <canvas id="mainChart"></canvas>
            </div>
        </div>

        <!-- Right: Quick Stats & Widgets -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Weather Widget -->
            <div class="bg-gradient-to-br from-indigo-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg relative overflow-hidden">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/20 rounded-full blur-xl"></div>
                <div class="flex justify-between items-start relative z-10">
                    <div>
                        <p class="text-sm font-medium opacity-90">Salakan, Banggai Kep.</p>
                        <h4 class="text-4xl font-bold mt-1">29°C</h4>
                        <p class="text-sm mt-1 opacity-90">Cerah Berawan</p>
                    </div>
                    <iconify-icon icon="solar:cloud-sun-2-bold" width="48"></iconify-icon>
                </div>
                <div class="mt-6 flex justify-between text-xs opacity-80 border-t border-white/20 pt-4">
                    <div class="flex flex-col items-center">
                        <span>Angin</span>
                        <span class="font-bold">12 km/h</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span>Kelembaban</span>
                        <span class="font-bold">78%</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <span>Hujan</span>
                        <span class="font-bold">10%</span>
                    </div>
                </div>
            </div>

            <!-- ASN Composition -->
            <div class="glass-panel rounded-2xl p-6">
                <h3 class="text-base font-bold text-slate-800 dark:text-white mb-4">Komposisi ASN Kominfo</h3>
                <div class="flex items-center gap-6">
                    <!-- Donut Chart (CSS Only) -->
                    <div class="relative w-28 h-28 rounded-full flex items-center justify-center" style="background: conic-gradient(#2c04b3 0% 60%, #4a20d6 60% 85%, #E2E8F0 85% 100%);">
                        <div class="w-20 h-20 bg-white dark:bg-dark-surface rounded-full flex flex-col items-center justify-center">
                            <span class="text-xs text-slate-400">Total</span>
                            <span class="font-bold text-slate-800 dark:text-white">128</span>
                        </div>
                    </div>
                    <div class="flex-1 space-y-3">
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
                                <span class="text-slate-600 dark:text-slate-400">PNS</span>
                            </div>
                            <span class="font-mono font-semibold dark:text-white">60%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-primary-light"></span>
                                <span class="text-slate-600 dark:text-slate-400">PPPK</span>
                            </div>
                            <span class="font-mono font-semibold dark:text-white">25%</span>
                        </div>
                        <div class="flex justify-between items-center text-sm">
                            <div class="flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-slate-200 dark:bg-slate-700"></span>
                                <span class="text-slate-600 dark:text-slate-400">Honorer</span>
                            </div>
                            <span class="font-mono font-semibold dark:text-white">15%</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- BOTTOM SECTION: Data Tables & Programs -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 animate-fade-up" style="animation-delay: 0.3s;">
        
        <!-- Program Kerja Table -->
        <div class="glass-panel rounded-2xl p-0 overflow-hidden shadow-glass">
            <div class="p-6 border-b border-slate-100 dark:border-white/5 flex justify-between items-center">
                <h3 class="font-bold text-lg text-slate-800 dark:text-white">Program Prioritas</h3>
                <button class="text-primary text-sm font-medium hover:underline">Lihat Semua</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-slate-500 uppercase bg-slate-50 dark:bg-white/5 dark:text-slate-400">
                        <tr>
                            <th class="px-6 py-4 font-semibold tracking-wider">Nama Program</th>
                            <th class="px-6 py-4 font-semibold tracking-wider">Progress</th>
                            <th class="px-6 py-4 font-semibold tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-white/5">
                        @forelse($latest_programs as $program)
                        <tr class="hover:bg-slate-50/50 dark:hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4 font-medium text-slate-800 dark:text-white">
                                {{ $program->name }}
                                <p class="text-xs text-slate-400 font-normal mt-0.5">{{ $program->description ? Str::limit($program->description, 30) : '-' }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-xs text-slate-500">
                                    {{ $program->start_date ? \Carbon\Carbon::parse($program->start_date)->format('d M Y') : '-' }} 
                                    s/d 
                                    {{ $program->end_date ? \Carbon\Carbon::parse($program->end_date)->format('d M Y') : '-' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium 
                                    {{ $program->status === 'completed' ? 'bg-emerald-50 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-300 border border-emerald-100 dark:border-emerald-800' : 
                                      ($program->status === 'active' ? 'bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 border border-blue-100 dark:border-blue-800' : 'bg-slate-100 text-slate-600 dark:bg-slate-800 dark:text-slate-400 border border-slate-200 dark:border-slate-700') }}">
                                    @if($program->status === 'active') <span class="w-1.5 h-1.5 rounded-full bg-blue-500 animate-pulse"></span> @endif
                                    {{ ucfirst($program->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-slate-400 text-sm">Belum ada data program kerja.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions Grid -->
        <div class="flex flex-col gap-6">
            <h3 class="font-bold text-lg text-slate-800 dark:text-white px-1">Aksi Cepat</h3>
            <div class="grid grid-cols-2 gap-4">
                <button class="p-6 rounded-2xl bg-white dark:bg-dark-surface border border-slate-200 dark:border-white/10 hover:border-primary dark:hover:border-primary-soft shadow-sm hover:shadow-lg transition-all group text-left">
                    <div class="w-12 h-12 rounded-xl bg-blue-50 dark:bg-blue-900/20 text-blue-600 dark:text-blue-400 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <iconify-icon icon="solar:pen-new-square-linear" width="28"></iconify-icon>
                    </div>
                    <h4 class="font-bold text-slate-800 dark:text-white">Tambah Berita</h4>
                    <p class="text-xs text-slate-500 mt-1">Publikasi web utama</p>
                </button>

                <button class="p-6 rounded-2xl bg-white dark:bg-dark-surface border border-slate-200 dark:border-white/10 hover:border-emerald-500 shadow-sm hover:shadow-lg transition-all group text-left">
                    <div class="w-12 h-12 rounded-xl bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <iconify-icon icon="solar:calculator-minimalistic-linear" width="28"></iconify-icon>
                    </div>
                    <h4 class="font-bold text-slate-800 dark:text-white">Realisasi Anggaran</h4>
                    <p class="text-xs text-slate-500 mt-1">Input SP2D/SPP</p>
                </button>

                <button class="p-6 rounded-2xl bg-white dark:bg-dark-surface border border-slate-200 dark:border-white/10 hover:border-purple-500 shadow-sm hover:shadow-lg transition-all group text-left">
                    <div class="w-12 h-12 rounded-xl bg-purple-50 dark:bg-purple-900/20 text-purple-600 dark:text-purple-400 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <iconify-icon icon="solar:letter-linear" width="28"></iconify-icon>
                    </div>
                    <h4 class="font-bold text-slate-800 dark:text-white">Kirim Surat</h4>
                    <p class="text-xs text-slate-500 mt-1">Buat edaran ke OPD</p>
                </button>

                <button class="p-6 rounded-2xl bg-white dark:bg-dark-surface border border-slate-200 dark:border-white/10 hover:border-orange-500 shadow-sm hover:shadow-lg transition-all group text-left">
                    <div class="w-12 h-12 rounded-xl bg-orange-50 dark:bg-orange-900/20 text-orange-600 dark:text-orange-400 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                        <iconify-icon icon="solar:server-path-linear" width="28"></iconify-icon>
                    </div>
                    <h4 class="font-bold text-slate-800 dark:text-white">Status Layanan</h4>
                    <p class="text-xs text-slate-500 mt-1">Update maintenance</p>
                </button>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>        
        // Initialize Chart.js
        let myChart;
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('mainChart').getContext('2d');
            const isDark = document.documentElement.classList.contains('dark');
            const gridColor = isDark ? 'rgba(255,255,255,0.05)' : 'rgba(0,0,0,0.05)';
            const textColor = isDark ? '#94a3b8' : '#64748b';

            // Gradient for Area Chart
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(44, 4, 179, 0.4)');
            gradient.addColorStop(1, 'rgba(44, 4, 179, 0)');

            const data = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
                datasets: [{
                    label: 'Pengguna Internet',
                    data: [65, 72, 70, 81, 86, 95, 102, 110, 115, 128],
                    borderColor: '#2c04b3',
                    backgroundColor: gradient,
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#2c04b3',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            backgroundColor: isDark ? '#14182F' : '#ffffff',
                            titleColor: isDark ? '#ffffff' : '#1e293b',
                            bodyColor: isDark ? '#cbd5e1' : '#475569',
                            borderColor: isDark ? 'rgba(107, 68, 255, 0.2)' : 'rgba(44, 4, 179, 0.1)',
                            borderWidth: 1,
                            padding: 10,
                            displayColors: false,
                        }
                    },
                    scales: {
                        y: {
                            grid: { color: gridColor },
                            ticks: { color: textColor, font: { family: 'Inter', size: 10 } }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: textColor, font: { family: 'Inter', size: 10 } }
                        }
                    }
                }
            };

            myChart = new Chart(ctx, config);
        });

        // Function to update chart on theme toggle
        function updateChartColor(theme) {
            if(!myChart) return;
            const isDark = theme === 'dark';
            const gridColor = isDark ? 'rgba(255,255,255,0.05)' : 'rgba(0,0,0,0.05)';
            const textColor = isDark ? '#94a3b8' : '#64748b';
            
            myChart.options.scales.x.ticks.color = textColor;
            myChart.options.scales.y.ticks.color = textColor;
            myChart.options.scales.y.grid.color = gridColor;
            myChart.options.plugins.tooltip.backgroundColor = isDark ? '#14182F' : '#ffffff';
            myChart.options.plugins.tooltip.titleColor = isDark ? '#ffffff' : '#1e293b';
            myChart.options.plugins.tooltip.bodyColor = isDark ? '#cbd5e1' : '#475569';
            myChart.options.plugins.tooltip.borderColor = isDark ? 'rgba(107, 68, 255, 0.2)' : 'rgba(44, 4, 179, 0.1)';
            
            myChart.update();
        }
    </script>
    @endpush
</x-app-layout>
