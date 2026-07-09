<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_audio', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('url');
            $table->unsignedInteger('duration_ms')->default(0);
            $table->enum('type', ['word', 'sentence', 'dialogue_line']);
            $table->enum('speed_variant', ['normal', 'slow', 'syllable'])->default('normal');
            $table->enum('speaker_gender', ['male', 'female'])->default('female');
            $table->boolean('verified')->default(false);
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('uploaded_by')->references('id')->on('users')->nullOnDelete();
            $table->index('type');
            $table->index('verified');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_audio');
    }
};
