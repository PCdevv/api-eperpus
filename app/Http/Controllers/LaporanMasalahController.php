<?php

namespace App\Http\Controllers;

use App\Models\LaporanMasalah;
use Illuminate\Http\Request;

class LaporanMasalahController extends Controller
{
    function index()
    {
        $laporan_masalah = LaporanMasalah::with('pelapor')->get();
        return response()->json($laporan_masalah, 200);
    }
}
