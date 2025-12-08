<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warga>
 */
class WargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Menggunakan Faker dengan lokal Indonesia untuk data yang lebih relevan
        $faker = \Faker\Factory::create('id_ID');

        return [
            // NIK: 16 digit angka unik
            'nik' => $this->faker->unique()->numerify('################'),

            // nama_lengkap: Menggunakan nama orang Indonesia
            'nama_lengkap' => $faker->name(),

            // status_hubungan: Angka acak antara 1 dan 4
            'status_hubungan' => $this->faker->numberBetween(1, 4),

            // tempat_lahir: Menggunakan nama kota di Indonesia
            'tempat_lahir' => $faker->city(),

            // tanggal_lahir: Tanggal acak untuk orang berusia antara 18 s/d 65 tahun
            'tanggal_lahir' => $this->faker->dateTimeBetween('-65 years', '-18 years')->format('Y-m-d'),

            // jenis_kelamin: Angka acak antara 1 dan 2
            'jenis_kelamin' => $this->faker->numberBetween(1, 2),

            // pekerjaan: Menggunakan nama pekerjaan dalam bahasa Indonesia
            'pekerjaan' => $faker->jobTitle(),
        ];
    }
}