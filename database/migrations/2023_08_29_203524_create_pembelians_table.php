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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pembelian', 20)->nullable();
            $table->date('tgl_pembelian');
            $table->integer('total')->default(0);
            $table->bigInteger('id_user')->nullable()->default(12)->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_supplier')->unsigned();
            $table->foreign('id_supplier')->references('id')->on('suppliers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelians');
    }
};
