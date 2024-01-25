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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_cabang')->constrained('cabang');
            $table->foreignId('id_jam_praktik')->constrained('jam_praktik');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('nama_pasien');
            $table->string('alamat')->nullable();
            $table->string('no_telepon')->nullable();
            $table->date('tanggal_reservasi');
            $table->text('keluhan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
