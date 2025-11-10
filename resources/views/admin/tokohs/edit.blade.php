@extends('admin.layouts.app')

@section('title', 'Edit Tokoh Budaya')

@section('content')
<div class="card">
    <div class="card-header"><h3 class="card-title">Edit Tokoh Budaya</h3></div>
    <div class="card-body">
        <form action="{{ route('admin.tokohs.update', $tokoh) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" value="{{ $tokoh->nama }}" required></div>
            <div class="mb-3"><label>Tempat/Tanggal Lahir</label><input type="text" name="tempat_tanggal_lahir" class="form-control" value="{{ $tokoh->tempat_tanggal_lahir }}" required></div>
            <div class="mb-3"><label>Asal Daerah</label><input type="text" name="asal_daerah" class="form-control" value="{{ $tokoh->asal_daerah }}" required></div>
            <div class="mb-3"><label>Jabatan</label><input type="text" name="jabatan" class="form-control" value="{{ $tokoh->jabatan }}"></div>
            <div class="mb-3"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" rows="4">{{ $tokoh->deskripsi }}</textarea></div>
            <div class="mb-3">
                <label>Foto</label><br>
                @if($tokoh->foto)
                    <img src="{{ asset('storage/'.$tokoh->foto) }}" alt="foto" width="100" class="mb-2">
                @endif
                <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.tokohs.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
