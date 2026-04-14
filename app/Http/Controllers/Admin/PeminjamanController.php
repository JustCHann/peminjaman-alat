<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Alat;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('user','alat')->get();
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    public function create()
    {
        $users = User::all();
        $alats = Alat::all();
        return view('admin.peminjaman.create', compact('users','alats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'alat_id' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('admin.peminjaman.index')
            ->with('success','Data peminjaman berhasil ditambahkan');
    }

    public function edit(Peminjaman $peminjaman)
    {
        $users = User::all();
        $alats = Alat::all();
        return view('admin.peminjaman.edit', compact('peminjaman','users','alats'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'user_id' => 'required',
            'alat_id' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'status' => 'required'
        ]);

        $peminjaman->update($request->all());

        return redirect()->route('admin.peminjaman.index')
            ->with('success','Data peminjaman berhasil diupdate');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();

        return redirect()->route('admin.peminjaman.index')
            ->with('success','Data peminjaman berhasil dihapus');
    }
    
}
