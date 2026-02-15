<x-app-layout>
    <x-slot:title>Arsip & Dokumen</x-slot>

    <!-- Header & Actions -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 animate-fade-up">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white mb-1">Arsip & Dokumen</h2>
            <p class="text-slate-500 dark:text-slate-400 text-sm">Kelola surat masuk, surat keluar, SK, dan dokumen lainnya.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('archives.export') }}" target="_blank" class="flex items-center gap-2 px-4 py-2.5 bg-white dark:bg-dark-surface border border-slate-200 dark:border-white/10 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-300 shadow-sm hover:bg-slate-50 transition-all">
                <iconify-icon icon="solar:file-download-linear"></iconify-icon>
                <span>Export Excel</span>
            </a>
            <button onclick="openModal('create')" class="flex items-center gap-2 px-4 py-2.5 bg-gradient-primary text-white rounded-lg text-sm font-medium shadow-lg shadow-indigo-500/25 hover:opacity-90 transition-all">
                <iconify-icon icon="solar:add-circle-linear"></iconify-icon>
                <span>Tambah Dokumen</span>
            </button>
        </div>
    </div>

    <!-- Table Section -->
    <div class="glass-panel rounded-2xl p-6 shadow-glass animate-fade-up" style="animation-delay: 0.1s;">
        <div class="overflow-x-auto">
            <table id="archivesTable" class="w-full text-sm text-left">
                <thead class="text-xs text-slate-500 uppercase bg-slate-50 dark:bg-white/5 dark:text-slate-400">
                    <tr>
                        <th class="px-6 py-4 rounded-tl-lg">No</th>
                        <th class="px-6 py-4">Judul Dokumen</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4">Tahun</th>
                        <th class="px-6 py-4">File</th>
                        <th class="px-6 py-4 rounded-tr-lg">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-white/5">
                    <!-- DataTables will fill this -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Form -->
    <div id="archiveModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="closeModal()"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white dark:bg-dark-surface rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-slate-900 dark:text-white" id="modalTitle">Tambah Dokumen</h3>
                            <div class="mt-4">
                                <form id="archiveForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="archiveId" name="id">
                                    
                                    <div class="mb-4">
                                        <label for="title" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Judul Dokumen</label>
                                        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20" required>
                                    </div>

                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                        <div>
                                            <label for="category" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Kategori</label>
                                            <select name="category" id="category" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20">
                                                <option value="Surat Masuk">Surat Masuk</option>
                                                <option value="Surat Keluar">Surat Keluar</option>
                                                <option value="SK">SK</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="year" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Tahun</label>
                                            <input type="number" name="year" id="year" value="{{ date('Y') }}" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20" required>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="description" class="block text-sm font-medium text-slate-700 dark:text-slate-300">Deskripsi (Opsional)</label>
                                        <textarea name="description" id="description" rows="2" class="mt-1 block w-full rounded-lg border-slate-300 dark:border-white/10 bg-slate-50 dark:bg-white/5 text-sm focus:border-primary focus:ring focus:ring-primary/20"></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="file" class="block text-sm font-medium text-slate-700 dark:text-slate-300">File PDF</label>
                                        <input type="file" name="file" id="file" accept=".pdf" class="mt-1 block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-primary hover:file:bg-indigo-100">
                                        <p class="text-xs text-slate-400 mt-1">Maksimal 5MB. Kosongkan jika tidak ingin mengubah file saat edit.</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-slate-50 dark:bg-white/5 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="button" onclick="saveArchive()" class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-primary text-base font-medium text-white hover:bg-primary-light focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:ml-3 sm:w-auto sm:text-sm">
                        Simpan
                    </button>
                    <button type="button" onclick="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-lg border border-slate-300 dark:border-white/10 shadow-sm px-4 py-2 bg-white dark:bg-dark-surface text-base font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        let table;

        $(document).ready(function() {
            table = $('#archivesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('archives.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'title', name: 'title'},
                    {data: 'category', name: 'category'},
                    {data: 'year', name: 'year'},
                    {data: 'file_path', name: 'file_path', orderable: false, searchable: false},
                    {data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center'},
                ]
            });
        });

        function openModal(mode, data = null) {
            $('#archiveModal').removeClass('hidden');
            $('#archiveForm')[0].reset();
            $('#archiveId').val('');
            
            if (mode === 'edit') {
                $('#modalTitle').text('Edit Dokumen');
                $('#archiveId').val(data.id);
                $('#title').val(data.title);
                $('#category').val(data.category);
                $('#year').val(data.year);
                $('#description').val(data.description);
                // Cannot pre-fill file input
            } else {
                $('#modalTitle').text('Tambah Dokumen');
            }
        }

        function closeModal() {
            $('#archiveModal').addClass('hidden');
        }

        function saveArchive() {
            let formData = new FormData($('#archiveForm')[0]);
            let id = $('#archiveId').val();
            let url = id ? "{{ url('archives') }}/" + id : "{{ route('archives.store') }}";
            let type = 'POST'; // Since we use FormData, we always use POST. For update, we spoof method.

            if (id) {
                formData.append('_method', 'PUT');
            }

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        closeModal();
                        table.ajax.reload();
                        alert(response.message);
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors || xhr.responseJSON.message;
                    if(typeof errors === 'object') {
                        let msg = '';
                        $.each(errors, function(key, val){
                            msg += val[0] + '\n';
                        });
                        alert(msg);
                    } else {
                        alert(errors);
                    }
                }
            });
        }

        function editArchive(id) {
            $.get("{{ url('archives') }}/" + id + "/edit", function(response) {
                if (response.success) {
                    openModal('edit', response.data);
                } else {
                    alert('Gagal mengambil data');
                }
            });
        }

        function deleteArchive(id) {
            if (confirm('Apakah Anda yakin ingin menghapus arsip ini?')) {
                $.ajax({
                    url: "{{ url('archives') }}/" + id,
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
