<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('admins')->insert(
            [
                "email" => "mint@mail.com",
                "password" => Hash::make("pwd")
            ]
        );
        DB::table('pengarangs')->insert(
            [
                "nama_pengarang" => "gweh"
            ]
        );
        DB::table('penerbits')->insert(
            [
                "nama_penerbit" => "gweh.id"
            ]
        );
        DB::table('raks')->insert(
            [
                "nama_rak" => "C03",
                "kode_rak" => "C03"
            ]
        );
        DB::table('kategoris')->insert(
            [
                "nama_kategori" => "isekai"
            ]
        );
        DB::table('bukus')->insert(
            [
                "isbn" => 121212,
                "kode_buku" => "BI01",
                "judul_buku" => "Bahasa I",
                "tahun_terbit" => "2030",
                "foto_cover" => "/storage/img/somePath",
                "file_buku" => "/storage/pdf/somePath",
                "jumlah_halaman" => 200,
                "stok_buku" => 200,
                "id_pengarang" => 1,
                "id_penerbit" => 1,
                "id_kategori" => 1,
                "id_subkategori" => null,
                "id_rak" => 1,
            ]
        );
    }
}
