@extends('admin.layouts.app')

@section('title', 'Tambah Ensiklopedi')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Tambah Ensiklopedi</h4>

    <form action="{{ route('admin.ensiklopedi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Kategori --}}
        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>

        {{-- Judul --}}
        <div class="form-group mt-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan judul" required>
        </div>

        {{-- Gambar --}}
        <div class="form-group mt-3">
            <label for="gambar">Gambar (opsional)</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>

        {{-- Deskripsi HTML --}}
        <div class="form-group mt-3">
            <label for="deskripsi_html">Deskripsi</label>
            <textarea name="deskripsi_html" id="deskripsi_html" rows="6" class="form-control" placeholder="Tulis deskripsi..." required></textarea>
        </div>

        {{-- Sumber --}}
        <div class="form-group mt-3">
            <label for="sumber">Sumber (opsional)</label>
            <input type="text" name="sumber" id="sumber" class="form-control" placeholder="Masukkan sumber jika ada">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('admin.ensiklopedi.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
