<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\DaftarKunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KunjunganController extends Controller
{
    function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "no_anggota" => "required"
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $anggota = Anggota::where('no_anggota', $request->no_anggota)->first();
        if (empty($anggota)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Anggota tidak ditemukan'
            ], 404);
        }
        $data['anggota'] = $anggota;
        $data['kunjungan'] = DaftarKunjungan::create([
            'id_anggota' => $anggota->id_anggota,
            'waktu_kunjungan' => now()
        ]);
        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Data kunjungan berhasil dibuat',
            'data' => $data
        ], 201);
    }
}
