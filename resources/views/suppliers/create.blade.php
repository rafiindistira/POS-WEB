@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Supplier</h1>

    <form action="{{ route('suppliers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_supplier">Nama Supplier</label>
            <input type="text" name="nama_supplier" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telepon">Telepon</label>
            <input type="text" name="telepon" class="form-control">
        </div>

        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
