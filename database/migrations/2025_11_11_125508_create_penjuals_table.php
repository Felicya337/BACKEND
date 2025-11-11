<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('penjuals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penjual');
            $table->string('nama_toko')->nullable();
            $table->string('email')->unique();
            $table->string('alamat')->nullable();
            $table->string('no_telpon')->nullable();
            $table->string('password');
            $table->boolean('is_blocked')->default(false);
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjuals');
    }
};
