<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_chapter_conversations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chapter_id');
            $table->enum('speaker', ['A', 'B']);
            $table->text('korean');
            $table->text('english');
            $table->text('assamese')->nullable();
            // optional TTS override (if null, 'korean' is spoken)
            $table->text('speak_text')->nullable();
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->foreign('chapter_id')
                  ->references('id')->on('learning_chapters')
                  ->cascadeOnDelete();

            $table->index(['chapter_id', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_chapter_conversations');
    }
};
