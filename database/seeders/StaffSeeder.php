<?php

namespace Database\Seeders;

use App\Models\Staff;
use App\Models\Pembayaran;
use App\Models\Kendaraan;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        $kendaraanIds = Kendaraan::pluck('id_kendaraan');

        Staff::factory(5)->create()->each(function ($staff) use ($kendaraanIds) {
            foreach ($kendaraanIds->random(3) as $kendaraanId) {
                Pembayaran::factory()->create([
                    'kendaraan_id' => $kendaraanId,
                    'staff_id' => $staff->id,
                ]);
            }
        });
    }
}
