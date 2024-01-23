<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    function index(Request $request)
    {
        $bukus = Buku::with('pengarang', 'penerbit', 'rak', 'kategori')->get();

        if (!is_null($request->id_kategori)) {
            $buku_filter = Buku::where('id_kategori', $request->id_kategori)->get();
            if (sizeof($buku_filter) === 0) {
                return response()->json(["message" => 'Buku tidak ada'], 404);
            }
            return response()->json($buku_filter, 200);
        }

        return response()->json($bukus, 200);
    }
    function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required',
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'foto_cover' => 'required',
            'stok_buku' => 'required',
            'jumlah_halaman' => 'required',
            'id_pengarang' => 'required',
            'id_penerbit' => 'required',
            'id_kategori' => 'required',
            'id_rak' => 'required'
        ]);
        $buku_isbn = Buku::where('isbn', $request->isbn)->first();
        $buku_kode = Buku::where('kode_buku', $request->kode_buku)->first();
        if ($buku_isbn || $buku_kode) {
            return response()->json(['message' => 'Buku sudah ada'], 400);
        }

        Buku::create($request->all());
        return response()->json(['message' => 'Buku berhasil dibuat'], 201);
    }
    function show($id_buku)
    {
        $buku = Buku::where('id_buku', $id_buku)->with('pengarang', 'penerbit', 'rak', 'kategori')->first();
        if (empty($buku)) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }
        return response()->json($buku, 200);
    }
    function update(Request $request, $id_buku)
    {
        $request->validate([
            'isbn' => 'required',
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'foto_cover' => 'required',
            'stok_buku' => 'required',
            'jumlah_halaman' => 'required',
            'id_pengarang' => 'required',
            'id_penerbit' => 'required',
            'id_kategori' => 'required',
            'id_rak' => 'required'
        ]);
        $buku = Buku::where('id_buku', $id_buku)->first();
        if (empty($buku)) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }
        $buku->update($request->all());
        return response()->json(['message' => 'Buku berhasil diedit'], 200);
    }
    function destroy(Buku $buku)
    {
        // $buku = Buku::where('id_buku', $id_buku)->first();
        // if (empty($buku)) {
        //     return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        // }
        $buku->delete();
        return response()->json(['message' => 'Buku berhasil dihapus'], 200);
    }

    // function search(Request $request)
    // {
    // }

}
