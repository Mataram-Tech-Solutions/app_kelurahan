<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class KeluargaFactory extends Factory
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
            'nomor_kk' => $this->faker->unique()->numerify('################'),

            // nama_lengkap: Menggunakan nama orang Indonesia
            // 'id_kplkeluarga' => $faker->name(),
            'alamat' => $faker->address(),
            'rt' => $faker->unique()->numerify('###'),
            'rw' => $faker->unique()->numerify('###'),
            'status_bantuan' => $this->faker->numberBetween(1, 2),
        ];
    }
}