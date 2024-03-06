<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Anggota;
use App\Models\Pustakawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    function register(Request $request)
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
                'message' => 'User sudah terdaftar'
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
        $request["password"] = Hash::make(($request->password));
        $anggota = Anggota::create($request->all());

        return response()->json([
            'success' => true,
            'code' => 201,
            'message' => 'Register berhasil, silahkan login',
            'data' => $anggota
        ], 201);
    }

    function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "device_type" => ["required", "in:web,mobile"],
            "email" => "required",
            "password" => "required"
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $user = Anggota::where('email', $request->email)->first();
        if (empty($user)) {
            return response()->json([
                'success' => false,
                'code' => 401,
                'message' => 'User belum terdaftar'
            ], 401);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'code' => 401,
                'message' => 'Email atau Password salah'
            ], 401);
        }
        $token = $user->createToken($request->device_type, ['role:anggota'])->plainTextToken;

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Login berhasil',
            'data' => [
                'token_type' => 'Bearer',
                'access_token' => $token
            ]
        ], 200);
    }

    function login_pustakawan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required",
            "password" => "required"
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $user = Pustakawan::where('email', $request->email)->first();
        if (empty($user) || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'code' => 401,
                'message' => 'Email atau Password salah'
            ], 401);
        }
        $token = $user->createToken('web', ['role:pustakawan'])->plainTextToken;

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Login berhasil',
            'data' => [
                'token_type' => 'Bearer',
                'access_token' => $token
            ]
        ], 200);
    }

    function login_admin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required",
            "password" => "required"
        ]);

        if ($validator->fails()) {
            return $validator->errors();
        }

        $user = Admin::where('email', $request->email)->first();
        if (empty($user) || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'code' => 401,
                'message' => 'Email atau Password salah'
            ], 401);
        }
        $token = $user->createToken('web', ['role:admin', 'role:pustakawan'])->plainTextToken;

        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'Login berhasil',
            'data' => [
                'token_type' => 'Bearer',
                'access_token' => $token
            ]
        ], 200);
    }
}
