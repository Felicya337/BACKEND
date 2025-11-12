<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kuis_budayas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('micro_learning_id')
                ->constrained('micro_learnings')
                ->onDelete('cascade'); // jika micro learning dihapus, kuis ikut terhapus
            $table->string('pertanyaan');
            $table->string('opsi_a');
            $table->string('opsi_b');
            $table->string('opsi_c');
            $table->string('opsi_d')->nullable();
            $table->string('jawaban_benar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kuis_budayas');
    }
};
