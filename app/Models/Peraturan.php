<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_peraturan';
    protected $guarded = ['id_peraturan'];
    public $timestamps = false;
}
