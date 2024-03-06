<?php

namespace App\Http\Controllers;

use App\Models\Denda;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    function index()
    {
        $denda = Denda::with('anggota')->get();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data denda berhasil didapatkan',
            'data' => $denda
        ], 200);
    }
}
