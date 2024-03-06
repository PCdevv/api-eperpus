<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Denda;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiBukuController extends Controller
{
    function anggota_by_no(Request $request)
    {
        $no_anggota = $request->no_anggota;
        $anggota = Anggota::where('no_anggota', $no_anggota)->first();
        if (empty($anggota)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Anggota tidak ditemukan'
            ], 404);
        }
        $history = History::where([
            ['id_anggota', '=', $anggota->id_anggota],
            ['waktu_pengembalian', '=', null]
        ])->with('buku')->get();
        $anggota["dipinjam"] = $history;
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data Anggota dan Buku yang harus dikembalikan berhasil didapatkan',
            'data' => $anggota
        ], 200);
    }

    function buku_by_kode(Request $request)
    {
        $kode_buku = $request->kode_buku;
        $buku = Buku::where('kode_buku', $kode_buku)->first();
        if (empty($buku)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data Buku berhasil didapatkan',
            'data' => $buku
        ], 200);
    }

    function peminjaman_fisik(Request $request)
    {
        $id_anggota = $request->id_anggota;
        $id_buku =  $request->id_buku;
        $buku = Buku::where('id_buku', $id_buku)->first();
        if (empty($buku)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        try {
            DB::beginTransaction();
            $buku->stok_tersedia = $buku->stok_tersedia - 1;
            $buku->save();
            $data_history = History::create([
                "id_buku" => $id_buku,
                'id_anggota' => $id_anggota,
                'waktu_peminjaman' => now(),
                'batas_pengembalian' => now()->addWeek(),
                'jenis_buku' => 'Fisik'
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'success' => false,
                'code' => 500,
                'message' => $th->getMessage()
            ], 500);
        }
        DB::commit();

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Buku berhasil dipinjam',
            'data' => $data_history
        ], 200);
    }
    function pengembalian_fisik(Request $request)
    {
        // $buku = Buku::where('id_buku', $request->id_buku)->first();
        // if (empty($buku)) {
        //     return response()->json([
        //         'success' => false,
        //         'code' => 404,
        //         'message' => 'Buku tidak ditemukan'
        //     ], 404);
        // }
        // $id_anggota = $request->user()->id_anggota;
        $history = History::where('id_history', $request->id_history)->first();
        if (empty($history)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'History tidak ditemukan'
            ], 404);
        }
        if (!empty($history->waktu_pengembalian)) {
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Buku sudah dikembalikan',
                'data' => $history
            ], 200);
        }

        $history->waktu_pengembalian = now();
        $history->save();

        $deadline = strtotime($history->batas_pengembalian);
        $now = strtotime(now());
        if ($now > $deadline) {
            $denda = Denda::create([
                'jumlah_denda' => 10000,
                'status' => 'Belum dibayar',
                'id_history' => $history->id_history,
                'id_anggota' => $history->id_anggota,
            ]);
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => 'Buku berhasil dikembalikan dengan denda',
                'data' => [
                    'history' => $history,
                    'denda' => $denda
                ]
            ], 200);
        }
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Buku berhasil dikembalikan',
            'data' => $history
        ], 200);
    }
}
