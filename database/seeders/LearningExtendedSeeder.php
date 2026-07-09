<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Learning\Vocabulary;
use App\Models\Learning\GrammarPoint;
use App\Models\Learning\Conversation;
use App\Models\Learning\ConversationLine;
use App\Models\Learning\CulturalNote;

/**
 * Extends the Learning database with standalone content for every section:
 *   - ~40 vocabulary entries across 5 themes (Family, Food, Time, Places, Colours)
 *   - 10 grammar points covering common beginner patterns
 *   - 3 standalone conversations (Café, Classroom, Phone call)
 *   - 3 standalone cultural notes
 *
 * These entries are NOT attached to any lesson — they exist as standalone
 * dictionary/grammar/conversation library content, visible in those sections
 * independently of the lesson path.
 */
class LearningExtendedSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedFamilyVocabulary();
        $this->seedFoodVocabulary();
        $this->seedTimeVocabulary();
        $this->seedPlacesVocabulary();
        $this->seedColoursVocabulary();
        $this->seedGrammarPoints();
        $this->seedStandaloneConversations();
        $this->seedStandaloneCulturalNotes();
    }

    // ─────────────────────────────────────────────────────────────────────────
    // VOCABULARY — FAMILY (가족)
    // ─────────────────────────────────────────────────────────────────────────

    private function seedFamilyVocabulary(): void
    {
        $entries = [
            ['korean' => '가족',   'romanization' => 'gajok',      'assamese' => 'পৰিয়াল',         'english' => 'Family',          'part_of_speech' => 'noun',  'example_ko' => '우리 가족은 네 명이에요.',  'example_as' => 'আমাৰ পৰিয়ালত চাৰিজন আছে।',  'example_en' => 'My family has four members.'],
            ['korean' => '아버지', 'romanization' => 'abeoji',     'assamese' => 'দেউতা',           'english' => 'Father',          'part_of_speech' => 'noun',  'example_ko' => '아버지는 의사예요.',          'example_as' => 'দেউতা চিকিৎসক।',              'example_en' => 'My father is a doctor.'],
            ['korean' => '어머니', 'romanization' => 'eomeoni',    'assamese' => 'মা',               'english' => 'Mother',          'part_of_speech' => 'noun',  'example_ko' => '어머니가 요리해요.',          'example_as' => 'মাই ৰান্ধে।',                  'example_en' => 'My mother cooks.'],
            ['korean' => '오빠',   'romanization' => 'oppa',       'assamese' => 'দাদা (ছোৱালীৰ)',   'english' => 'Older brother (girl\'s)','part_of_speech' => 'noun','example_ko' => '오빠가 학교에 가요.','example_as' => 'দাদা স্কুললৈ যায়।','example_en' => 'Older brother goes to school.'],
            ['korean' => '언니',   'romanization' => 'eonni',      'assamese' => 'বাইদেউ (ছোৱালীৰ)', 'english' => 'Older sister (girl\'s)', 'part_of_speech' => 'noun', 'example_ko' => null, 'example_as' => null, 'example_en' => null],
            ['korean' => '형',     'romanization' => 'hyeong',     'assamese' => 'দাদা (ল\'ৰাৰ)',    'english' => 'Older brother (boy\'s)', 'part_of_speech' => 'noun', 'example_ko' => null, 'example_as' => null, 'example_en' => null],
            ['korean' => '누나',   'romanization' => 'nuna',       'assamese' => 'বাইদেউ (ল\'ৰাৰ)',  'english' => 'Older sister (boy\'s)',  'part_of_speech' => 'noun', 'example_ko' => null, 'example_as' => null, 'example_en' => null],
            ['korean' => '동생',   'romanization' => 'dongsaeng',  'assamese' => 'সৰু ভাই/বাই',      'english' => 'Younger sibling', 'part_of_speech' => 'noun',  'example_ko' => '동생이 두 명 있어요.',        'example_as' => 'মোৰ দুজন সৰু আছে।',           'example_en' => 'I have two younger siblings.'],
            ['korean' => '할아버지','romanization' => 'harabeoji',  'assamese' => 'ককাদেউতা',        'english' => 'Grandfather',     'part_of_speech' => 'noun',  'example_ko' => null, 'example_as' => null, 'example_en' => null],
            ['korean' => '할머니', 'romanization' => 'halmeoni',   'assamese' => 'আইতা',             'english' => 'Grandmother',     'part_of_speech' => 'noun',  'example_ko' => null, 'example_as' => null, 'example_en' => null],
        ];

        foreach ($entries as $e) {
            Vocabulary::create(array_merge($e, ['level' => 'beginner']));
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // VOCABULARY — FOOD (음식)
    // ─────────────────────────────────────────────────────────────────────────

    private function seedFoodVocabulary(): void
    {
        $entries = [
            ['korean' => '밥',    'romanization' => 'bap',      'assamese' => 'ভাত / আহাৰ',    'english' => 'Rice / Meal',    'part_of_speech' => 'noun', 'example_ko' => '밥 먹었어요?', 'example_as' => 'আহাৰ খালা?', 'example_en' => 'Have you eaten?'],
            ['korean' => '물',    'romanization' => 'mul',      'assamese' => 'পানী',           'english' => 'Water',          'part_of_speech' => 'noun', 'example_ko' => '물 주세요.',   'example_as' => 'পানী দিয়ক।', 'example_en' => 'Please give me water.'],
            ['korean' => '김치',  'romanization' => 'kimchi',   'assamese' => 'কিমচি',          'english' => 'Kimchi',         'part_of_speech' => 'noun', 'example_ko' => '김치가 매워요.','example_as' => 'কিমচি জলা।',  'example_en' => 'Kimchi is spicy.'],
            ['korean' => '라면',  'romanization' => 'ramyeon',  'assamese' => 'ৰামিওন (নুডলছ)', 'english' => 'Ramen noodles',  'part_of_speech' => 'noun', 'example_ko' => '라면 좋아해요.','example_as' => 'মই ৰামিওন ভাল পাওঁ।','example_en' => 'I like ramen.'],
            ['korean' => '커피',  'romanization' => 'keopi',    'assamese' => 'কফি',            'english' => 'Coffee',         'part_of_speech' => 'noun', 'example_ko' => '커피 한 잔 주세요.','example_as' => 'এক কাপ কফি দিয়ক।','example_en' => 'One coffee please.'],
            ['korean' => '빵',    'romanization' => 'ppang',    'assamese' => 'পাউৰুটি',        'english' => 'Bread',          'part_of_speech' => 'noun', 'example_ko' => null, 'example_as' => null, 'example_en' => null],
            ['korean' => '고기',  'romanization' => 'gogi',     'assamese' => 'মাংস',           'english' => 'Meat',           'part_of_speech' => 'noun', 'example_ko' => '고기를 좋아해요.','example_as' => 'মই মাংস ভাল পাওঁ।','example_en' => 'I like meat.'],
            ['korean' => '과일',  'romanization' => 'gwail',    'assamese' => 'ফল',             'english' => 'Fruit',          'part_of_speech' => 'noun', 'example_ko' => null, 'example_as' => null, 'example_en' => null],
            ['korean' => '맛있다','romanization' => 'masitda',  'assamese' => 'সুস্বাদু',       'english' => 'Delicious',      'part_of_speech' => 'adjective','example_ko' => '정말 맛있어요!','example_as' => 'সঁচাকৈ সুস্বাদু!','example_en' => 'It is really delicious!'],
            ['korean' => '맵다',  'romanization' => 'maepda',   'assamese' => 'জলা',            'english' => 'Spicy',          'part_of_speech' => 'adjective','example_ko' => '이 음식이 매워요.','example_as' => 'এই খাদ্য জলা।','example_en' => 'This food is spicy.'],
        ];

        foreach ($entries as $e) {
            Vocabulary::create(array_merge($e, ['level' => 'beginner']));
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // VOCABULARY — TIME (시간)
    // ─────────────────────────────────────────────────────────────────────────

    private function seedTimeVocabulary(): void
    {
        $entries = [
            ['korean' => '오늘',   'romanization' => 'oneul',    'assamese' => 'আজি',            'english' => 'Today',          'part_of_speech' => 'noun',  'example_ko' => '오늘 날씨가 좋아요.', 'example_as' => 'আজি বতৰ ভাল।', 'example_en' => 'The weather is good today.'],
            ['korean' => '내일',   'romanization' => 'naeil',    'assamese' => 'কাইলৈ',          'english' => 'Tomorrow',       'part_of_speech' => 'noun',  'example_ko' => '내일 만나요.',       'example_as' => 'কাইলৈ লগ পাওঁ।', 'example_en' => 'See you tomorrow.'],
            ['korean' => '어제',   'romanization' => 'eoje',     'assamese' => 'কালি',           'english' => 'Yesterday',      'part_of_speech' => 'noun',  'example_ko' => null, 'example_as' => null, 'example_en' => null],
            ['korean' => '지금',   'romanization' => 'jigeum',   'assamese' => 'এতিয়া',         'english' => 'Now',            'part_of_speech' => 'adverb','example_ko' => '지금 몇 시예요?', 'example_as' => 'এতিয়া কেইটা বাজিছে?','example_en' => 'What time is it now?'],
            ['korean' => '시간',   'romanization' => 'sigan',    'assamese' => 'সময় / ঘণ্টা',   'english' => 'Time / Hour',    'part_of_speech' => 'noun',  'example_ko' => '시간이 없어요.',    'example_as' => 'সময় নাই।', 'example_en' => 'I have no time.'],
            ['korean' => '분',     'romanization' => 'bun',      'assamese' => 'মিনিট',          'english' => 'Minute',         'part_of_speech' => 'noun',  'example_ko' => '30분 후에 와요.', 'example_as' => '৩০ মিনিটৰ পিছত আহিব।','example_en' => 'Come after 30 minutes.'],
            ['korean' => '아침',   'romanization' => 'achim',    'assamese' => 'ৰাতিপুৱা',       'english' => 'Morning',        'part_of_speech' => 'noun',  'example_ko' => '아침에 일어나요.',  'example_as' => 'ৰাতিপুৱা উঠো।', 'example_en' => 'I wake up in the morning.'],
            ['korean' => '저녁',   'romanization' => 'jeonyeok', 'assamese' => 'সন্ধিয়া',       'english' => 'Evening',        'part_of_speech' => 'noun',  'example_ko' => null, 'example_as' => null, 'example_en' => null],
        ];

        foreach ($entries as $e) {
            Vocabulary::create(array_merge($e, ['level' => 'beginner']));
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // VOCABULARY — PLACES (장소)
    // ─────────────────────────────────────────────────────────────────────────

    private function seedPlacesVocabulary(): void
    {
        $entries = [
            ['korean' => '학교',   'romanization' => 'hakgyo',    'assamese' => 'বিদ্যালয়',      'english' => 'School',         'part_of_speech' => 'noun', 'example_ko' => '학교에 가요.',       'example_as' => 'বিদ্যালয়লৈ যাওঁ।',  'example_en' => 'I go to school.'],
            ['korean' => '집',     'romanization' => 'jip',       'assamese' => 'ঘৰ',             'english' => 'House / Home',   'part_of_speech' => 'noun', 'example_ko' => '집에 있어요.',       'example_as' => 'ঘৰত আছো।',            'example_en' => 'I am at home.'],
            ['korean' => '병원',   'romanization' => 'byeongwon', 'assamese' => 'চিকিৎসালয়',     'english' => 'Hospital',       'part_of_speech' => 'noun', 'example_ko' => '병원에 가야 해요.',  'example_as' => 'চিকিৎসালয়লৈ যাব লাগিব।','example_en' => 'I need to go to the hospital.'],
            ['korean' => '식당',   'romanization' => 'sikdang',   'assamese' => 'ভোজনালয়',       'english' => 'Restaurant',     'part_of_speech' => 'noun', 'example_ko' => '식당이 맛있어요.',  'example_as' => 'ভোজনালয়খন সুস্বাদু।',  'example_en' => 'The restaurant is delicious.'],
            ['korean' => '편의점', 'romanization' => 'pyeonuijeom','assamese' => 'সুবিধাজনক দোকান','english' => 'Convenience store','part_of_speech' => 'noun','example_ko' => '편의점에서 샀어요.','example_as' => 'সুবিধাজনক দোকানৰ পৰা কিনিলো।','example_en' => 'I bought it at a convenience store.'],
            ['korean' => '지하철', 'romanization' => 'jihacheol', 'assamese' => 'মেট্ৰো',         'english' => 'Subway / Metro', 'part_of_speech' => 'noun', 'example_ko' => '지하철 타요.',      'example_as' => 'মেট্ৰো চলো।',          'example_en' => 'I take the subway.'],
            ['korean' => '공원',   'romanization' => 'gongwon',   'assamese' => 'উদ্যান',         'english' => 'Park',           'part_of_speech' => 'noun', 'example_ko' => '공원에서 쉬어요.',  'example_as' => 'উদ্যানত বিশ্ৰাম লওঁ।', 'example_en' => 'I rest at the park.'],
            ['korean' => '서점',   'romanization' => 'seojeom',   'assamese' => 'কিতাপৰ দোকান',  'english' => 'Bookstore',      'part_of_speech' => 'noun', 'example_ko' => null, 'example_as' => null, 'example_en' => null],
        ];

        foreach ($entries as $e) {
            Vocabulary::create(array_merge($e, ['level' => 'beginner']));
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // VOCABULARY — COLOURS (색깔)
    // ─────────────────────────────────────────────────────────────────────────

    private function seedColoursVocabulary(): void
    {
        $entries = [
            ['korean' => '빨간색', 'romanization' => 'ppalgansaek', 'assamese' => 'ৰঙা',   'english' => 'Red',    'part_of_speech' => 'noun', 'example_ko' => '빨간 사과예요.',  'example_as' => 'ৰঙা আপেল।',   'example_en' => 'It is a red apple.'],
            ['korean' => '파란색', 'romanization' => 'paransaek',   'assamese' => 'নীলা',  'english' => 'Blue',   'part_of_speech' => 'noun', 'example_ko' => '파란 하늘이에요.','example_as' => 'নীলা আকাশ।',  'example_en' => 'It is a blue sky.'],
            ['korean' => '노란색', 'romanization' => 'noransaek',   'assamese' => 'হালধীয়া','english' => 'Yellow','part_of_speech' => 'noun', 'example_ko' => null, 'example_as' => null, 'example_en' => null],
            ['korean' => '흰색',   'romanization' => 'huinsaek',    'assamese' => 'বগা',   'english' => 'White',  'part_of_speech' => 'noun', 'example_ko' => '흰 옷을 입어요.', 'example_as' => 'বগা কাপোৰ পিন্ধো।','example_en' => 'I wear white clothes.'],
            ['korean' => '검은색', 'romanization' => 'geomeunsaek', 'assamese' => 'কলা',   'english' => 'Black',  'part_of_speech' => 'noun', 'example_ko' => null, 'example_as' => null, 'example_en' => null],
            ['korean' => '초록색', 'romanization' => 'choroksaek',  'assamese' => 'সেউজীয়া','english' => 'Green','part_of_speech' => 'noun', 'example_ko' => '초록 나무예요.',  'example_as' => 'সেউজীয়া গছ।','example_en' => 'It is a green tree.'],
        ];

        foreach ($entries as $e) {
            Vocabulary::create(array_merge($e, ['level' => 'beginner']));
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // GRAMMAR POINTS — standalone reference
    // ─────────────────────────────────────────────────────────────────────────

    private function seedGrammarPoints(): void
    {
        $points = [
            [
                'title_ko' => '에 가다 / 에 있다',
                'title_en' => 'Location Marker — 에',
                'title_as' => 'স্থান চিহ্ন — 에',
                'pattern_formula' => '[Place] + 에 + 가다/오다/있다',
                'explanation_en' => '에 marks a destination (with movement verbs: 가다 go, 오다 come) or a static location (with 있다 exist/be). It is the Korean equivalent of "to" or "at/in."',
                'explanation_as' => '에 গন্তব্য (গতি ক্ৰিয়াৰ সৈতে: 가다 যোৱা, 오다 অহা) বা স্থিৰ স্থান (있다ৰ সৈতে) চিহ্নিত কৰে।',
                'level' => 'beginner',
                'category' => 'particle',
                'examples' => [
                    ['korean' => '학교에 가요.', 'romanization' => 'hakgyoe gayo', 'assamese' => 'বিদ্যালয়লৈ যাওঁ।', 'english' => 'I go to school.', 'audio_id' => null],
                    ['korean' => '집에 있어요.', 'romanization' => 'jibe isseoyo', 'assamese' => 'ঘৰত আছো।', 'english' => 'I am at home.', 'audio_id' => null],
                    ['korean' => '서울에 왔어요.', 'romanization' => 'seoure wasseoyo', 'assamese' => 'ছিউললৈ আহিলো।', 'english' => 'I came to Seoul.', 'audio_id' => null],
                ],
            ],
            [
                'title_ko' => '을/를 (목적격 조사)',
                'title_en' => 'Object Marker — 을/를',
                'title_as' => 'কৰ্ম চিহ্ন — 을/를',
                'pattern_formula' => '[Noun] + 을 (after consonant) / 를 (after vowel)',
                'explanation_en' => 'The object marker attaches to the direct object of a verb — the thing receiving the action. 을 follows nouns ending in consonants, 를 follows nouns ending in vowels.',
                'explanation_as' => 'কৰ্ম চিহ্ন ক্ৰিয়াৰ প্ৰত্যক্ষ কৰ্মত লগ লাগে। ব্যঞ্জনৰ পিছত 을, স্বৰৰ পিছত 를।',
                'level' => 'beginner',
                'category' => 'particle',
                'examples' => [
                    ['korean' => '밥을 먹어요.', 'romanization' => 'babeul meogeoyo', 'assamese' => 'ভাত খাওঁ।', 'english' => 'I eat rice.', 'audio_id' => null],
                    ['korean' => '물을 마셔요.', 'romanization' => 'mureul masyeoyo', 'assamese' => 'পানী খাওঁ।', 'english' => 'I drink water.', 'audio_id' => null],
                    ['korean' => '음악을 들어요.', 'romanization' => 'eumageul deureoyo', 'assamese' => 'গান শুনো।', 'english' => 'I listen to music.', 'audio_id' => null],
                ],
            ],
            [
                'title_ko' => '아/어요 (현재 시제)',
                'title_en' => 'Present Tense — 아/어요',
                'title_as' => 'বৰ্তমান কাল — 아/어요',
                'pattern_formula' => '[Verb stem] + 아요 (bright vowel) / 어요 (dark vowel)',
                'explanation_en' => 'The informal polite present tense ending. If the last vowel in the verb stem is ㅏ or ㅗ (bright vowels), add 아요. For all other vowels (dark vowels), add 어요. This is the most common speech level for everyday conversation.',
                'explanation_as' => 'অনানুষ্ঠানিক ভদ্ৰ বৰ্তমান কালৰ শেষাংশ। ক্ৰিয়া মূলৰ শেষ স্বৰ ㅏ বা ㅗ হলে 아요, বাকী সকলোৰ বাবে 어요।',
                'level' => 'beginner',
                'category' => 'verb-ending',
                'examples' => [
                    ['korean' => '먹어요. (먹다)', 'romanization' => 'meogeoyo', 'assamese' => 'খাওঁ।', 'english' => 'I eat. (to eat)', 'audio_id' => null],
                    ['korean' => '가요. (가다)',   'romanization' => 'gayo',     'assamese' => 'যাওঁ।', 'english' => 'I go. (to go)',  'audio_id' => null],
                    ['korean' => '봐요. (보다)',   'romanization' => 'bwayo',    'assamese' => 'চাওঁ।', 'english' => 'I see. (to see)', 'audio_id' => null],
                ],
            ],
            [
                'title_ko' => '고 싶다 (원하다)',
                'title_en' => 'Want to — 고 싶다',
                'title_as' => 'কৰিব বিচাৰো — 고 싶다',
                'pattern_formula' => '[Verb stem] + 고 싶어요',
                'explanation_en' => 'Expresses a desire to do something. Attach 고 싶어요 directly to the verb stem (remove 다 from the dictionary form). This is one of the most frequently used expressions in daily Korean.',
                'explanation_as' => 'কিবা কৰাৰ ইচ্ছা প্ৰকাশ কৰে। ক্ৰিয়া মূলৰ (শব্দকোষ ৰূপৰ পৰা 다 আঁতৰাই) পিছত 고 싶어요 লগ লাগে।',
                'level' => 'beginner',
                'category' => 'verb-ending',
                'examples' => [
                    ['korean' => '한국에 가고 싶어요.', 'romanization' => 'hanguee gago sipeoyo', 'assamese' => 'কোৰিয়ালৈ যাব বিচাৰো।', 'english' => 'I want to go to Korea.', 'audio_id' => null],
                    ['korean' => '김치를 먹고 싶어요.', 'romanization' => 'kimchireul meokgo sipeoyo', 'assamese' => 'কিমচি খাব বিচাৰো।', 'english' => 'I want to eat kimchi.', 'audio_id' => null],
                ],
            ],
            [
                'title_ko' => '있어요 / 없어요',
                'title_en' => 'Existence — 있어요 / 없어요',
                'title_as' => 'অস্তিত্ব — 있어요 / 없어요',
                'pattern_formula' => '[Subject] + 이/가 + 있어요 (exists) / 없어요 (does not exist)',
                'explanation_en' => '있어요 means "there is / I have" and 없어요 means "there is not / I do not have." They are also used to describe someone\'s location (있어요 = is at a place).',
                'explanation_as' => '있어요 মানে "আছে / মোৰ আছে" আৰু 없어요 মানে "নাই / মোৰ নাই।"',
                'level' => 'beginner',
                'category' => 'verb-ending',
                'examples' => [
                    ['korean' => '시간이 있어요?',  'romanization' => 'sigani isseoyo',  'assamese' => 'সময় আছেনে?',    'english' => 'Do you have time?',      'audio_id' => null],
                    ['korean' => '돈이 없어요.',    'romanization' => 'doni eopseoyo',   'assamese' => 'টকা নাই।',       'english' => 'I have no money.',       'audio_id' => null],
                    ['korean' => '오빠가 집에 있어요.','romanization' => 'oppaga jibe isseoyo','assamese' => 'দাদা ঘৰত আছে।','english' => 'Older brother is at home.','audio_id' => null],
                ],
            ],
            [
                'title_ko' => '-(으)ㄹ 수 있다/없다',
                'title_en' => 'Ability — can / cannot',
                'title_as' => 'ক্ষমতা — পাৰো / নোৱাৰো',
                'pattern_formula' => '[Verb stem] + (으)ㄹ 수 있어요 / 없어요',
                'explanation_en' => 'Expresses ability or possibility. Add ㄹ 수 있어요 after verb stems ending in vowels, and 을 수 있어요 after consonant-ending stems.',
                'explanation_as' => 'ক্ষমতা বা সম্ভাৱনা প্ৰকাশ কৰে। স্বৰেৰে শেষ হোৱা মূলৰ পিছত ㄹ 수 있어요, ব্যঞ্জনৰ পিছত 을 수 있어요।',
                'level' => 'intermediate',
                'category' => 'verb-ending',
                'examples' => [
                    ['korean' => '한국어를 할 수 있어요.', 'romanization' => 'hangugeoreul hal su isseoyo', 'assamese' => 'মই কোৰিয়ান ক\'ব পাৰো।', 'english' => 'I can speak Korean.', 'audio_id' => null],
                    ['korean' => '수영을 할 수 없어요.',   'romanization' => 'suyeongeul hal su eopseoyo',  'assamese' => 'মই সাঁতুৰিব নোৱাৰো।',  'english' => 'I cannot swim.',      'audio_id' => null],
                ],
            ],
            [
                'title_ko' => '-고 있다 (진행)',
                'title_en' => 'Progressive — -고 있다',
                'title_as' => 'চলমান ক্ৰিয়া — -고 있다',
                'pattern_formula' => '[Verb stem] + 고 있어요',
                'explanation_en' => 'The Korean progressive tense — equivalent to the English "-ing" form. Describes an action currently in progress.',
                'explanation_as' => 'কোৰিয়ান চলমান কাল — ইংৰাজী "-ing" ৰূপৰ সমতুল্য। বৰ্তমানে চলি থকা ক্ৰিয়া বৰ্ণনা কৰে।',
                'level' => 'beginner',
                'category' => 'verb-ending',
                'examples' => [
                    ['korean' => '공부하고 있어요.', 'romanization' => 'gongbuhago isseoyo', 'assamese' => 'পঢ়ি আছো।',      'english' => 'I am studying.',  'audio_id' => null],
                    ['korean' => '밥을 먹고 있어요.', 'romanization' => 'babeul meokgo isseoyo','assamese' => 'ভাত খাই আছো।','english' => 'I am eating rice.','audio_id' => null],
                ],
            ],
            [
                'title_ko' => '-(으)세요 (공손한 명령)',
                'title_en' => 'Polite Command — -(으)세요',
                'title_as' => 'ভদ্ৰ আদেশ — -(으)세요',
                'pattern_formula' => '[Verb stem] + (으)세요',
                'explanation_en' => 'Forms a polite request or command. After verb stems ending in vowels, add 세요. After consonant-ending stems, add 으세요.',
                'explanation_as' => 'ভদ্ৰ অনুৰোধ বা আদেশ গঠন কৰে। স্বৰেৰে শেষ হোৱা মূলৰ পিছত 세요, ব্যঞ্জনৰ পিছত 으세요।',
                'level' => 'beginner',
                'category' => 'verb-ending',
                'examples' => [
                    ['korean' => '앉으세요.',     'romanization' => 'anjeuseyo',    'assamese' => 'বহক।',        'english' => 'Please sit down.', 'audio_id' => null],
                    ['korean' => '천천히 드세요.', 'romanization' => 'cheoncheonhi deuseyo','assamese' => 'লাহে খাওক।','english' => 'Please eat slowly.','audio_id' => null],
                ],
            ],
            [
                'title_ko' => '도 (포함)',
                'title_en' => 'Inclusive Particle — 도',
                'title_as' => 'অন্তৰ্ভুক্তি কণা — 도',
                'pattern_formula' => '[Noun] + 도',
                'explanation_en' => '도 means "also / too / as well." It replaces 은/는, 이/가, and 을/를 when adding something to what was already mentioned.',
                'explanation_as' => '도 মানে "ও / এইটোও।" ইতিমধ্যে উল্লেখ কৰা কিবাত কিবা যোগ কৰোঁতে এই কণা ব্যৱহাৰ হয়।',
                'level' => 'beginner',
                'category' => 'particle',
                'examples' => [
                    ['korean' => '저도 학생이에요.', 'romanization' => 'jeodo haksaengieyo', 'assamese' => 'মোও ছাত্র।',       'english' => 'I am also a student.', 'audio_id' => null],
                    ['korean' => '이것도 주세요.',   'romanization' => 'igeotdo juseyo',     'assamese' => 'এইটোও দিয়ক।',     'english' => 'Give me this one too.', 'audio_id' => null],
                ],
            ],
            [
                'title_ko' => '한테/에게 (간접 목적어)',
                'title_en' => 'Indirect Object — 한테/에게',
                'title_as' => 'পৰোক্ষ কৰ্ম — 한테/에게',
                'pattern_formula' => '[Person/Animal] + 한테 (spoken) / 에게 (written)',
                'explanation_en' => 'Marks the indirect object — the person or animal to whom something is given or said. 한테 is used in spoken language; 에게 in formal writing.',
                'explanation_as' => 'পৰোক্ষ কৰ্ম চিহ্নিত কৰে — যাক কিবা দিয়া বা কোৱা হয়। 한테 মৌখিক ভাষাত, 에게 আনুষ্ঠানিক লেখাত।',
                'level' => 'intermediate',
                'category' => 'particle',
                'examples' => [
                    ['korean' => '친구한테 선물을 줬어요.', 'romanization' => 'chinguhante seonmureul jwosseoyo', 'assamese' => 'বন্ধুক উপহাৰ দিলো।', 'english' => 'I gave a gift to a friend.', 'audio_id' => null],
                    ['korean' => '선생님에게 물어보세요.',   'romanization' => 'seonsaengnimege mureoboseyo',     'assamese' => 'শিক্ষকক সোধক।',       'english' => 'Ask the teacher.',          'audio_id' => null],
                ],
            ],
        ];

        foreach ($points as $p) {
            GrammarPoint::create($p);
        }
    }

    // ─────────────────────────────────────────────────────────────────────────
    // CONVERSATIONS — standalone library
    // ─────────────────────────────────────────────────────────────────────────

    private function seedStandaloneConversations(): void
    {
        $this->createConversation(
            title_ko: '카페에서',
            title_en: 'At the Café',
            title_as: 'কেফেত',
            scene_en: 'A customer orders coffee at a Korean café.',
            scene_as: 'এগৰাকী গ্ৰাহকে এটা কোৰিয়ান কেফেত কফি অৰ্ডাৰ কৰে।',
            level: 'beginner',
            speakers: [['label' => 'Customer', 'gender' => 'female'], ['label' => 'Staff', 'gender' => 'male']],
            lines: [
                ['Customer', '안녕하세요! 아메리카노 한 잔 주세요.', 'Annyeonghaseyo! Amerikano han jan juseyo.', 'নমস্কাৰ! এক কাপ আমেৰিকানো দিয়ক।', 'Hello! One Americano please.'],
                ['Staff',    '네, 사이즈가 어떻게 되세요?',          'Ne, saijeuga eotteoke doeseyo?',          'হয়, কোনটো আকাৰ বিচাৰে?',           'Yes, what size would you like?'],
                ['Customer', '큰 사이즈로 주세요.',                   'Keun saijeuro juseyo.',                    'ডাঙৰ আকাৰৰটো দিয়ক।',               'Give me the large size please.'],
                ['Staff',    '뜨거운 걸로 드릴까요, 아이스로 드릴까요?','Ddeugeoun geollo deurilkkayo, aiseuro deurilkkayo?','গৰম দিওঁ নে ঠাণ্ডা?',     'Would you like it hot or iced?'],
                ['Customer', '아이스로 주세요.',                      'Aiseuro juseyo.',                          'ঠাণ্ডাটো দিয়ক।',                   'Iced please.'],
                ['Staff',    '오천오백 원입니다. 잠시만 기다려 주세요.','Ocheon obaek wonipnida. Jamsiman gidaryeo juseyo.','৫,৫০০ ৱন হ\'ল। অলপ অপেক্ষা কৰক।','That\'s 5,500 won. Please wait a moment.'],
            ]
        );

        $this->createConversation(
            title_ko: '교실에서',
            title_en: 'In the Classroom',
            title_as: 'শ্ৰেণীকক্ষত',
            scene_en: 'A student asks the teacher a question about homework.',
            scene_as: 'এজন ছাত্ৰই শিক্ষকক গৃহকাৰ্যৰ বিষয়ে প্ৰশ্ন সোধে।',
            level: 'beginner',
            speakers: [['label' => 'Student', 'gender' => 'male'], ['label' => 'Teacher', 'gender' => 'female']],
            lines: [
                ['Student', '선생님, 질문이 있어요.',             'Seonsaengnim, jilmuni isseoyo.',            'শিক্ষক, এটা প্ৰশ্ন আছে।',              'Teacher, I have a question.'],
                ['Teacher', '네, 말해 보세요.',                  'Ne, malhae boseyo.',                        'হয়, কওক।',                             'Yes, go ahead.'],
                ['Student', '숙제를 언제까지 해야 해요?',         'Sukjereul eonjejkkaji haeya haeyo?',        'গৃহকাৰ্য কেতিয়ালৈ কৰিব লাগিব?',       'By when do I need to finish the homework?'],
                ['Teacher', '다음 주 월요일까지예요.',             'Daeum ju woryoilkkajiyeyo.',                'আহিলা সপ্তাহৰ সোমবাৰলৈকে।',           'By next Monday.'],
                ['Student', '알겠습니다. 감사합니다, 선생님!',    'Algesseumnida. Gamsahamnida, seonsaengnim!','বুজিলো। ধন্যবাদ, শিক্ষক!',             'I understand. Thank you, teacher!'],
                ['Teacher', '열심히 하세요!',                    'Yeolsimhi haseyo!',                         'ভালদৰে কৰিব!',                          'Do your best!'],
            ]
        );

        $this->createConversation(
            title_ko: '전화 통화',
            title_en: 'Phone Conversation',
            title_as: 'ফোন কথোপকথন',
            scene_en: 'Two friends make plans to meet over the phone.',
            scene_as: 'দুজন বন্ধুৱে ফোনত লগ পোৱাৰ পৰিকল্পনা কৰে।',
            level: 'beginner',
            speakers: [['label' => 'A', 'gender' => 'female'], ['label' => 'B', 'gender' => 'male']],
            lines: [
                ['A', '여보세요?',                           'Yeoboseyo?',                              'হেল\'?',                                  'Hello?'],
                ['B', '안녕! 지금 뭐 해?',                   'Annyeong! Jigeum mwo hae?',               'হেই! এতিয়া কি কৰিছ?',                   'Hey! What are you doing now?'],
                ['A', '집에서 공부하고 있어. 왜?',            'Jibeseo gongbuhago isseo. Wae?',           'ঘৰত পঢ়ি আছো। কিয়?',                    'I am studying at home. Why?'],
                ['B', '오늘 저녁에 영화 볼래?',               'Oneul jeonyeoge yeonghwa bollae?',         'আজি সন্ধিয়া চিনেমা চাবি নেকি?',          'Want to watch a movie tonight?'],
                ['A', '좋아! 몇 시에 만날까?',               'Joa! Myeot sie mannalka?',                 'ভাল! কেইটা বাজিলে লগ পাবো?',             'Great! What time shall we meet?'],
                ['B', '7시에 영화관 앞에서 만나자!',          'Ilgopssie yeonghwagwan apeseo mannaja!',   'সাতটাত চিনেমা হলৰ সামনেত লগ পাওঁ!',    'Let\'s meet in front of the cinema at 7!'],
                ['A', '알겠어. 이따가 봐!',                  'Algeseo. Ittaga bwa!',                     'ঠিক আছে। পাছত লগ পাওঁ!',                 'Got it. See you later!'],
            ]
        );
    }

    private function createConversation(
        string $title_ko, string $title_en, string $title_as,
        string $scene_en, string $scene_as, string $level,
        array $speakers, array $lines
    ): Conversation {
        $conv = Conversation::create([
            'title_ko' => $title_ko, 'title_en' => $title_en, 'title_as' => $title_as,
            'scene_en' => $scene_en, 'scene_as' => $scene_as,
            'level'    => $level,    'speakers'  => $speakers,
        ]);

        foreach ($lines as $i => [$speaker, $ko, $roman, $as, $en]) {
            ConversationLine::create([
                'conversation_id' => $conv->id,
                'order_index'     => $i,
                'speaker_label'   => $speaker,
                'text_ko'         => $ko,
                'romanization'    => $roman,
                'translation_as'  => $as,
                'translation_en'  => $en,
            ]);
        }

        return $conv;
    }

    // ─────────────────────────────────────────────────────────────────────────
    // CULTURAL NOTES — standalone
    // ─────────────────────────────────────────────────────────────────────────

    private function seedStandaloneCulturalNotes(): void
    {
        CulturalNote::create([
            'title_en' => 'Honorific Speech Levels in Korean',
            'title_as' => 'কোৰিয়ান ভাষাত সন্মানজনক ভাষণ স্তৰ',
            'body_en'  => 'Korean has a complex speech level system based on social relationships. The main levels you need are: 합쇼체 (habjoche) — formal polite, used in news, presentations, and with strangers; 해요체 (haeyoche) — informal polite, the most common everyday level; and 해체 (haechae) — informal/casual, used only with close friends and younger people. As a learner, 해요체 is your default — it is universally polite without being overly formal.',
            'body_as'  => 'কোৰিয়ান ভাষাত সামাজিক সম্পৰ্কৰ ওপৰত ভিত্তি কৰি এটা জটিল ভাষণ স্তৰ পদ্ধতি আছে। মূল তিনিটা স্তৰ: 합쇼체 — আনুষ্ঠানিক ভদ্ৰ; 해요체 — অনানুষ্ঠানিক ভদ্ৰ (সবচেয়ে সাধাৰণ); 해체 — ঘনিষ্ঠ বন্ধু আৰু সৰুসকলৰ বাবে। শিক্ষাৰ্থী হিচাপে 해요체 ব্যৱহাৰ কৰক।',
            'category' => 'language',
        ]);

        CulturalNote::create([
            'title_en' => 'Kimchi — Culture on the Table',
            'title_as' => 'কিমচি — খাদ্য পৰম্পৰা',
            'body_en'  => 'Kimchi (김치) is fermented vegetables — most commonly cabbage — seasoned with chili, garlic, ginger, and salt. It is served at virtually every Korean meal as a side dish (반찬). Korea has over 200 varieties of kimchi. In 2013, the tradition of making and sharing kimchi (Kimjang) was inscribed on the UNESCO Intangible Cultural Heritage list. For Assamese students, kimchi may feel similar in spirit to fermented bamboo shoot dishes — both are preserved vegetables central to their respective food cultures.',
            'body_as'  => 'কিমচি (김치) হৈছে গাঁজি দিয়া পাচলি — সাধাৰণতে বান্ধাকবি — জলকীয়া, নহৰু, আদা আৰু নিমখেৰে মশলা দিয়া। প্ৰতিটো কোৰিয়ান আহাৰত পাৰ্শ্ব ব্যঞ্জন (반찬) হিচাপে পৰিবেশন কৰা হয়। ২০১৩ত কিমজাং (কিমচি বনোৱাৰ পৰম্পৰা) UNESCO অস্পৃশ্য সাংস্কৃতিক ঐতিহ্যৰ তালিকাত অন্তৰ্ভুক্ত হ\'ল।',
            'category' => 'food',
        ]);

        CulturalNote::create([
            'title_en' => 'The Korean Age System',
            'title_as' => 'কোৰিয়ান বয়স গণনা পদ্ধতি',
            'body_en'  => 'Traditionally Korea used a unique age system: everyone is 1 year old at birth, and everyone turns a year older on New Year\'s Day — not on their birthday. Under this system, a baby born on December 31st becomes 2 years old the very next day. South Korea officially transitioned to the international age system in June 2023, but the traditional system is still used in some cultural and legal contexts. When a Korean asks 몇 살이에요? (How old are you?), they may mean either system — so it is worth knowing both your Korean age and your international age.',
            'body_as'  => 'পৰম্পৰাগতভাৱে কোৰিয়াত এক অনন্য বয়স পদ্ধতি আছিল: জন্মৰ সময়ত সকলো ১ বছৰ বয়সী, আৰু সকলোৱে নতুন বছৰৰ দিনা এক বছৰ ডাঙৰ হয়। দক্ষিণ কোৰিয়াই ২০২৩ চনৰ জুন মাহত আন্তৰ্জাতিক বয়স পদ্ধতিলৈ আনুষ্ঠানিকভাৱে পৰিৱৰ্তন কৰিলে।',
            'category' => 'tradition',
        ]);
    }
}
