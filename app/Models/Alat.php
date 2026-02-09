<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alats'; // opsional kalau nama tabel sudah sesuai

    protected $fillable = [
        'nama',
        'kode',
        'jumlah',
    ];

    // Kalau nanti mau ditambahkan kategori, aktifkan relasi ini:
    // public function kategori()
    // {
    //     return $this->belongsTo(Kategori::class, 'kategori_id');
    // }
}
