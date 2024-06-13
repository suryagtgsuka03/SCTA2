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
        Schema::create('p_trans', function (Blueprint $table) {
            $table->id();
            $table->integer('no_do')->unique();
            $table->string('plat_truk');
            $table->string('supir');
            $table->date('tgl_muat');
            $table->date('tgl_bongkar');
            $table->integer('tot_muat');
            $table->integer('tot_bongkar');
            $table->string('no_spb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_trans');
    }
};