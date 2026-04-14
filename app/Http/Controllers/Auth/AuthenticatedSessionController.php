<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // validasi
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return back()->withErrors(['email'=>'Email tidak ditemukan'])->onlyInput('email');
        }

        if(!Hash::check($request->password, $user->password)){
            return back()->withErrors(['password'=>'Password salah'])->onlyInput('email');
        }

        Auth::login($user, true);
        $request->session()->regenerate();

        // redirect sesuai role
        return match($user->role){
            'admin' => redirect()->route('admin.dashboard'),
            'staff' => redirect()->route('staff.dashboard'),
            'peminjam' => redirect()->route('peminjam.dashboard'),
            default => redirect()->route('login')->withErrors('Role tidak valid'),
        };
    }

   public function destroy(Request $request)
    {
        Auth::guard('web')->logout(); // logout user

        $request->session()->invalidate(); // hapus session
        $request->session()->regenerateToken(); // regenerate CSRF token

        return redirect('/login'); // arahkan ke halaman login
    }
}