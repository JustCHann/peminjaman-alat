<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alat;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Pengembalian;
use App\Models\Aktivitas;

class AdminController extends Controller
{
    public function dashboard()
    {
        $alatCount = Alat::count();
        $peminjamanAktifCount = Peminjaman::where('status', 'aktif')->count();
        $usersCount = User::count();
   
        $logs = Aktivitas::with('user')->latest()->limit(10)->get();

        return view('admin.dashboard', compact(
            'alatCount',
            'peminjamanAktifCount',
            'usersCount',
            'logs'
        ));
    }
}
