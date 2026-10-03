<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class HangulDay2026Seeder extends Seeder
{
    public function run(): void
    {
        Event::updateOrCreate(
            ['slug' => 'hangul-day-2026'],
            [
                'title' => 'Hangul Day 2026',
                'korean_title' => '한글날 기념행사 2026',
                'date' => 'October 9, 2026',
                'date_iso' => '2026-10-09 10:00:00',
                'time' => '10:00 AM onwards',
                'location' => 'Dibrugarh University Campus',
                'category' => 'Cultural',
                'status' => 'upcoming',
                'description' => 'Celebrating 580 years of Hangul — the Korean alphabet — with photography, dance, art, and handwriting competitions in the heart of Assam.',
                'long_description' => "Join the Dibrugarh Korean Club for Hangul Day 2026, celebrating 580 years since King Sejong the Great created Hangul in 1443.\n\nThe day features four open competitions — Photography, Solo Dance, Art, and Korean Handwriting — all themed around Northeast × Korea, exploring the intersection of Assamese and Korean cultures.\n\nSponsored by Windsong Café (Movie Screening Sponsor), FlyFree (Prize Sponsor), Coembro (Hamper Sponsor), Dilish (Food Coupon Sponsor), and M.P. Interior (Print Partner).",
                'highlights' => json_encode([
                    'Photography Competition (Online — Instagram submission)',
                    'Solo Dance Competition (Northeast × Korea theme)',
                    'Art Competition (Traditional or Digital)',
                    'Korean Handwriting Competition (on-site)',
                    'Movie Screening sponsored by Windsong Café',
                    'Prizes from FlyFree, Coembro & Dilish',
                ]),
                'image' => null,
                'color' => '#8B1E24',
                'is_featured' => true,
                'sort_order' => 0,
            ]
        );
    }
}
