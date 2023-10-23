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
        Schema::create('historytimbang', function (Blueprint $table) {
            $table->id();
            $table->string('kode_domba', 100)->nullable()->default('text');
            $table->smallInteger('bobot')->nullable()->default(12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historytimbang');
    }
};
