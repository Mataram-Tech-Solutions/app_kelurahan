<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StsHubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        // Data yang akan dimasukkan
        $statuses = [
            [
                'name' => 'Kawin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Belum Kawin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cerai Hidup',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cerai Mati',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Masukkan data ke dalam tabel 'sts_hubs'
        DB::table('sts_hubs')->insert($statuses);
    }
}
