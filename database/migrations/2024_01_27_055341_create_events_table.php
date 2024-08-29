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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branche_id')
            ->nullable()
            ->references('id')
            ->on('branches')
            ->cascadeOnDelete();
            $table->foreignId('section_id')
            ->nullable()
            ->references('id')
            ->on('sections')
            ->cascadeOnDelete();
            $table->string('year');
            $table->string('month');
            $table->string('day');
            $table->boolean('tshirt')->nullable();
            $table->string('notes')->nullable();
            $table->string('meeting_head')->nullable();
            $table->string('meeting_goals')->nullable();
            $table->time('arrived_at')->nullable();
            $table->time('move_at')->nullable();
            $table->time('back_at')->nullable();
            $table->foreignId('place_id')
            ->nullable()
            ->references('id')
            ->on('places')
            ->onDelete('set null');
            $table->foreignId('driver_id')
            ->nullable()
            ->references('id')
            ->on('drivers')
            ->onDelete('set null');
            $table->foreignId('category_id')
            ->nullable()
            ->references('id')
            ->on('categories')
            ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participations');
    }
};
