<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArchiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('archives')->insert([
            [
                'title' => 'Laporan Tahunan 2024',
                'category' => 'Laporan',
                'file_path' => 'archives/laporan_tahunan_2024.pdf',
                'description' => 'Laporan kinerja tahunan Dinas Kominfo Tahun 2024',
                'year' => '2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'SK Tim Teknis',
                'category' => 'SK',
                'file_path' => 'archives/sk_tim_teknis.pdf',
                'description' => 'Surat Keputusan pembentukan tim teknis pengembangan aplikasi.',
                'year' => '2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
