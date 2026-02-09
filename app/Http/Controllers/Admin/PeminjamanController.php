<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('admin.peminjaman.index');
    }

    public function create()
    {
        return view('admin.peminjaman.create');
    }

    public function store(Request $request)
    {
        // simpan peminjaman
    }

    public function show($id)
    {
        return view('admin.peminjaman.show');
    }

    public function destroy($id)
    {
        // hapus peminjaman
    }
}
