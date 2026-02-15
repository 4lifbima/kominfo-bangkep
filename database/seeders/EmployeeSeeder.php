<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'name' => 'Ratnasari, S.Sos',
                'nip' => '19850101 201001 2 005',
                'position' => 'Kepala Dinas',
                'type' => 'PNS',
                'status' => 'active',
                'avatar' => null, // Or define a placeholder if needed
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Santoso, S.Kom',
                'nip' => '19900512 201503 1 002',
                'position' => 'Kepala Bidang TIK',
                'type' => 'PNS',
                'status' => 'active',
                'avatar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Aminah, A.Md',
                'nip' => '19950820 201902 2 001',
                'position' => 'Staf Administrasi',
                'type' => 'PPPK',
                'status' => 'active',
                'avatar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'name' => 'Ahmad Rizky',
                'nip' => '-',
                'position' => 'Tenaga Teknis Jaringan',
                'type' => 'Honorer',
                'status' => 'active',
                'avatar' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
