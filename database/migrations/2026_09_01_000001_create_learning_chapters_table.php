<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('learning_chapters', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->unsignedSmallInteger('number');
            $table->string('title_en');
            $table->string('title_ko');
            $table->text('description')->nullable();
            $table->string('accent_color', 20)->default('#8B1E24');
            $table->string('tint_color', 20)->default('#FEF3F0');
            $table->string('border_color', 20)->default('#F5CECA');
            $table->string('icon', 10)->default('📖');
            $table->boolean('is_published')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('learning_chapters');
    }
};
