<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ensiklopedi extends Model
{
    use HasFactory;

    protected $table = 'ensiklopedis';

    protected $fillable = [
        'kategori_id',
        'judul',
        'slug',
        'gambar',
        'deskripsi_html',
        'sumber',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function culturals()
    {
        return $this->hasMany(Cultural::class, 'ensiklopedi_id');
    }
}
