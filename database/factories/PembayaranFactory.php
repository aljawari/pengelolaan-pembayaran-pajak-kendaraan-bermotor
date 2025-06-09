<?php

namespace Database\Factories;

use App\Models\Kendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembayaranFactory extends Factory
{
    public function definition(): array
    {
        $kendaraan = Kendaraan::inRandomOrder()->first();

        return [
            'kendaraan_id' => $kendaraan->id_kendaraan,
            'tanggal_bayar' => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'jumlah_bayar' => $this->faker->randomFloat(2, 50000, 1000000),
            'metode_bayar' => $this->faker->randomElement(['Tunai', 'Transfer', 'Kartu Kredit']),
            'keterangan' => $this->faker->optional()->sentence(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
