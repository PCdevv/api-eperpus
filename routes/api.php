<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\BukuUsulanController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KonfigurasiController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\LaporanMasalahController;
use App\Http\Controllers\MyController;
use App\Http\Controllers\PustakawanController;
use App\Http\Controllers\TransaksiBukuController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UmpanBalikController;
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

Route::get('/buku', [BukuController::class, 'index']);
Route::get('/bukus', [BukuController::class, 'index_tabel']);
Route::get('/buku/{id_buku}', [BukuController::class, 'show']);
Route::post('/buku', [BukuController::class, 'store']);
Route::get('/buku-create', [BukuController::class, 'create']);
Route::patch('/buku/{id_buku}', [BukuController::class, 'update']);
Route::delete('/buku/{id_buku}', [BukuController::class, 'destroy']);

Route::get('/search-no-anggota/{no_anggota}', [TransaksiBukuController::class, 'anggota_by_no']);
Route::get('/search-kode-buku/{kode_buku}', [TransaksiBukuController::class, 'buku_by_kode']);

Route::post('/kunjungan', [KunjunganController::class, 'index']);

Route::post('/umpan-balik', [UmpanBalikController::class, 'store']);
Route::post('/usulkan-buku', [BukuUsulanController::class, 'store']);


// Route::post('/konfigurasi/penerbit', [KonfigurasiController::class, 'storePenerbit']);
// Route::patch('/konfigurasi/penerbit', [KonfigurasiController::class, 'updatePenerbit']);
// Route::delete('/konfigurasi/penerbit', [KonfigurasiController::class, 'destroyPenerbit']);

// Route::post('/konfigurasi/pengarang', [KonfigurasiController::class, 'storePengarang']);
// Route::patch('/konfigurasi/pengarang', [KonfigurasiController::class, 'updatePengarang']);
// Route::delete('/konfigurasi/pengarang', [KonfigurasiController::class, 'destroyPengarang']);

// Route::post('/konfigurasi/kategori', [KonfigurasiController::class, 'storeKategori']);
// Route::patch('/konfigurasi/kategori', [KonfigurasiController::class, 'updateKategori']);
// Route::delete('/konfigurasi/kategori', [KonfigurasiController::class, 'destroyKategori']);

// Route::post('/konfigurasi/rak', [KonfigurasiController::class, 'storeRak']);
// Route::patch('/konfigurasi/rak', [KonfigurasiController::class, 'updateRak']);
// Route::delete('/konfigurasi/rak', [KonfigurasiController::class, 'destroyRak']);

Route::post('/auth/register', [AuthController::class, 'register']);

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/login/admin', [AuthController::class, 'login_admin']);
Route::post('/auth/login/pustakawan', [AuthController::class, 'login_pustakawan']);

Route::middleware('auth:sanctum', 'anggota')->group(function () {
    Route::post('/pinjam/digital/{id_buku}', [BukuController::class, 'peminjaman_digital']);
    Route::post('/kembali/digital/{id_buku}', [BukuController::class, 'pengembalian_digital']);
    Route::post('/selesai-baca/{id_buku}', [MyController::class, 'selesai_baca']);
    Route::post('/ulasan', [UlasanController::class, 'store']);
    Route::get('/profil', [MyController::class, 'profil']);
    Route::get('/denda', [MyController::class, 'denda']);
    Route::get('/buku-dipinjam', [MyController::class, 'dipinjam']);

    Route::post('/laporan-masalah', [LaporanMasalahController::class, 'store']);
});

Route::middleware('auth:sanctum', 'pustakawan')->group(function () {
    Route::get('/laporan-masalah', [LaporanMasalahController::class, 'index']);
    Route::get('/umpan-balik', [UmpanBalikController::class, 'index']);
    Route::get('/buku-usulan', [BukuUsulanController::class, 'index']);
    Route::get('/denda', [DendaController::class, 'index']);
    Route::get('/history', [HistoryController::class, 'index']);
    Route::prefix('kelola')->group(function () {
        Route::apiResource('anggota', AnggotaController::class)->except('show');
    });
    Route::post('/pinjam', [TransaksiBukuController::class, 'peminjaman_fisik']);
    Route::post('/kembali', [TransaksiBukuController::class, 'pengembalian_fisik']);
});

Route::middleware('auth:sanctum', 'admin')->group(function () {
    Route::prefix('kelola')->group(function () {
        Route::apiResource('pustakawan', PustakawanController::class)->except('show');
    });

    Route::prefix('konfigurasi')->group(function () {
        Route::get('/', [KonfigurasiController::class, 'index']);

        Route::post('/pengarang', [KonfigurasiController::class, 'storePengarang']);
        Route::patch('/pengarang/{id_pengarang}', [KonfigurasiController::class, 'updatePengarang']);
        Route::delete('/pengarang/{id_pengarang}', [KonfigurasiController::class, 'destroyPengarang']);

        Route::post('/penerbit', [KonfigurasiController::class, 'storePenerbit']);
        Route::patch('/penerbit/{id_penerbit}', [KonfigurasiController::class, 'updatePenerbit']);
        Route::delete('/penerbit/{id_penerbit}', [KonfigurasiController::class, 'destroyPenerbit']);

        Route::post('/rak', [KonfigurasiController::class, 'storeRak']);
        Route::patch('/rak/{id_rak}', [KonfigurasiController::class, 'updateRak']);
        Route::delete('/rak/{id_rak}', [KonfigurasiController::class, 'destroyRak']);

        Route::post('/kategori', [KonfigurasiController::class, 'storeKategori']);
        Route::patch('/kategori/{id_kategori}', [KonfigurasiController::class, 'updateKategori']);
        Route::delete('/kategori/{id_kategori}', [KonfigurasiController::class, 'destroyKategori']);

        Route::post('/subkategori', [KonfigurasiController::class, 'storeSubkategori']);
        Route::patch('/subkategori/{id_subkategori}', [KonfigurasiController::class, 'updateSubkategori']);
        Route::delete('/subkategori/{id_subkategori}', [KonfigurasiController::class, 'destroySubkategori']);
    });
});
