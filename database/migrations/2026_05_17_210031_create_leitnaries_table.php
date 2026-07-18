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
        Schema::create('leitnaries', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('word_id')->nullable();
            $table->string('is_read')->default(0);
            $table->string('answer')->default(0);
            $table->string('step')->default(1);
            $table->string('text_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leitnaries');
    }
};
