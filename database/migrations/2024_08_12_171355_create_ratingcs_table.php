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
        Schema::create('ratingcs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('category_id')
            ->nullable()
            ->references('id')
            ->on('categories')
            ->cascadeOnDelete();
            $table->integer('commitment')->nullable();
            $table->integer('mixing')->nullable();
            $table->integer('plan')->nullable();
            $table->boolean('warning')->nullable();
            $table->string('ranking')->nullable();
            $table->string('points')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratingcs');
    }
};
