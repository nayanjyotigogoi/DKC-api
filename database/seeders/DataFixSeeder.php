<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Learning\LearningModule;
use App\Models\Member;

/**
 * One-time data fixes:
 *  1. Remove the empty duplicate "Daily Life in Korean" module (order_index 7)
 *     that was created before the full curriculum was seeded.
 *  2. Add a Design Lead team member so the About Us section quote
 *     attribution renders correctly.
 */
class DataFixSeeder extends Seeder
{
    public function run(): void
    {
        $this->removeEmptyModule7();
        $this->addDesignLeadMember();
    }

    private function removeEmptyModule7(): void
    {
        // Delete the unpopulated duplicate module at order_index 7 if it has no lessons.
        $candidate = LearningModule::where('order_index', 7)
                                   ->withCount('lessons')
                                   ->first();

        if ($candidate && $candidate->lessons_count === 0) {
            $candidate->delete();
            $this->command?->info("Deleted empty module #{$candidate->id} (order_index 7).");
        } else {
            $this->command?->info('No empty module at order_index 7 — skipping.');
        }
    }

    private function addDesignLeadMember(): void
    {
        Member::updateOrCreate(
            ['name' => 'Rituparna Saikia', 'is_team' => true],
            [
                'initials'     => 'RS',
                'role'         => 'Design Lead',
                'korean_role'  => '디자인 팀장',
                'color'        => '#2E5B8B',
                'department'   => 'B.Des, 2nd Year',
                'sort_order'   => 7,
                'is_team'      => true,
                'is_active'    => true,
            ]
        );

        $this->command?->info('Design Lead member upserted.');
    }
}
