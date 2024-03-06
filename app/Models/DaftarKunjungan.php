<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarKunjungan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_daftar_kunjungan';
    protected $guarded = ['id_daftar_kunjungan'];
    public $timestamps = false;
}
