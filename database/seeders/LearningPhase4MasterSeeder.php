<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Learning\CurriculumSeeder;
use Database\Seeders\Learning\VocabularySeeder;
use Database\Seeders\Learning\GrammarSeeder;
use Database\Seeders\Learning\GrammarGapSeeder;
use Database\Seeders\Learning\ConversationSeeder;
use Database\Seeders\Learning\CulturalNoteSeeder;
use Database\Seeders\Learning\QuizSeeder;
use Database\Seeders\Learning\QuizGapSeeder;
use Database\Seeders\Learning\RelationshipsSeeder;
use Database\Seeders\Learning\FoundationSeeder;
use Database\Seeders\DataFixSeeder;

/**
 * Phase 4 master seeder — runs all content seeders in dependency order.
 *
 * Run with:
 *   php artisan db:seed --class=LearningPhase4MasterSeeder
 *
 * Order:
 *   1. Curriculum    — modules + lessons skeleton
 *   2. Vocabulary    — general vocabulary
 *   3. Grammar       — grammar points
 *   4. GrammarGap    — 4 missing grammar points RelationshipsSeeder references
 *   5. Conversation  — dialogues + lines
 *   6. CulturalNote  — cultural notes
 *   7. Quiz          — quiz questions (greetings, grammar, culture topics)
 *   8. QuizGap       — quiz questions for 13 lessons missing coverage
 *   9. Relationships — pivot links for lessons 1-30
 *  10. Foundation    — alphabet & number lessons
 *  11. DataFix       — delete empty module 7, add Design Lead member
 */
class LearningPhase4MasterSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CurriculumSeeder::class,
            VocabularySeeder::class,
            GrammarSeeder::class,
            GrammarGapSeeder::class,
            ConversationSeeder::class,
            CulturalNoteSeeder::class,
            QuizSeeder::class,
            QuizGapSeeder::class,
            RelationshipsSeeder::class,
            FoundationSeeder::class,
            DataFixSeeder::class,
        ]);
    }
}
