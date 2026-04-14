<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Peminjaman;
use App\Models\Alat;

class DetailPeminjaman extends Model
{
    protected $table = 'detail_peminjamen';

    protected $fillable = [
        'peminjaman_id',
        'alat_id',
        'jumlah',
        'tgl_pengembalian'
    ];

    // RELASI KE PEMINJAMAN
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }

    // RELASI KE ALAT
    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }
}