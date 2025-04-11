@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Penjualan</h1>

    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $sale->tanggal }}" required>
        </div>

        <div class="mb-3">
            <label for="kode_nota" class="form-label">Kode Nota</label>
            <input type="text" name="kode_nota" class="form-control" value="{{ $sale->kode_nota }}" required>
        </div>

        <div class="mb-3">
            <label for="total" class="form-label">Total</label>
            <input type="number" name="total" class="form-control" value="{{ $sale->total }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sales.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
