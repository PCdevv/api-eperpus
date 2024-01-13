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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_anggota')->autoIncrement();
            $table->string('no_anggota');
            $table->integer('no_telp');
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('email');
            $table->string('password');
            $table->enum('kategori_anggota', ['Pelajar', 'Guru', 'Umum']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
