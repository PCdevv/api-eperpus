<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Anggota extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $primaryKey = 'id_anggota';
    protected $guarded = ['id_anggota'];
    public $timestamps = false;

    // public function history()
    // {
    //     return $this->hasMany(History::class, 'id_history');
    // }
}
