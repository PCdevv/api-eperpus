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
                "email" => "admin@mail.com",
                "password" => Hash::make("admin123")
            ]
        );
        DB::table('pustakawans')->insert(
            [
                "no_telp" => "0876543219",
                "nama_lengkap" => "pustakawan",
                "email" => "pustakawan@mail.com",
                "password" => Hash::make("pustakawan123")
            ]
        );
        DB::table('anggotas')->insert(
            [
                "nama_lengkap" => "pelajar",
                "kategori_anggota" => "Pelajar",
                "email" => "pelajar@mail.com",
                "password" => Hash::make("pelajar123")
            ]
        );
        DB::table('pengarangs')->insert(
            [
                "nama_pengarang" => "Ngarang"
            ]
        );
        DB::table('penerbits')->insert(
            [
                "nama_penerbit" => "Terbit"
            ]
        );
        DB::table('raks')->insert(
            [
                "nama_rak" => "Fiksi",
                "kode_rak" => "F01"
            ]
        );
        DB::table('kategoris')->insert(
            [
                "nama_kategori" => "Fantasi"
            ]
        );
        DB::table('subkategoris')->insert([
            [
                "nama_subkategori" => "Isekai",
                "id_kategori" => 1
            ],
            [
                "nama_subkategori" => "Action",
                "id_kategori" => 1
            ]
        ]);
        DB::table('bukus')->insert([
            [
                "isbn" => 121212,
                "kode_buku" => "IJB-dfnhshst",
                "judul_buku" => "Isekai Jadi Mesin Penjual Otomatis",
                "tahun_terbit" => "2030",
                "foto_cover" => "/storage/cover-buku/ijmpo.png",
                "file_buku" => "/storage/file-buku/ijmpo.pdf",
                "jumlah_halaman" => 200,
                "stok_tersedia" => 200,
                "stok_total" => 200,
                "id_pengarang" => 1,
                "id_penerbit" => 1,
                "id_kategori" => 1,
                "id_subkategori" => 1,
                "id_rak" => 1,
            ],
            [
                "isbn" => 121213,
                "kode_buku" => "RRI-dfggsrts",
                "judul_buku" => "Reinkarnasi Raja Iblis",
                "tahun_terbit" => "2030",
                "foto_cover" => "/storage/cover-buku/rri.png",
                "file_buku" => "/storage/file-buku/rri.pdf",
                "jumlah_halaman" => 200,
                "stok_tersedia" => 200,
                "stok_total" => 200,
                "id_pengarang" => 1,
                "id_penerbit" => 1,
                "id_kategori" => 1,
                "id_subkategori" => 2,
                "id_rak" => 1,
            ]
        ]);
    }
}
