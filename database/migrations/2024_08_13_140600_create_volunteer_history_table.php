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
        Schema::create('volunteer_historie', function (Blueprint $table) {
            $table->id();
            $table->foreignId('volunteer_id')
            ->nullable()
            ->references('id')
            ->on('volunteers')
            ->cascadeOnDelete();
            $table->foreignId('history_id')
            ->nullable()
            ->references('id')
            ->on('histories')
            ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_historie');
    }
};
