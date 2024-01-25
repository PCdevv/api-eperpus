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
        Schema::create('umpan_baliks', function (Blueprint $table) {
            $table->unsignedBigInteger('id_umpan_balik')->autoIncrement();
            $table->string('subjek');
            $table->text('isi');
            $table->string('lampiran')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umpan_baliks');
    }
};