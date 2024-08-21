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
        Schema::create('ratingvs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('volunteer_id')
            ->nullable()
            ->references('id')
            ->on('volunteers')
            ->cascadeOnDelete();
            $table->integer('commitment')->nullable();
            $table->integer('following')->nullable();
            $table->integer('mixing')->nullable();
            $table->integer('head_rating')->nullable();
            $table->boolean('famliyday')->nullable();
            $table->boolean('warning')->nullable();
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ratingvs');
    }
};
