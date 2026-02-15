<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Program::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editUrl = route('programs.edit', $row->id);
                    $btn = '<a href="'.$editUrl.'" class="inline-flex items-center gap-2 px-3 py-2 bg-amber-50 text-amber-600 hover:bg-amber-100 rounded-lg transition-colors mr-1" title="Edit"><iconify-icon icon="solar:pen-new-square-linear"></iconify-icon> Edit</a>';
                    $btn .= '<button onclick="deleteItem('.$row->id.')" class="inline-flex items-center gap-2 px-3 py-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors" title="Hapus"><iconify-icon icon="solar:trash-bin-trash-linear"></iconify-icon> Hapus</button>';
                    return $btn;
                })
                ->addColumn('progress', function($row){
                     return '<div class="w-full bg-slate-100 dark:bg-slate-700 rounded-full h-2.5">
                                <div class="bg-primary h-2.5 rounded-full" style="width: '.$row->progress.'%"></div>
                            </div>
                            <span class="text-xs text-slate-500 mt-1 block">'.$row->progress.'%</span>';
                })
                ->addColumn('status', function($row){
                    if($row->status == 'Completed') {
                        return '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100"><iconify-icon icon="solar:check-circle-bold"></iconify-icon> Completed</span>';
                    } elseif($row->status == 'On Progress') {
                        return '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100"><iconify-icon icon="solar:clock-circle-bold"></iconify-icon> On Progress</span>';
                    } else {
                        return '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-50 text-slate-700 border border-slate-100"><iconify-icon icon="solar:calendar-bold"></iconify-icon> Planned</span>';
                    }
                })
                ->rawColumns(['action', 'progress', 'status'])
                ->make(true);
        }

        return view('programs.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Program::create($request->all());

        return redirect()->route('programs.index')
            ->with('success', 'Program kerja berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $program = Program::findOrFail($id);
        $program->update($request->all());

        return redirect()->route('programs.index')
            ->with('success', 'Program kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();

        return response()->json(['success' => true, 'message' => 'Program kerja berhasil dihapus.']);
    }
}
