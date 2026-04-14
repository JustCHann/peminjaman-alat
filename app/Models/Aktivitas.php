<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $table = 'logs'; // pakai tabel logs yang sudah ada
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'aktivitas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
