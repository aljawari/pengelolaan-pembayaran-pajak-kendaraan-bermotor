<?php

namespace Database\Seeders;

use App\Models\Pajak;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PajakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pajak::factory()->count(10)->create();
    }
}
