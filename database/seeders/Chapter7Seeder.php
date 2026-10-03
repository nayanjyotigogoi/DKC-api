<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Chapter7Seeder extends Seeder
{
    public function run(): void
    {
        DB::table('learning_chapters')->insert([
            'slug'         => 'korean-conversations',
            'number'       => 7,
            'title_en'     => 'Korean Conversations',
            'title_ko'     => '한국어 대화',
            'description'  => 'Full beginner conversations between Pema and Jung Kook — first meeting, family, feelings, colors, likes, time, and weather.',
            'accent_color' => '#1A6B6B',
            'tint_color'   => '#E6F5F5',
            'border_color' => '#A0D4D4',
            'icon'         => '💬',
            'sort_order'   => 7,
            'is_published' => true,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);
    }
}
