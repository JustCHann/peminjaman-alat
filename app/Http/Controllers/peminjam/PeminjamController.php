<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Alat;
use App\Models\Peminjaman;

class PeminjamController extends Controller
{
    public function dashboard()
    {
        $alat = Alat::all();

        $peminjaman = Peminjaman::with(['alat', 'detail'])
            ->where('user_id', Auth::user()->id)
            ->latest()
            ->get();
        return view('peminjam.dashboard', compact('alat', 'peminjaman'));
    }

    public function ajukan($id)
    {
        $alat = Alat::findOrFail($id);
        return view('peminjam.alat.ajukan', compact('alat'));
    }

        public function simpanPeminjaman(Request $request, $id)
    {
        $alat = Alat::findOrFail($id);

        $request->validate([
            'jumlah' => 'required|integer|min:1',
            'tanggal_kembali' => 'required|date|after_or_equal:today',
        ]);

        if ($request->jumlah > $alat->jumlah) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        DB::transaction(function() use ($request, $alat) {

            // Simpan peminjaman
            $peminjaman = Peminjaman::create([
                'user_id' => Auth::user()->id,
                'alat_id' => $alat->id,
                'status' => 'menunggu',
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => $request->tanggal_kembali,
            ]);

            // Kurangi stok alat
            $alat->decrement('jumlah', $request->jumlah);

            // Simpan detail peminjaman
            $peminjaman->detail()->create([
                'peminjaman_id' => $peminjaman->id,
                'alat_id' => $alat->id,
                'jumlah' => $request->jumlah,
                'tgl_pengembalian' => $request->tanggal_kembali,
            ]);
        });

        return redirect()->route('peminjam.dashboard')
                        ->with('success', 'Peminjaman berhasil diajukan!');
    }

        public function kembalikan($id)
{
    $peminjaman = Peminjaman::with(['alat','detail'])->findOrFail($id);

    if ($peminjaman->status !== 'dipinjam') {
        return back()->with('error', 'Tidak valid');
    }

    $today = \Carbon\Carbon::now();
    $deadline = \Carbon\Carbon::parse($peminjaman->tanggal_kembali);

    // hitung selisih hari
    $hariTerlambat = $today->gt($deadline)
        ? $today->diffInDays($deadline)
        : 0;

    $denda = $hariTerlambat * 1000000;

    // update stok
    $peminjaman->alat->increment('jumlah', $peminjaman->detail->jumlah);

    $peminjaman->update([
        'status' => 'dikembalikan',
        'denda' => $denda
    ]);

    if ($denda > 0) {
        return back()->with('success', "Dikembalikan dengan denda Rp $denda");
    }

    return back()->with('success', 'Dikembalikan tanpa denda');
}

    public function riwayat()
    {
        $peminjaman = Peminjaman::with(['alat','detail'])
            ->where('user_id', Auth::user()->id)
            ->latest()
            ->get();

        return view('peminjam.peminjaman.index', compact('peminjaman'));
    }
    
}