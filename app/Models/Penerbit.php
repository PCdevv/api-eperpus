<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;
    protected $guarded = ['id_penerbit'];
    protected $primaryKey = 'id_penerbit';
    public $timestamps = false;
}
