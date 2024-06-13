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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->date('t_masuk');
            $table->date('t_kirim');
            $table->date('durasi');
            $table->integer('i_nomor');
            $table->string('_invoice');
            $table->string('j_ditagih');
            $table->date('j_dibayar');
            $table->integer('n_pajak');
            $table->string('nom_pajak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};