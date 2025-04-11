<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    // Tampilkan semua cabang
    public function index()
    {
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
    }

    // Form tambah cabang
    public function create()
    {
        return view('branches.create');
    }

    // Simpan cabang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required',
            'lokasi' => 'nullable|string',
            'telepon' => 'nullable|string',
        ]);

        Branch::create($request->all());

        return redirect()->route('branches.index')->with('success', 'Cabang berhasil ditambahkan.');
    }

    // Form edit cabang
    public function edit(Branch $branch)
    {
        return view('branches.edit', compact('branch'));
    }

    // Simpan update cabang
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'nama_cabang' => 'required',
            'lokasi' => 'nullable|string',
            'telepon' => 'nullable|string',
        ]);

        $branch->update($request->all());

        return redirect()->route('branches.index')->with('success', 'Cabang berhasil diupdate.');
    }

    // Hapus cabang
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect()->route('branches.index')->with('success', 'Cabang berhasil dihapus.');
    }
}
