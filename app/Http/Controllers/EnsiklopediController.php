<?php

namespace App\Http\Controllers;

use App\Models\Ensiklopedi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EnsiklopediController extends Controller
{
    public function index()
    {
        return Ensiklopedi::all();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255|unique:ensiklopedis,judul',
            'slug' => 'nullable|string',
            'gambar' => 'nullable|string',
            'deskripsi_html' => 'nullable|string',
            'sumber' => 'nullable|string',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['judul']);

        return Ensiklopedi::create($data);
    }
    public function show($id)
    {
        return Ensiklopedi::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $ensiklopedi = Ensiklopedi::findOrFail($id);
        $ensiklopedi->update($data);

        return $ensiklopedi;
    }

    public function destroy($id)
    {
        return Ensiklopedi::destroy($id);
    }
}
