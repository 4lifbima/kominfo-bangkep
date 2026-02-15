<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfrastructureTicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('infrastructure_tics')->insert([
            [
                'name' => 'Menara Telekomunikasi Salakan',
                'type' => 'Tower',
                'location' => 'Kec. Tinangkung',
                'status' => 'Active',
                'capacity' => '4G/LTE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Server Pusat Data',
                'type' => 'Server',
                'location' => 'Kantor Kominfo',
                'status' => 'Active',
                'capacity' => '100 TB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jaringan Fiber Optic Pemda',
                'type' => 'Fiber Optic',
                'location' => 'Kompleks Perkantoran',
                'status' => 'Maintenance',
                'capacity' => '1 Gbps',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [
                'name' => 'Wifi Publik Taman Kota',
                'type' => 'Access Point',
                'location' => 'Alun-alun Salakan',
                'status' => 'Active',
                'capacity' => '100 Mbps',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
