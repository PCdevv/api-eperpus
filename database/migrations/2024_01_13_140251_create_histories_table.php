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
            $table->timestamp('waktu_peminjaman')->default(now());
            $table->timestamp('waktu_pengembalian');
            $table->timestamp('batas_pengembalian');
            $table->unsignedBigInteger('id_anggota')->nullable();
            $table->unsignedBigInteger('id_buku')->nullable();

            $table->foreign('id_anggota')->references('id_anggota')->on('anggotas');
            $table->foreign('id_buku')->references('id_buku')->on('bukus');
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
