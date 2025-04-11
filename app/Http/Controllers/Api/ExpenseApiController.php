<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseApiController extends Controller
{
    // GET /api/expenses
    public function index()
    {
        return response()->json(Expense::all());
    }

    // GET /api/expenses/{id}
    public function show($id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($expense);
    }

    // POST /api/expenses
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'jumlah' => 'required|numeric',
        ]);

        $expense = Expense::create($request->all());

        return response()->json($expense, 201);
    }

    // PUT /api/expenses/{id}
    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'jumlah' => 'required|numeric',
        ]);

        $expense->update($request->all());

        return response()->json($expense);
    }

    // DELETE /api/expenses/{id}
    public function destroy($id)
    {
        $expense = Expense::find($id);
        if (!$expense) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $expense->delete();

        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
