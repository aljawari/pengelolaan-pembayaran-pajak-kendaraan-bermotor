<?php

use Database\Seeders\PajakSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pajaks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemilik');
            $table->string('nomor_polisi');
            $table->enum('jenis_kendaraan', ['Mobil', 'Motor']);
            $table->integer('tahun');
            $table->integer('jumlah_pajak');
            $table->timestamps();
        });

        $this->callSeeder();
    }
    private function callSeeder(): void
    {
        // jalankan seeder secara manual
        (new PajakSeeder)->run();
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pajak');
    }
};
