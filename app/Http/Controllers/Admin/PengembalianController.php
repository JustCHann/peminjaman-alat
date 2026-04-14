<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = DetailPeminjaman::with('peminjaman.user','peminjaman.alat')->get();
        return view('admin.pengembalian.index', compact('pengembalians'));
    }

    public function create()
    {
        $peminjaman = Peminjaman::where('status','dipinjam')->get();
        return view('admin.pengembalian.create', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamen,id',
            'tgl_pengembalian' => 'required|date',
        ]);

        DetailPeminjaman::create([
            'peminjaman_id' => $request->peminjaman_id,
            'tgl_pengembalian' => $request->tgl_pengembalian,
        ]);

        Peminjaman::find($request->peminjaman_id)
                  ->update(['status' => 'dikembalikan']);

        return redirect()->route('admin.pengembalian.index')
                         ->with('success','Pengembalian berhasil dicatat');
    }

    //  TARUH DI SINI
    public function edit(DetailPeminjaman $pengembalian)
    {
        return view('admin.pengembalian.edit', compact('pengembalian'));
    }

    public function update(Request $request, DetailPeminjaman $pengembalian)
    {
        $request->validate([
            'tgl_pengembalian' => 'required|date',
        ]);

        $pengembalian->update([
            'tgl_pengembalian' => $request->tgl_pengembalian
        ]);

        return redirect()->route('admin.pengembalian.index')
                         ->with('success','Data berhasil diperbarui');
    }

    public function destroy(DetailPeminjaman $pengembalian)
    {
        $pengembalian->delete();

        return redirect()->route('admin.pengembalian.index')
                         ->with('success','Data pengembalian dihapus');
    }
}
