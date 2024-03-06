<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    function index(Request $request)
    {
        $anggotas = Anggota::all();
        if (!is_null($request->kategori_anggota)) {
            $anggota_filter = Anggota::where('kategori_anggota', $request->kategori_anggota)->get();
            if (sizeof($anggota_filter) === 0) {
                return response()->json([
                    'success' => false,
                    'code' => 404,
                    'message' => "Anggota dengan kategori {$request->kategori_anggota} tidak ada"
                ], 404);
            }
            return response()->json([
                'success' => true,
                'code' => 200,
                'message' => "Data anggota dengan kategori {$request->kategori_anggota} berhasil didapatkan",
                'data' => $anggota_filter
            ], 200);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => "Data anggota berhasil didapatkan",
            'data' => $anggotas
        ], 200);
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // "no_anggota" => "required",
            // "no_telp" => "required",
            // "nik" => "required",
            "nama_lengkap" => "required",
            "email" => "required",
            "password" => "required",
            "kategori_anggota" => ["required", "in:Pelajar,Guru,Umum"]
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $userExist = Anggota::where('email', $request->email)->first();
        if (!empty($userExist)) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Anggota sudah terdaftar'
            ], 400);
        }
        if ($request->kategori_anggota === "Pelajar") {
            $request["no_anggota"] = "P";
        }
        if ($request->kategori_anggota === "Guru") {
            $request["no_anggota"] = "G";
        }
        if ($request->kategori_anggota === "Umum") {
            $request["no_anggota"] = "U";
        }
        $request["password"] = Hash::make($request->password);
        $anggota = Anggota::create($request->all());

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Anggota berhasil didaftarkan',
            'data' => $anggota
        ], 201);
    }

    function lengkapi_profil(Request $request)
    {
        $id_anggota = $request->user()->id_anggota;
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'no_telp' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $anggota = Anggota::where('id_anggota', $id_anggota)->first();
        if (empty($anggota)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Anggota tidak ditemukan'
            ], 404);
        }
        $anggota->update($request->all());
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Anggota berhasil diedit'
        ], 200);
    }
    function update(Request $request, $id_anggota)
    {
        $validator = Validator::make($request->all(), [
            // 'no_telp' => 'required',
            // 'nik' => 'required',
            'nama_lengkap' => 'required',
            'email' => 'required',
            'verified' => 'required',
            'kategori_anggota' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $anggota = Anggota::where('id_anggota', $id_anggota)->first();
        if (empty($anggota)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Anggota tidak ditemukan'
            ], 404);
        }
        if (empty($request['no_telp'])) {
            $request['no_telp'] = $anggota->no_telp;
        }
        if (empty($request['nik'])) {
            $request['nik'] = $anggota->nik;
        }
        $request['password'] = $anggota->password;
        $anggota->update($request->all());
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Anggota berhasil diedit'
        ], 200);
    }

    function destroy($id_anggota)
    {
        $anggota = Anggota::where('id_anggota', $id_anggota)->first();
        if (empty($anggota)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Anggota tidak ditemukan'
            ], 404);
        }
        $anggota->delete();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Anggota berhasil dihapus'
        ], 200);
    }
}
