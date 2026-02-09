<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alat;

class AlatController extends Controller
{
    public function index()
    {
        $alats = Alat::all(); // tanpa relasi kategori karena tidak ada
        return view('admin.alat.index', compact('alats'));
    }

    public function create()
    {
        return view('admin.alat.create'); // tidak perlu kategori
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
        ]);

        Alat::create($request->only('nama','kode','jumlah'));

        return redirect()->route('admin.alat.index')->with('success', 'Alat berhasil ditambahkan');
    }

    public function edit(Alat $alat)
    {
        return view('admin.alat.edit', compact('alat'));
    }

    public function update(Request $request, Alat $alat)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
        ]);

        $alat->update($request->only('nama','kode','jumlah'));

        return redirect()->route('admin.alat.index')->with('success', 'Alat berhasil diupdate');
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();
        return redirect()->route('admin.alat.index')->with('success', 'Alat berhasil dihapus');
    }
}
