<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_plasma')->nullable()->unsigned();
            $table->foreign('id_plasma')->references('id')->on('plasmas')->onDelete('cascade');
            $table->smallInteger('no_kamar')->nullable();
            $table->enum('status', ['Tersedia', 'Tidak Tersedia']);
            $table->timestamp('waktu_kembali_tersedia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamars');
    }
};
