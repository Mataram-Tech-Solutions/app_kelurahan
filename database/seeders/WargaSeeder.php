<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        // Perintah ini akan membuat 50 data warga baru menggunakan factory yang sudah kita definisikan.
        // Anda bisa mengubah angka 50 sesuai kebutuhan.
        Warga::factory(2)->create();
    }
}