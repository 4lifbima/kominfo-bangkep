<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editUrl = route('employees.edit', $row->id);
                    $btn = '<a href="'.$editUrl.'" class="inline-flex items-center gap-2 px-3 py-2 bg-amber-50 text-amber-600 hover:bg-amber-100 rounded-lg transition-colors mr-1" title="Edit"><iconify-icon icon="solar:pen-new-square-linear"></iconify-icon> Edit</a>';
                    $btn .= '<button onclick="deleteItem('.$row->id.')" class="inline-flex items-center gap-2 px-3 py-2 bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors" title="Hapus"><iconify-icon icon="solar:trash-bin-trash-linear"></iconify-icon> Hapus</button>';
                    return $btn;
                })
                ->addColumn('avatar_view', function($row){
                    if($row->avatar) {
                        return '<img src="'.asset('storage/'.$row->avatar).'" class="w-10 h-10 rounded-full object-cover border border-slate-200" alt="'.$row->name.'">';
                    }
                    return '<div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-400"><iconify-icon icon="solar:user-bold" width="20"></iconify-icon></div>';
                })
                ->addColumn('status', function($row){
                    if($row->status == 'active') {
                        return '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100"><iconify-icon icon="solar:check-circle-bold"></iconify-icon> Active</span>';
                    } else {
                        return '<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-50 text-slate-700 border border-slate-100"><iconify-icon icon="solar:forbidden-circle-bold"></iconify-icon> Inactive</span>';
                    }
                })
                ->rawColumns(['action', 'avatar_view', 'status'])
                ->make(true);
        }

        return view('employees.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'position' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        Employee::create($data);

        return redirect()->route('employees.index')
            ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nip' => 'nullable|string|max:255',
            'position' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $employee = Employee::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($employee->avatar) {
                Storage::disk('public')->delete($employee->avatar);
            }
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $employee->update($data);

        return redirect()->route('employees.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        
        if ($employee->avatar) {
            Storage::disk('public')->delete($employee->avatar);
        }
        
        $employee->delete();

        return response()->json(['success' => true, 'message' => 'Data pegawai berhasil dihapus.']);
    }
}
