<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMasalah extends Model
{
    use HasFactory;
    protected $guarded = ['id_laporan_masalah'];
    public $timestamps = false;

    public function pelapor()
    {
        $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
