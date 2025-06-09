<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';
    protected $primaryKey = 'id_pembayaran';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kendaraan_id',
        'staff_id',
        'tanggal_bayar',
        'jumlah_bayar',
        'metode_bayar',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'jumlah_bayar' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->id_pembayaran) {
                $model->id_pembayaran = self::generateCustomId();
            }
        });
    }

    private static function generateCustomId()
    {
        $latest = self::orderBy('id_pembayaran', 'desc')->first();

        if (!$latest || !preg_match('/^PB\d+$/', $latest->id_pembayaran)) {
            return 'PB01';
        }

        $lastNumber = (int) substr($latest->id_pembayaran, 2);
        $newNumber = $lastNumber + 1;

        do {
            $newId = 'PB' . str_pad($newNumber++, 2, '0', STR_PAD_LEFT);
        } while (self::where('id_pembayaran', $newId)->exists());

        return $newId;
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id', 'id_kendaraan');
    }
    public function staff()
    {
    return $this->belongsTo(Staff::class, 'staff_id');
    }

}
