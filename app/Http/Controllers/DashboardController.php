<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Denda;
use App\Models\History;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $jumlah_buku = Buku::get()->count();
        $jumlah_anggota = Anggota::get()->count();
        $total_denda = Denda::select('jumlah_denda')->get(); //jumlahkan
        // $jumlah_pengunjung_hari = Presensi::class
        $jumlah_buku_pinjam = History::get()->count();
        $jumlah_buku_kembali = History::where('waktu_pengembalian', !null)->get()->count();
        // $sering_berkunjung = Presensi::class
        // $sering_meminjam = History::class
        // pengunjung per bulan

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data statistik dashboard berhasil didapatkan',
            'data' => [
                'jumlah_buku' => $jumlah_buku,
                'jumlah_anggota' => $jumlah_anggota,
                'total_denda' => $total_denda,
                'jumlah_buku_pinjam' => $jumlah_buku_pinjam,
                'jumlah_buku_kembali' => $jumlah_buku_kembali
            ]
        ], 200);
    }
}
