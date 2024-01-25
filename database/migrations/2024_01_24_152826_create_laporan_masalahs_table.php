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
        Schema::create('laporan_masalahs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_laporan_masalah')->autoIncrement();
            $table->text('deskripsi_laporan');
            $table->string('foto');
            $table->unsignedBigInteger('id_anggota')->nullable();

            $table->foreign('id_anggota')->references('id_anggota')->on('anggotas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_masalahs');
    }
};
