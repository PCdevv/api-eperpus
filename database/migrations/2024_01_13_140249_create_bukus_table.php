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
            $table->string('isbn')->unique();
            $table->string('kode_buku')->unique();
            $table->string('judul_buku');
            $table->year('tahun_terbit');
            $table->string('foto_cover');
            $table->string('file_buku')->nullable();
            $table->unsignedInteger('stok_tersedia')->nullable();
            $table->unsignedInteger('stok_total')->nullable();
            $table->unsignedInteger('jumlah_halaman');
            $table->unsignedBigInteger('id_pengarang')->nullable();
            $table->unsignedBigInteger('id_penerbit')->nullable();
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->unsignedBigInteger('id_subkategori')->nullable();
            $table->unsignedBigInteger('id_rak')->nullable();

            $table->foreign('id_pengarang')->references('id_pengarang')->on('pengarangs')->onDelete('set null');
            $table->foreign('id_penerbit')->references('id_penerbit')->on('penerbits')->onDelete('set null');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('set null');
            $table->foreign('id_subkategori')->references('id_subkategori')->on('subkategoris')->onDelete('set null');
            $table->foreign('id_rak')->references('id_rak')->on('raks')->onDelete('set null');
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
