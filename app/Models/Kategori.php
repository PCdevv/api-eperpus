<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id_kategori'];
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;

    public function subkategori()
    {
        return $this->hasMany(Subkategori::class, 'id_kategori');
    }
}
