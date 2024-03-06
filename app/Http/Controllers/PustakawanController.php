<?php

namespace App\Http\Controllers;

use App\Models\Pustakawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PustakawanController extends Controller
{
    function index()
    {
        $pustakawans = Pustakawan::all();
        if (sizeof($pustakawans) === 0) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Pustakawan tidak ada',
                'data' => []
            ], 404);
        }

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Data pustakawan berhasil didapatkan',
            'data' => $pustakawans
        ], 200);
    }

    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required",
            "no_telp" => "required",
            "nama_lengkap" => "required",
            "password" => "required"
        ]);


        if ($validator->fails()) {
            return $validator->errors();
        }

        $userExist = Pustakawan::where('email', $request->email)->first();
        if (!empty($userExist)) {
            return response()->json([
                'success' => false,
                'code' => 400,
                'message' => 'Pustakawan sudah terdaftar',
                'data' => $userExist
            ], 400);
        }
        $request["password"] = Hash::make($request->password);
        $pustakawan = Pustakawan::create($request->all());

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Pustakawan berhasil didaftarkan',
            'data' => $pustakawan
        ], 201);
    }

    function update(Request $request, $id_pustakawan)
    {
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'no_telp' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $pustakawan = Pustakawan::where('id_pustakawan', $id_pustakawan)->first();
        if (empty($pustakawan)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Pustakawan tidak ditemukan',
                'data' => null
            ], 404);
        }
        $pustakawan->update($request->all());
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Pustakawan berhasil diedit',
            'data' => $pustakawan
        ], 200);
    }

    function destroy($id_pustakawan)
    {
        $pustakawan = Pustakawan::where('id_pustakawan', $id_pustakawan)->first();
        if (empty($pustakawan)) {
            return response()->json([
                'success' => false,
                'code' => 404,
                'message' => 'Pustakawan tidak ditemukan',
                'data' => null
            ], 404);
        }
        $pustakawan->delete();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Pustakawan berhasil dihapus',
            'data' => $pustakawan
        ], 200);
    }
}
