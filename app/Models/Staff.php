<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory;

    protected $table = 'staff';
    protected $fillable = [
        'nama',
        'email',
        'no_telepon',
        'jabatan',
        'password',
    ];
    protected $hidden = ['password'];

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'staff_id', 'id');
    }
}
