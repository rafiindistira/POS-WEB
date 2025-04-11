@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Cabang</h1>
    <a href="{{ route('branches.create') }}" class="btn btn-primary mb-3">Tambah Cabang</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama Cabang</th>
                <th>Lokasi</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($branches as $branch)
                <tr>
                    <td>{{ $branch->nama_cabang }}</td>
                    <td>{{ $branch->lokasi }}</td>
                    <td>{{ $branch->telepon }}</td>
                    <td>
                        <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus cabang ini?')" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
