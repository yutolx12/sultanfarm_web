<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dombas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_domba', 20)->nullable();
            $table->string('nama_domba', 100)->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('tipe_domba', ['Trading', 'Breeding']);
            $table->integer('bobot')->unsigned()->nullable()->default(12);
            $table->string('induk_jantan', 60)->nullable();
            $table->string('induk_betina', 60)->nullable();
            $table->smallInteger('turunan')->unsigned()->nullable()->default(12);
            $table->string('gambar', 255)->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('harga_beli')->unsigned()->nullable()->default(12);
            $table->integer('harga_jual')->unsigned()->nullable()->default(12);
            $table->enum('status', ['Terjual', 'Mati', 'Tersedia'])->default('Tersedia');
            $table->date('tgl_lahir');
            $table->bigInteger('id_kamar')->nullable()->default(12)->unsigned();
            $table->foreign('id_kamar')->references('id')->on('kamars')->onDelete('cascade');
            $table->unsignedBigInteger('id_jenis');
            $table->foreign('id_jenis')->references('id')->on('jenis_dombas')->onDelete('cascade');
            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER tr_bobot AFTER UPDATE ON dombas 
            FOR EACH ROW
            BEGIN
                INSERT INTO historytimbang (kode_domba, bobot, updated_at) VALUES (OLD.kode_domba, OLD.bobot, OLD.updated_at);
            END
        ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dombas');
    }
};
