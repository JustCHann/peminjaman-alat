<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class LogAktifitasController extends Controller
{
    public function index()
    {
        return view('admin.log.index');
    }
}
