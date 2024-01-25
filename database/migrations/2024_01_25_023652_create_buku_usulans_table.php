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
        Schema::create('buku_usulans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_buku_usulan')->autoIncrement();
            $table->string('pengarang');
            $table->string('judul_buku');
            $table->string('kategori');
            $table->text('alasan_usulan')->nullable();
            $table->text('ringkasan')->nullable();
            $table->year('tahun_rilis')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_usulans');
    }
};
