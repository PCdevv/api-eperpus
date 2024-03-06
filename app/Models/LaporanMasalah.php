<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanMasalah extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_laporan_masalah';
    protected $guarded = ['id_laporan_masalah'];
    public $timestamps = false;

    public function pelapor()
    {
        return $this->belongsTo(Anggota::class, 'id_anggota');
    }
}
