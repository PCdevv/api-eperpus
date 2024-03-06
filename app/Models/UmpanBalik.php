<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UmpanBalik extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_umpan_balik';
    protected $guarded = ['id_umpan_balik'];
    public $timestamps = false;
}
