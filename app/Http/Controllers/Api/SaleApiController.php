<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleApiController extends Controller
{
    // GET /api/sales
    public function index()
    {
        return response()->json(Sale::all());
    }

    // GET /api/sales/{id}
    public function show($id)
    {
        $sale = Sale::find($id);
        if (!$sale) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($sale);
    }

    // POST /api/sales
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kode_nota' => 'required|unique:sales',
            'total' => 'required|numeric',
        ]);

        $sale = Sale::create($request->all());

        return response()->json($sale, 201);
    }

    // PUT /api/sales/{id}
    public function update(Request $request, $id)
    {
        $sale = Sale::find($id);
        if (!$sale) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'tanggal' => 'required|date',
            'kode_nota' => 'required|unique:sales,kode_nota,' . $sale->id,
            'total' => 'required|numeric',
        ]);

        $sale->update($request->all());

        return response()->json($sale);
    }

    // DELETE /api/sales/{id}
    public function destroy($id)
    {
        $sale = Sale::find($id);
        if (!$sale) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $sale->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
