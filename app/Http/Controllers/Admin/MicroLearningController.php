<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MicroLearning;
use Illuminate\Support\Facades\Storage;

class MicroLearningController extends Controller
{
public function index()
{
    $data = MicroLearning::latest()->get();
    return view('admin.microlearning.index', compact('data'));
}

public function create()
{
    return view('admin.microlearning.create');
}

public function store(Request $request)
{
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required',
        'gambar' => 'nullable|image|max:2048',
        'isi_html' => 'required',
    ]);

    if ($request->hasFile('gambar')) {
        $validated['gambar'] = $request->file('gambar')->store('microlearning', 'public');
    }

    MicroLearning::create($validated);
    return redirect()->route('admin.microlearning.index')->with('success', 'Berhasil menambahkan materi');
}
}
