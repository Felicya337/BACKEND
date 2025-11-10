<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tokoh extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tempat_tanggal_lahir',
        'asal_daerah',
        'jabatan',
        'deskripsi',
        'foto',
    ];
}
