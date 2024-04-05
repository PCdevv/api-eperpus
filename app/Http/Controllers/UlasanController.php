<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UlasanController extends Controller
{
    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ulasan' => 'required',
            'skor_rating' => 'required',
            'id_buku' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $id_anggota = $request->user()->id_anggota;
        $id_buku =  $request->id_buku;

        $ratings = Ulasan::where([
            ['id_buku', '=', $id_buku],
            ['id_anggota', '=', $id_anggota]
        ])->first();

        if (!empty($ratings)) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Sudah pernah memberi ulasan untuk buku ini'
            ], 400);
        }

        $buku = Buku::where('id_buku', $id_buku)->first();
        if (empty($buku)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }
        $ulasan = Ulasan::create([
            'ulasan' => $request->ulasan,
            'skor_rating' => $request->skor_rating,
            'id_buku' => $id_buku,
            'id_anggota' => $id_anggota
        ]);
        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Ulasan berhasil dibuat',
            'data' => $ulasan
        ], 201);
    }
}
