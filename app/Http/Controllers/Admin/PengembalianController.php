<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPeminjaman;

class PengembalianController extends Controller
{
    public function index()
    {
        return view('admin.pengembalian.index');
    }

    public function store(Request $request)
    {
        DetailPeminjaman::create([
            'peminjaman_id' => $request->peminjaman_id,
            'tgl_pengembalian' => now(),
        ]);

        return redirect()->back()->with('success', 'Alat berhasil dikembalikan');
    }
}
