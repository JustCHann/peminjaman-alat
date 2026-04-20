<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Peminjam\PeminjamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\AlatController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Staff\StaffController;


// =======================
// HALAMAN WELCOME
// =======================
Route::get('/', function () {
    return redirect()->route('login');
});

// =======================
// LOGIN / LOGOUT
// =======================
Route::get('/login', [AuthenticatedSessionController::class,'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class,'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// =======================
// ADMIN
// =======================
Route::prefix('admin')->name('admin.')->middleware(['auth','role:admin'])->group(function(){
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('kategori', KategoriController::class);
    Route::resource('alat', AlatController::class);
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('pengembalian', PengembalianController::class);
    Route::resource('logaktifitas', LogController::class);
});

Route::middleware(['auth'])->prefix('peminjam')->group(function () {
    // Dashboard
    Route::get('/dashboard', [PeminjamController::class, 'dashboard'])
        ->name('peminjam.dashboard');
    // Riwayat peminjaman
    Route::get('/peminjaman', [PeminjamController::class, 'riwayat'])
        ->name('peminjam.peminjaman.index');
    // Form ajukan
    Route::get('/alat/ajukan/{id}', [PeminjamController::class, 'ajukan'])
        ->name('peminjam.alat.ajukan');
    // Simpan peminjaman
    Route::post('/alat/simpan/{id}', [PeminjamController::class, 'simpanPeminjaman'])
        ->name('peminjam.alat.simpan');
    // Pengembalian
    Route::post('/kembalikan/{id}', [PeminjamController::class, 'kembalikan'])
        ->name('peminjam.kembalikan');
});
// =======================
// STAFF DASHBOARD
// =======================
Route::prefix('staff')->name('staff.')->middleware(['auth'])->group(function(){

    // Dashboard
    Route::get('/dashboard', [StaffController::class, 'dashboard'])
        ->name('dashboard');

    // Halaman persetujuan peminjaman
    Route::get('/peminjaman', [StaffController::class, 'peminjaman'])
        ->name('peminjaman.index');

    // Aksi
    Route::post('/peminjaman/setujui/{id}', [StaffController::class, 'setujui'])
        ->name('peminjaman.setujui');

    Route::post('/peminjaman/tolak/{id}', [StaffController::class, 'tolak'])
        ->name('peminjaman.tolak');
    
    // ✅ DENDA
    Route::get('/denda', [StaffController::class, 'denda'])
        ->name('denda');

    Route::post('/denda/{id}/konfirmasi', [StaffController::class, 'konfirmasiDenda'])
        ->name('konfirmasiDenda');

    Route::get('/denda/cetak', [StaffController::class, 'cetakDenda'])
        ->name('denda.cetak');
});