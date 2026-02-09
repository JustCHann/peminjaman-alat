<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function listAlat()
    {
        return view('admin.list-alat');
    }

    public function tambahAlat()
    {
        return view('admin.tambah-alat');
    }
}
