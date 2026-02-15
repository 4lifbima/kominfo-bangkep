<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\InfrastructureTicController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\PublicServiceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;


// Public Routes
Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/tentang', [LandingController::class, 'about'])->name('landing.about');
Route::get('/layanan', [LandingController::class, 'services'])->name('landing.services');
Route::get('/sambutan', [LandingController::class, 'sambutan'])->name('landing.sambutan');
Route::get('/kontak', [LandingController::class, 'contact'])->name('landing.contact');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('archives', ArchiveController::class);
    Route::get('archives/export/excel', [ArchiveController::class, 'export'])->name('archives.export');
    Route::get('archives/{archive}/preview', [ArchiveController::class, 'preview'])->name('archives.preview');

    // New Modules
    Route::resource('infrastructure', InfrastructureTicController::class);
    Route::resource('statistics', StatisticController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('budget', BudgetController::class);
    Route::resource('services', PublicServiceController::class);
    Route::resource('employees', EmployeeController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
