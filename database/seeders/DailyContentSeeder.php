<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DailyContentSeeder extends Seeder
{
    public function run(): void
    {
        // ── Korean Phrases ────────────────────────────────────────────────────
        DB::table('korean_phrases')->truncate();
        $phrases = [
            ['안녕하세요',      'Hello',                          'Annyeonghaseyo',       1],
            ['감사합니다',      'Thank you',                      'Gamsahamnida',         2],
            ['잘 부탁드립니다', 'Please take care of me',         'Jal butakdeurimnida',  3],
            ['화이팅!',        'Fighting! (You can do it!)',      'Hwaiting!',            4],
            ['사랑해요',        'I love you',                     'Saranghaeyo',          5],
            ['수고했어요',      'Good job! / You worked hard!',   'Sugohaesseoyo',        6],
            ['반갑습니다',      'Nice to meet you',               'Bangapseumnida',       7],
            ['맛있어요',        "It's delicious",                 'Masisseoyo',           8],
            ['괜찮아요',        "It's okay / I'm fine",          'Gwaenchanayo',         9],
            ['어떻게 지내세요?','How are you?',                   'Eotteoke jinaeseyo?', 10],
            ['잠깐만요',        'Just a moment, please',          'Jamkkanmanyo',        11],
            ['모르겠어요',      "I don't know",                   'Moreugeseoyo',        12],
            ['도와주세요',      'Please help me',                 'Dowajuseyo',          13],
            ['천천히 말해주세요','Please speak slowly',           'Cheoncheonhi malhaejuseyo', 14],
            ['한국어를 공부해요','I study Korean',                 'Hangugeo-reul gongbuhaeyo', 15],
            ['좋아요',          'I like it / Good!',              'Joayo',               16],
            ['보고 싶어요',     'I miss you',                     'Bogo sipeoyo',        17],
            ['화이팅',          'Let\'s go! / Good luck!',        'Hwaiting',            18],
            ['행복하세요',       'Be happy',                      'Haengbokhaseyo',      19],
            ['잘 자요',         'Good night',                     'Jal jayo',            20],
            ['처음 뵙겠습니다', 'It\'s nice to meet you (formal)','Cheoeum boepgesseumnida', 21],
        ];

        foreach ($phrases as [$k, $e, $r, $s]) {
            DB::table('korean_phrases')->insert([
                'korean' => $k, 'english' => $e, 'romanized' => $r,
                'sort_order' => $s, 'is_active' => true,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ── Fun Facts & Did You Know ──────────────────────────────────────────
        DB::table('fun_facts')->truncate();
        $facts = [
            ['fun_fact',    '눈치',      'Nunchi',       'Koreans have a concept called "nunchi" — the subtle art of gauging others\' feelings and responding appropriately. It\'s considered a crucial social skill!'],
            ['fun_fact',    '빨리빨리',  'Ppalli-ppalli','Korea has a "ppalli-ppalli" (hurry-hurry) culture. South Korea has one of the world\'s fastest internet speeds and fastest delivery services!'],
            ['fun_fact',    '한',        'Han',          '"Han" is an untranslatable Korean emotion — a deep, collective feeling of sorrow, oppression, and yearning that has shaped Korean art and culture.'],
            ['fun_fact',    '정',        'Jeong',        '"Jeong" is a uniquely Korean bond of affection that forms between people over time — stronger than friendship, hard to describe, impossible to forget.'],
            ['fun_fact',    '눈물',      'Nunmul',       'Korean dramas are so emotionally powerful they\'re credited with boosting tissue sales across Asia! "Nunmul" (tears) is practically a genre unto itself.'],
            ['fun_fact',    '한복',      'Hanbok',       'Hanbok, the traditional Korean dress, uses colours that represent social status, age, and season. Brides wear red and blue to symbolise yin and yang.'],
            ['fun_fact',    '불고기',    'Bulgogi',      'Bulgogi, meaning "fire meat," has been enjoyed in Korea for over 2,000 years. It\'s one of the most well-known Korean dishes worldwide.'],
            ['fun_fact',    '서울',      'Seoul',        'Seoul is one of the world\'s largest cities with over 10 million people. Its name simply means "capital city" in Korean.'],
            ['did_you_know','세종대왕',  'Sejong Daewang','Hangul, the Korean alphabet, was created in 1443 by King Sejong the Great. It was designed to be learned in a single morning — and it truly can be!'],
            ['did_you_know','김치',      'Kimchi',       'Korea has over 200 varieties of kimchi! The fermented dish is so culturally significant that kimchi-making (kimjang) is recognized as UNESCO Intangible Cultural Heritage.'],
            ['did_you_know','태권도',    'Taekwondo',    'Taekwondo, the Korean martial art, is practised by over 80 million people in 188 countries. It became an Olympic sport in 2000 at the Sydney Games.'],
            ['did_you_know','K-pop',     null,           'BTS became the first Korean act to reach number one on the US Billboard Hot 100. Their global fanbase, ARMY, is estimated at over 40 million people.'],
            ['did_you_know','한국',      'Hanguk',       'Korea is one of the world\'s most ethnically homogeneous nations. "Hanguk" (한국) literally means "land of the Han people."'],
            ['did_you_know','삼겹살',    'Samgyeopsal',  '"Samgyeopsal" nights are practically a social institution in Korea — grilling pork belly with friends around a table is one of the most beloved ways to bond.'],
            ['did_you_know','존댓말',    'Jondaemal',    'Korean has an entire formal speech system called "jondaemal." How you speak changes completely depending on who you\'re talking to — age matters a lot!'],
        ];

        $spotlights = [
            ['club_tip', '도전', 'Challenge',  'Try greeting someone in Korean today — 안녕하세요! (Annyeonghaseyo). Notice their reaction. Language lives in connection.'],
            ['club_tip', '팁',   'Tip',         'Hangul takes just a few hours to learn. Start with the 14 consonants — each one mimics the shape of the mouth that makes it.'],
            ['club_tip', '문화', 'Culture',     'In Korea, age matters in speech. Korean has formal and informal registers — learning when to use 존댓말 (jondaemal) is key to respectful conversation.'],
            ['club_tip', '클럽', 'Club',        'Our club meets to practise Korean together — speaking with others is 10× faster than studying alone. Join a session and try one new phrase.'],
            ['club_tip', '격언', 'Proverb',     '천리 길도 한 걸음부터 — A journey of a thousand miles begins with a single step. Every Korean word you learn is that step.'],
            ['club_tip', '듣기', 'Listening',   'Watch one scene of a Korean drama today without subtitles. Even catching 2–3 words you recognise trains your ear faster than textbooks.'],
            ['club_tip', '쓰기', 'Writing',     'Write your name in Hangul today. Korean is phonetic — sound it out letter by letter. Share it in our community group!'],
        ];
        foreach ($spotlights as $i => [$type, $kw, $rom, $fact]) {
            DB::table('fun_facts')->insert([
                'type' => $type, 'korean_word' => $kw, 'romanized' => $rom, 'fact' => $fact,
                'sort_order' => 100 + $i + 1, 'is_active' => true,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        foreach ($facts as $i => [$type, $kw, $rom, $fact]) {
            DB::table('fun_facts')->insert([
                'type' => $type, 'korean_word' => $kw, 'romanized' => $rom, 'fact' => $fact,
                'sort_order' => $i + 1, 'is_active' => true,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // ── Media Picks ───────────────────────────────────────────────────────
        DB::table('media_picks')->truncate();
        $picks = [
            ['Drama', 'Crash Landing on You',  '사랑의 불시착', 'A South Korean heiress accidentally crash-lands in North Korea and falls in love with a military officer. A perfect blend of romance, humor, and drama.', 'Must Watch',   'Netflix',            'https://www.netflix.com/title/81159258',                          1],
            ['Movie', 'Parasite',              '기생충',       'Bong Joon-ho\'s Oscar-winning masterpiece about class struggle and social inequality. The first non-English film to win Best Picture at the Academy Awards.', 'Oscar Winner', 'Prime Video',        'https://www.amazon.com/Parasite-Kang-ho-Song/dp/B07ZW2LPPB',     2],
            ['Book',  'Please Look After Mom', '엄마를 부탁해', 'Kyung-sook Shin\'s internationally acclaimed novel about a Korean family searching for their missing mother. A deeply moving exploration of love and regret.', 'Bestseller',   'Amazon Books',       'https://www.amazon.com/Please-Look-After-Mom-Novel/dp/0307739511',3],
            ['Drama', 'Reply 1988',            '응답하라 1988', 'A nostalgic coming-of-age drama set in a Seoul neighbourhood in 1988. Widely considered one of the greatest Korean dramas ever made.', 'Fan Favourite', 'Netflix',           'https://www.netflix.com/title/80188315',                          4],
            ['Music', 'BTS — Map of the Soul', 'BTS 소울 맵',  'The album that took BTS to global superstardom. A philosophical exploration of the self through the lens of Jungian psychology and Korean artistry.', 'Global Hit',   'Spotify',            'https://open.spotify.com/album/0y4peHPDUlHggRqJCBjfXE',          5],
            ['Movie', 'Train to Busan',        '부산행',       'A heart-pounding zombie thriller set aboard a speeding Korean bullet train. One of the best action-horror films of the decade.', 'Thriller',     'Netflix',            'https://www.netflix.com/title/80117824',                          6],
            ['Drama', 'My Mister',             '나의 아저씨',  'A quiet, profound drama about two people in difficult circumstances who find solace in each other. Widely praised for its emotional depth and writing.', 'Award Winner', 'Viki',               'https://www.viki.com/tv/35286c-my-mister',                        7],
            ['Book',  'The Vegetarian',        '채식주의자',   'Han Kang\'s Man Booker Prize-winning novel — a surreal, disturbing story of a woman who stops eating meat and its impact on everyone around her.', 'Booker Prize', 'Amazon Books',       'https://www.amazon.com/Vegetarian-Han-Kang/dp/1101906111',        8],
            ['Music', 'IU — Palette',          'IU — 팔레트', 'A deeply personal album by Korea\'s "Nation\'s Little Sister." Palette is a reflective celebration of growing up — elegant, warm, and utterly distinctive.', 'K-Pop Classic','Spotify',           'https://open.spotify.com/album/3NnMnHRamFDBh5rghEhXq3',          9],
            ['Drama', 'Goblin',                '도깨비',       'A 939-year-old goblin searches for his human bride to break a curse. Stunning visuals, a sweeping soundtrack, and unforgettable performances.', 'Cult Classic', 'Netflix',            'https://www.netflix.com/title/80187175',                          10],
        ];

        foreach ($picks as [$type, $title, $ko, $desc, $tag, $platform, $url, $order]) {
            DB::table('media_picks')->insert([
                'type' => $type, 'title' => $title, 'korean_title' => $ko,
                'description' => $desc, 'tag' => $tag, 'streaming_platform' => $platform,
                'streaming_url' => $url,
                'sort_order' => $order, 'is_active' => true,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }
}
