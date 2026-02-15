<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('public_services')->insert([
            [
                'name' => 'SIPD RI',
                'url' => 'https://sipd.go.id',
                'description' => 'Sistem Informasi Pemerintahan Daerah Republik Indonesia.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SP4N LAPOR!',
                'url' => 'https://lapor.go.id',
                'description' => 'Layanan Aspirasi dan Pengaduan Online Rakyat.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Website Kominfo Bangkep',
                'url' => 'https://kominfo.banggaikeppkab.go.id',
                'description' => 'Portal resmi Dinas Kominfo Kabupaten Banggai Kepulauan.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aplikasi Antrian Online',
                'url' => 'https://antrian.banggaikeppkab.go.id',
                'description' => 'Aplikasi pendaftaran antrian pelayanan publik secara online.',
                'status' => 'maintenance',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
