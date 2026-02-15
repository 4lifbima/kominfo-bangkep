<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Budget::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editUrl = route('budget.edit', $row->id);
                    $btn = '<a href="'.$editUrl.'" class="inline-flex items-center gap-2 px-3 py-2 bg-amber-50 text-amber-600 hover:bg-amber-100 rounded-lg transition-colors mr-1" title="Edit"><iconify-icon icon="solar:pen-new-square-linear"></iconify-icon> Edit</a>';
                    $btn .= '<button onclick="deleteItem('.$row->id.')" class="inline-flex items-center gap-2 px-3 py-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors" title="Hapus"><iconify-icon icon="solar:trash-bin-trash-linear"></iconify-icon> Hapus</button>';
                    return $btn;
                })
                ->addColumn('total_budget', function($row){
                    return 'Rp ' . number_format($row->total_budget, 0, ',', '.');
                })
                ->addColumn('realized', function($row){
                    return 'Rp ' . number_format($row->realized, 0, ',', '.');
                })
                ->addColumn('percentage', function($row){
                    $percent = $row->total_budget > 0 ? ($row->realized / $row->total_budget) * 100 : 0;
                    return number_format($percent, 2) . '%';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('budget.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('budget.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|digits:4',
            'total_budget' => 'required|numeric|min:0',
            'realized' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Budget::create($request->all());

        return redirect()->route('budget.index')
            ->with('success', 'Data anggaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $budget = Budget::findOrFail($id);
        return view('budget.edit', compact('budget'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'year' => 'required|digits:4',
            'total_budget' => 'required|numeric|min:0',
            'realized' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $budget = Budget::findOrFail($id);
        $budget->update($request->all());

        return redirect()->route('budget.index')
            ->with('success', 'Data anggaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $budget = Budget::findOrFail($id);
        $budget->delete();

        return response()->json(['success' => true, 'message' => 'Data anggaran berhasil dihapus.']);
    }
}
