@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Cabang</h1>

    <form action="{{ route('branches.update', $branch->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_cabang">Nama Cabang</label>
            <input type="text" name="nama_cabang" class="form-control" value="{{ $branch->nama_cabang }}" required>
        </div>

        <div class="mb-3">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" value="{{ $branch->lokasi }}">
        </div>

        <div class="mb-3">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control" value="{{ $branch->telepon }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
