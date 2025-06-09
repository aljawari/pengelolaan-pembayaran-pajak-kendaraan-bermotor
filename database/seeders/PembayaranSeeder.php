<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        if (Kendaraan::count() === 0) {
            $this->command->info('Tidak ada data kendaraan. Seeder dibatalkan.');
            return;
        }

        foreach (Kendaraan::all() as $kendaraan) {
            $jumlahPembayaran = rand(1, 3);

            for ($i = 0; $i < $jumlahPembayaran; $i++) {
                $pembayaran = Pembayaran::factory()->make([
                    'kendaraan_id' => $kendaraan->id_kendaraan,
                ]);

                $pembayaran->save();
            }
        }
    }
}
