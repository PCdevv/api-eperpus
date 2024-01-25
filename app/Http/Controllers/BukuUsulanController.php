<?php

namespace App\Http\Controllers;

use App\Models\BukuUsulan;
use Illuminate\Http\Request;

class BukuUsulanController extends Controller
{
    function index(Request $request)
    {
        if (!empty($request->kategori)) {
            $buku_usulan = BukuUsulan::where('kategori', $request->kategori);
            return response()->json($buku_usulan, 200);
        }
        $buku_usulan = BukuUsulan::all();
        return response()->json($buku_usulan, 200);
    }
}
