<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lesson_quiz_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('quiz_question_id');
            $table->unsignedSmallInteger('order_index')->default(0);

            $table->primary(['lesson_id', 'quiz_question_id']);
            $table->foreign('lesson_id')->references('id')->on('learning_lessons')->cascadeOnDelete();
            $table->foreign('quiz_question_id')->references('id')->on('learning_quiz_questions')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lesson_quiz_questions');
    }
};
