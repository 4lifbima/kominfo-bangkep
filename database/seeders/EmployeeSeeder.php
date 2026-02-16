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
                'avatar' => null,
                'education_history' => json_encode([
                    ['school' => 'Universitas Tadulako', 'year' => '2004 - 2008', 'degree' => 'Sarjana Sosial (S.Sos)'],
                    ['school' => 'SMA Negeri 1 Luwuk', 'year' => '2001 - 2004', 'degree' => 'IPS'],
                ]),
                'job_history' => json_encode([
                    ['position' => 'Kepala Dinas', 'institution' => 'Dinas Kominfo', 'year' => '2022 - Sekarang'],
                    ['position' => 'Sekretaris Dinas', 'institution' => 'Dinas Kominfo', 'year' => '2019 - 2022'],
                    ['position' => 'Kepala Bidang IKP', 'institution' => 'Dinas Kominfo', 'year' => '2015 - 2019'],
                ]),
                'social_media' => json_encode([
                    'facebook' => '#',
                    'instagram' => '#',
                    'linkedin' => '#'
                ]),
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
                'education_history' => json_encode([
                    ['school' => 'STMIK Handayani Makassar', 'year' => '2008 - 2012', 'degree' => 'Sarjana Komputer (S.Kom)'],
                ]),
                'job_history' => json_encode([
                    ['position' => 'Kepala Bidang TIK', 'institution' => 'Dinas Kominfo', 'year' => '2023 - Sekarang'],
                    ['position' => 'Pranata Komputer Ahli Muda', 'institution' => 'Dinas Kominfo', 'year' => '2018 - 2023'],
                ]),
                'social_media' => json_encode([
                    'instagram' => '#',
                    'twitter' => '#'
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dr. Sarah Amalia',
                'nip' => '19880315 201212 2 003',
                'position' => 'Sekretaris Dinas',
                'type' => 'PNS',
                'status' => 'active',
                'avatar' => null,
                'education_history' => json_encode([
                     ['school' => 'Universitas Hasanuddin', 'year' => '2012 - 2014', 'degree' => 'Magister Manajemen (M.M.)'],
                     ['school' => 'Universitas Tadulako', 'year' => '2006 - 2010', 'degree' => 'Sarjana Ekonomi (S.E.)'],
                ]),
                'job_history' => json_encode([
                    ['position' => 'Sekretaris Dinas', 'institution' => 'Dinas Kominfo', 'year' => '2023 - Sekarang'],
                    ['position' => 'Kasubag Perencanaan', 'institution' => 'Bappeda', 'year' => '2018 - 2023'],
                ]),
                'social_media' => json_encode([
                    'linkedin' => '#',
                ]),
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
                'education_history' => json_encode([
                    ['school' => 'SMK Negeri 1 Salakan', 'year' => '2015 - 2018', 'degree' => 'TKJ'],
                ]),
                'job_history' => json_encode([
                    ['position' => 'Tenaga Teknis Jaringan', 'institution' => 'Dinas Kominfo', 'year' => '2020 - Sekarang'],
                ]),
                'social_media' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
