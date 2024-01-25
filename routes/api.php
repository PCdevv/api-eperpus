<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BukuUsulanController;
use App\Http\Controllers\LaporanMasalahController;
use App\Http\Controllers\UmpanBalikController;
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

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/register/pustakawan', [AuthController::class, 'register_pustakawan']);

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/login/admin', [AuthController::class, 'login_admin']);
Route::post('/auth/login/pustakawan', [AuthController::class, 'login_pustakawan']);

Route::middleware('auth:sanctum', 'pustakawan')->group(function () {
    Route::get('/laporan-masalah', [LaporanMasalahController::class, 'index']);
    Route::get('/umpan-balik', [UmpanBalikController::class, 'index']);
    Route::get('/buku-usulan', [BukuUsulanController::class, 'index']);
});
// /anggota
// /anggota/tambah
// /anggota/edit
// /anggota/hapus

// /auth/login
// /auth/register


Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/{id_buku}', [BukuController::class, 'show']);
Route::post('/buku', [BukuController::class, 'store']);
Route::patch('/buku/{id_buku}', [BukuController::class, 'update']);
Route::delete('/buku/{buku}', [BukuController::class, 'destroy']);
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