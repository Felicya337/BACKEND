<?php

namespace App\Http\Controllers;

use App\Models\Ensiklopedi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EnsiklopediController extends Controller
{
    // === USER ===
    public function index()
    {
        $data = Ensiklopedi::with('kategori')->latest()->get();
        return response()->json($data);
    }

    public function show($slug)
    {
        $data = Ensiklopedi::with('kategori')->where('slug', $slug)->firstOrFail();
        return response()->json($data);
    }

    // === ADMIN ===
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255|unique:ensiklopedis,judul',
            'gambar' => 'nullable|image|max:2048',
            'deskripsi_html' => 'required',
            'sumber' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('ensiklopedi', 'public');
        }

        $validated['slug'] = Str::slug($validated['judul']);
        $data = Ensiklopedi::create($validated);

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        $ensiklopedi = Ensiklopedi::findOrFail($id);

        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255|unique:ensiklopedis,judul,' . $id,
            'gambar' => 'nullable|image|max:2048',
            'deskripsi_html' => 'required',
            'sumber' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar')) {
            if ($ensiklopedi->gambar) {
                Storage::disk('public')->delete($ensiklopedi->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('ensiklopedi', 'public');
        }

        $validated['slug'] = Str::slug($validated['judul']);
        $ensiklopedi->update($validated);

        return response()->json($ensiklopedi);
    }

    public function destroy($id)
    {
        $ensiklopedi = Ensiklopedi::findOrFail($id);

        if ($ensiklopedi->gambar) {
            Storage::disk('public')->delete($ensiklopedi->gambar);
        }

        $ensiklopedi->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }

    public function showBySlug($slug)
    {
        $data = Ensiklopedi::with('kategori')->where('slug', $slug)->firstOrFail();
        return response()->json($data);
    }

}
