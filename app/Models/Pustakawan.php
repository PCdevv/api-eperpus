<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Pustakawan extends Authenticatable
{
    use HasApiTokens, HasFactory;
    protected $primaryKey = 'id_pustakawan';
    protected $guarded = ['id_pustakawan'];
    public $timestamps = false;
}
