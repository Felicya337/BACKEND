<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Storytelling;
use Illuminate\Http\Request;

class StorytellingController extends Controller
{
    public function index()
    {
        $storytellings = Storytelling::latest()->paginate(10);
        return view('admin.storytellings.index', compact('storytellings'));
    }

    public function create()
    {
        return view('admin.storytellings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'penulis' => 'nullable|string|max:255',
        ]);

        Storytelling::create($request->all());

        return redirect()->route('admin.storytellings.index')
            ->with('success', 'Storytelling berhasil ditambahkan.');
    }

    public function show(Storytelling $storytelling)
    {
        return view('admin.storytellings.show', compact('storytelling'));
    }

    public function edit(Storytelling $storytelling)
    {
        return view('admin.storytellings.edit', compact('storytelling'));
    }

    public function update(Request $request, Storytelling $storytelling)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'penulis' => 'nullable|string|max:255',
        ]);

        $storytelling->update($request->all());

        return redirect()->route('admin.storytellings.index')
            ->with('success', 'Storytelling berhasil diperbarui.');
    }

    public function destroy(Storytelling $storytelling)
    {
        $storytelling->delete();

        return redirect()->route('admin.storytellings.index')
            ->with('success', 'Storytelling berhasil dihapus.');
    }
}
