<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function pejabat()
    {
        // Get all active employees
        $allEmployees = \App\Models\Employee::where('status', 'active')->get();

        // Categorize employees
        $kadis = $allEmployees->filter(fn($e) => \Illuminate\Support\Str::contains($e->position, 'Kepala Dinas'))->first();
        
        $struktural = $allEmployees->filter(function($e) {
            return \Illuminate\Support\Str::contains($e->position, ['Sekretaris', 'Kepala Bidang']);
        });

        // Others (Staff, Fungsional, etc) - Exclude Kadis and Struktural
        $others = $allEmployees->diff([$kadis])->diff($struktural);

        // If using dummy data when empty
        if ($allEmployees->isEmpty()) {
            // Logic handled in view with dummies or seeded data
        }

        return view('landing.pejabat', compact('kadis', 'struktural', 'others', 'allEmployees'));
    }
    
    public function pejabatDetail($slug)
    {
        // Find employee by matching slugified name since no slug column exists
        $employee = \App\Models\Employee::where('status', 'active')
            ->get()
            ->first(function ($emp) use ($slug) {
                return \Illuminate\Support\Str::slug($emp->name) === $slug;
            });

        if (!$employee) {
            abort(404);
        }

        return view('landing.pejabat-detail', compact('employee'));
    }

    public function index()
    {
        return view('landing');
    }

    public function about()
    {
        return view('landing.about');
    }

    public function services()
    {
        return view('landing.services');
    }

    public function sambutan()
    {
        return view('landing.sambutan');
    }

    public function contact()
    {
        return view('landing.contact');
    }
}
