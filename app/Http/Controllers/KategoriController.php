<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return response()->json(Kategori::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|unique:kategoris',
        ]);

        $kategori = Kategori::create([
            'nama' => $validated['nama'],
            'slug' => Str::slug($validated['nama']),
        ]);

        return response()->json($kategori, 201);
    }

    public function show($id)
    {
        return response()->json(Kategori::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
        ]);

        return response()->json($kategori);
    }

    public function destroy($id)
    {
        Kategori::destroy($id);

        return response()->json(['message' => 'Kategori berhasil dihapus']);
    }
}
