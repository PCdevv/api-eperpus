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
                "sinopsis" => "Novel Perahu Kertas bertemakan persahabatan, percintaan, dan idealisme seseorang. Kisah ini berawal dengan seorang remaja laki-laki yang baru saja lulus dari Sekolah Menengah Akhir (SMA) bernama Keenan. Ia adalah laki-laki yang cerdas, mempunyai minat dan bakat dalam bidang seni melukis sangat kuat.

                Keenan hanya bercita-cita menjadi seorang penulis, tidak ada cita-cita lain baginya. Akan tetapi, kesepakatan antara Keenan dengan sang ayah yang mengharuskan dirinya pergi meninggal Amsterdam untuk kuliah di Indonesia, tepatnya di Fakultas Ekonomi, Bandung.

                Tokoh utama lain dalam novel ini ialah Kugy. Kugy merupakan perempuan unik, mempunyai daya imaji yang sangat tinggi, kemudian bisa dibilang ia berpenampilan eksentrik cenderung berantakan. Kugy hendak berkuliah di kampus yang sama dengan Keenan, di Bandung.

                Sedari kecil, Kugy memang sudah mencintai dunia perdongengan. Maka dari itu, jangan heran bila dirinya mempunyai imajinasi tinggi. Ia memiliki koleksi dan taman bacaan, serta hobi menulis cerita dongeng. Tidak lain, ia hanya bercita-cita untuk menjadi juru dongeng.

                Akan tetapi, dirinya menyadari bahwa penulis atau juru dongeng bukanlah suatu profesi atau pekerjaan yang ‘menghasilkan’ dan diterima oleh lingkungan kehidupannya. Kugy memiliki cara agar dirinya tidak jauh-jauh dari dunia kepenulisan, yakni dengan melanjutkan studinya di Fakultas Sastra.

                Pertemuan antara Keenan dan Kugy berawal dari Eko dan Noni yang mana Eko merupakan sepupu dari Keenan, sedangkan Noni merupakan sahabat baik Kugy sedari kecil. Mereka semua, kecuali Noni, berpindah dari Jakarta dan kuliah di kampus yang sama di kota Bandung. Keenan, Kugi, Eko, dan Noni akhirnya menjadi sahabat baik.

                Hingga akhirnya, Kugy dan Keenan memiliki rasa kagum antara satu sama lain dan mulai mengalami adanya perubahan. Dengan kata lain, tanpa memiliki kesempatan untuk bersuara, mereka sudah meletakkan hatinya masing-masing. Akan tetapi, keadaan saat itu memang tidak memungkinkan untuk mereka saling berbagi rasa.

                Kugy sudah memiliki kekasih, bernama Joshua atau Kugy memanggilnya Ojos. Keenan yang saat itu belum memiliki kekasih, kemudian dicomblangkan oleh Eko dan Noni bernama Wanda, yakni seorang kurator muda dan bisa dikatakan bernasib sama dengan Keenan.

                Hal itu terlihat bahwa Keenan dan Wanda memiliki minat dan bakat dalam bidang yang sama, yaitu melukis dan ingin menjadi seorang pelukis juga. Akan tetapi, orang tua dari mereka berdua tidak mengizinkan sebab para orang tuanya menganggap bahwa hanya dengan lukisan tidak dapat menghasilkan uang untuk kebutuhan hidup. Keenan dan Wanda memiliki hubungan yang semakin erat karena keduanya merasa jika mereka bernasib sama.

                Sebenarnya, ketika Kugy mengetahui kedekatan antara Kugy dan Wanda, dirinya seakan cemburu, tetapi ia terlihat seolah tidak peduli, bahkan menyangkal rasa cemburu itu. Hingga akhirnya Wanda dan Keenan menjadi sepasang kekasih sebab dan Wanda juga rela untuk bertindak apa saja untuk menunjukkan rasa cintanya kepada Keenan.

                Setelah mendengar Keenan dan Wanda berpacaran, Kugy merasakan amat sakit di dadanya seakan ditusuk tombak runcing. Ia tidak tahu apa yang dirasakan oleh perasaannya saat itu, bisa dibilang perasaannya absurd.

                Pada satu sisi, dirinya sadar bahwa ia mempunyai Ojos sebagai kekasihnya. Akan tetapi, di sisi lain, dirinya ada perasaan yang berbeda pada Keenan, perasaan yang seolah memandang Keenan sebagai sosok yang spesial di mata Kugy. Ojos jadi merasakan adanya perbedaan dalam diri Kugy, yakni sikap ketidakpedulian. Sayangnya, hubungan mereka berdua terpaksa kandas.

                Persahabatan mereka berempat, yakni Keenan, Kugy, Eko, dan Noni sedikit merenggang. Kugy memutuskan untuk mencari kesibukan baru, yaitu menjadi seorang guru relawan bernama Sakola Alit, semacam sekolah darurat.

                Di Sakola Alit, Kugy bersua dengan murid yang sangat bandel bernama Pilik. Pilik beserta teman-teman lainnya berhasil ia taklukkan hatinya dengan menuliskan sebuah cerita dongeng terkait kisah petualangan mereka, berjudul “Jenderal Pilik dan Pasukan Alit”. Kugy menulis cerita hampir setiap hari tentang para muridnya. Cerita itu ia tulis di dalam sebuah buku yang nantinya akan diberikan pada Keenan.

                Kemudian, awalnya hubungan antara Keenan dan Wanda berjalan baik-baik saja, tetapi lambat laun mulai berbeda dan berubah. Wanda selalu berpikir bahwa Keenan tidak sepenuh hati mencintainya, kemudian mereka dihadapkan dengan konflik yang terbilang besar, hingga akhirnya hubungan mereka kandas jua. Saat hubungan Keenan sudah berakhir dengan Wanda, berakhir pulalah impian yang selama ini ia susun hanya dalam semalam.

                Dengan perasaan yang berantakan, Keenan terpaksa pergi meninggalkan kehidupannya di Bandung dan pergi ke Ubud, Bali. Di sana, ia menetap di rumah sahabat ibunya, yaitu Pak Wayan. Keluarga Pak Wayan adalah para seniman terkenal di Bali sehingga saat Keenan tinggal bersama mereka, ia merasakan adanya kenyamanan dan perasaannya yang luka itu lambat laun terobati.

                Adapun orang yang dikatakan sangat berpengaruh dalam proses penyembuhan batin Keenan, yakni Luhde Laksmi yang merupakan keponakan dari Pak Wayan. Keenan perlahan dapat kembali melukis dengan modal kisah dalam buku “Jenderal Pilik dan Pasukan Alit” yang diberikan oleh Kugy. Keenan berhasil menciptakan sebuah karya lukisan berseri yang amat terkenal, bahkan menjadi buruan para kolektor lukisan.

                Di balik itu, ada sosok Kugy yang sangat kehilangan para sahabatnya, ia merasa sepi berada di Bandung dan mencoba untuk menata kembali hidupnya.

                Kugy telah lulus kuliah secara cepat dan tak lama dari itu, ia bekerja sebagai copywriter pada sebuah biro iklan di Jakarta. Di tempat Kugy bekerja, ia bertemu dengan seseorang bernama Remigius atau Remi. Remi merupakan sahabat dari Karel–abangnya Kugy–sekaligus atasannya Kugy.

                Kugy memiliki pemikiran yang unik, ajaib, dan selalu spontan sehingga menjadikan dirinya sebagai orang yang bisa dibilang cukup diandalkan di kantornya. Akan tetapi, berbeda dengan Remi, ia melihat sosok Kugy dengan pandangan yang berbeda. Remi menyukai Kugy bukan sekadar akan ide-ide cemerlangnya, melainkan pula semangat dan taraf keunikan yang ada dalam diri Kugy.

                Bagi Remi, Kugy bukanlah wanita biasa, tetapi luar biasa. Kemudian, Remi memutuskan untuk menyatakan perasaannya pada Kugy, hingga akhirnya ketulusan darinya berhasil meluluhkan Kugy.

                Di samping itu, Keenan tidak bisa untuk terus menerus tinggal di Bali dengan kondisi kesehatan sang ayah yang semakin memburuk. Tidak ada pilihan lain, ia terpaksa pulang ke Jakarta dan memimpin perusahaan keluarganya. Keenan dan Luhde, sementara Kugy dengan Remi. Mereka semua merasa bahwa telah bertemu dengan orang yang tepat dan cinta yang sesungguhnya.

                Akan tetapi, hal itu tidaklah lama. Remi merasa bahwa Kugy hanya setengah hati padanya, demikian pula dengan Luhde. Hingga akhirnya, lukisan milik Keenan dan dongeng milik Kugy bertemu dengan impian dan hati yang seiringan bersatu.

                Pertemuan Keenan dan Kugy tidak terhindarkan, terlebih keempat sahabat ini bertemu kembali dengan kondisi yang sudah berubah dan berbeda. Hati mereka kembali diuji, kisah percintaan dan persahabatan selama lima tahun ini kandas secara tidak terduga. Setiap hati dari mereka hanya dapat pasrah akan cinta yang mengalir dan bermuara entah ke mana.

                Lantas, Akankah mereka terus-menerus pasrah dengan keadaan? Ikuti kelanjutan kisah persahabatan dan percintaan antara Keenan, Kugy, Eko, dan Noni, tentunya di novel Perahu Kertas karya Dewi “Dee” Lestari.",
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
                "sinopsis" => "Membaca kisah hidup Buya Hamka bagai menonton aneka film sekaligus. Film petualangan penuh adegan mendebarkan, film religi yang menyentuh sanubari dan film romantis yang terasa manis di hati. Hidupnya memang kerap berayun ekstrim dari satu kutub ke kutub lain. Mulai dari penulis roman sampai jadi ulama besar penulis tafsir, dari gerilyawan melawan Belanda sampai dituduh makar dan ditangkap oleh Orde Lama. Tapi di kemudian hari dia malah diangkat jadi pahlawan nasional.

                Kronika dunia Hamka yang dirangkum di buku ini bagai buket dari taman bunga yang luas. Bunga itu wangi, indah warna-warni, karena dipelihara secara kolektif oleh banyak hati. Taman bunga yang terhampar itulah hikayat Hamka yang  menginspirasi, melintas banyak generasi.

                Prof. Dr. H. Abdul Malik Karim Amrullah Datuk Indomo, populer dengan nama penanya Hamka (17 Februari 1908–24 Juli 1981) adalah seorang ulama, filsuf, dan sastrawan Indonesia. Ia berkarier sebagai wartawan, penulis, dan pengajar. Ia sempat berkecimpung di politik melalui Masyumi sampai partai tersebut dibubarkan, menjabat Ketua Majelis Ulama Indonesia (MUI) pertama, dan aktif dalam Muhammadiyah hingga akhir hayatnya. Universitas al-Azhar dan Universitas Nasional Malaysia menganugerahkannya gelar doktor kehormatan, sementara Universitas Moestopo mengukuhkan Hamka sebagai guru besar. Namanya disematkan untuk Universitas Hamka milik Muhammadiyah dan masuk dalam daftar Pahlawan Nasional Indonesia.",
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
                "sinopsis" => "Hepi, perantau bujang yang menyalakan dendam di tepi danau. Martiaz, ayah yang pecah kongsi dengan anaknya di simpang jalan. Datuk, kakek yang ingin menebus dosa masa lalu di tengah surau. Pandeka Luko, pahlawan gila yang mengobati luka lama di rumah usang.

                Apakah 'alam terkembang jadi guru' menjadi amanat hidupnya? Mungkinkan maaf dan lupa menjadi penawar bagi segenap luka?

                Ikuti petualangan Hepi bersama Attar penembak jitu dan Zen penyayang binatang, bertemu semua tokoh ini, bertualang mendatangi sarang jin, menghadapi lelaki bermata harimau, memburu biduk hantu, dan menyusup ke markas pembunuh. Semuanya demi melunasi sebuah dendam, sebuah rindu.
                ",
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
                "sinopsis" => "Kehadiran roman sejarah ini, bukan saja dimaksudkan untuk mengisi sebuah episode berbangsa yang berada di titik persalinan yang pelik dan menentukan, namun juga mengisi isu kesusastraan yang sangat minim menggarap periode pelik ini. Karena itu hadirnya roman ini memberi bacaan alternatif kepada kita untuk melihat jalan dan gelombang sejarah secara lain dan dari sisinya yang berbeda. Tetralogi ini dibagi dalam format empat buku. Dan roman keempat, Rumah Kaca, memperlihatkan usaha kolonial memukul semua kegiatan kaum pergerakan dalam sebuah operasi pengarsipan yang rapi. Arsip adalah mata radar Hindia yang ditaruh di mana-mana untuk merekam apa pun yang digiatkan aktivis pergerakan itu. Pram dengan cerdas mengistilahkan politik arsip itu sebagai kegiatan pe-rumahkaca-an. Novel besar berbahasa Indonesia yang menguras energi pengarangnya untuk menampilkan embrio Indonesia dalam ragangan negeri kolonial. Sebuah karya pascakolonial paling bergengsi.
                ",
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
                "sinopsis" => "Terima kasih untuk kesempatan mengenalmu, itu adalah salah satu anugerah terbesar hidupku. Cinta memang tidak perlu ditemukan, cintalah yang akan menemukan kita.

                Terima kasih. Nasihat lama itu benar sekali, aku tidak akan menangis karena sesuatu telah berakhir, tapi aku akan tersenyum karena sesuatu itu pernah terjadi.

                Masa lalu. Rasa sakit. Masa depan. Mimpi-mimpi. Semua akan berlalu, seperti sungai yang mengalir. Maka biarlah hidupku mengalir seperti sungai kehidupan.
                ",
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
