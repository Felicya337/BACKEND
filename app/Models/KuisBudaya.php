<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuisBudaya extends Model
{
    use HasFactory;

    protected $table = 'kuis_budayas'; // pastikan sama dengan nama tabel di migration

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'gambar',
        'pertanyaan',
        'micro_learning_id', // relasi ke tabel micro_learning (opsional)
    ];

    protected $casts = [
        'pertanyaan' => 'array', // otomatis ubah JSON jadi array
    ];

    public function microLearning()
    {
        return $this->belongsTo(MicroLearning::class);
    }
}
