<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $guarded = ['id_buku'];
    public $timestamps = false;
    protected $primaryKey = 'id_buku';
    protected $attributes = [
        'file_buku' => null,
        'id_subkategori' => null,
    ];

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
    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class, 'id_subkategori');
    }
    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'id_buku');
    }
}
