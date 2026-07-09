<?php

namespace Database\Seeders\Learning;

use Illuminate\Database\Seeder;
use App\Models\Learning\LearningModule;
use App\Models\Learning\Lesson;

/**
 * Creates Modules 2-6 and Lessons 3-32.
 * Idempotent — uses firstOrCreate so re-running is safe.
 */
class CurriculumSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedModule2();
        $this->seedModule3();
        $this->seedModule4();
        $this->seedModule5();
        $this->seedModule6();
    }

    private function seedModule(string $titleEn, string $titleAs, string $level, int $orderIndex, array $lessons): void
    {
        $m = LearningModule::firstOrCreate(
            ['order_index' => $orderIndex],
            [
                'title_en' => $titleEn,
                'title_as' => $titleAs,
                'level'    => $level,
                'status'   => 'published',
            ]
        );

        foreach ($lessons as [$order, $slug, $en, $as]) {
            Lesson::firstOrCreate(
                ['slug' => $slug],
                [
                    'module_id'    => $m->id,
                    'title_en'     => $en,
                    'title_as'     => $as,
                    'level'        => $level,
                    'order_index'  => $order,
                    'status'       => 'published',
                    'published_at' => now(),
                ]
            );
        }
    }

    private function seedModule2(): void
    {
        $this->seedModule('Daily Life in Korean', 'কোৰিয়ান ভাষাত দৈনন্দিন জীৱন', 'beginner', 2, [
            [3,  'days-months-dates',          'Days, Months & Dates',              'দিন, মাহ আৰু তাৰিখ'],
            [4,  'food-and-drinks',             'Korean Food & Drinks',              'কোৰিয়ান খাদ্য আৰু পানীয়'],
            [5,  'shopping-and-money',          'Shopping & Money',                  'বজাৰ আৰু টকা-পইচা'],
            [6,  'school-and-university',       'School & University Life',          'বিদ্যালয় আৰু বিশ্ববিদ্যালয়'],
            [7,  'transport-and-directions',    'Getting Around — Transport',        'যাতায়াত আৰু দিশ-নিৰ্দেশ'],
            [8,  'health-and-body',             'Health & The Human Body',           'স্বাস্থ্য আৰু মানৱ শৰীৰ'],
        ]);
    }

    private function seedModule3(): void
    {
        $this->seedModule('Social Korean', 'সামাজিক কোৰিয়ান', 'beginner', 3, [
            [9,  'hobbies-and-free-time',       'Hobbies & Free Time',               'চখ আৰু অৱসৰ সময়'],
            [10, 'making-plans',                'Making Plans & Appointments',        'পৰিকল্পনা আৰু নিযুক্তি'],
            [11, 'talking-about-family',        'Talking About Family',              'পৰিয়ালৰ বিষয়ে কথা'],
            [12, 'korea-and-assam-culture',     'Korea & Assam — Culture Exchange',  'কোৰিয়া আৰু অসম — সংস্কৃতি বিনিময়'],
            [13, 'countries-and-nationalities', 'Countries & Nationalities',         'দেশ আৰু জাতীয়তা'],
            [14, 'weather-and-seasons',         'Weather & Seasons',                 'বতৰ আৰু ঋতু'],
        ]);
    }

    private function seedModule4(): void
    {
        $this->seedModule('Grammar Foundations', 'ব্যাকৰণৰ ভিত্তি', 'beginner', 4, [
            [15, 'past-tense',                  'The Past Tense — What Happened',    'অতীত কাল — কি হৈছিল'],
            [16, 'future-and-intentions',       'Future Plans & Intentions',          'ভৱিষ্যৎ পৰিকল্পনা'],
            [17, 'connecting-ideas',            'Connecting Ideas — and, but',        'ধাৰণা সংযোগ — আৰু, কিন্তু'],
            [18, 'giving-reasons',              'Giving Reasons — because, so',       'কাৰণ দিয়া — কিয়নো, তেনেহলে'],
            [19, 'negation-and-inability',      'Negation & Inability',               'অস্বীকৃতি আৰু অপাৰগতা'],
            [20, 'honorifics-deep-dive',        'Honorifics — Speaking with Respect', 'সন্মানজনক ভাষণ'],
        ]);
    }

    private function seedModule5(): void
    {
        $this->seedModule('Real-World Korean', 'বাস্তৱ জগতৰ কোৰিয়ান', 'intermediate', 5, [
            [21, 'at-a-korean-restaurant',      'At a Korean Restaurant',            'কোৰিয়ান ভোজনালয়ত'],
            [22, 'asking-for-directions',       'Asking for Directions',              'দিশ জানি লোৱা'],
            [23, 'at-the-hospital',             'At the Hospital & Pharmacy',         'চিকিৎসালয় আৰু ঔষধালয়ত'],
            [24, 'comparisons-and-preferences', 'Making Comparisons & Preferences',   'তুলনা আৰু পছন্দ'],
            [25, 'emotions-and-opinions',       'Expressing Emotions & Opinions',     'অনুভূতি আৰু মতামত প্ৰকাশ'],
            [26, 'travel-and-tourism',          'Travel & Tourism in Korea',          'কোৰিয়াত ভ্ৰমণ'],
        ]);
    }

    private function seedModule6(): void
    {
        $this->seedModule('Expanding Expression', 'অভিব্যক্তিৰ বিস্তাৰ', 'intermediate', 6, [
            [27, 'korean-work-culture',         'Korean Work & Office Culture',       'কোৰিয়ান কৰ্ম সংস্কৃতি'],
            [28, 'telephone-conversations',     'Telephone Conversations',            'টেলিফোন কথোপকথন'],
            [29, 'shopping-and-bargaining',     'Shopping & Bargaining',              'বজাৰ কৰা আৰু দৰদাম'],
            [30, 'describing-experiences',      'Describing Past Experiences',        'অভিজ্ঞতা বৰ্ণনা কৰা'],
            [31, 'korean-festivals-holidays',   'Korean Festivals & Holidays',        'কোৰিয়ান উৎসৱ আৰু বন্ধ'],
            [32, 'intermediate-review',         'Intermediate Review & TOPIK Preview','মধ্যৱৰ্তী পৰ্যালোচনা আৰু TOPIK'],
        ]);
    }
}
