@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Barang</h2>
    <button class="btn btn-primary mb-3" id="btnTambah">+ Tambah Barang</button>
    <table class="table table-bordered" id="tableItem">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->stock }}</td>
                <td>{{ number_format($item->sell_price, 0, ',', '.') }}</td>
                <td>
                    <button class="btn btn-warning btn-sm btnEdit" data-id="{{ $item->id }}">Edit</button>
                    <button class="btn btn-danger btn-sm btnDelete" data-id="{{ $item->id }}">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Form -->
<div class="modal fade" id="modalForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form id="formItem">
            @csrf
            <input type="hidden" id="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah/Edit Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Nama Barang</label>
                        <input type="text" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" id="stock" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" id="price" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let url = "{{ url('item') }}";

    $('#btnTambah').click(function () {
        $('#formItem')[0].reset();
        $('#id').val('');
        $('#modalForm').modal('show');
    });

    $('#formItem').submit(function (e) {
        e.preventDefault();
        let formData = {
            id: $('#id').val(),
            name: $('#name').val(),
            stock: $('#stock').val(),
            price: $('#price').val(),
            _token: '{{ csrf_token() }}'
        };

        let action = formData.id ? '/update/' + formData.id : '/store';

        $.ajax({
            url: url + action,
            type: 'POST',
            data: formData,
            success: function (res) {
                alert(res.message);
                location.reload();
            },
            error: function () {
                alert('Terjadi kesalahan!');
            }
        });
    });

    $('.btnEdit').click(function () {
        let id = $(this).data('id');
        $.get(url + '/edit/' + id, function (data) {
            $('#id').val(data.id);
            $('#name').val(data.name);
            $('#stock').val(data.stock);
            $('#price').val(data.sell_price);
            $('#modalForm').modal('show');
        });
    });

    $('.btnDelete').click(function () {
        if (!confirm('Yakin hapus barang ini?')) return;
        let id = $(this).data('id');
        $.post(url + '/delete/' + id, {
            _token: '{{ csrf_token() }}'
        }, function (res) {
            alert(res.message);
            location.reload();
        });
    });
</script>
@endpush
