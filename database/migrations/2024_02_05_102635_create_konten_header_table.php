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
        Schema::create('konten_header', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('tagline');    
            $table->string('deskripsi');    
            $table->string('teks_btn');    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konten_header');
    }
};