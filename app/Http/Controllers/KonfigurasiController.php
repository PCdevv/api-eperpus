<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\Rak;
use App\Models\Subkategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KonfigurasiController extends Controller
{
    function index()
    {
        $raks = Rak::all();
        $kategoris = Kategori::all();
        $subkategoris = Subkategori::with('kategori')->get();
        $pengarangs = Pengarang::all();
        $penerbits = Penerbit::all();

        $data = [
            'rak' => $raks,
            'kategori' => $kategoris,
            'subkategori' => $subkategoris,
            'pengarang' => $pengarangs,
            'penerbit' => $penerbits
        ];

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data konfigurasi berhasil didapatkan',
            'data' => $data
        ], 200);
    }

    function storePenerbit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_penerbit' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $penerbit = Penerbit::where('nama_penerbit', $request->nama_penerbit)->first();
        if (!empty($penerbit)) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Penerbit sudah ada',
                'data' => $penerbit
            ], 400);
        }

        $data_penerbit = Penerbit::create([
            'nama_penerbit' => $request->nama_penerbit
        ]);
        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Penerbit berhasil dibuat',
            'data' => $data_penerbit
        ], 201);
    }
    function updatePenerbit(Request $request, $id_penerbit)
    {
        $validator = Validator::make($request->all(), [
            'nama_penerbit' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $penerbit = Penerbit::where('id_penerbit', $id_penerbit)->first();
        if (empty($penerbit)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Penerbit tidak ditemukan',
                'data' => null
            ], 404);
        }
        $penerbit->update($request->all());
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Penerbit berhasil diedit',
            'data' => $penerbit
        ], 200);
    }
    function destroyPenerbit($id_penerbit)
    {
        $penerbit = Penerbit::where('id_penerbit', $id_penerbit)->first();
        if (empty($penerbit)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Penerbit tidak ditemukan',
                'data' => null
            ], 404);
        }
        $penerbit->delete();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Penerbit berhasil dihapus',
            'data' => $penerbit
        ], 200);
    }

    function storePengarang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pengarang' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $pengarang = Pengarang::where('nama_pengarang', $request->nama_pengarang)->first();
        if (!empty($pengarang)) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Pengarang sudah ada',
                'data' => $pengarang
            ], 400);
        }

        $data_pengarang = Pengarang::create([
            'nama_pengarang' => $request->nama_pengarang
        ]);
        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Pengarang berhasil dibuat',
            'data' => $data_pengarang
        ], 201);
    }
    function updatePengarang(Request $request, $id_pengarang)
    {
        $validator = Validator::make($request->all(), [
            'nama_pengarang' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $pengarang = Pengarang::where('id_pengarang', $id_pengarang)->first();
        if (empty($pengarang)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Pengarang tidak ditemukan',
                'data' => null
            ], 404);
        }
        $pengarang->update($request->all());
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Pengarang berhasil diedit',
            'data' => $pengarang
        ], 200);
    }
    function destroyPengarang($id_pengarang)
    {
        $pengarang = Pengarang::where('id_pengarang', $id_pengarang)->first();
        if (empty($pengarang)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Pengarang tidak ditemukan',
                'data' => null
            ], 404);
        }
        $pengarang->delete();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Pengarang berhasil dihapus',
            'data' => $pengarang
        ], 200);
    }

    function storeRak(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_rak' => 'required',
            'nama_rak' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $rak = Rak::where('kode_rak', $request->kode_rak)->first();
        if (!empty($rak)) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Rak sudah ada',
                'data' => $rak
            ], 400);
        }

        $data_rak = Rak::create([
            'nama_rak' => $request->nama_rak,
            'kode_rak' => $request->kode_rak,
        ]);
        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Rak berhasil dibuat',
            'data' => $data_rak
        ], 201);
    }
    function updateRak(Request $request, $id_rak)
    {
        $validator = Validator::make($request->all(), [
            'kode_rak' => 'required',
            'nama_rak' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $rak = Rak::where('id_rak', $id_rak)->first();
        if (empty($rak)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Rak tidak ditemukan',
                'data' => null
            ], 404);
        }
        $rak->update($request->all());
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Rak berhasil diedit',
            'data' => $rak
        ], 200);
    }
    function destroyRak($id_rak)
    {
        $rak = Rak::where('id_rak', $id_rak)->first();
        if (empty($rak)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Rak tidak ditemukan',
                'data' => null
            ], 404);
        }
        $rak->delete();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Rak berhasil dihapus',
            'data' => $rak
        ], 200);
    }

    function storeKategori(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $kategori = Kategori::where('nama_kategori', $request->nama_kategori)->first();
        if (!empty($kategori)) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Kategori sudah ada',
                'data' => $kategori
            ], 400);
        }

        $data_kategori = Kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);
        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Kategori berhasil dibuat',
            'data' => $data_kategori
        ], 201);
    }
    function updateKategori(Request $request, $id_kategori)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $kategori = Kategori::where('id_kategori', $id_kategori)->first();
        if (empty($kategori)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Kategori tidak ditemukan',
                'data' => null
            ], 404);
        }
        $kategori->update($request->all());
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Kategori berhasil diedit',
            'data' => $kategori
        ], 200);
    }
    function destroyKategori($id_kategori)
    {
        $kategori = Kategori::where('id_kategori', $id_kategori)->first();
        if (empty($kategori)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Kategori tidak ditemukan',
                'data' => null
            ], 404);
        }
        $kategori->delete();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Kategori berhasil dihapus',
            'data' => $kategori
        ], 200);
    }

    function storeSubkategori(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_subkategori' => 'required',
            'id_kategori' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $kategori = Kategori::where('id_kategori', $request->id_kategori)->first();
        if (empty($kategori)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Kategori tidak ditemukan',
                'data' => null
            ], 404);
        }

        $subkategori = Subkategori::where('nama_subkategori', $request->nama_subkategori)->first();
        if (!empty($subkategori)) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Subkategori sudah ada',
                'data' => $subkategori
            ], 400);
        }

        $data_subkategori = Subkategori::create([
            'nama_subkategori' => $request->nama_subkategori,
            'id_kategori' => $request->id_kategori
        ]);
        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Subkategori berhasil dibuat',
            'data' => $data_subkategori
        ], 201);
    }
    function updateSubkategori(Request $request, $id_subkategori)
    {
        $validator = Validator::make($request->all(), [
            'nama_subkategori' => 'required',
            'id_kategori' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $subkategori = Subkategori::where('id_subkategori', $id_subkategori)->first();
        if (empty($subkategori)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Subkategori tidak ditemukan',
                'data' => null
            ], 404);
        }
        $subkategori->update($request->all());
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Subkategori berhasil diedit',
            'data' => $subkategori
        ], 200);
    }
    function destroySubkategori($id_subkategori)
    {
        $subkategori = Subkategori::where('id_subkategori', $id_subkategori)->first();
        if (empty($subkategori)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Subkategori tidak ditemukan',
                'data' => null
            ], 404);
        }
        $subkategori->delete();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Subkategori berhasil dihapus',
            'data' => $subkategori
        ], 200);
    }
}
