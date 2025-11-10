@extends('admin.layouts.app')

@section('title', 'Edit Ensiklopedi')

@section('content')
<div class="container mt-4">
    <h4 class="mb-4">Edit Ensiklopedi</h4>

    <form action="{{ route('admin.ensiklopedi.update', $ensiklopedi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Kategori --}}
        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $ensiklopedi->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Judul --}}
        <div class="form-group mt-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $ensiklopedi->judul }}" required>
        </div>

        {{-- Gambar --}}
        <div class="form-group mt-3">
            <label for="gambar">Gambar</label>
            @if ($ensiklopedi->gambar)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $ensiklopedi->gambar) }}" alt="Gambar Ensiklopedi" width="200" class="img-thumbnail">
                </div>
            @endif
            <input type="file" name="gambar" id="gambar" class="form-control">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar</small>
        </div>

        {{-- Deskripsi HTML --}}
        <div class="form-group mt-3">
            <label for="deskripsi_html">Deskripsi</label>
            <textarea name="deskripsi_html" id="deskripsi_html" rows="6" class="form-control" required>{{ $ensiklopedi->deskripsi_html }}</textarea>
        </div>

        {{-- Sumber --}}
        <div class="form-group mt-3">
            <label for="sumber">Sumber</label>
            <input type="text" name="sumber" id="sumber" class="form-control" value="{{ $ensiklopedi->sumber }}">
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Update
            </button>
            <a href="{{ route('admin.ensiklopedi.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection
