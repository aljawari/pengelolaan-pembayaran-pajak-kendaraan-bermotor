<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->string('id_pembayaran')->primary();
            $table->string('kendaraan_id');
            $table->unsignedBigInteger('staff_id')->nullable(); // Tambahan relasi ke staff
            $table->date('tanggal_bayar');
            $table->decimal('jumlah_bayar', 15, 2);
            $table->string('metode_bayar')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Foreign key ke kendaraan
            $table->foreign('kendaraan_id')
                  ->references('id_kendaraan')
                  ->on('kendaraans')
                  ->onDelete('cascade');

            // Foreign key ke staff
            $table->foreign('staff_id')
                  ->references('id')
                  ->on('staff')
                  ->onDelete('set null');

            $table->index('kendaraan_id');
            $table->index('staff_id');
            $table->index('tanggal_bayar');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
