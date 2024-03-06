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
        Schema::create('histories', function (Blueprint $table) {
            $table->unsignedBigInteger('id_history')->autoIncrement();
            $table->timestamp('waktu_peminjaman');
            $table->timestamp('waktu_pengembalian')->nullable();
            $table->timestamp('batas_pengembalian');
            $table->boolean('selesai_dibaca')->default(false)->nullable();
            $table->enum('jenis_buku', ['Fisik', 'Digital']);
            $table->unsignedBigInteger('id_anggota')->nullable();
            $table->unsignedBigInteger('id_buku')->nullable();

            $table->foreign('id_anggota')->references('id_anggota')->on('anggotas')->onDelete('restrict');
            $table->foreign('id_buku')->references('id_buku')->on('bukus')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
