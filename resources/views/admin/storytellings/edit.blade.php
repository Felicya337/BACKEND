@extends('layouts.admin')


@section('title', 'Edit Storytelling')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Storytelling</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.storytellings.update', $storytelling) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ $storytelling->judul }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Isi</label>
                    <textarea name="isi" class="form-control" rows="5" required>{{ $storytelling->isi }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    <input type="text" name="penulis" class="form-control" value="{{ $storytelling->penulis }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('admin.storytellings.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
@endsection
