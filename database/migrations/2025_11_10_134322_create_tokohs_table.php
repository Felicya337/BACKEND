<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tokohs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tempat_tanggal_lahir');
            $table->string('asal_daerah');
            $table->string('jabatan');
            $table->text('deskripsi')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tokohs');
    }
};
