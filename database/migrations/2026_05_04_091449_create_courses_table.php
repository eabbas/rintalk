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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('progress')->nullable();
            $table->text('summary')->nullable();
            $table->string('price');
            $table->string('discount')->nullable();
            $table->string('duration')->nullable();
            $table->integer('level_id');
            $table->integer('status_id');
            $table->integer('user_id');
            $table->integer('active')->default(0);
            $table->integer('show_in_home')->default(0);
            $table->text('prerequisite');
            $table->string('master_name')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
