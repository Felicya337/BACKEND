<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketplace extends Model
{
    use HasFactory;

    protected $fillable = [
        'penjual_id',
        'nama_produk',
        'deskripsi',
        'kategori',
        'harga',
        'gambar',
    ];

    public function penjual()
    {
        return $this->belongsTo(Penjual::class);
    }
}
