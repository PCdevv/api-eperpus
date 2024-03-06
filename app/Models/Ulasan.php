<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_ulasan';
    protected $guarded = ['id_ulasan'];
    public $timestamps = false;
}
