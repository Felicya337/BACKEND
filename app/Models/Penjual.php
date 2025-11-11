<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjual extends Authenticatable
{
    use HasFactory;

    protected $table = 'penjuals';
    protected $fillable = [
        'nama_penjual',
        'nama_toko',
        'email',
        'alamat',
        'no_telpon',
        'password',
        'is_blocked',
    ];

    protected $hidden = ['password'];

    public function products()
    {
        return $this->hasMany(Marketplace::class, 'penjual_id');
    }
}
