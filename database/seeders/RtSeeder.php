<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rts = [];

        // Loop untuk membuat data RW 001 sampai 007
        for ($i = 1; $i <= 7; $i++) {
            $rts[] = [
                // str_pad() akan membuat format '001', '002', dst.
                'name' => str_pad($i, 3, '0', STR_PAD_LEFT),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Masukkan data ke dalam tabel 'rts'
        DB::table('rts')->insert($rts);
    }
}
