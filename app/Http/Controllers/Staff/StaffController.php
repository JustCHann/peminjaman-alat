<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Peminjaman;

class StaffController extends Controller
{
    // DASHBOARD
    public function dashboard()
    {
        $alat = Alat::all();
        $totalPeminjaman = Peminjaman::count();

        return view('staff.dashboard', compact('alat', 'totalPeminjaman'));
    }

    // HALAMAN PERSETUJUAN
    public function peminjaman()
    {
        $peminjaman = Peminjaman::with(['user','alat','detail'])
            ->where('status', 'menunggu')
            ->get();

        return view('staff.peminjaman.index', compact('peminjaman'));
    }

    
    public function kembalikan($id)
    {
    $peminjaman = Peminjaman::with('detail')->findOrFail($id);

    // pastikan hanya yang status dipinjam yang bisa dikembalikan
    if ($peminjaman->status !== 'dipinjam') {
        return back()->with('error', 'Peminjaman tidak valid untuk dikembalikan');
    }

    // ambil jumlah
    $jumlah = $peminjaman->detail->jumlah ?? 0;

    // kembalikan stok
    $alat = Alat::find($peminjaman->alat_id);
    if ($alat) {
        $alat->increment('jumlah', $jumlah);
    }

    // update status
    $peminjaman->update([
        'status' => 'dikembalikan'
    ]);

    return back()->with('success', 'Alat berhasil dikembalikan');
}
    // SETUJUI
    public function setujui($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update([
            'status' => 'dipinjam'
        ]);

        return back()->with('success', 'Peminjaman berhasil disetujui!');
    }


    // TOLAK
    public function tolak($id)
    {
        $peminjaman = Peminjaman::with('detail')->findOrFail($id);

        // Ambil jumlah yang dipinjam
        $jumlah = $peminjaman->detail->jumlah ?? 0;

        // Kembalikan stok alat
        $alat = Alat::find($peminjaman->alat_id);
        if ($alat) {
            $alat->increment('jumlah', $jumlah);
        }

        // Update status
        $peminjaman->update([
            'status' => 'ditolak'
        ]);

        return back()->with('success', 'Peminjaman ditolak dan stok dikembalikan');
    }
}