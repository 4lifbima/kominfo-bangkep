<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('programs')->insert([
            [
                'name' => 'Peningkatan Keamanan Informasi Pemerintah Daerah',
                'progress' => '80',
                'status' => 'On Progress',
                'description' => 'Implementasi sistem keamanan siber terpadu untuk melindungi data pemerintah daerah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pembangunan Infrastruktur Internet Desa',
                'progress' => '45',
                'status' => 'On Progress',
                'description' => 'Penyediaan akses internet untuk desa-desa terpencil di wilayah Banggai Kepulauan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'name' => 'Sosialisasi Literasi Digital',
                'progress' => '100',
                'status' => 'Completed',
                'description' => 'Pelatihan dan seminar literasi digital untuk masyarakat umum dan pelajar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pengembangan Aplikasi Smart City',
                'progress' => '20',
                'status' => 'Planned',
                'description' => 'Perancangan masterplan dan pengembangan aplikasi pendukung Smart City.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
