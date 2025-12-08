<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class JnsKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data yang akan dimasukkan
        $jk = [
            [
                'name' => 'Laki - laki',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Perempuan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Masukkan data ke dalam tabel 'sts_hubs'
        DB::table('jns_kelamins')->insert($jk);
    }
}
