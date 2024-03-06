<?php

namespace App\Http\Controllers;

use App\Models\BukuUsulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuUsulanController extends Controller
{
    function index()
    {
        $buku_usulan = BukuUsulan::all();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data buku usulan berhasil didapatkan',
            'data' => $buku_usulan
        ], 200);
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pengarang' => 'required',
            'judul_buku' => 'required',
            'kategori' => 'required',
            'alasan_usulan' => 'required',
            'ringkasan' => 'required',
            'tahun_rilis' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $buku_usulan = BukuUsulan::create([
            'pengarang' => $request->pengarang,
            'judul_buku' => $request->judul_buku,
            'kategori' => $request->kategori,
            'alasan_usulan' => $request->alasan_usulan,
            'ringkasan' => $request->ringkasan,
            'tahun_rilis' => $request->tahun_rilis
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Usulan Buku berhasil dibuat',
            'data' => $buku_usulan
        ], 201);
    }
}
