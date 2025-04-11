<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemApiController extends Controller
{
    // GET /api/items
    public function index()
    {
        return response()->json(Item::all());
    }

    // GET /api/items/{id}
    public function show($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($item);
    }

    // POST /api/items
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:items',
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
        ]);

        $item = Item::create($request->all());

        return response()->json($item, 201);
    }

    // PUT /api/items/{id}
    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'kode_barang' => 'required|unique:items,kode_barang,' . $item->id,
            'nama_barang' => 'required',
            'stok' => 'required|integer',
            'harga_jual' => 'required|numeric',
            'harga_beli' => 'required|numeric',
        ]);

        $item->update($request->all());

        return response()->json($item);
    }

    // DELETE /api/items/{id}
    public function destroy($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $item->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
