<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function dashboard()
    {
        return view('staff.dashboard');
    }

    public function listPeminjaman()
    {
        return view('staff.list-peminjaman');
    }
}
