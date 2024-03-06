<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denda extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_denda';
    protected $guarded = ['id_denda'];
    public $timestamps = false;

    public function history()
    {
        return $this->belongsTo(History::class, 'id_history');
    }
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
