<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KendaraanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nomor_polisi' => strtoupper($this->faker->unique()->bothify('AB #### ??')),
            'merk' => $this->faker->randomElement(['Toyota', 'Honda', 'Suzuki', 'Yamaha']),
            'tipe' => $this->faker->word,
            'jenis' => $this->faker->randomElement(['Mobil', 'Motor']),
            'tahun_pembuatan' => $this->faker->numberBetween(2000, 2024),
            'warna' => $this->faker->safeColorName(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
