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
        Schema::create('daftar_kunjungans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_daftar_kunjungan')->autoIncrement();
            $table->timestamp('waktu_kunjungan');
            $table->unsignedBigInteger('id_anggota');

            $table->foreign('id_anggota')->references('id_anggota')->on('anggotas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_kunjungans');
    }
};
