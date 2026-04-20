<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Aktivitas extends Model
{
    protected $table = 'logs';
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