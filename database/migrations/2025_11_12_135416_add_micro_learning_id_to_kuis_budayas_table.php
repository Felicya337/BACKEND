<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kuis_budayas', function (Blueprint $table) {
            $table->foreignId('micro_learning_id')
                  ->nullable()
                  ->constrained('micro_learnings')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('kuis_budayas', function (Blueprint $table) {
            $table->dropForeign(['micro_learning_id']);
            $table->dropColumn('micro_learning_id');
        });
    }
};
