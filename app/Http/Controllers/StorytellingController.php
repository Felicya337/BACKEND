<?php

namespace App\Http\Controllers;

use App\Models\Storytelling;
use Illuminate\Http\Request;

class StorytellingController extends Controller
{
    // Untuk user umum (public)
    public function showPublic()
    {
        // Sementara sama dengan admin — menampilkan semua data
        $stories = Storytelling::all();
        return response()->json($stories);
    }

    // Untuk admin
    public function showAdmin()
    {
        // Nanti bisa ditambah filter atau pagination khusus admin
        $stories = Storytelling::all();
        return response()->json($stories);
    }

    // Tambah data baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'penulis' => 'nullable|string',
        ]);

        $story = Storytelling::create($data);
        return response()->json($story);
    }

    // Tampilkan data berdasarkan ID
    public function show($id)
    {
        $story = Storytelling::findOrFail($id);
        return response()->json($story);
    }

    // Update data
    public function update(Request $request, $id)
    {
        $story = Storytelling::findOrFail($id);
        $story->update($request->all());
        return response()->json($story);
    }

    // Hapus data
    public function destroy($id)
    {
        Storytelling::destroy($id);
        return response()->json(['message' => 'Data storytelling berhasil dihapus']);
    }
}
