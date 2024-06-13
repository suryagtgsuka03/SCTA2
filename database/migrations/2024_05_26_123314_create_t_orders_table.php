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
        Schema::create('t_orders', function (Blueprint $table) {
            $table->id();
            $table->string('perusahaan');
            $table->string('no_spk')->unique();
            $table->string('no_do');
            $table->string('j_barang');
            $table->integer('jumlah');
            $table->integer('ppn');
            $table->integer('pph');
            $table->integer('t_susut');
            $table->integer('c_susut');
            $table->integer('t_barang');
            $table->string('t_bongkar');
            $table->string('t_angkut');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_orders');
    }
};