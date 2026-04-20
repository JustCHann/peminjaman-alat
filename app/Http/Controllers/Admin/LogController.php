<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aktivitas;

class LogController extends Controller
{
    // LIST LOG
    public function index()
    {
        $logs = Aktivitas::with('user')
            ->latest()
            ->paginate(10);

        return view('admin.logaktifitas.index', compact('logs'));
    }

    // HELPER: SIMPAN LOG (BIAR MUDAH DIPAKAI DI CONTROLLER LAIN)
    public static function record($userId, $aktivitas)
    {
        return Aktivitas::create([
            'user_id' => $userId,
            'aktivitas' => $aktivitas,
        ]);
    }
}