@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Cabang</h1>

    <form action="{{ route('branches.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_cabang">Nama Cabang</label>
            <input type="text" name="nama_cabang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control">
        </div>

        <div class="mb-3">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('branches.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
