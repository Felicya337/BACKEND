@extends('admin.layouts.app')

@section('title', 'Tambah Tokoh Budaya')

@section('content')
<div class="card">
    <div class="card-header"><h3 class="card-title">Tambah Tokoh Budaya</h3></div>
    <div class="card-body">
        <form action="{{ route('admin.tokohs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" required></div>
            <div class="mb-3"><label>Tempat/Tanggal Lahir</label><input type="text" name="tempat_tanggal_lahir" class="form-control" required></div>
            <div class="mb-3"><label>Asal Daerah</label><input type="text" name="asal_daerah" class="form-control" required></div>
            <div class="mb-3"><label>Jabatan</label><input type="text" name="jabatan" class="form-control"></div>
            <div class="mb-3"><label>Deskripsi</label><textarea name="deskripsi" class="form-control" rows="4"></textarea></div>
            <div class="mb-3"><label>Foto</label><input type="file" name="foto" class="form-control"></div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.tokohs.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
