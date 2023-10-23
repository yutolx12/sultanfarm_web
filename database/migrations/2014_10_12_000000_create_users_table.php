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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('no_telp', 13)->nullable();
            $table->string('alamat', 100)->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('email')->unique();
            // $table->boolean('is_admin')->default(0);
            $table->enum('role', ['admin', 'pemilik']);
            $table->string('nip', 20)->nullable()->default('');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
