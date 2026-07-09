<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_conversations', function (Blueprint $table) {
            $table->id();
            $table->string('title_ko');
            $table->string('title_en');
            $table->string('title_as');
            $table->text('scene_en');
            $table->text('scene_as');
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->default('beginner');
            // speakers: [{label: "A", gender: "female"}, ...]
            $table->json('speakers')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('level');
            $table->fullText(['title_ko', 'title_en', 'title_as'], 'conv_fulltext');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_conversations');
    }
};
