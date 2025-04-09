<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Models\ItemModel;
use Illuminate\Http\Request;

class ItemAjax extends Controller
{
    // Menampilkan halaman utama item (tabel produk)
    public function index()
    {
        $items = ItemModel::all(); // Ambil semua data dari database
    
        return view('item.index', compact('items')); // Kirim ke view
    }
    

    // Digunakan untuk dropdown pencarian Select2 (search produk)
    public function select2(Request $request)
    {
        if ($request->has('q')) {
            // Jika ada query 'q', cari produk berdasarkan kode/nama
            $q = $request->q;
            $data = ItemModel::search($q)->get();
            return response()->json($data);
        } else {
            // Jika tidak ada pencarian, ambil 5 produk pertama
            $data = ItemModel::get()->take(5);
            return response()->json($data);
        }
    }

    // Menyimpan produk baru ke database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|numeric',
            'price' => 'required|numeric'
        ]);

        // Buat objek baru dari ItemModel
        $item = new ItemModel();
        $item->code = ItemModel::generateCode(); // Auto generate kode produk
        $item->name = $request->name;
        $item->sell_price = $request->price;
        $item->stock = $request->stock ??0; // Jika stock tidak ada, set ke 0
        $item->buy_price = 0; // default beli 0 (bisa diedit nanti)
        $item->description = '-';
        $item->image = null; // gambar default
        $item->save(); // simpan ke DB

        return response()->json(['message' => 'Barang berhasil ditambahkan']);
    }

    // Mengambil data produk berdasarkan ID untuk form edit
// Ambil data berdasarkan ID
public function edit($id)
{
    return response()->json(ItemModel::findOrFail($id));
}

// Update data barang
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'stock' => 'required|numeric|min:0',
        'price' => 'required|numeric|min:0'
    ]);

    $item = ItemModel::findOrFail($id);
    $item->name = $request->name;
    $item->stock = $request->stock;
    $item->sell_price = $request->price;
    $item->save();

    return response()->json(['message' => 'Barang berhasil diupdate']);
}

// Hapus barang
public function destroy($id)
{
    $item = ItemModel::findOrFail($id);
    $item->delete();

    return response()->json(['message' => 'Barang berhasil dihapus']);
}

}
