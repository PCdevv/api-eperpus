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
        Schema::create('ulasans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_ulasan')->autoIncrement();
            $table->string('ulasan');
            $table->decimal('skor_rating');
            $table->unsignedBigInteger('id_anggota')->nullable();

            $table->foreign('id_anggota')->references('id_anggota')->on('anggotas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasans');
    }
};
