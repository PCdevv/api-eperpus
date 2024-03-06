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
        Schema::create('subkategoris', function (Blueprint $table) {
            $table->unsignedBigInteger('id_subkategori')->autoIncrement();
            $table->string('nama_subkategori');
            $table->unsignedBigInteger('id_kategori')->nullable();

            $table->foreign('id_kategori')->references('id_kategori')->on('kategoris')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subkategoris');
    }
};
