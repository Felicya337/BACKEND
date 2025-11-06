<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultural extends Model
{
    use HasFactory;

    protected $fillable = [
        'ensiklopedi_id',
        'name',
        'category',
        'description',
        'origin',
        'image',
    ];


    public function ensiklopedi()
    {
        return $this->belongsTo(Ensiklopedi::class, 'ensiklopedi_id');
    }
}
