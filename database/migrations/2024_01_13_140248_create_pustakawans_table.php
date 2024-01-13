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
        Schema::create('pustakawans', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pustakawan')->autoIncrement();
            $table->string('email');
            $table->string('no_telp');
            $table->string('nama_lengkap');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pustakawans');
    }
};
