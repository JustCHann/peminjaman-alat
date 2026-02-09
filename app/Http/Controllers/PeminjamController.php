<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamController extends Controller
{
    public function dashboard()
    {
        return view('peminjam.dashboard');
    }

    public function ajukanPeminjaman()
    {
        return view('peminjam.ajukan-peminjaman');
    }
}
