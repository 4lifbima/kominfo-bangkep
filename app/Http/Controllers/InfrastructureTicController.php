<?php

namespace App\Http\Controllers;

use App\Models\InfrastructureTic;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InfrastructureTicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = InfrastructureTic::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editUrl = route('infrastructure.edit', $row->id);
                    $btn = '<a href="'.$editUrl.'" class="inline-flex items-center gap-2 px-3 py-2 bg-amber-50 text-amber-600 hover:bg-amber-100 rounded-lg transition-colors mr-1" title="Edit"><iconify-icon icon="solar:pen-new-square-linear"></iconify-icon> Edit</a>';
                    $btn .= '<button onclick="deleteItem('.$row->id.')" class="inline-flex items-center gap-2 px-3 py-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors" title="Hapus"><iconify-icon icon="solar:trash-bin-trash-linear"></iconify-icon> Hapus</button>';
                    return $btn;
                })
                ->addColumn('status', function($row){
                    if($row->status == 'Active') {
                        return '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100"><iconify-icon icon="solar:check-circle-bold"></iconify-icon> Active</span>';
                    } elseif($row->status == 'Maintenance') {
                        return '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-100"><iconify-icon icon="solar:clock-circle-bold"></iconify-icon> Maintenance</span>';
                    } else {
                        return '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-50 text-red-700 border border-red-100"><iconify-icon icon="solar:forbidden-circle-bold"></iconify-icon> Down</span>';
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('infrastructure.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('infrastructure.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'location' => 'required|string',
            'status' => 'required|string',
            'capacity' => 'nullable|string',
        ]);

        InfrastructureTic::create($request->all());

        return redirect()->route('infrastructure.index')
            ->with('success', 'Data infrastruktur berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(InfrastructureTic $infrastructureTic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $infrastructure = InfrastructureTic::findOrFail($id);
        return view('infrastructure.edit', compact('infrastructure'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'location' => 'required|string',
            'status' => 'required|string',
            'capacity' => 'nullable|string',
        ]);

        $infrastructure = InfrastructureTic::findOrFail($id);
        $infrastructure->update($request->all());

        return redirect()->route('infrastructure.index')
            ->with('success', 'Data infrastruktur berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $infrastructure = InfrastructureTic::findOrFail($id);
        $infrastructure->delete();

        return response()->json(['success' => true, 'message' => 'Data infrastruktur berhasil dihapus.']);
    }
}
