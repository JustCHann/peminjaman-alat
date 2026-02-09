<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PeminjamController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AlatController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\Admin\LogController;

// Halaman welcome
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/peminjam/dashboard', [PeminjamController::class, 'dashboard']);
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/alat', [AlatController::class, 'index'])->name('admin.alat.index');
Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');


//users
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
});
Route::prefix('admin')->group(function () {
    Route::prefix('users')->group(function () {
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.users.store');

        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('admin.users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    });
});

//alat
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('alat', \App\Http\Controllers\Admin\AlatController::class);
});

Route::prefix('admin')->group(function () {
    Route::prefix('alat')->group(function () {
        Route::get('/create', [AlatController::class, 'create'])->name('admin.alat.create');
        Route::post('/', [AlatController::class, 'store'])->name('admin.alat.store');

        Route::get('/{id}/edit', [AlatController::class, 'edit'])->name('admin.alat.edit');
        Route::put('/{id}', [AlatController::class, 'update'])->name('admin.alat.update');
        Route::delete('/{id}', [AlatController::class, 'destroy'])->name('admin.alat.destroy');
    });
});

//kategori
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('kategori', \App\Http\Controllers\Admin\KategoriController::class);
});
Route::prefix('admin')->group(function () {
    Route::prefix('alat')->group(function () {
        Route::get('/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
        Route::post('/', [KategoriController::class, 'store'])->name('admin.kategori.store');

        Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
        Route::put('/{id}', [KategoriController::class, 'update'])->name('admin.kategori.update');
        Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');
    });
});


