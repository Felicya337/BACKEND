<?php

namespace App\Http\Controllers;

use App\Models\Penjual;
use App\Models\Marketplace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MarketplaceController extends Controller
{
    /* ============================
       🔐 PENJUAL AUTH
    ============================ */

    // Registrasi penjual baru
    public function register(Request $request)
    {
        \Log::info('Register Request:', $request->all());
        $validated = $request->validate([
            'nama_penjual' => 'required|string|max:255',
            'nama_toko' => 'nullable|string|max:255',
            'email' => 'required|email|unique:penjuals,email',
            'password' => 'required|min:6',
            'alamat' => 'nullable|string|max:255',
            'no_telpon' => 'nullable|string|max:20',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $penjual = Penjual::create($validated);

        return response()->json([
            'message' => 'Registrasi berhasil',
            'penjual' => $penjual,
        ], 201);
    }

    // Login penjual
    public function login(Request $request)
    {
        $penjual = Penjual::where('email', $request->email)->first();

        if (!$penjual || !Hash::check($request->password, $penjual->password)) {
            return response()->json(['message' => 'Email atau password salah'], 401);
        }

        if ($penjual->is_blocked) {
            return response()->json(['message' => 'Akun anda diblokir oleh admin'], 403);
        }

        return response()->json([
            'message' => 'Login berhasil',
            'penjual' => $penjual,
        ]);
    }

    // Update profil penjual
    public function updateProfile(Request $request, $id)
    {
        $penjual = Penjual::findOrFail($id);

        $validated = $request->validate([
            'nama_penjual' => 'sometimes|required|string|max:255',
            'nama_toko' => 'nullable|string|max:255',
            'email' => 'sometimes|required|email|unique:penjuals,email,' . $penjual->id,
            'alamat' => 'nullable|string|max:255',
            'no_telpon' => 'nullable|string|max:20',
            'password' => 'nullable|min:6',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $penjual->update($validated);

        return response()->json([
            'message' => 'Profil berhasil diperbarui',
            'penjual' => $penjual,
        ]);
    }

    /* ============================
       🛍️ CRUD PRODUK
    ============================ */

    // Lihat semua produk milik penjual tertentu
    public function myProducts($penjual_id)
    {
        $produk = Marketplace::where('penjual_id', $penjual_id)->get();
        return response()->json($produk);
    }

    // Tambah produk
    public function store(Request $request)
    {
        $validated = $request->validate([
            'penjual_id' => 'required|exists:penjuals,id',
            'nama_produk' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $produk = Marketplace::create($validated);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'produk' => $produk,
        ], 201);
    }

    // Update produk
    public function update(Request $request, $id)
    {
        $produk = Marketplace::findOrFail($id);

        $validated = $request->validate([
            'nama_produk' => 'sometimes|required|string|max:255',
            'deskripsi' => 'sometimes|required|string',
            'kategori' => 'sometimes|required|string|max:255',
            'harga' => 'sometimes|required|numeric',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($produk->gambar) {
                Storage::disk('public')->delete($produk->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update($validated);

        return response()->json([
            'message' => 'Produk berhasil diperbarui',
            'produk' => $produk,
        ]);
    }

    // Hapus produk
    public function destroy($id)
    {
        $produk = Marketplace::findOrFail($id);
        if ($produk->gambar) {
            Storage::disk('public')->delete($produk->gambar);
        }
        $produk->delete();

        return response()->json(['message' => 'Produk berhasil dihapus']);
    }
}