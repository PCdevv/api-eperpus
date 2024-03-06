<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengarang extends Model
{
    use HasFactory;
    protected $guarded = ['id_pengarang'];
    protected $primaryKey = 'id_pengarang';
    public $timestamps = false;
}
