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
        Schema::create('dendas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_denda')->autoIncrement();
            $table->decimal('jumlah_denda');
            $table->enum('status', ['Lunas', 'Belum dibayar'])->default('Belum dibayar');
            $table->unsignedBigInteger('id_history')->nullable();
            $table->unsignedBigInteger('id_anggota')->nullable();

            $table->foreign('id_history')->references('id_history')->on('histories')->onDelete('restrict');
            $table->foreign('id_anggota')->references('id_anggota')->on('anggotas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dendas');
    }
};
