<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pajak>
 */
class PajakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_pemilik'     => $this->faker->name(),
            'nomor_polisi'     => strtoupper($this->faker->bothify('??####??')), // contoh: AB1234CD
            'jenis_kendaraan'  => $this->faker->randomElement(['Mobil', 'Motor']),
            'tahun'            => $this->faker->numberBetween(2000, now()->year),
            'jumlah_pajak'     => $this->faker->numberBetween(300000, 2000000),
            'created_at'       => now(),
            'updated_at'       => now()
        ];
    }
}
