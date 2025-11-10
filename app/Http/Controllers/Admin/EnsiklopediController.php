<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ensiklopedi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class EnsiklopediController extends Controller
{
    // === TAMPILKAN DAFTAR DATA ===
    public function index()
    {
        $ensiklopedis = Ensiklopedi::with('kategori')->latest()->paginate(10);
        return view('admin.ensiklopedi.index', compact('ensiklopedis'));
    }

    // === FORM TAMBAH ===
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.ensiklopedi.create', compact('kategoris'));
    }

    // === SIMPAN DATA BARU ===
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
        Ensiklopedi::create($validated);

        return redirect()->route('admin.ensiklopedi.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    // === FORM EDIT ===
    public function edit(Ensiklopedi $ensiklopedi)
    {
        $kategoris = Kategori::all();
        return view('admin.ensiklopedi.edit', compact('ensiklopedi', 'kategoris'));
    }

    // === UPDATE DATA ===
    public function update(Request $request, Ensiklopedi $ensiklopedi)
    {
        $validated = $request->validate([
            'kategori_id' => 'required|exists:kategoris,id',
            'judul' => 'required|string|max:255|unique:ensiklopedis,judul,' . $ensiklopedi->id,
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

        return redirect()->route('admin.ensiklopedi.index')
            ->with('success', 'Data berhasil diperbarui');
    }

    // === HAPUS DATA ===
    public function destroy(Ensiklopedi $ensiklopedi)
    {
        if ($ensiklopedi->gambar) {
            Storage::disk('public')->delete($ensiklopedi->gambar);
        }

        $ensiklopedi->delete();

        return redirect()->route('admin.ensiklopedi.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
