<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_cultural_notes', function (Blueprint $table) {
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('cultural_note_id');
            $table->unsignedSmallInteger('order_index')->default(0);

            $table->primary(['lesson_id', 'cultural_note_id']);
            $table->foreign('lesson_id')->references('id')->on('learning_lessons')->cascadeOnDelete();
            $table->foreign('cultural_note_id')->references('id')->on('learning_cultural_notes')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_cultural_notes');
    }
};
