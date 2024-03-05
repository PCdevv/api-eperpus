<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengarangs')->insert(
            [
                "nama_pengarang" => "Dee Lestari"
            ],
            [
                "nama_pengarang" => "A. Fuadi"
            ],
            [
                "nama_pengarang" => "Pramoedya Ananta Toer"
            ],
            [
                "nama_pengarang" => "Tere Liye"
            ]

        );
        DB::table('penerbits')->insert(
            [
                "nama_penerbit" => "Bentang"
            ],
            [
                "nama_penerbit" => "Falcon"
            ],
            [
                "nama_penerbit" => "Gramedia"
            ]
        );
        DB::table('raks')->insert(
            [
                "nama_rak" => "Fiksi",
                "kode_rak" => "F01"
            ],
            [
                "nama_rak" => "Biografi",
                "kode_rak" => "G02"
            ],
            [
                "nama_rak" => "Sejarah",
                "kode_rak" => "H04"
            ]
        );
        DB::table('kategoris')->insert(
            [
                "nama_kategori" => "Novel Fiksi Remaja"
            ],
            [
                "nama_kategori" => "Novel Inspiratif"
            ],
            [
                "nama_kategori" => "Novel Sejarah"
            ],
        );
        DB::table('bukus')->insert(
            [
                "isbn" => 121212,
                "kode_buku" => "AT01",
                "judul_buku" => "Perahu Kertas",
                "tahun_terbit" => "2003",
                "foto_cover" => "/storage/img/PerahuKertas.jpg",
                "file_buku" => "/storage/pdf/Perahu Kertas.pdf",
                "jumlah_halaman" => 200,
                "stok_buku" => 3,
                "id_pengarang" => 1,
                "id_penerbit" => 1,
                "id_kategori" => 1,
                "id_subkategori" => null,
                "id_rak" => 1,
            ],
            [
                "isbn" => 121212,
                "kode_buku" => "BI24",
                "judul_buku" => "Buya Hamka",
                "tahun_terbit" => "2021",
                "foto_cover" => "/storage/img/BuyaHamka.jpg",
                "file_buku" => "/storage/pdf/Buya Hamka.pdf",
                "jumlah_halaman" => 254,
                "stok_buku" => 5,
                "id_pengarang" => 2,
                "id_penerbit" => 2,
                "id_kategori" => 2,
                "id_subkategori" => null,
                "id_rak" => 2,
            ],
            [
                "isbn" => 121212,
                "kode_buku" => "AT32",
                "judul_buku" => "Anak Rantau",
                "tahun_terbit" => "2019",
                "foto_cover" => "/storage/img/AnakRantau.jpg",
                "file_buku" => "/storage/pdf/Anak Rantau.pdf",
                "jumlah_halaman" => 254,
                "stok_buku" => 5,
                "id_pengarang" => 2,
                "id_penerbit" => 2,
                "id_kategori" => 1,
                "id_subkategori" => null,
                "id_rak" => 1,
            ],
            [
                "isbn" => 121212,
                "kode_buku" => "BI17",
                "judul_buku" => "Rumah Kaca",
                "tahun_terbit" => "2015",
                "foto_cover" => "/storage/img/RumahKaca.jpg",
                "file_buku" => "/storage/pdf/Rumah Kaca.pdf",
                "jumlah_halaman" => 254,
                "stok_buku" => 7,
                "id_pengarang" => 3,
                "id_penerbit" => 3,
                "id_kategori" => 3,
                "id_subkategori" => null,
                "id_rak" => 3,
            ],
            [
                "isbn" => 121212,
                "kode_buku" => "AT22",
                "judul_buku" => "Tentang Kamu",
                "tahun_terbit" => "2016",
                "foto_cover" => "/storage/img/TentangKamu.jpg",
                "file_buku" => "/storage/pdf/Tentang Kamu.pdf",
                "jumlah_halaman" => 254,
                "stok_buku" => 7,
                "id_pengarang" => 4,
                "id_penerbit" => 3,
                "id_kategori" => 1,
                "id_subkategori" => null,
                "id_rak" => 1,
            ],
        );
    }
}
