<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('learning_cultural_notes', function (Blueprint $table) {
            $table->string('level')->default('beginner')->after('category');
            $table->json('tags')->nullable()->after('level');
        });
    }

    public function down(): void
    {
        Schema::table('learning_cultural_notes', function (Blueprint $table) {
            $table->dropColumn(['level', 'tags']);
        });
    }
};
