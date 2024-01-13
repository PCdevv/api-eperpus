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
        Schema::create('wishlists', function (Blueprint $table) {
            $table->unsignedBigInteger('id_wishlist')->autoIncrement();
            $table->unsignedBigInteger('id_buku')->nullable();
            $table->unsignedBigInteger('id_anggota')->nullable();

            $table->foreign('id_buku')->references('id_buku')->on('bukus');
            $table->foreign('id_anggota')->references('id_anggota')->on('anggotas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlists');
    }
};
