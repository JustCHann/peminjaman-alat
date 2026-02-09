<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamanen';

    protected $fillable = [
        'user_id',
        'alat_id',
        'tgl_pinjam',
        'tgl_kembali',
        'status',
    ];

    public function pengembalian()
    {
        return $this->hasOne(DetailPeminjaman::class, 'peminjaman_id');
    }
}
