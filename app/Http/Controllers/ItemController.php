<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Menampilkan semua data barang
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    // Form tambah barang
    public function create()
    {
        return view('items.create');
    }

    // Simpan barang baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:items',
            'nama_barang' => 'required',
            'kategori' => 'nullable|string',
            'stok' => 'required|integer',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    // Form edit barang
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    // Update barang
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang,' . $item->id,
            'nama_barang' => 'required',
            'kategori' => 'nullable|string',
            'stok' => 'required|integer',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
        ]);

        $item->update($request->all());

        return redirect()->route('items.index')->with('success', 'Barang berhasil diupdate.');
    }

    // Hapus barang
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus.');
    }
}
