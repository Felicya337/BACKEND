@extends('admin.layouts.app')

@section('title', 'Daftar Penjual')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Daftar Penjual</h3>
        </div>

        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Penjual</th>
                        <th>Nama Toko</th>
                        <th>Email</th>
                        <th>No. Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($penjuals as $penjual)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $penjual->nama_penjual }}</td>
                            <td>{{ $penjual->nama_toko }}</td>
                            <td>{{ $penjual->email }}</td>
                            <td>{{ $penjual->no_telpon }}</td>
                            <td>{{ $penjual->alamat ?? '-' }}</td>
                            <td>
                                <form action="{{ route('admin.penjual.destroy', $penjual->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus akun ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada penjual terdaftar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($penjuals, 'links'))
        <div class="card-footer">
            {{ $penjuals->links() }}
        </div>
        @endif
    </div>
@endsection
