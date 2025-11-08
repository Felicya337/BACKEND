@extends('admin.layouts.app')

@section('title', 'Tambah Storytelling')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Storytelling</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.storytellings.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Isi</label>
                    <textarea name="isi" class="form-control" rows="5" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.storytellings.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
