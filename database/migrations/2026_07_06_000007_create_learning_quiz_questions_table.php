<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_quiz_questions', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['multiple_choice', 'fill_in_blank', 'matching', 'listening']);
            $table->text('question_text');
            // options: [{text: "...", romanization: "..."}]
            $table->json('options');
            $table->unsignedSmallInteger('correct_index');
            $table->text('explanation_en')->nullable();
            $table->text('explanation_as')->nullable();
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->unsignedBigInteger('audio_id')->nullable();
            // optional source tracing — which vocab/grammar this tests
            $table->unsignedBigInteger('source_vocab_id')->nullable();
            $table->unsignedBigInteger('source_grammar_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('audio_id')->references('id')->on('learning_audio')->nullOnDelete();
            $table->foreign('source_vocab_id')->references('id')->on('learning_vocabulary')->nullOnDelete();
            $table->foreign('source_grammar_id')->references('id')->on('learning_grammar')->nullOnDelete();
            $table->index('type');
            $table->index('level');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_quiz_questions');
    }
};
