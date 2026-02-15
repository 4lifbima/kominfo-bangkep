<x-app-layout>
    <x-slot:title>SDM & ASN</x-slot>

    <!-- Header & Actions -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 animate-fade-up">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white mb-1">SDM & ASN</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Kelola data pegawai, ASN, dan tenaga honorer.</p>
        </div>
        <a href="{{ route('employees.create') }}" class="flex items-center gap-2 px-4 py-2.5 bg-gradient-primary text-white rounded-lg text-sm font-medium shadow-lg shadow-indigo-500/25 hover:opacity-90 transition-all">
            <iconify-icon icon="solar:add-circle-linear"></iconify-icon>
            <span>Tambah Pegawai</span>
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
            <table id="employeesTable" class="w-full text-sm text-left">
                <thead class="text-xs text-slate-500 uppercase bg-slate-50 dark:bg-white/5 dark:text-slate-400">
                    <tr>
                        <th class="px-6 py-4 rounded-tl-lg">No</th>
                        <th class="px-6 py-4">Foto</th>
                        <th class="px-6 py-4">Nama Pegawai</th>
                        <th class="px-6 py-4">NIP / NIK</th>
                        <th class="px-6 py-4">Jabatan</th>
                        <th class="px-6 py-4">Jenis</th>
                        <th class="px-6 py-4">Status</th>
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
            table = $('#employeesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('employees.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'avatar_view', name: 'avatar_view', orderable: false, searchable: false},
                    {data: 'name', name: 'name'},
                    {data: 'nip', name: 'nip'},
                    {data: 'position', name: 'position'},
                    {data: 'type', name: 'type'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'},
                ]
            });
        });

        function deleteItem(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: "{{ url('employees') }}/" + id,
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
