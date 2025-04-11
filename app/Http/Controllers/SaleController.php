<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    // Menampilkan daftar semua penjualan
    public function index()
    {
        $sales = Sale::all(); // ambil semua data penjualan
        return view('sales.index', compact('sales'));
    }

    // Menampilkan form input penjualan baru
    public function create()
    {
        return view('sales.create');
    }

    // Menyimpan data penjualan ke database
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kode_nota' => 'required|unique:sales,kode_nota',
            'total' => 'required|numeric',
        ]);

        Sale::create($request->all());

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil disimpan.');
    }

    // Menampilkan form edit
    public function edit(Sale $sale)
    {
        return view('sales.edit', compact('sale'));
    }

    // Menyimpan perubahan data penjualan
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kode_nota' => 'required|unique:sales,kode_nota,' . $sale->id,
            'total' => 'required|numeric',
        ]);

        $sale->update($request->all());

        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil diupdate.');
    }

    // Menghapus data penjualan
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Penjualan berhasil dihapus.');
    }
}
