<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\History;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\Rak;
use App\Models\Subkategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    function index(Request $request)
    {
        $bukus = Buku::with('kategori', 'subkategori', 'ulasan')->when($request->id_kategori, function ($q) use ($request) {
            $q->where('id_kategori', $request->id_kategori);
        })->get();
        // if (!is_null($request->id_kategori)) {
        //     $buku_filter = Buku::where('id_kategori', $request->id_kategori)->with('pengarang', 'penerbit', 'rak', 'kategori', 'subkategori', 'ulasan')->get();
        //     if (sizeof($buku_filter) === 0) {
        //         return response()->json([
        //             'success' => true,
        //             'code' => 404,
        //             'message' => 'Buku tidak ada',
        //             'data' => $buku_filter,
        //         ], 404);
        //     }
        //     return response()->json([
        //         'success' => true,
        //         'code' => 200,
        //         'message' => 'Data buku berhasil didapatkan',
        //         'data' => $buku_filter,
        //     ], 200);
        // }
        if (sizeof($bukus) == 0) {
            return response()->json([
                'success' => true,
                'code' => 404,
                'message' => 'Buku tidak ada',
                'data' => $bukus,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data buku berhasil didapatkan',
            'data' => $bukus
        ], 200);
    }
    function index_tabel(Request $request)
    {
        $bukus = Buku::select('id_buku', 'judul_buku', 'isbn', 'tahun_terbit', 'jumlah_halaman', 'id_kategori')->with('kategori')->when($request->id_kategori, function ($q) use ($request) {
            $q->where('id_kategori', $request->id_kategori);
        })->get();

        if (sizeof($bukus) == 0) {
            return response()->json([
                'success' => true,
                'code' => 404,
                'message' => 'Buku tidak ada',
                'data' => $bukus,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data buku berhasil didapatkan',
            'data' => $bukus
        ], 200);
        // if (!is_null($request->id_kategori)) {
        //     $buku_filter = Buku::where('id_kategori', $request->id_kategori)->with('pengarang', 'penerbit', 'rak', 'kategori', 'subkategori', 'ulasan')->get();
        //     if (sizeof($buku_filter) === 0) {
        //         return response()->json([
        //             'success' => true,
        //             'code' => 404,
        //             'message' => 'Buku tidak ada',
        //             'data' => $buku_filter,
        //         ], 404);
        //     }
        //     return response()->json([
        //         'success' => true,
        //         'code' => 200,
        //         'message' => 'Data buku berhasil didapatkan',
        //         'data' => $buku_filter,
        //     ], 200);
        // }

    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'isbn' => 'required',
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'foto_cover' => 'required',
            'stok_tersedia' => 'required',
            'stok_total' => 'required',
            'jumlah_halaman' => 'required',
            'id_pengarang' => 'required',
            'id_penerbit' => 'required',
            'id_kategori' => 'required',
            'id_rak' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $buku_isbn = Buku::where('isbn', $request->isbn)->first();
        if (!empty($buku_isbn)) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Buku dengan ISBN ' . $request->isbn . ' sudah ada'
            ], 400);
        }

        $dataKodeBuku = $request->judul_buku;
        preg_match_all('/\b\w/', $dataKodeBuku, $matches);
        $kode_buku = implode('', array_map('ucfirst', $matches[0]));
        $bukuKode = $kode_buku . "-" . uniqid();

        $fotoCover = $request->foto_cover;
        $pathFotoCover = $fotoCover->storeAs('public/cover-buku', $kode_buku . "-" . uniqid() . '.' . $fotoCover->extension());
        $directoryFotoCover = Storage::url($pathFotoCover);

        $fileBuku = $request->file_buku;
        $directoryFileBuku = null;
        if (!empty($fileBuku)) {
            $pathFileBuku = $fileBuku->storeAs('public/file-buku', $kode_buku . "-" . uniqid() . '.' . $fileBuku->extension());
            $directoryFileBuku = Storage::url($pathFileBuku);
        }
        // return $directoryFileBuku;

        $buku = Buku::create([
            'isbn' => $request->isbn,
            'kode_buku' => $bukuKode,
            'judul_buku' => $request->judul_buku,
            'tahun_terbit' => $request->tahun_terbit,
            'foto_cover' => $directoryFotoCover,
            'file_buku' => $directoryFileBuku,
            'stok_tersedia' => $request->stok_tersedia,
            'stok_total' => $request->stok_total,
            'jumlah_halaman' => $request->jumlah_halaman,
            'id_pengarang' => $request->id_pengarang,
            'id_penerbit' => $request->id_penerbit,
            'id_kategori' => $request->id_kategori,
            'id_subkategori' => $request->id_subkategori,
            'id_rak' => $request->id_rak
        ]);
        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Buku berhasil dibuat',
            'data' => $buku
        ], 201);
    }

    function show($id_buku)
    {
        $buku = Buku::where('id_buku', $id_buku)->with('pengarang', 'penerbit', 'rak', 'kategori', 'subkategori', 'ulasan')->first();
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
            'message' => 'Data detail buku berhasil didapatkan',
            'data' => $buku
        ], 200);
    }

    function update(Request $request, $id_buku)
    {
        $validator = Validator::make($request->all(), [
            'isbn' => 'required',
            'judul_buku' => 'required',
            'tahun_terbit' => 'required',
            'foto_cover' => 'required',
            'stok_tersedia' => 'required',
            'stok_total' => 'required',
            'jumlah_halaman' => 'required',
            'id_pengarang' => 'required',
            'id_penerbit' => 'required',
            'id_kategori' => 'required',
            'id_rak' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $buku = Buku::where('id_buku', $id_buku)->first();
        if (empty($buku)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }
        $buku->update($request->all());
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Buku berhasil diedit',
            'data' => $buku
        ], 200);
    }

    function destroy($id_buku)
    {
        $buku = Buku::where('id_buku', $id_buku)->first();
        if (empty($buku)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }
        $buku->delete();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Buku berhasil dihapus',
            'data' => $buku
        ], 200);
    }

    // function search(Request $request)
    // {
    // }



    function create()
    {
        $kategori = Kategori::with('subkategori')->get();
        $rak = Rak::all();
        $penerbit = Penerbit::all();
        $pengarang = Pengarang::all();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data kategori, subkategori, rak, penerbit, pengarang  berhasil didapatkan',
            'data' => [
                'kategori' => $kategori,
                'rak' => $rak,
                'penerbit' => $penerbit,
                'pengarang' => $pengarang
            ]
        ], 200);
    }
}
