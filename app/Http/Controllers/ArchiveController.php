<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Traits\AjaxResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArchivesExport;

class ArchiveController extends Controller
{
    use AjaxResponse;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Archive::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $previewUrl = url('archives/'.$row->id.'/preview');
                    $btn = '<a href="'.$previewUrl.'" target="_blank" class="p-2 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors mr-1" title="Preview PDF"><iconify-icon icon="solar:eye-linear"></iconify-icon></a>';
                    $btn .= '<button onclick="editArchive('.$row->id.')" class="p-2 rounded-lg bg-orange-50 text-orange-600 hover:bg-orange-100 transition-colors mr-1" title="Edit"><iconify-icon icon="solar:pen-new-square-linear"></iconify-icon></button>';
                    $btn .= '<button onclick="deleteArchive('.$row->id.')" class="p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-100 transition-colors" title="Hapus"><iconify-icon icon="solar:trash-bin-trash-linear"></iconify-icon></button>';
                    return $btn;
                })
                ->rawColumns(['file_path', 'action'])
                ->make(true);
        }

        return view('archives.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'year' => 'required|digits:4',
            'file' => 'required|mimes:pdf|max:5120', // Max 5MB
            'description' => 'nullable|string'
        ]);

        try {
            $path = $request->file('file')->store('archives', 'public');

            $archive = Archive::create([
                'title' => $request->title,
                'category' => $request->category,
                'year' => $request->year,
                'file_path' => $path,
                'description' => $request->description
            ]);

            return $this->success('Arsip berhasil ditambahkan', $archive);
        } catch (\Exception $e) {
            return $this->error('Gagal menambahkan arsip: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $archive = Archive::find($id);
        if (!$archive) {
             return $this->error('Arsip tidak ditemukan', [], 404);
        }
        return $this->success('Data arsip', $archive);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'year' => 'required|digits:4',
            'file' => 'nullable|mimes:pdf|max:5120',
            'description' => 'nullable|string'
        ]);

        try {
            $archive = Archive::find($id);
            if (!$archive) {
                return $this->error('Arsip tidak ditemukan', [], 404);
            }

            $data = [
                'title' => $request->title,
                'category' => $request->category,
                'year' => $request->year,
                'description' => $request->description
            ];

            if ($request->hasFile('file')) {
                // Delete old file
                if ($archive->file_path && Storage::disk('public')->exists($archive->file_path)) {
                    Storage::disk('public')->delete($archive->file_path);
                }
                $data['file_path'] = $request->file('file')->store('archives', 'public');
            }

            $archive->update($data);

            return $this->success('Arsip berhasil diperbarui', $archive);
        } catch (\Exception $e) {
            return $this->error('Gagal memperbarui arsip: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $archive = Archive::find($id);
            if (!$archive) {
                return $this->error('Arsip tidak ditemukan', [], 404);
            }

            if ($archive->file_path && Storage::disk('public')->exists($archive->file_path)) {
                Storage::disk('public')->delete($archive->file_path);
            }

            $archive->delete();

            return $this->success('Arsip berhasil dihapus');
        } catch (\Exception $e) {
            return $this->error('Gagal menghapus arsip: ' . $e->getMessage());
        }
    }

    public function export() 
    {
        return Excel::download(new ArchivesExport, 'archives_'.date('Y-m-d').'.xlsx');
    }

    public function preview($id)
    {
        $archive = Archive::find($id);
        if (!$archive || !Storage::disk('public')->exists($archive->file_path)) {
            abort(404);
        }
        
        return response()->file(storage_path('app/public/'.$archive->file_path));
    }
}
