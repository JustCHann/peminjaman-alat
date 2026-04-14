<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aktivitas;

class LogController extends Controller
{
    /**
     * Tampilkan daftar log aktivitas untuk dashboard admin.
     */
    public function index()
    {
        // Ambil 10 log terbaru beserta info user
        $logs = Aktivitas::with('user')
            ->latest()
            ->limit(10)
            ->get();

    }
}
