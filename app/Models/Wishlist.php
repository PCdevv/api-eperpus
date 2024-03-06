<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_wishlist';
    protected $guarded = ['id_wishlist'];
    public $timestamps = false;
}
