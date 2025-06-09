<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'kendaraans';
    protected $primaryKey = 'id_kendaraan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nomor_polisi',
        'merk',
        'tipe',
        'jenis',
        'tahun_pembuatan',
        'warna',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id_kendaraan) {
                $model->id_kendaraan = self::generateCustomId();
            }
        });
    }

    private static function generateCustomId()
    {
        $last = self::orderBy('id_kendaraan', 'desc')->first();
        if (!$last || !preg_match('/^KD\d+$/', $last->id_kendaraan)) {
            return 'KD001';
        }

        $lastNumber = (int) substr($last->id_kendaraan, 2);
        $newNumber = $lastNumber + 1;

        return 'KD' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'kendaraan_id', 'id_kendaraan');
    }

    public function pajak()
    {
        return $this->hasOne(Pajak::class, 'kendaraan_id', 'id_kendaraan');
    }
}
