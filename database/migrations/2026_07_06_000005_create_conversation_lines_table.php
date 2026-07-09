<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('conversation_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conversation_id');
            $table->unsignedSmallInteger('order_index');
            $table->string('speaker_label');
            $table->text('text_ko');
            $table->string('romanization');
            $table->text('translation_as');
            $table->text('translation_en');
            $table->unsignedBigInteger('audio_id')->nullable();
            $table->timestamps();

            $table->foreign('conversation_id')
                  ->references('id')->on('learning_conversations')
                  ->cascadeOnDelete();
            $table->foreign('audio_id')
                  ->references('id')->on('learning_audio')
                  ->nullOnDelete();
            $table->index(['conversation_id', 'order_index']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('conversation_lines');
    }
};
