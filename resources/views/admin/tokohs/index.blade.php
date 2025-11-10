@extends('admin.layouts.app')

@section('title', 'Daftar Tokoh Budaya')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title">Daftar Tokoh Budaya</h3>
        <a href="{{ route('admin.tokohs.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tempat/Tanggal Lahir</th>
                    <th>Asal Daerah</th>
                    <th>Jabatan</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tokohs as $tokoh)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tokoh->nama }}</td>
                    <td>{{ $tokoh->tempat_tanggal_lahir }}</td>
                    <td>{{ $tokoh->asal_daerah }}</td>
                    <td>{{ $tokoh->jabatan ?? '-' }}</td>
                    <td style="max-width: 250px;">{{ Str::limit($tokoh->deskripsi, 100) }}</td>
                    <td>
                        @if($tokoh->foto)
                            <img src="{{ asset('storage/'.$tokoh->foto) }}" alt="foto" width="80" height="80" style="object-fit: cover;">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.tokohs.edit', $tokoh) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.tokohs.destroy', $tokoh) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $tokohs->links() }}
    </div>
</div>
@endsection
