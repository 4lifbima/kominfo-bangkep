<x-app-layout>
    <x-slot:title>Anggaran & Realisasi</x-slot>

    <!-- Header & Actions -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 animate-fade-up">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white mb-1">Anggaran & Realisasi</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Kelola data pagu anggaran dan realisasi per tahun.</p>
        </div>
        <a href="{{ route('budget.create') }}" class="flex items-center gap-2 px-4 py-2.5 bg-gradient-primary text-white rounded-lg text-sm font-medium shadow-lg shadow-indigo-500/25 hover:opacity-90 transition-all">
            <iconify-icon icon="solar:add-circle-linear"></iconify-icon>
            <span>Tambah Data</span>
        </a>
    </div>

    <!-- Table Section -->
    <div class="glass-panel rounded-2xl p-6 shadow-glass animate-fade-up" style="animation-delay: 0.1s;">
        <!-- Notifications -->
        @if(session('success'))
        <div class="mb-4 p-4 rounded-lg bg-emerald-50 text-emerald-700 border border-emerald-100 flex items-center gap-2">
            <iconify-icon icon="solar:check-circle-bold"></iconify-icon>
            {{ session('success') }}
        </div>
        @endif

        <div class="overflow-x-auto">
            <table id="budgetsTable" class="w-full text-sm text-left">
                <thead class="text-xs text-slate-500 uppercase bg-slate-50 dark:bg-white/5 dark:text-slate-400">
                    <tr>
                        <th class="px-6 py-4 rounded-tl-lg">No</th>
                        <th class="px-6 py-4">Tahun Anggaran</th>
                        <th class="px-6 py-4">Pagu Anggaran</th>
                        <th class="px-6 py-4">Realisasi</th>
                        <th class="px-6 py-4">Serapan</th>
                        <th class="px-6 py-4">Keterangan</th>
                        <th class="px-6 py-4 rounded-tr-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-white/5">
                    <!-- DataTables will fill this -->
                </tbody>
            </table>
        </div>
    </div>

    @push('scripts')
    <script>
        let table;

        $(document).ready(function() {
            table = $('#budgetsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('budget.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'year', name: 'year'},
                    {data: 'total_budget', name: 'total_budget'},
                    {data: 'realized', name: 'realized'},
                    {data: 'percentage', name: 'percentage', orderable: false, searchable: false},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'},
                ]
            });
        });

        function deleteItem(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: "{{ url('budget') }}/" + id,
                    type: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            table.ajax.reload();
                            alert(response.message);
                        } else {
                            alert('Gagal menghapus');
                        }
                    },
                    error: function() {
                        alert('Terjadi kesalahan sistem');
                    }
                });
            }
        }
    </script>
    @endpush
</x-app-layout>
