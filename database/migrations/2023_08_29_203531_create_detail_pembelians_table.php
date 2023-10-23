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
        Schema::create('detail_pembelians', function (Blueprint $table) {
            $table->bigInteger('id_pembelian')->nullable()->default(12)->unsigned();
            $table->bigInteger('id_domba')->nullable()->default(12)->unsigned();
            $table->foreign('id_pembelian')->references('id')->on('pembelians')->onDelete('cascade');
            $table->foreign('id_domba')->references('id')->on('dombas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelians');
    }
};
