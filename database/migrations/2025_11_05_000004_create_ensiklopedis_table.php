<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ensiklopedis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')
                ->constrained('kategoris')
                ->onDelete('cascade');
            $table->string('judul')->unique();
            $table->string('slug')->unique();
            $table->string('gambar')->nullable();
            $table->longText('deskripsi_html');
            $table->string('sumber')->nullable();
            $table->timestamps();
        });
    }
};
