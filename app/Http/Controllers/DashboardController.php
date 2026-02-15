<?php

namespace App\Http\Controllers;

use App\Models\Archive;
use App\Models\Budget;
use App\Models\Employee;
use App\Models\InfrastructureTic;
use App\Models\Program;
use App\Models\PublicService;
use App\Models\Statistic;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'infrastructure' => InfrastructureTic::count(),
            'statistics' => Statistic::count(),
            'programs' => Program::count(),
            'budgets' => Budget::count(),
            'total_budget' => Budget::sum('total_budget'),
            'realized_budget' => Budget::sum('realized'),
            'services' => PublicService::count(),
            'employees' => Employee::count(),
            'archives' => Archive::count(),
        ];

        $latest_programs = Program::latest()->take(5)->get();

        return view('dashboard', compact('stats', 'latest_programs'));
    }
}
