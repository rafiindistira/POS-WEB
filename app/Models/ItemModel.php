<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    protected $table = 'items';

    protected $fillable = [
        'code',         // Kode barang unik
        'name',         // Nama barang
        'image',        // Gambar produk (path)
        'sell_price',   // Harga jual
        'buy_price',    // Harga beli
        'description',  // Deskripsi
        'stock'         // Jumlah stok
    ];

    // ✅ Tambahkan method ini di bawahnya
    public static function generateCode()
    {
        return 'BRG-' . time(); // BRG-1712528880 contoh kode unik
    }
}
