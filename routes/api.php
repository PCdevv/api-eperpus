<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register/admin', [AuthController::class, 'register']);
Route::post('/auth/login/admin', [AuthController::class, 'login']);

// /anggota
// /anggota/tambah
// /anggota/edit
// /anggota/hapus

// /auth/login
// /auth/register


Route::get('/buku', [BukuController::class, 'index']);
    // /buku
    // /buku/{kategori}
    // /buku/lihat/:id
    // /buku/baca
    // /buku/tambah
    // /buku/edit
    // /buku/hapus

    // /riwayat/peminjaman
    // /riwayat/denda
    // /riwayat/aktifitas/admin
    // /riwayat/aktifitas/pustakawan
    // /riwayat/aktifitas/anggota