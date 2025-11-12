<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KuisBudaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KuisBudayaController extends Controller
{
    public function index()
    {
        $kuis = KuisBudaya::latest()->get();
        return view('admin.kuisbudaya.index', compact('kuis'));
    }

    public function create()
    {
        return view('admin.kuisbudaya.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'pertanyaan' => 'required|array|min:3|max:5',
            'pertanyaan.*.soal' => 'required|string',
            'pertanyaan.*.opsi_a' => 'required|string',
            'pertanyaan.*.opsi_b' => 'required|string',
            'pertanyaan.*.opsi_c' => 'required|string',
            'pertanyaan.*.opsi_d' => 'required|string',
            'pertanyaan.*.jawaban_benar' => 'required|string|in:a,b,c,d',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('kuisbudaya', 'public');
        }

        $validated['slug'] = Str::slug($validated['judul']);
        $validated['pertanyaan'] = json_encode($validated['pertanyaan']);

        KuisBudaya::create($validated);

        return redirect()->route('admin.kuisbudaya.index')
            ->with('success', 'Kuis budaya berhasil ditambahkan');
    }

    public function edit(KuisBudaya $kuisbudaya)
    {
        $kuisbudaya->pertanyaan = json_decode($kuisbudaya->pertanyaan, true);
        return view('admin.kuisbudaya.edit', compact('kuisbudaya'));
    }

    public function update(Request $request, KuisBudaya $kuisbudaya)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
            'pertanyaan' => 'required|array|min:3|max:5',
            'pertanyaan.*.soal' => 'required|string',
            'pertanyaan.*.opsi_a' => 'required|string',
            'pertanyaan.*.opsi_b' => 'required|string',
            'pertanyaan.*.opsi_c' => 'required|string',
            'pertanyaan.*.opsi_d' => 'required|string',
            'pertanyaan.*.jawaban_benar' => 'required|string|in:a,b,c,d',
        ]);

        if ($request->hasFile('gambar')) {
            if ($kuisbudaya->gambar) {
                Storage::disk('public')->delete($kuisbudaya->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('kuisbudaya', 'public');
        }

        $validated['slug'] = Str::slug($validated['judul']);
        $validated['pertanyaan'] = json_encode($validated['pertanyaan']);

        $kuisbudaya->update($validated);

        return redirect()->route('admin.kuisbudaya.index')
            ->with('success', 'Kuis budaya berhasil diperbarui');
    }

    public function destroy(KuisBudaya $kuisbudaya)
    {
        if ($kuisbudaya->gambar) {
            Storage::disk('public')->delete($kuisbudaya->gambar);
        }

        $kuisbudaya->delete();
        return redirect()->route('admin.kuisbudaya.index')
            ->with('success', 'Kuis budaya berhasil dihapus');
    }
}
