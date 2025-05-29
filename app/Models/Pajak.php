<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;

    protected $table = 'pajaks';

    protected $fillable = ['nama_pemilik', 'nomor_polisi', 'jenis_kendaraan', 'tahun', 'jumlah_pajak'];

    public static function getAll()
    {
        return Pajak::all();
    }

    public static function find($id)
    {
        return Pajak::where('id', $id)->first();
    }
}