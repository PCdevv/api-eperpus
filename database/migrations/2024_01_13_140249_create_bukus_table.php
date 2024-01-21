<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->unsignedBigInteger('id_buku')->autoIncrement();
            $table->integer('isbn');
            $table->string('kode_buku');
            $table->string('judul_buku');
            $table->year('tahun_terbit');
            $table->string('foto_cover');
            $table->string('file_buku');
            $table->integer('stok_buku');
            $table->integer('jumlah_halaman');
            $table->unsignedBigInteger('id_pengarang')->nullable();
            $table->unsignedBigInteger('id_penerbit')->nullable();
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->unsignedBigInteger('id_subkategori')->nullable();
            $table->unsignedBigInteger('id_rak')->nullable();

            $table->foreign('id_pengarang')->references('id_pengarang')->on('pengarangs');
            $table->foreign('id_penerbit')->references('id_penerbit')->on('penerbits');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris');
            $table->foreign('id_subkategori')->references('id_subkategori')->on('subkategoris');
            $table->foreign('id_rak')->references('id_rak')->on('raks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
