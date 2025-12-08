<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rws = [];

        // Loop untuk membuat data RW 001 sampai 007
        for ($i = 1; $i <= 7; $i++) {
            $rws[] = [
                // str_pad() akan membuat format '001', '002', dst.
                'name' => str_pad($i, 3, '0', STR_PAD_LEFT),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Masukkan data ke dalam tabel 'rws'
        DB::table('rws')->insert($rws);
    }
}
