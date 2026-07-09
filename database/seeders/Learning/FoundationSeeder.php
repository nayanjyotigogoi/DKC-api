<?php

namespace Database\Seeders\Learning;

use Illuminate\Database\Seeder;
use App\Models\Learning\LearningModule;
use App\Models\Learning\Lesson;
use App\Models\Learning\Vocabulary;

/**
 * Adds 4 foundational lessons to Module 1 (before greetings):
 *   1. Korean Vowels        (21 vowels)
 *   2. Korean Consonants    (19 consonants — 14 basic + 5 tense)
 *   3. Sino-Korean Numbers  (일이삼... — dates, money, minutes)
 *   4. Native Korean Numbers(하나둘셋... — counting objects, hours)
 *
 * Existing Module 1 lessons are shifted up by 4 so they follow.
 * Idempotent — uses firstOrCreate throughout.
 */
class FoundationSeeder extends Seeder
{
    private LearningModule $module1;

    public function run(): void
    {
        $this->module1 = LearningModule::where('order_index', 1)->firstOrFail();

        // Shift existing lessons (order_index 1, 2) up to 5, 6
        Lesson::where('module_id', $this->module1->id)
              ->whereIn('order_index', [1, 2, 3, 4])
              ->orderByDesc('order_index')
              ->each(fn ($l) => $l->update(['order_index' => $l->order_index + 4]));

        $vowelLesson      = $this->makeLesson(1, 'korean-vowels',          'Korean Vowels — 모음 (Moeun)',           'কোৰিয়ান স্বৰবৰ্ণ — 모음');
        $consonantLesson  = $this->makeLesson(2, 'korean-consonants',      'Korean Consonants — 자음 (Jaeum)',       'কোৰিয়ান ব্যঞ্জনবৰ্ণ — 자음');
        $sinoLesson       = $this->makeLesson(3, 'sino-korean-numbers',    'Sino-Korean Numbers — 일이삼사오',        'চীনো-কোৰিয়ান সংখ্যা — 일이삼사오');
        $nativeLesson     = $this->makeLesson(4, 'native-korean-numbers',  'Native Korean Numbers — 하나둘셋넷다섯', 'স্থানীয় কোৰিয়ান সংখ্যা — 하나둘셋');

        $this->seedVowels($vowelLesson);
        $this->seedConsonants($consonantLesson);
        $this->seedSinoNumbers($sinoLesson);
        $this->seedNativeNumbers($nativeLesson);
    }

    // ── Helpers ────────────────────────────────────────────────────────────────

    private function makeLesson(int $order, string $slug, string $en, string $as): Lesson
    {
        return Lesson::firstOrCreate(
            ['slug' => $slug],
            [
                'module_id'    => $this->module1->id,
                'title_en'     => $en,
                'title_as'     => $as,
                'level'        => 'beginner',
                'order_index'  => $order,
                'status'       => 'published',
                'published_at' => now(),
            ]
        );
    }

    private function addVocab(Lesson $lesson, array $items): void
    {
        foreach ($items as $i => [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $v = Vocabulary::firstOrCreate(
                ['korean' => $ko],
                [
                    'romanization'   => $rom,
                    'assamese'       => $as,
                    'english'        => $en,
                    'part_of_speech' => $pos,
                    'level'          => 'beginner',
                    'example_ko'     => $exko,
                    'example_as'     => $exas,
                    'example_en'     => $exen,
                ]
            );
            $lesson->vocabulary()->syncWithoutDetaching([$v->id => ['order_index' => $i + 1]]);
        }
    }

    // ── 1. KOREAN VOWELS ──────────────────────────────────────────────────────
    // Format: [korean, romanization, assamese_sound, english_desc, pos, example_ko, example_as, example_en]

    private function seedVowels(Lesson $lesson): void
    {
        $items = [

            // ── Basic vowels ─────────────────────────────────────────────────
            ['ㅏ', 'a',   'অ (আ-ৰ চুটি, "father"ৰ a)',   'Basic vowel — "a" as in father',     'letter', '아 (ah!)',       '"অ" বুলি কওক',         'Say like "a" in father'],
            ['ㅑ', 'ya',  'য়া ("yard"ৰ ya)',               'Basic vowel — "ya" as in yard',      'letter', '야 (hey!)',      '"য়া" বুলি কওক',        'Say like "ya" in yard'],
            ['ㅓ', 'eo',  'এ-আৰ মাজত ("sun"ৰ u)',         'Basic vowel — "eo" like u in sun',   'letter', '어 (um/uh)',     '"আ" আৰু "এ"ৰ মাজত',   'Halfway between "a" and "u"'],
            ['ㅕ', 'yeo', 'য়ে-আৰ মাজত ("yummy"ৰ yu)',    'Basic vowel — "yeo" like yu',        'letter', '여 (here)',      '"য়ে" বুলি কওক',        'Like "yu" then shift to eo'],
            ['ㅗ', 'o',   'ও ("oh!"ৰ o)',                  'Basic vowel — "o" as in oh',         'letter', '오 (oh!/five)', '"ও" বুলি কওক',         'Say like "o" in go'],
            ['ㅛ', 'yo',  'য়ো ("yoga"ৰ yo)',               'Basic vowel — "yo" as in yoga',      'letter', '요 (please)',   '"য়ো" বুলি কওক',        'Say like "yo" in yoga'],
            ['ㅜ', 'u',   'উ ("moon"ৰ u)',                 'Basic vowel — "u" as in moon',       'letter', '우 (wow!)',     '"উ" বুলি কওক',         'Say like "u" in moon'],
            ['ㅠ', 'yu',  'য়ু ("you")',                    'Basic vowel — "yu" as in you',       'letter', '유 (milk)',     '"য়ু" বুলি কওক',        'Say like "yu" in you'],
            ['ㅡ', 'eu',  'এ-উৰ মাজত (কোনো অসমীয়া স্বৰ নাই)', 'Basic vowel — "eu" (no Assamese equivalent)', 'letter', '으 (connecting sound)', 'ওঁঠ পাতি "উ" কওক',    'Flatten lips and say "u"'],
            ['ㅣ', 'i',   'ই ("see"ৰ i)',                  'Basic vowel — "i" as in see',        'letter', '이 (this / two)', '"ই" বুলি কওক',       'Say like "ee" in see'],

            // ── Compound vowels ──────────────────────────────────────────────
            ['ㅐ', 'ae',  'এ ("bed"ৰ e)',                  'Compound — "ae" like e in bed',      'letter', '개 (dog)',       '"এ" বুলি কওক',         'Like "e" in bed'],
            ['ㅒ', 'yae', 'য়ে ("yes"ৰ ye)',                'Compound — "yae" like ye',           'letter', '예 (yes)',       '"য়ে" বুলি কওক',        'Like "ye" in yes'],
            ['ㅔ', 'e',   'এ ("bed"ৰ e — আধুনিক কোৰিয়ানত ㅐ-ৰ সমান)', 'Compound — "e" like e in bed', 'letter', '에 (at / location)', '"এ" বুলি কওক', 'Now same sound as ㅐ in modern Korean'],
            ['ㅖ', 'ye',  'য়ে',                             'Compound — "ye"',                    'letter', '예의 (manners)', '"য়ে" বুলি কওক',       'Like "ye" in yes'],
            ['ㅘ', 'wa',  'ৱা ("water"ৰ wa)',               'Compound — "wa" as in water',        'letter', '봐 (look!)',     '"ৱা" বুলি কওক',        'Like "wa" in water'],
            ['ㅙ', 'wae', 'ৱে ("wet"ৰ we)',                 'Compound — "wae"',                   'letter', '왜 (why?)',      '"ৱে" বুলি কওক',        'Like "we" in wet'],
            ['ㅚ', 'oe',  'ৱে (আধুনিকত ㅙ-ৰ সমান)',        'Compound — "oe" (modern: same as ㅙ)', 'letter', '최 (best)',    '"ৱে" বুলি কওক',        'Now same as ㅙ in modern speech'],
            ['ㅝ', 'wo',  'ৱো ("won"ৰ wo)',                 'Compound — "wo" like wo in won',     'letter', '뭐 (what?)',     '"ৱো" বুলি কওক',        'Like "wo" in won'],
            ['ㅞ', 'we',  'ৱে ("well"ৰ we)',                'Compound — "we"',                    'letter', '웨 (hey/eh)',   '"ৱে" বুলি কওক',        'Like "we" in well'],
            ['ㅟ', 'wi',  'ৱি ("we"ৰ wi)',                  'Compound — "wi"',                    'letter', '위 (top/above)', '"ৱি" বুলি কওক',       'Like "wi" in wink'],
            ['ㅢ', 'ui',  'ই (আধুনিকত সাধাৰণতে ই-ৰ দৰে)', 'Compound — "ui" (modern: often like ই)', 'letter', '의 (possessive marker)', '"ই" বুলি কওক', 'Mostly pronounced like ㅣ today'],
        ];

        $this->addVocab($lesson, $items);
    }

    // ── 2. KOREAN CONSONANTS ──────────────────────────────────────────────────

    private function seedConsonants(Lesson $lesson): void
    {
        $items = [

            // ── Basic consonants ─────────────────────────────────────────────
            ['ㄱ', 'g / k',  'গ (আৰম্ভত) / ক (শেষত)',          'Basic — g at start, k at end of syllable',    'letter', '가 (go) / 국 (soup)',    'গ-আৰু-ক এৰ মাজত',       'Like "g" in go or "k" in ski'],
            ['ㄴ', 'n',      'ন ("no"ৰ n)',                     'Basic — n as in no',                          'letter', '나 (I/me)',               '"ন" বুলি কওক',            'Like "n" in no'],
            ['ㄷ', 'd / t',  'দ (আৰম্ভত) / ট (শেষত)',          'Basic — d at start, t at end',                'letter', '다 (all) / 맏 (eldest)',   'দ-আৰু-ট এৰ মাজত',       'Like "d" in do or "t" in stop'],
            ['ㄹ', 'r / l',  'ৰ (স্বৰৰ মাজত) / ল (শব্দশেষত)', 'Basic — r between vowels, l at end',          'letter', '라 (la) / 말 (horse)',    'ৰ আৰু ল উভয়',           'Flap "r" between vowels, "l" at end'],
            ['ㅁ', 'm',      'ম ("mom"ৰ m)',                    'Basic — m as in mom',                         'letter', '마 (mom)',                '"ম" বুলি কওক',            'Like "m" in mom'],
            ['ㅂ', 'b / p',  'ব (আৰম্ভত) / প (শেষত)',          'Basic — b at start, p at end',                'letter', '바 (bar) / 밥 (rice)',    'ব-আৰু-প এৰ মাজত',       'Like "b" in bat or "p" in stop'],
            ['ㅅ', 's / sh', 'ছ ("sun"ৰ s) / শ (i-স্বৰৰ আগত)', 'Basic — s as in sun, sh before i/y',          'letter', '사 (four) / 시 (hour)',   '"ছ" বুলি কওক',            'Like "s" in sun or "sh" before i'],
            ['ㅇ', 'ng / —', 'শব্দৰ শেষত ং, আৰম্ভত নিৰ্বাক',  'Basic — silent at start, "ng" at end',        'letter', '아 (ah!) / 강 (river)',   'আৰম্ভতে মূক, শেষত ং',   'Silent placeholder or "ng" at syllable end'],
            ['ㅈ', 'j',      'জ ("join"ৰ j)',                   'Basic — j as in join',                        'letter', '자 (sleep) / 저 (I, formal)', '"জ" বুলি কওক',        'Like "j" in join'],
            ['ㅊ', 'ch',     'ছ ("church"ৰ ch)',                'Basic aspirated — ch as in church',           'letter', '차 (tea / car)',          '"ছ" শব্দেৰে কওক',        'Like "ch" in church (aspirated)'],
            ['ㅋ', 'k',      'খ ("k" শ্বাসযুক্ত)',              'Basic aspirated — k with puff of air',        'letter', '카 (car / K)',            '"খ" বুলি কওক',            'Like "k" in kite (with breath)'],
            ['ㅌ', 't',      'থ ("t" শ্বাসযুক্ত)',              'Basic aspirated — t with puff of air',        'letter', '타 (ride)',               '"থ" বুলি কওক',            'Like "t" in top (with breath)'],
            ['ㅍ', 'p',      'ফ ("p" শ্বাসযুক্ত)',              'Basic aspirated — p with puff of air',        'letter', '파 (green onion / wave)', '"ফ" বুলি কওক',           'Like "p" in pin (with breath)'],
            ['ㅎ', 'h',      'হ ("hello"ৰ h)',                  'Basic — h as in hello',                       'letter', '하 (do) / 한국 (Korea)',  '"হ" বুলি কওক',            'Like "h" in hello'],

            // ── Tense (tensed/doubled) consonants ───────────────────────────
            ['ㄲ', 'kk',     'ক (টান, চাপিত — কোনো শ্বাস নাই)', 'Tense — tight k with no breath',           'letter', '까 (crow) / 꿈 (dream)', 'গলা টান কৰি "ক" কওক',   'Tense "k" — tighten throat, no puff'],
            ['ㄸ', 'tt',     'ট (টান, চাপিত)',                  'Tense — tight t with no breath',              'letter', '따 (when) / 딸 (daughter)', 'টান "ট" কওক',          'Tense "t" — no aspiration'],
            ['ㅃ', 'pp',     'প (টান, চাপিত)',                  'Tense — tight p with no breath',              'letter', '빠 (fast) / 뼈 (bone)',   'টান "প" কওক',            'Tense "p" — no aspiration'],
            ['ㅆ', 'ss',     'ছ (টান, চাপিত)',                  'Tense — tight s',                             'letter', '싸 (cheap) / 씨 (seed)',  'টান "ছ" কওক',            'Tense "s" — press tongue harder'],
            ['ㅉ', 'jj',     'জ (টান, চাপিত)',                  'Tense — tight j',                             'letter', '짜 (salty) / 짝 (pair)',  'টান "জ" কওক',            'Tense "j" — no aspiration'],
        ];

        $this->addVocab($lesson, $items);
    }

    // ── 3. SINO-KOREAN NUMBERS ────────────────────────────────────────────────
    // Used for: dates, money, minutes, floors, phone numbers, addresses

    private function seedSinoNumbers(Lesson $lesson): void
    {
        $items = [
            ['영 / 공', 'yeong / gong', 'শূন্য (০)',    'Zero — 영 (formal) / 공 (phone numbers)', 'number', '영도예요. (0°C)',      'শূন্য ডিগ্ৰি।',         'It is zero degrees.'],
            ['일',      'il',           'এক (১)',        'One — Sino-Korean',                        'number', '일 층이에요.',         'প্ৰথম মজিয়া।',          'It is the 1st floor.'],
            ['이',      'i',            'দুই (২)',       'Two — Sino-Korean',                        'number', '이 월이에요.',         'ফেব্ৰুৱাৰী মাহ।',        'It is February (month 2).'],
            ['삼',      'sam',          'তিনি (৩)',      'Three — Sino-Korean',                      'number', '삼십 분이에요.',       'ত্ৰিশ মিনিট।',           'It is 30 minutes.'],
            ['사',      'sa',           'চাৰি (৪)',      'Four — Sino-Korean',                       'number', '사 월이에요.',         'এপ্ৰিল মাহ।',            'It is April (month 4).'],
            ['오',      'o',            'পাঁচ (৫)',      'Five — Sino-Korean',                       'number', '오천 원이에요.',       'পাঁচ হাজাৰ ৱোন।',        'It is 5,000 won.'],
            ['육',      'yuk',          'ছয় (৬)',       'Six — Sino-Korean',                        'number', '육 층이에요.',         'ষষ্ঠ মজিয়া।',            'It is the 6th floor.'],
            ['칠',      'chil',         'সাত (৭)',       'Seven — Sino-Korean',                      'number', '칠 월이에요.',         'জুলাই মাহ।',             'It is July (month 7).'],
            ['팔',      'pal',          'আঠ (৮)',        'Eight — Sino-Korean',                      'number', '팔십이에요.',          'আশী।',                   'It is eighty.'],
            ['구',      'gu',           'নয় (৯)',       'Nine — Sino-Korean',                       'number', '구 월이에요.',         'ছেপ্টেম্বৰ মাহ।',        'It is September (month 9).'],
            ['십',      'sip',          'দহ (১০)',       'Ten — Sino-Korean',                        'number', '십 분이에요.',         'দহ মিনিট।',              'It is 10 minutes.'],
            ['이십',    'isip',         'বিশ (২০)',      'Twenty — 이 (2) + 십 (10)',                'number', '이십 살이에요.',       'বিশ বছৰ বয়স।',          'I am 20 years old.'],
            ['삼십',    'samsip',       'ত্ৰিশ (৩০)',    'Thirty — 삼 + 십',                        'number', '삼십 분이에요.',       'ত্ৰিশ মিনিট।',           'It is 30 minutes past.'],
            ['사십',    'sasip',        'চল্লিশ (৪০)',   'Forty — 사 + 십',                         'number', '사십 원이에요.',        'চল্লিশ ৱোন।',            'It is 40 won.'],
            ['오십',    'osip',         'পঞ্চাশ (৫০)',   'Fifty — 오 + 십',                         'number', '오십 분이에요.',        'পঞ্চাশ মিনিট।',          'It is 50 minutes.'],
            ['백',      'baek',         'এশ (১০০)',      'Hundred — Sino-Korean',                    'number', '백 원이에요.',          'এশ ৱোন।',                'It is 100 won.'],
            ['천',      'cheon',        'এহেজাৰ (১০০০)', 'Thousand — Sino-Korean',                  'number', '천 원이에요.',          'এহেজাৰ ৱোন।',           'It is 1,000 won.'],
            ['만',      'man',          'দহহেজাৰ (১০০০০)', 'Ten-thousand — Sino-Korean',             'number', '만 원이에요.',          'দহহেজাৰ ৱোন।',          'It is 10,000 won.'],
        ];

        $this->addVocab($lesson, $items);
    }

    // ── 4. NATIVE KOREAN NUMBERS ──────────────────────────────────────────────
    // Used for: counting objects (with counters), hours, age (informal)

    private function seedNativeNumbers(Lesson $lesson): void
    {
        $items = [
            ['하나',   'hana',    'এক (১)',       'One — Native Korean (becomes 한 before a counter)',  'number', '하나 주세요.',     'এটা দিয়ক।',           'Give me one, please.'],
            ['둘',     'dul',     'দুই (২)',      'Two — Native Korean (becomes 두 before a counter)',  'number', '둘 다요.',         'দুয়োটা।',             'Both (two) of them.'],
            ['셋',     'set',     'তিনি (৩)',     'Three — Native Korean (becomes 세 before a counter)','number', '셋 주세요.',      'তিনিটা দিয়ক।',       'Give me three.'],
            ['넷',     'net',     'চাৰি (৪)',     'Four — Native Korean (becomes 네 before a counter)', 'number', '넷이에요.',        'চাৰিটা।',             'There are four.'],
            ['다섯',   'daseot',  'পাঁচ (৫)',     'Five — Native Korean',                               'number', '다섯 시예요.',     'পাঁচ বাজিছে।',        'It is 5 o\'clock.'],
            ['여섯',   'yeoseot', 'ছয় (৬)',      'Six — Native Korean',                                'number', '여섯 시예요.',     'ছয় বাজিছে।',         'It is 6 o\'clock.'],
            ['일곱',   'ilgop',   'সাত (৭)',      'Seven — Native Korean',                              'number', '일곱 살이에요.',   'সাত বছৰ বয়স।',       'I am 7 years old.'],
            ['여덟',   'yeodeol', 'আঠ (৮)',       'Eight — Native Korean',                              'number', '여덟 개요.',       'আঠটা।',               'There are eight (items).'],
            ['아홉',   'ahop',    'নয় (৯)',      'Nine — Native Korean',                               'number', '아홉 시예요.',     'নয় বাজিছে।',         'It is 9 o\'clock.'],
            ['열',     'yeol',    'দহ (১০)',      'Ten — Native Korean',                                'number', '열 시예요.',       'দহ বাজিছে।',          'It is 10 o\'clock.'],
            ['열하나', 'yeolhana','এঘাৰ (১১)',    'Eleven — 열 (10) + 하나 (1)',                        'number', '열하나 시예요.',   'এঘাৰ বাজিছে।',        'It is 11 o\'clock.'],
            ['열둘',   'yeoldul', 'বাৰ (১২)',     'Twelve — 열 (10) + 둘 (2)',                          'number', '열두 시예요.',     'বাৰ বাজিছে।',         'It is noon / midnight.'],
            ['스물',   'seumul',  'বিশ (২০)',     'Twenty — Native Korean',                             'number', '스무 살이에요.',   'বিশ বছৰ বয়স।',       'I am 20 years old.'],
            ['서른',   'seoreun', 'ত্ৰিশ (৩০)',   'Thirty — Native Korean',                             'number', '서른 살이에요.',   'ত্ৰিশ বছৰ বয়স।',     'I am 30 years old.'],
            ['마흔',   'maheun',  'চল্লিশ (৪০)',  'Forty — Native Korean',                              'number', '마흔 살이에요.',   'চল্লিশ বছৰ বয়স।',   'I am 40 years old.'],
            ['쉰',     'swin',    'পঞ্চাশ (৫০)',  'Fifty — Native Korean',                              'number', '쉰 살이에요.',     'পঞ্চাশ বছৰ বয়স।',   'I am 50 years old.'],

            // ── Common counters ──────────────────────────────────────────────
            ['개',     'gae',     'টা/খন (বস্তু গণনা)', 'Counter — for general objects',             'counter','사과 두 개요.',     'আপেল দুটা।',          'Two apples.'],
            ['명',     'myeong',  'জন (মানুহ গণনা)',    'Counter — for people',                       'counter','세 명이에요.',      'তিনজন মানুহ।',        'There are three people.'],
            ['잔',     'jan',     'কাপ / গিলাছ গণনা',  'Counter — for cups / glasses',               'counter','커피 한 잔요.',     'এক কাপ কফি।',         'One cup of coffee.'],
            ['번',     'beon',    'বাৰ (পুনৰাবৃত্তি)',  'Counter — for times / occurrences',          'counter','두 번이에요.',      'দুবাৰ।',               'Twice (two times).'],
        ];

        $this->addVocab($lesson, $items);
    }
}
