<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MicroLearning extends Model
{
    use HasFactory;

    protected $table = 'micro_learnings';

    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'isi_html',
    ];

    public function kuisBudayas()
    {
        return $this->hasMany(KuisBudaya::class);
    }
}
