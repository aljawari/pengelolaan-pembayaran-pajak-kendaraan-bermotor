<?php

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
        $table->decimal('jumlah_pajak', 15, 2);
        $table->string('kendaraan_id'); // foreign key
        $table->timestamps();

        $table->foreign('kendaraan_id')->references('id_kendaraan')->on('kendaraans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pajaks');
    }
};
