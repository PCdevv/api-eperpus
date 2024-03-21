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
        DB::table('pengarangs')->insert([
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
                ]);
                DB::table('penerbits')->insert([
                    [
                        "nama_penerbit" => "Bentang"
                    ],
                    [
                        "nama_penerbit" => "Falcon"
                    ],
                    [
                        "nama_penerbit" => "Gramedia"
                    ]
                ]);
                DB::table('raks')->insert([
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
                ]);
                DB::table('kategoris')->insert([
                    [
                        "nama_kategori" => "Novel"
                    ],
                    [
                        "nama_kategori" => "Buku Pelajaran"
                    ],
                ]);
                DB::table('subkategoris')->insert([
                    [
                        "nama_subkategori" => "Fiksi Remaja",
                        "id_kategori" => 1,
                    ],
                    [
                        "nama_subkategori" => "Inspiratif",
                        "id_kategori" => 1,
                    ],
                    [
                        "nama_subkategori" => "Sejarah",
                        "id_kategori" => 1,
                    ],
                ]);
                DB::table('bukus')->insert([
                    [
                        "isbn" => 121210,
                        "kode_buku" => "AT01",
                        "judul_buku" => "Perahu Kertas",
                        "tahun_terbit" => "2003",
                        "foto_cover" => "/storage/cover-buku/perahu_kertas.jpeg",
                        "file_buku" => "/storage/file-buku/perahu_kertas.pdf",
                        "jumlah_halaman" => 200,
                        "stok_tersedia" => 3,
                        "stok_total" => 3,
                        "id_pengarang" => 1,
                        "id_penerbit" => 1,
                        "id_kategori" => 1,
                        "id_subkategori" => 1,
                        "id_rak" => 1,
                    ],
                    [
                        "isbn" => 121211,
                        "kode_buku" => "BI24",
                        "judul_buku" => "Buya Hamka",
                        "tahun_terbit" => "2021",
                        "foto_cover" => "/storage/cover-buku/buya_hamka.jpeg",
                        "file_buku" => "/storage/file-buku/buya_hamka.pdf",
                        "jumlah_halaman" => 254,
                        "stok_tersedia" => 5,
                        "stok_total" => 5,
                        "id_pengarang" => 2,
                        "id_penerbit" => 2,
                        "id_kategori" => 1,
                        "id_subkategori" => 2,
                        "id_rak" => 2,
                    ],
                    [
                        "isbn" => 121212,
                        "kode_buku" => "AT32",
                        "judul_buku" => "Anak Rantau",
                        "tahun_terbit" => "2019",
                        "foto_cover" => "/storage/cover-buku/anak_rantau.jpeg",
                        "file_buku" => "/storage/file-buku/anak_rantau.pdf",
                        "jumlah_halaman" => 254,
                        "stok_tersedia" => 5,
                        "stok_total" => 5,
                        "id_pengarang" => 2,
                        "id_penerbit" => 2,
                        "id_kategori" => 1,
                        "id_subkategori" => 1,
                        "id_rak" => 1,
                    ],
                    [
                        "isbn" => 121213,
                        "kode_buku" => "BI17",
                        "judul_buku" => "Rumah Kaca",
                        "tahun_terbit" => "2015",
                        "foto_cover" => "/storage/cover-buku/rumah_kaca.jpeg",
                        "file_buku" => "/storage/file-buku/rumah_kaca.pdf",
                        "jumlah_halaman" => 254,
                        "stok_tersedia" => 7,
                        "stok_total" => 7,
                        "id_pengarang" => 3,
                        "id_penerbit" => 3,
                        "id_kategori" => 1,
                        "id_subkategori" => 3,
                        "id_rak" => 3,
                    ],
                    [
                        "isbn" => 121214,
                        "kode_buku" => "AT22",
                        "judul_buku" => "Tentang Kamu",
                        "tahun_terbit" => "2016",
                        "foto_cover" => "/storage/cover-buku/tentang_kamu.jpeg",
                        "file_buku" => "/storage/file-buku/tentang_kamu.pdf",
                        "jumlah_halaman" => 254,
                        "stok_tersedia" => 7,
                        "stok_total" => 7,
                        "id_pengarang" => 4,
                        "id_penerbit" => 3,
                        "id_kategori" => 1,
                        "id_subkategori" => 1,
                        "id_rak" => 1,
                    ],
                ]);
//         DB::table('pengarangs')->insert(
//             [
//                 "nama_pengarang" => "Ngarang"
//             ]
//         );
//         DB::table('penerbits')->insert(
//             [
//                 "nama_penerbit" => "Terbit"
//             ]
//         );
//         DB::table('raks')->insert(
//             [
//                 "nama_rak" => "Fiksi",
//                 "kode_rak" => "F01"
//             ]
//         );
//         DB::table('kategoris')->insert(
//             [
//                 "nama_kategori" => "Fantasi"
//             ]
//         );
//         DB::table('subkategoris')->insert([
//             [
//                 "nama_subkategori" => "Isekai",
//                 "id_kategori" => 1
//             ],
//             [
//                 "nama_subkategori" => "Action",
//                 "id_kategori" => 1
//             ]
//         ]);
//         DB::table('bukus')->insert([
//             [
//                 "isbn" => 121212,
//                 "kode_buku" => "IJB-dfnhshst",
//                 "judul_buku" => "Isekai Jadi Mesin Penjual Otomatis",
//                 "tahun_terbit" => "2030",
//                 "foto_cover" => "/storage/cover-buku/ijmpo.png",
//                 "file_buku" => "/storage/file-buku/ijmpo.pdf",
//                 "jumlah_halaman" => 200,
//                 "stok_tersedia" => 200,
//                 "stok_total" => 200,
//                 "id_pengarang" => 1,
//                 "id_penerbit" => 1,
//                 "id_kategori" => 1,
//                 "id_subkategori" => 1,
//                 "id_rak" => 1,
//             ],
//             [
//                 "isbn" => 121213,
//                 "kode_buku" => "RRI-dfggsrts",
//                 "judul_buku" => "Reinkarnasi Raja Iblis",
//                 "tahun_terbit" => "2030",
//                 "foto_cover" => "/storage/cover-buku/rri.png",
//                 "file_buku" => "/storage/file-buku/rri.pdf",
//                 "jumlah_halaman" => 200,
//                 "stok_tersedia" => 200,
//                 "stok_total" => 200,
//                 "id_pengarang" => 1,
//                 "id_penerbit" => 1,
//                 "id_kategori" => 1,
//                 "id_subkategori" => 2,
//                 "id_rak" => 1,
//             ]
//         ]);
    }
}
