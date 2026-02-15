<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Statistic::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editUrl = route('statistics.edit', $row->id);
                    $btn = '<a href="'.$editUrl.'" class="inline-flex items-center gap-2 px-3 py-2 bg-amber-50 text-amber-600 hover:bg-amber-100 rounded-lg transition-colors mr-1" title="Edit"><iconify-icon icon="solar:pen-new-square-linear"></iconify-icon> Edit</a>';
                    $btn .= '<button onclick="deleteItem('.$row->id.')" class="inline-flex items-center gap-2 px-3 py-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors" title="Hapus"><iconify-icon icon="solar:trash-bin-trash-linear"></iconify-icon> Hapus</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('statistics.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('statistics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string',
            'unit' => 'nullable|string',
            'year' => 'required|digits:4',
            'category' => 'required|string',
        ]);

        Statistic::create($request->all());

        return redirect()->route('statistics.index')
            ->with('success', 'Data statistik berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistic $statistic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $statistic = Statistic::findOrFail($id);
        return view('statistics.edit', compact('statistic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string',
            'unit' => 'nullable|string',
            'year' => 'required|digits:4',
            'category' => 'required|string',
        ]);

        $statistic = Statistic::findOrFail($id);
        $statistic->update($request->all());

        return redirect()->route('statistics.index')
            ->with('success', 'Data statistik berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $statistic = Statistic::findOrFail($id);
        $statistic->delete();

        return response()->json(['success' => true, 'message' => 'Data statistik berhasil dihapus.']);
    }
}
