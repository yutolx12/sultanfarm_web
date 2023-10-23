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
        Schema::create('plasmas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_plasma', 100)->nullable()->default('text');
            $table->text('alamat_plasma')->nullable()->default('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plasmas');
    }
};
