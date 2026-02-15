<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statistics')->insert([
            [
                'label' => 'Persentase Penduduk Melek Teknologi',
                'value' => '75',
                'unit' => '%',
                'year' => '2025',
                'category' => 'IKU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'Jumlah Pengguna Internet',
                'value' => '85000',
                'unit' => 'Orang',
                'year' => '2025',
                'category' => 'Sektoral',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'Indeks SPBE',
                'value' => '3.5',
                'unit' => 'Skala 5',
                'year' => '2024',
                'category' => 'IKU',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'label' => 'Jumlah Tower BTS',
                'value' => '45',
                'unit' => 'Unit',
                'year' => '2025',
                'category' => 'Sektoral',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
