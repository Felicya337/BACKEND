<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Tarian',
            'Pakaian Adat',
            'Rumah Adat',
            'Senjata Tradisional',
            'Upacara Adat',
            'Bahasa & Aksara',
            'Kuliner Tradisional',
            'Marga & Silsilah',
            'Mitos & Kepercayaan',
            'Musik & Alat Musik',
            'Nilai Filosofi',
        ];

        foreach ($kategori as $k) {
            Kategori::create([
                'nama' => $k,
                'slug' => Str::slug($k),
            ]);
        }
    }
}
