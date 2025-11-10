<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tokoh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TokohController extends Controller
{
    public function index()
    {
        $tokohs = Tokoh::paginate(10);
        return view('admin.tokohs.index', compact('tokohs'));
    }

    public function create()
    {
        return view('admin.tokohs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'asal_daerah' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('tokohs', 'public');
        }

        Tokoh::create($data);
        return redirect()->route('admin.tokohs.index')->with('success', 'Tokoh berhasil ditambahkan!');
    }

    public function edit(Tokoh $tokoh)
    {
        return view('admin.tokohs.edit', compact('tokoh'));
    }

    public function update(Request $request, Tokoh $tokoh)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tempat_tanggal_lahir' => 'required|string|max:255',
            'asal_daerah' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($tokoh->foto) Storage::disk('public')->delete($tokoh->foto);
            $data['foto'] = $request->file('foto')->store('tokohs', 'public');
        }

        $tokoh->update($data);
        return redirect()->route('admin.tokohs.index')->with('success', 'Data tokoh diperbarui!');
    }

    public function destroy(Tokoh $tokoh)
    {
        if ($tokoh->foto) Storage::disk('public')->delete($tokoh->foto);
        $tokoh->delete();

        return redirect()->route('admin.tokohs.index')->with('success', 'Data tokoh dihapus!');
    }
}
