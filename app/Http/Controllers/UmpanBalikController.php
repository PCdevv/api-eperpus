<?php

namespace App\Http\Controllers;

use App\Models\UmpanBalik;
use Illuminate\Http\Request;

class UmpanBalikController extends Controller
{
    function index()
    {
        $umpan_balik = UmpanBalik::all();
        return response()->json($umpan_balik, 200);
    }
}
