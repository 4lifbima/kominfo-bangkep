<?php

namespace App\Http\Controllers;

use App\Models\PublicService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PublicServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = PublicService::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editUrl = route('services.edit', $row->id);
                    $btn = '<a href="'.$editUrl.'" class="inline-flex items-center gap-2 px-3 py-2 bg-amber-50 text-amber-600 hover:bg-amber-100 rounded-lg transition-colors mr-1" title="Edit"><iconify-icon icon="solar:pen-new-square-linear"></iconify-icon> Edit</a>';
                    $btn .= '<button onclick="deleteItem('.$row->id.')" class="inline-flex items-center gap-2 px-3 py-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors" title="Hapus"><iconify-icon icon="solar:trash-bin-trash-linear"></iconify-icon> Hapus</button>';
                    return $btn;
                })
                ->addColumn('link', function($row){
                    return '<a href="'.$row->url.'" target="_blank" class="text-primary hover:underline flex items-center gap-1"><iconify-icon icon="solar:link-circle-bold"></iconify-icon> '.$row->url.'</a>';
                })
                ->addColumn('status', function($row){
                    if($row->status == 'active') {
                        return '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100"><iconify-icon icon="solar:check-circle-bold"></iconify-icon> Active</span>';
                    } else {
                        return '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-50 text-red-700 border border-red-100"><iconify-icon icon="solar:forbidden-circle-bold"></iconify-icon> Maintenance</span>';
                    }
                })
                ->rawColumns(['action', 'link', 'status'])
                ->make(true);
        }

        return view('services.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        PublicService::create($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Layanan publik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PublicService $publicService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = PublicService::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'description' => 'nullable|string',
            'status' => 'required|string',
        ]);

        $service = PublicService::findOrFail($id);
        $service->update($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Layanan publik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = PublicService::findOrFail($id);
        $service->delete();

        return response()->json(['success' => true, 'message' => 'Layanan publik berhasil dihapus.']);
    }
}
