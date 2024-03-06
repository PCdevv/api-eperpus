<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subkategori extends Model
{
    use HasFactory;
    protected $guarded = ['id_subkategori'];
    protected $primaryKey = 'id_subkategori';
    public $timestamps = false;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
