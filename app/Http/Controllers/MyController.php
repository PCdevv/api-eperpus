<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Denda;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MyController extends Controller
{
    function profil(Request $request)
    {
        $userData = $request->user();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data profil berhasil didapatkan',
            'data' => $userData
        ], 200);
    }

    function denda(Request $request)
    {
        $id_anggota = $request->user()->id_anggota;
        $denda = Denda::where('id_anggota', $id_anggota)->with('history')->get();
        if (sizeof($denda) === 0) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Anda tidak memiliki denda'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data denda berhasil didapatkan',
            'data' => $denda
        ], 200);
    }

    function dipinjam(Request $request)
    {
        $id_anggota = $request->user()->id_anggota;
        $history = History::where([
            ['id_anggota', '=', $id_anggota],
            ['waktu_pengembalian', '=', null],
        ])->with('buku')->get();
        if (sizeof($history) === 0) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Anda belum pernah meminjam buku'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data buku dipinjam berhasil didapatkan',
            'data' => $history
        ], 200);
    }

    function peminjaman_digital(Request $request)
    {
        $buku = Buku::where('id_buku', $request->id_buku)->first();
        if (empty($buku)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        $id_anggota = $request->user()->id_anggota;
        $history = History::where([
            ['id_buku', '=', $request->id_buku],
            ['id_anggota', '=', $id_anggota],
            ['waktu_pengembalian', '=', null]
        ])->first();
        if (!empty($history)) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Buku sudah dipinjam'
            ], 400);
        }
        $data_history = History::create([
            "id_buku" => $request->id_buku,
            'id_anggota' => $id_anggota
        ]);
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Buku berhasil dipinjam',
            'data' => $data_history
        ], 200);
    }
    function pengembalian_digital(Request $request)
    {
        $buku = Buku::where('id_buku', $request->id_buku)->first();
        if (empty($buku)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }
        $id_anggota = $request->user()->id_anggota;
        $history = History::where([
            ['id_buku', '=', $request->id_buku],
            ['id_anggota', '=', $id_anggota],
            ['waktu_pengembalian', '=', null]
        ])->first();
        $history->waktu_pengembalian = now();
        $history->save();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Buku berhasil dikembalikan',
            'data' => $history
        ], 200);
    }
    function selesai_baca(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_buku' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $id_anggota = $request->user()->id_anggota;
        $history = History::where([
            ['id_buku', '=', $request->id_buku],
            ['id_anggota', '=', $id_anggota],
            ['waktu_pengembalian', '=', null]
        ])->first();
        $history->selesai_dibaca = true;
        $history->save();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Buku selesai dibaca',
            'data' => $history
        ], 200);
    }
}
