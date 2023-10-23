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
        Schema::create('jenis_dombas', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_domba', 60)->nullable()->default('text');
            $table->string('kode', 10)->nullable()->default('text');
            $table->text('gambar')->nullable()->default('text');
            $table->smallInteger('urutan')->nullable()->default(12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_dombas');
    }
};
