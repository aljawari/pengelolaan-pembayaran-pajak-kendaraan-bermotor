<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;

    protected $table = 'pajaks';

    protected $fillable = [
        'nama_pemilik', 
        'nomor_polisi', 
        'jenis_kendaraan', 
        'tahun', 
        'jumlah_pajak',
        'kendaraan_id',
    ];

    // Relasi one-to-many: satu pajak bisa memiliki banyak kendaraan
    public function kendaraan()
    {
    return $this->belongsTo(Kendaraan::class, 'kendaraan_id', 'id_kendaraan');
    }
}
