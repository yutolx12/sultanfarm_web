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
        Schema::create('detail_penjualans', function (Blueprint $table) {
            $table->bigInteger('id_penjualan')->nullable()->default(12)->unsigned();
            $table->bigInteger('id_domba')->nullable()->default(12)->unsigned();
            $table->foreign('id_penjualan')->references('id')->on('penjualans')->onDelete('cascade');
            $table->foreign('id_domba')->references('id')->on('dombas')->onDelete('cascade');
            $table->timestamps();
        });

        // DB::unprepared('
        //     CREATE TRIGGER id_domba AFTER INSERT ON detail_penjualans
        //     FOR EACH ROW
        //     BEGIN
        //         UPDATE historytimbang `status = `Terjual` where dombas.id_domba = id_domba;
        //     END
        // ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualans');
    }
};
