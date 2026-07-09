<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_vocabulary', function (Blueprint $table) {
            $table->id();
            $table->string('korean');
            $table->string('romanization');
            $table->string('assamese');
            $table->string('english');
            $table->enum('part_of_speech', [
                'noun', 'verb', 'adjective', 'adverb', 'particle',
                'conjunction', 'interjection', 'pronoun', 'number', 'expression',
            ]);
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            $table->string('example_ko')->nullable();
            $table->string('example_as')->nullable();
            $table->string('example_en')->nullable();
            $table->unsignedBigInteger('audio_id')->nullable();
            $table->unsignedBigInteger('example_audio_id')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('audio_id')->references('id')->on('learning_audio')->nullOnDelete();
            $table->foreign('example_audio_id')->references('id')->on('learning_audio')->nullOnDelete();
            $table->index('level');
            $table->index('part_of_speech');
            $table->fullText(['korean', 'romanization', 'assamese', 'english'], 'vocab_fulltext');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_vocabulary');
    }
};
