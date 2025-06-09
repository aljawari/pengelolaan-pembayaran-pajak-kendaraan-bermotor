<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pajak;
use App\Models\Kendaraan;

class PajakSeeder extends Seeder
{
    public function run(): void
    {
        Kendaraan::factory()
            ->count(10)
            ->create()
            ->each(function ($kendaraan) {
                Pajak::factory()->create([
                    'nomor_polisi' => $kendaraan->nomor_polisi,
                    'nama_pemilik' => fake()->name(),
                    'jenis_kendaraan' => $kendaraan->jenis,
                    'tahun' => $kendaraan->tahun_pembuatan,
                    'kendaraan_id' => $kendaraan->id_kendaraan,
                ]);
            });
    }
}
