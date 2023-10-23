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
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->string('judul_beranda')->nullable();
            $table->string('deskripsi_beranda')->nullable();
            $table->string('deskripsi_tentangkami')->nullable();
            $table->string('deskripsi_footer')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landing_pages');
    }
};
