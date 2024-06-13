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
        Schema::create('supirs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_ktp')->unique();
            $table->integer('umur');
            $table->date('t_lahir');
            $table->string('p_truk');
            $table->string('asal');
            $table->string('foto');
            $table->string('foto_ktp');
            $table->foreignId('ptrans_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supirs');
    }
};