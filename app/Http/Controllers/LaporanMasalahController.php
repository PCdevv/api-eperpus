<?php

namespace App\Http\Controllers;

use App\Models\LaporanMasalah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LaporanMasalahController extends Controller
{
    function index()
    {
        $laporan_masalah = LaporanMasalah::with('pelapor')->get();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data laporan masalah berhasil didapatkan',
            'data' => $laporan_masalah
        ], 200);
    }

    function store(Request $request)
    {
        $id_anggota = $request->user()->id_anggota;
        $validator = Validator::make($request->all(), [
            'deskripsi_laporan' => 'required',
            'foto' => 'nullable'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $laporan_masalah = LaporanMasalah::create([
            'deskripsi_laporan' => $request->deskripsi_laporan,
            'foto' => null,
            'id_anggota' => $id_anggota
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Laporan Masalah berhasil dibuat',
            'data' => $laporan_masalah
        ], 201);
    }
}
