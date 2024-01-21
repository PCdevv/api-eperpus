<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\Rak;
use App\Models\Subkategori;
use Illuminate\Http\Request;

class KonfigurasiController extends Controller
{
    function index(){
        $raks = Rak::all();
        $kategoris = Kategori::all();

        $data = [$raks, $kategoris];

        response()->json($data, 200);
    }
    
    function addPenerbit(Request $request){
        $request->validate([
            'nama_penerbit' => 'required'
        ]);

        $penerbit = Penerbit::where('nama_penerbit', $request->nama_penerbit)->first();
        if ($penerbit) {
            response()->json(['message' => 'Penerbit sudah ada'], 400);
        }
        
        Penerbit::create($request->all());
        response()->json(['message' => 'Penerbit berhasil dibuat'], 201);
    }

    function addPengarang(Request $request){
        $request->validate([
            'nama_pengarang' => 'required'
        ]);

        $pengarang = Pengarang::where('nama_pengarang', $request->nama_pengarang)->first();
        if ($pengarang) {
            response()->json(['message' => 'Pengarang sudah ada'], 400);
        }
        
        Pengarang::create($request->all());
        response()->json(['message' => 'Pengarang berhasil dibuat'], 201);
    }

    function addRak(Request $request){
        $request->validate([
            'kode_rak' => 'required',
            'nama_rak' => 'required'
        ]);

        $rak = Rak::where('kode_rak', $request->kode_rak)->first();
        if ($rak) {
            response()->json(['message' => 'Rak sudah ada'], 400);
        }
        
        Rak::create($request->all());
        response()->json(['message' => 'Rak berhasil dibuat'], 201);
    }

    function addKategori(Request $request){
        $request->validate([
            'nama_kategori' => 'required'
        ]);

        $kategori = Kategori::where('nama_kategori', $request->nama_kategori)->first();
        if ($kategori) {
            response()->json(['message' => 'Kategori sudah ada'], 400);
        }
        
        Kategori::create($request->nama_kategori);
        response()->json(['message' => 'Kategori berhasil dibuat'], 201);
    }

    function addSubkategori(Request $request){
        $request->validate([
            'nama_subkategori' => 'required',
            'id_kategori' => 'required'
        ]);

        $kategori = Kategori::where('id_kategori', $request->id_kategori)->first();
        if (!$kategori) {
            response()->json(['message' => 'Kategori tidak ditemukan'], 400);
        }

        $subkategori = Subkategori::where('nama_subkategori', $request->nama_subkategori)->first();
        if ($subkategori) {
            response()->json(['message' => 'Subkategori sudah ada'], 400);
        }
        
        Subkategori::create($request->all());
        response()->json(['message' => 'Subkategori berhasil dibuat'], 201);
    }
}
