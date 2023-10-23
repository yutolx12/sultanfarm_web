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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_penjualan', 20)->nullable();
            $table->string('bukti_pembayaran', 255)->nullable();
            $table->string('akad', 255)->nullable();
            $table->enum('status', ['Diajukan', 'Diproses', 'Selesai', 'Ditolak']);
            // $table->enum('paket', ['non-paket', 'breeding', 'trading']);
            $table->integer('total')->unsigned()->nullable()->default(0);
            $table->bigInteger('id_kamar')->nullable()->default(12)->unsigned();
            $table->foreign('id_kamar')->references('id')->on('kamars')->onDelete('cascade');
            $table->bigInteger('id_paket')->nullable()->default(12)->unsigned();
            $table->foreign('id_paket')->references('id')->on('pakets')->onDelete('cascade');
            $table->bigInteger('id_user')->nullable()->default(12)->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
