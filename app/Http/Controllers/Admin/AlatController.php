<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Kategori;

class AlatController extends Controller
{
    public function index()
    {
        $alats = Alat::with('kategori')->get();
        return view('admin.alat.index', compact('alats'));
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.alat.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        Alat::create($request->only('nama','kode','jumlah','kategori_id'));

        return redirect()->route('admin.alat.index')->with('success', 'Alat berhasil ditambahkan');
    }

    public function edit(Alat $alat)
    {
        $kategoris = Kategori::all();
        return view('admin.alat.edit', compact('alat','kategoris'));
    }

    public function update(Request $request, Alat $alat)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:100',
            'jumlah' => 'required|integer|min:1',
            'kategori_id' => 'required|exists:kategoris,id',
        ]);

        $alat->update($request->only('nama','kode','jumlah','kategori_id'));

        return redirect()->route('admin.alat.index')->with('success', 'Alat berhasil diupdate');
    }

    public function destroy(Alat $alat)
    {
        $alat->delete();
        return redirect()->route('admin.alat.index')->with('success', 'Alat berhasil dihapus');
    }
}
