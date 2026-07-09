<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_vocabulary', function (Blueprint $table) {
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('vocabulary_id');
            $table->unsignedSmallInteger('order_index')->default(0);

            $table->primary(['lesson_id', 'vocabulary_id']);
            $table->foreign('lesson_id')->references('id')->on('learning_lessons')->cascadeOnDelete();
            $table->foreign('vocabulary_id')->references('id')->on('learning_vocabulary')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_vocabulary');
    }
};
