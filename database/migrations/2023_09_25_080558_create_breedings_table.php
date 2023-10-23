<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('breedings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket', 100)->nullable()->default('text');
            $table->integer('harga')->unsigned()->nullable()->default(12);
            $table->string('gambar', 255)->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('breedings');
    }
};
