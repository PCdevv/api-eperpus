<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    function register(Request $request) {
        $request->validate([
            "email"=>"required",
            "password"=>"required",
            "confirm_password"=>"required"
        ]);

        $userExist = Admin::where('email', $request->email)->first();
        if ($userExist) {
            return response()->json(["message" => "User sudah terdaftar"], 400);
        }
        $userData = Admin::create($request->all());
        
        return response()->json($userData, 201);
    }

    function login(Request $request) {
        $request->validate([
            "email"=>"required",
            "password"=>"required"
        ]);

        $user = Admin::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(["message" => "Email atau Password salah"], 401);
        }
        $token = $user->createToken('secretkey')->plainTextToken;

        return response()->json(["token"=>$token], 200);
    }
}
