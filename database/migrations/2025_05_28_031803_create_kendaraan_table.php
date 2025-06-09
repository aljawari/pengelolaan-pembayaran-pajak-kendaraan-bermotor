<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->string('id_kendaraan')->primary();
            $table->string('nomor_polisi')->unique();
            $table->string('merk');
            $table->string('tipe');
            $table->string('jenis');
            $table->integer('tahun_pembuatan');
            $table->string('warna');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
