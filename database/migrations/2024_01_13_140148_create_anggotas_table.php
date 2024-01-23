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
            $table->string('foto_profil')->nullable();
            $table->string('no_anggota')->nullable();
            $table->integer('no_telp')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('password');
            $table->boolean('verified')->default(false);
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
