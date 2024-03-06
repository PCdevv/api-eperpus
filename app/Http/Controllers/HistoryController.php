<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    function index()
    {
        $history = History::with('anggota', 'buku')->get();
        // filter by kategori anggota
        // if (!empty($request->kategori_anggota)) {
        //
        // }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data history berhasil didapatkan',
            'data' => $history
        ], 200);
    }
}
