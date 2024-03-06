<?php

namespace App\Http\Controllers;

use App\Models\UmpanBalik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UmpanBalikController extends Controller
{
    function index()
    {
        $umpan_balik = UmpanBalik::all();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data umpan balik berhasil didapatkan',
            'data' => $umpan_balik
        ], 200);
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subjek' => 'required',
            'isi' => 'required',
            'lampiran' => 'nullable',
            'nama' => 'nullable',
            'email' => 'nullable'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $umpan_balik = UmpanBalik::create([
            'subjek' => $request->subjek,
            'isi' => $request->isi,
            'lampiran' => $request->lampiran,
            'nama' => $request->nama,
            'email' => $request->email
        ]);

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Umpan Balik berhasil dikirim',
            'data' => $umpan_balik
        ], 201);
    }
}
