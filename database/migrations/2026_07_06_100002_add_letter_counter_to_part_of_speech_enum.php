<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE learning_vocabulary MODIFY part_of_speech ENUM(
            'noun','verb','adjective','adverb','particle',
            'conjunction','interjection','pronoun','number','expression',
            'letter','counter'
        ) NOT NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE learning_vocabulary MODIFY part_of_speech ENUM(
            'noun','verb','adjective','adverb','particle',
            'conjunction','interjection','pronoun','number','expression'
        ) NOT NULL");
    }
};
