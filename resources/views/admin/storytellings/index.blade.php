@extends('layouts')

@section('title', 'Daftar Storytelling')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Daftar Storytelling</h3>
            <a href="{{ route('admin.storytellings.create') }}" class="btn btn-sm btn-primary">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($storytellings as $story)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $story->judul }}</td>
                            <td>{{ $story->penulis ?? '-' }}</td>
                            <td>{{ $story->created_at->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('admin.storytellings.edit', $story) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.storytellings.destroy', $story) }}" method="POST"
                                    class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $storytellings->links() }}
        </div>
    </div>
@endsection
