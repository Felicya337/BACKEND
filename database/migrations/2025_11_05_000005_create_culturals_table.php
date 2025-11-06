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
        Schema::create('culturals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ensiklopedi_id')->nullable();
            $table->string('name');
            $table->string('category');
            $table->text('description');
            $table->string('origin')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();

            $table->foreign('ensiklopedi_id')
                ->references('id')
                ->on('ensiklopedis')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('culturals');
    }
};
