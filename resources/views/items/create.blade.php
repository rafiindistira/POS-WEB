@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Barang</h1>

    <form action="{{ route('items.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kode_barang">Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="kategori">Kategori</label>
            <input type="text" name="kategori" class="form-control">
        </div>

        <div class="mb-3">
            <label for="stok">Stok</label>
            <input type="number" name="stok" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="harga_beli">Harga Beli</label>
            <input type="number" name="harga_beli" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="harga_jual">Harga Jual</label>
            <input type="number" name="harga_jual" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('items.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
