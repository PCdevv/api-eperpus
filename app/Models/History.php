<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_history';
    protected $guarded = ['id_history'];
    public $timestamps = false;

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
