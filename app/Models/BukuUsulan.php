<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuUsulan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_buku_usulan';
    protected $guarded = ['id_buku_usulan'];
    public $timestamps = false;
}
