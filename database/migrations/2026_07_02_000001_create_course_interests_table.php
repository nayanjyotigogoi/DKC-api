<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('course_interests', function (Blueprint $table) {
            $table->id();
            $table->enum('course', ['basic_korean', 'topik_ii']);
            $table->string('full_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->enum('current_status', ['du_student', 'other_student', 'working', 'other']);
            $table->string('department')->nullable();
            $table->string('year_of_study')->nullable();
            $table->text('why_interested')->nullable();
            $table->enum('korean_level', ['none', 'beginner', 'intermediate'])->default('none');
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_interests');
    }
};
