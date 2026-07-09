<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_grammar', function (Blueprint $table) {
            $table->id();
            $table->string('title_ko');
            $table->string('title_en');
            $table->string('title_as');
            $table->string('pattern_formula');
            $table->text('explanation_en');
            $table->text('explanation_as');
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->string('category');   // e.g. particle, verb-ending, sentence-structure
            // examples stored as JSON: [{korean, romanization, assamese, english, audio_id}]
            $table->json('examples')->nullable();
            // related vocabulary IDs stored as JSON FK array
            $table->json('related_vocabulary_ids')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('level');
            $table->index('category');
            $table->fullText(['title_ko', 'title_en', 'title_as', 'pattern_formula'], 'grammar_fulltext');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_grammar');
    }
};
