<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_cultural_notes', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_as');
            $table->text('body_en');
            $table->text('body_as');
            $table->string('category');   // food, holiday, etiquette, tradition, etc.
            $table->json('related_vocabulary_ids')->nullable();
            $table->string('image_path')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('category');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_cultural_notes');
    }
};
