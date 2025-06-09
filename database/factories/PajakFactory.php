<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PajakFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_pemilik'    => $this->faker->name(),
            'nomor_polisi'    => strtoupper($this->faker->bothify('AB####CD')),
            'jenis_kendaraan' => $this->faker->randomElement(['Mobil', 'Motor']),
            'tahun'           => $this->faker->numberBetween(2000, now()->year),
            'jumlah_pajak'    => $this->faker->numberBetween(500000, 2000000),
        ];
    }
}
