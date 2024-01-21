<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function pengarang()
    {
        return $this->belongsTo(Pengarang::class, 'id_pengarang');
    }
    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'id_penerbit');
    }
    public function rak()
    {
        return $this->belongsTo(Rak::class, 'id_rak');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
