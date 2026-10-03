<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('learning_conversations', function (Blueprint $table) {
            $table->unsignedBigInteger('chapter_id')->nullable()->after('id');
            $table->foreign('chapter_id')->references('id')->on('learning_chapters')->nullOnDelete();
            $table->index('chapter_id');
        });
    }

    public function down(): void
    {
        Schema::table('learning_conversations', function (Blueprint $table) {
            $table->dropForeign(['chapter_id']);
            $table->dropIndex(['chapter_id']);
            $table->dropColumn('chapter_id');
        });
    }
};
