<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('budgets')->insert([
            [
                'year' => '2025',
                'total_budget' => 5000000000,
                'realized' => 3500000000,
                'description' => 'Anggaran Program Pengelolaan Informasi dan Komunikasi Publik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => '2025',
                'total_budget' => 12000000000,
                'realized' => 4500000000,
                'description' => 'Anggaran Program Aplikasi Informatika',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => '2024',
                'total_budget' => 4500000000,
                'realized' => 4450000000,
                'description' => 'Anggaran Program Statistik Sektoral',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
