<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Storytelling extends Model
{
    protected $table = 'storytellings';
    protected $fillable = [
        'judul',
        'isi',
        'penulis'
    ];

}
