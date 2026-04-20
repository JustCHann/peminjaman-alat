<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Alat;
use App\Models\DetailPeminjaman;
use Carbon\Carbon;

class Peminjaman extends Model
{
    protected $table = 'peminjamen';

    protected $fillable = [
        'user_id', 'alat_id', 'tanggal_pinjam', 'tanggal_kembali', 'status' , 'denda' , 'status_denda'
    ];

    // RELASI USER
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // RELASI ALAT
    public function alat()
    {
        return $this->belongsTo(Alat::class);
    }

    // RELASI DETAIL PEMINJAMAN
    public function detail()
    {
        return $this->hasOne(DetailPeminjaman::class, 'peminjaman_id');
    }
    public function getIsTerlambatAttribute()
{
    return $this->status === 'dipinjam'
        && Carbon::parse($this->tanggal_kembali)->startOfDay()
            ->lt(Carbon::today());
}
}