<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_chapter_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chapter_id');
            // section groups items within a chapter (e.g. basic_vowels, compound_vowels, simple_words…)
            $table->string('section', 60);
            // display text — the Korean character/word shown on the card
            $table->string('korean', 100);
            // optional override for what the TTS engine actually speaks
            // if null, the 'korean' field is spoken directly
            $table->string('speak_text', 200)->nullable();
            // romanization (e.g. "a", "ya", "kk")
            $table->string('romanization', 100)->nullable();
            // English meaning or sound description
            $table->string('english', 200)->nullable();
            // Assamese equivalent (optional — shown only where meaningful)
            $table->string('assamese', 200)->nullable();
            // extra per-item metadata stored as JSON (flags, category, emoji, etc.)
            $table->json('meta')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('chapter_id')
                  ->references('id')->on('learning_chapters')
                  ->cascadeOnDelete();

            $table->index(['chapter_id', 'section', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_chapter_items');
    }
};
