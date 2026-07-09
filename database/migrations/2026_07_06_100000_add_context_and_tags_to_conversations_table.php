<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Make existing scene columns nullable via raw SQL (avoids doctrine/dbal dependency)
        DB::statement('ALTER TABLE learning_conversations MODIFY scene_en TEXT NULL');
        DB::statement('ALTER TABLE learning_conversations MODIFY scene_as TEXT NULL');

        Schema::table('learning_conversations', function (Blueprint $table) {
            $table->text('context_en')->nullable()->after('scene_as');
            $table->text('context_as')->nullable()->after('context_en');
            $table->json('tags')->nullable()->after('speakers');
        });
    }

    public function down(): void
    {
        Schema::table('learning_conversations', function (Blueprint $table) {
            $table->dropColumn(['context_en', 'context_as', 'tags']);
        });
    }
};
