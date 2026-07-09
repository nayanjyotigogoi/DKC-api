<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Learning\LearningModule;
use App\Models\Learning\Lesson;
use App\Models\Learning\Vocabulary;
use App\Models\Learning\GrammarPoint;
use App\Models\Learning\Conversation;
use App\Models\Learning\ConversationLine;
use App\Models\Learning\CulturalNote;
use App\Models\Learning\QuizQuestion;

/**
 * Seeds one complete Beginner module with two fully-populated lessons.
 *
 * Content:
 *   Module 1 — Beginner Korean
 *     Lesson 1 — Greetings & Introductions (안녕하세요)
 *     Lesson 2 — Numbers & Basic Counting (숫자)
 *
 * Every lesson has:
 *   - 8 vocabulary entries
 *   - 2 grammar points
 *   - 1 conversation (with 6 lines)
 *   - 1 cultural note
 *   - 5 quiz questions (mix of types)
 *
 * No audio is seeded — audio files are managed through the admin panel.
 */
class LearningSeeder extends Seeder
{
    public function run(): void
    {
        // ─── Module ──────────────────────────────────────────────────────────

        $module = LearningModule::create([
            'title_en'    => 'Beginner Korean — Module 1',
            'title_as'    => 'আৰম্ভণিৰ কোৰিয়ান — মডিউল ১',
            'level'       => 'beginner',
            'order_index' => 1,
            'status'      => 'published',
        ]);

        // ─── Lesson 1 — Greetings & Introductions ────────────────────────────

        $lesson1 = Lesson::create([
            'module_id'    => $module->id,
            'title_en'     => 'Greetings & Introductions',
            'title_as'     => 'অভিনন্দন আৰু পৰিচয়',
            'slug'         => 'greetings-and-introductions',
            'level'        => 'beginner',
            'order_index'  => 1,
            'status'       => 'published',
            'published_at' => now(),
        ]);

        $vocab1 = $this->seedLesson1Vocabulary();
        $grammar1 = $this->seedLesson1Grammar();
        $conv1 = $this->seedLesson1Conversation();
        $note1 = $this->seedLesson1CulturalNote();
        $quiz1 = $this->seedLesson1Quiz();

        // Attach to lesson with order
        $lesson1->vocabulary()->attach($vocab1->mapWithKeys(fn ($v, $i) => [$v->id => ['order_index' => $i]])->all());
        $lesson1->grammar()->attach($grammar1->mapWithKeys(fn ($g, $i) => [$g->id => ['order_index' => $i]])->all());
        $lesson1->conversations()->attach([$conv1->id => ['order_index' => 0]]);
        $lesson1->culturalNotes()->attach([$note1->id => ['order_index' => 0]]);
        $lesson1->quizQuestions()->attach($quiz1->mapWithKeys(fn ($q, $i) => [$q->id => ['order_index' => $i]])->all());

        // ─── Lesson 2 — Numbers & Basic Counting ─────────────────────────────

        $lesson2 = Lesson::create([
            'module_id'    => $module->id,
            'title_en'     => 'Numbers & Basic Counting',
            'title_as'     => 'সংখ্যা আৰু গণনা',
            'slug'         => 'numbers-and-basic-counting',
            'level'        => 'beginner',
            'order_index'  => 2,
            'status'       => 'published',
            'published_at' => now(),
        ]);

        $vocab2 = $this->seedLesson2Vocabulary();
        $grammar2 = $this->seedLesson2Grammar();
        $conv2 = $this->seedLesson2Conversation();
        $note2 = $this->seedLesson2CulturalNote();
        $quiz2 = $this->seedLesson2Quiz();

        $lesson2->vocabulary()->attach($vocab2->mapWithKeys(fn ($v, $i) => [$v->id => ['order_index' => $i]])->all());
        $lesson2->grammar()->attach($grammar2->mapWithKeys(fn ($g, $i) => [$g->id => ['order_index' => $i]])->all());
        $lesson2->conversations()->attach([$conv2->id => ['order_index' => 0]]);
        $lesson2->culturalNotes()->attach([$note2->id => ['order_index' => 0]]);
        $lesson2->quizQuestions()->attach($quiz2->mapWithKeys(fn ($q, $i) => [$q->id => ['order_index' => $i]])->all());

        // ─── Also update roles seeder: add learning roles ─────────────────────
        $this->seedLearningRoles();
    }

    // ─────────────────────────────────────────────────────────────────────────
    // LESSON 1 — GREETINGS
    // ─────────────────────────────────────────────────────────────────────────

    private function seedLesson1Vocabulary(): \Illuminate\Support\Collection
    {
        $entries = [
            ['korean' => '안녕하세요',   'romanization' => 'annyeonghaseyo',  'assamese' => 'নমস্কাৰ',          'english' => 'Hello (formal)',         'part_of_speech' => 'expression', 'level' => 'beginner'],
            ['korean' => '안녕',         'romanization' => 'annyeong',        'assamese' => 'হেই / বাই',         'english' => 'Hi / Bye (informal)',    'part_of_speech' => 'expression', 'level' => 'beginner'],
            ['korean' => '감사합니다',   'romanization' => 'gamsahamnida',    'assamese' => 'ধন্যবাদ',           'english' => 'Thank you (formal)',     'part_of_speech' => 'expression', 'level' => 'beginner'],
            ['korean' => '죄송합니다',   'romanization' => 'joesonghamnida',  'assamese' => 'মাফ কৰিব',          'english' => 'I am sorry (formal)',    'part_of_speech' => 'expression', 'level' => 'beginner'],
            ['korean' => '이름',         'romanization' => 'ireum',           'assamese' => 'নাম',               'english' => 'Name',                   'part_of_speech' => 'noun',       'level' => 'beginner',
             'example_ko' => '제 이름은 민수예요.', 'example_as' => 'মোৰ নাম মিনছু।', 'example_en' => 'My name is Minsoo.'],
            ['korean' => '저',           'romanization' => 'jeo',             'assamese' => 'মই (বিনীত)',        'english' => 'I / Me (humble)',        'part_of_speech' => 'pronoun',    'level' => 'beginner'],
            ['korean' => '만나서 반갑습니다', 'romanization' => 'mannaseo bangapseumnida', 'assamese' => 'আপোনাক লগ পাই ভাল লাগিল', 'english' => 'Nice to meet you', 'part_of_speech' => 'expression', 'level' => 'beginner'],
            ['korean' => '네',           'romanization' => 'ne',              'assamese' => 'হয়',               'english' => 'Yes',                    'part_of_speech' => 'interjection', 'level' => 'beginner'],
        ];

        return collect($entries)->map(fn ($e) => Vocabulary::create($e));
    }

    private function seedLesson1Grammar(): \Illuminate\Support\Collection
    {
        $points = [
            [
                'title_ko'        => '이에요 / 예요',
                'title_en'        => 'To be (이에요 / 예요)',
                'title_as'        => 'হওঁ / হয় (to be)',
                'pattern_formula' => '[Noun] + 이에요 (after consonant) / 예요 (after vowel)',
                'explanation_en'  => 'This is the informal polite form of the verb "to be." Use 이에요 after a noun ending in a consonant and 예요 after a noun ending in a vowel.',
                'explanation_as'  => 'এইটো "to be" ক্ৰিয়াৰ অনানুষ্ঠানিক ভদ্ৰ ৰূপ। ব্যঞ্জনৰ পিছত 이에요 আৰু স্বৰৰ পিছত 예요 ব্যৱহাৰ কৰক।',
                'level'           => 'beginner',
                'category'        => 'verb-ending',
                'examples'        => [
                    ['korean' => '저는 학생이에요.', 'romanization' => 'jeoneun haksaengieyo', 'assamese' => 'মই এজন ছাত্র।', 'english' => 'I am a student.', 'audio_id' => null],
                    ['korean' => '이것은 책이에요.', 'romanization' => 'igeoseun chaegieyo',  'assamese' => 'এইটো এখন কিতাপ।', 'english' => 'This is a book.', 'audio_id' => null],
                    ['korean' => '저는 의사예요.',   'romanization' => 'jeoneun uisayeyo',     'assamese' => 'মই এজন চিকিৎসক।', 'english' => 'I am a doctor.', 'audio_id' => null],
                ],
            ],
            [
                'title_ko'        => '은/는 (주제 조사)',
                'title_en'        => 'Topic Marker — 은/는',
                'title_as'        => 'বিষয় চিহ্ন — 은/는',
                'pattern_formula' => '[Noun] + 은 (after consonant) / 는 (after vowel)',
                'explanation_en'  => 'The topic marker identifies what the sentence is about. It is different from the subject — it often carries a nuance of contrast or emphasis. 은 is used after consonants and 는 after vowels.',
                'explanation_as'  => 'বিষয় চিহ্নে বাক্যটো কিহৰ বিষয়ে সেইটো চিনাক্ত কৰে। ব্যঞ্জনৰ পিছত 은 আৰু স্বৰৰ পিছত 는 ব্যৱহাৰ কৰক।',
                'level'           => 'beginner',
                'category'        => 'particle',
                'examples'        => [
                    ['korean' => '저는 한국 사람이에요.', 'romanization' => 'jeoneun hanguk saramieyo', 'assamese' => 'মই কোৰিয়ান।', 'english' => 'I am Korean.', 'audio_id' => null],
                    ['korean' => '이것은 뭐예요?',        'romanization' => 'igeoseun mwoyeyo',        'assamese' => 'এইটো কি?',      'english' => 'What is this?', 'audio_id' => null],
                ],
            ],
        ];

        return collect($points)->map(fn ($p) => GrammarPoint::create($p));
    }

    private function seedLesson1Conversation(): Conversation
    {
        $conv = Conversation::create([
            'title_ko'  => '처음 만남',
            'title_en'  => 'First Meeting',
            'title_as'  => 'প্ৰথম সাক্ষাৎ',
            'scene_en'  => 'Two students meet for the first time at Dibrugarh University.',
            'scene_as'  => 'ডিব্ৰুগড় বিশ্ববিদ্যালয়ত দুজন ছাত্ৰ প্ৰথমবাৰৰ বাবে লগ পায়।',
            'level'     => 'beginner',
            'speakers'  => [
                ['label' => 'A', 'gender' => 'female'],
                ['label' => 'B', 'gender' => 'male'],
            ],
        ]);

        $lines = [
            ['speaker_label' => 'A', 'text_ko' => '안녕하세요!',               'romanization' => 'Annyeonghaseyo!',            'translation_as' => 'নমস্কাৰ!',                         'translation_en' => 'Hello!'],
            ['speaker_label' => 'B', 'text_ko' => '안녕하세요! 만나서 반갑습니다.', 'romanization' => 'Annyeonghaseyo! Mannaseo bangapseumnida.', 'translation_as' => 'নমস্কাৰ! আপোনাক লগ পাই ভাল লাগিল।', 'translation_en' => 'Hello! Nice to meet you.'],
            ['speaker_label' => 'A', 'text_ko' => '저는 지수예요. 이름이 뭐예요?', 'romanization' => 'Jeoneun Jisuyeyo. Ireumi mwoyeyo?', 'translation_as' => 'মোৰ নাম জিছু। আপোনাৰ নাম কি?', 'translation_en' => 'I am Jisu. What is your name?'],
            ['speaker_label' => 'B', 'text_ko' => '저는 민준이에요.',             'romanization' => 'Jeoneun Minjunieyo.',          'translation_as' => 'মোৰ নাম মিনজুন।',                 'translation_en' => 'I am Minjun.'],
            ['speaker_label' => 'A', 'text_ko' => '반갑습니다, 민준 씨!',         'romanization' => 'Bangapseumnida, Minjun ssi!', 'translation_as' => 'লগ পাই ভাল লাগিল, মিনজুন চি!',   'translation_en' => 'Nice to meet you, Minjun!'],
            ['speaker_label' => 'B', 'text_ko' => '네, 저도 반가워요!',           'romanization' => 'Ne, jeodo bangawoyo!',        'translation_as' => 'হয়, মোও ভাল লাগিল!',              'translation_en' => 'Yes, I am glad to meet you too!'],
        ];

        foreach ($lines as $i => $line) {
            ConversationLine::create(array_merge($line, ['conversation_id' => $conv->id, 'order_index' => $i]));
        }

        return $conv;
    }

    private function seedLesson1CulturalNote(): CulturalNote
    {
        return CulturalNote::create([
            'title_en' => 'Bowing in Korean Culture',
            'title_as' => 'কোৰিয়ান সংস্কৃতিত মূৰ দোৱোৱা',
            'body_en'  => 'In Korea, bowing (고개를 숙이다) is the standard greeting, similar to the Assamese "নমস্কাৰ" with joined hands. The deeper the bow, the more respect it shows. A 15° bow is casual, 30° is respectful, and 45° is used for deep apologies or to elders. When meeting someone for the first time, a 30° bow with the phrase 만나서 반갑습니다 is appropriate.',
            'body_as'  => 'কোৰিয়াত মূৰ দোৱোৱা (고개를 숙이다) হৈছে মানক অভিনন্দন, অসমীয়া "নমস্কাৰ"ৰ দৰে। যিমান গভীৰকৈ মূৰ দোৱায়, সিমানেই বেছি সন্মান প্ৰকাশ পায়। ১৫° অনানুষ্ঠানিক, ৩০° সন্মানজনক, আৰু ৪৫° বয়ষ্কসকলৰ প্ৰতি গভীৰ ক্ষমাপ্রার্থনা বা সম্মানৰ বাবে ব্যৱহাৰ হয়।',
            'category' => 'etiquette',
        ]);
    }

    private function seedLesson1Quiz(): \Illuminate\Support\Collection
    {
        $questions = [
            [
                'type'           => 'multiple_choice',
                'question_text'  => 'Which expression means "Nice to meet you" in Korean?',
                'options'        => [
                    ['text' => '감사합니다', 'romanization' => 'gamsahamnida'],
                    ['text' => '만나서 반갑습니다', 'romanization' => 'mannaseo bangapseumnida'],
                    ['text' => '죄송합니다', 'romanization' => 'joesonghamnida'],
                    ['text' => '안녕히 가세요', 'romanization' => 'annyeonghi gaseyo'],
                ],
                'correct_index'  => 1,
                'explanation_en' => '만나서 반갑습니다 literally means "meeting you is pleasing." It is always used when meeting someone for the first time.',
                'explanation_as' => '만나서 반갑습니다ৰ আক্ষৰিক অৰ্থ "আপোনাক লগ পোৱাটো আনন্দজনক।" ই সদায় কাৰোবাক প্ৰথমবাৰ লগ পোৱাত ব্যৱহাৰ হয়।',
                'level'          => 'beginner',
            ],
            [
                'type'           => 'fill_in_blank',
                'question_text'  => '저___ 지수예요. (Fill in the topic marker)',
                'options'        => [
                    ['text' => '는'],
                    ['text' => '은'],
                    ['text' => '가'],
                    ['text' => '이'],
                ],
                'correct_index'  => 0,
                'explanation_en' => '저 (jeo) ends in a vowel (ㅓ), so the topic marker 는 is used. Use 은 after nouns ending in a consonant.',
                'explanation_as' => '저 স্বৰেৰে (ㅓ) শেষ হয়, সেয়েহে বিষয় চিহ্ন 는 ব্যৱহাৰ হয়। ব্যঞ্জনেৰে শেষ হোৱা বিশেষ্যৰ পিছত 은 ব্যৱহাৰ কৰক।',
                'level'          => 'beginner',
            ],
            [
                'type'           => 'multiple_choice',
                'question_text'  => 'How do you say "Thank you" (formal) in Korean?',
                'options'        => [
                    ['text' => '안녕하세요', 'romanization' => 'annyeonghaseyo'],
                    ['text' => '네', 'romanization' => 'ne'],
                    ['text' => '감사합니다', 'romanization' => 'gamsahamnida'],
                    ['text' => '저', 'romanization' => 'jeo'],
                ],
                'correct_index'  => 2,
                'explanation_en' => '감사합니다 (gamsahamnida) is the formal expression for "thank you." The informal version is 고마워 (gomawo).',
                'explanation_as' => '감사합니다 হৈছে "ধন্যবাদ"ৰ আনুষ্ঠানিক ৰূপ। অনানুষ্ঠানিক ৰূপ হৈছে 고마워।',
                'level'          => 'beginner',
            ],
            [
                'type'           => 'matching',
                'question_text'  => 'Match each Korean word to its Assamese meaning.',
                'options'        => [
                    ['text' => '안녕하세요 → নমস্কাৰ'],
                    ['text' => '이름 → নাম'],
                    ['text' => '네 → হয়'],
                    ['text' => '저 → মই'],
                ],
                'correct_index'  => 0,
                'explanation_en' => 'All four matches are correct. These are the four most essential words from this lesson.',
                'explanation_as' => 'চাৰিওটা মিলন শুদ্ধ। এইকেইটা এই পাঠৰ চাৰিটা অতি প্ৰয়োজনীয় শব্দ।',
                'level'          => 'beginner',
            ],
            [
                'type'           => 'multiple_choice',
                'question_text'  => 'Which form of "to be" is correct? 저는 학생___',
                'options'        => [
                    ['text' => '이에요', 'romanization' => 'ieyo'],
                    ['text' => '예요', 'romanization' => 'yeyo'],
                    ['text' => '에요', 'romanization' => 'eyo'],
                    ['text' => '이야', 'romanization' => 'iya'],
                ],
                'correct_index'  => 0,
                'explanation_en' => '학생 ends in the consonant ㅇ, so 이에요 is used. 예요 is used when the noun ends in a vowel.',
                'explanation_as' => '학생 ব্যঞ্জন ㅇৰে শেষ হয়, সেয়েহে 이에요 ব্যৱহাৰ হয়। স্বৰেৰে শেষ হোৱা বিশেষ্যৰ পিছত 예요 ব্যৱহাৰ কৰক।',
                'level'          => 'beginner',
            ],
        ];

        return collect($questions)->map(fn ($q) => QuizQuestion::create($q));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // LESSON 2 — NUMBERS
    // ─────────────────────────────────────────────────────────────────────────

    private function seedLesson2Vocabulary(): \Illuminate\Support\Collection
    {
        $entries = [
            ['korean' => '일',   'romanization' => 'il',     'assamese' => '১ (এক)',    'english' => 'One (Sino-Korean)',    'part_of_speech' => 'number', 'level' => 'beginner'],
            ['korean' => '이',   'romanization' => 'i',      'assamese' => '২ (দুই)',   'english' => 'Two (Sino-Korean)',    'part_of_speech' => 'number', 'level' => 'beginner'],
            ['korean' => '삼',   'romanization' => 'sam',    'assamese' => '৩ (তিনি)',  'english' => 'Three (Sino-Korean)', 'part_of_speech' => 'number', 'level' => 'beginner'],
            ['korean' => '사',   'romanization' => 'sa',     'assamese' => '৪ (চাৰি)', 'english' => 'Four (Sino-Korean)',  'part_of_speech' => 'number', 'level' => 'beginner'],
            ['korean' => '오',   'romanization' => 'o',      'assamese' => '৫ (পাঁচ)', 'english' => 'Five (Sino-Korean)',  'part_of_speech' => 'number', 'level' => 'beginner'],
            ['korean' => '십',   'romanization' => 'sip',    'assamese' => '১০ (দহ)',  'english' => 'Ten (Sino-Korean)',   'part_of_speech' => 'number', 'level' => 'beginner'],
            ['korean' => '원',   'romanization' => 'won',    'assamese' => 'ৱন (কোৰিয়ান মুদ্ৰা)', 'english' => 'Korean Won (currency)', 'part_of_speech' => 'noun', 'level' => 'beginner',
             'example_ko' => '이것은 오천 원이에요.', 'example_as' => 'এইটোৰ দাম পাঁচ হাজাৰ ৱন।', 'example_en' => 'This costs 5,000 won.'],
            ['korean' => '몇',   'romanization' => 'myeot',  'assamese' => 'কেইটা / কিমান', 'english' => 'How many / Which number', 'part_of_speech' => 'pronoun', 'level' => 'beginner',
             'example_ko' => '몇 개예요?', 'example_as' => 'কেইটা আছে?', 'example_en' => 'How many are there?'],
        ];

        return collect($entries)->map(fn ($e) => Vocabulary::create($e));
    }

    private function seedLesson2Grammar(): \Illuminate\Support\Collection
    {
        $points = [
            [
                'title_ko'        => '숫자 + 개 (개수 세기)',
                'title_en'        => 'Counting Objects with 개',
                'title_as'        => '개 ব্যৱহাৰ কৰি বস্তু গণনা',
                'pattern_formula' => '[Sino-Korean Number] + 개',
                'explanation_en'  => '개 is a general counter for objects. It follows Sino-Korean numbers (일, 이, 삼...). For most everyday items without a specific counter, 개 is the safe choice.',
                'explanation_as'  => '개 হৈছে বস্তুৰ বাবে সাধাৰণ গণক। ই চিনো-কোৰিয়ান সংখ্যাৰ (일, 이, 삼...) পিছত আহে। বিশেষ গণকবিহীন দৈনন্দিন বস্তুৰ বাবে 개 সঠিক।',
                'level'           => 'beginner',
                'category'        => 'counter',
                'examples'        => [
                    ['korean' => '사과 두 개 주세요.', 'romanization' => 'sagwa du gae juseyo', 'assamese' => 'দুটা আপেল দিয়ক।', 'english' => 'Please give me two apples.', 'audio_id' => null],
                    ['korean' => '물 한 개 있어요?',   'romanization' => 'mul han gae isseoyo', 'assamese' => 'এটা পানী আছেনে?', 'english' => 'Is there one water?', 'audio_id' => null],
                ],
            ],
            [
                'title_ko'        => '이/가 (주격 조사)',
                'title_en'        => 'Subject Marker — 이/가',
                'title_as'        => 'কৰ্তা চিহ্ন — 이/가',
                'pattern_formula' => '[Noun] + 이 (after consonant) / 가 (after vowel)',
                'explanation_en'  => 'The subject marker shows who or what is performing the action. It focuses on new information or identifies the subject specifically. 이 is used after consonants and 가 after vowels.',
                'explanation_as'  => 'কৰ্তা চিহ্নে কাৰ্য সম্পাদনকাৰীক চিনাক্ত কৰে। ব্যঞ্জনৰ পিছত 이 আৰু স্বৰৰ পিছত 가 ব্যৱহাৰ কৰক।',
                'level'           => 'beginner',
                'category'        => 'particle',
                'examples'        => [
                    ['korean' => '이것이 뭐예요?',  'romanization' => 'igeosi mwoyeyo',      'assamese' => 'এইটো কি?',             'english' => 'What is this (specifically)?', 'audio_id' => null],
                    ['korean' => '저가 학생이에요.', 'romanization' => 'jeoga haksaengieyo', 'assamese' => 'মইহে ছাত্র। (নতুন তথ্য)', 'english' => 'I am the student. (new info)', 'audio_id' => null],
                ],
            ],
        ];

        return collect($points)->map(fn ($p) => GrammarPoint::create($p));
    }

    private function seedLesson2Conversation(): Conversation
    {
        $conv = Conversation::create([
            'title_ko'  => '시장에서 쇼핑',
            'title_en'  => 'Shopping at the Market',
            'title_as'  => 'বজাৰত কেনাকাটা',
            'scene_en'  => 'A customer buys fruit at a street market in Seoul.',
            'scene_as'  => 'ছিউলৰ এটা বজাৰত এগৰাকী গ্ৰাহকে ফল কিনে।',
            'level'     => 'beginner',
            'speakers'  => [
                ['label' => 'Customer', 'gender' => 'female'],
                ['label' => 'Seller',   'gender' => 'male'],
            ],
        ]);

        $lines = [
            ['speaker_label' => 'Customer', 'text_ko' => '사과 있어요?',          'romanization' => 'Sagwa isseoyo?',           'translation_as' => 'আপেল আছেনে?',                   'translation_en' => 'Do you have apples?'],
            ['speaker_label' => 'Seller',   'text_ko' => '네, 있어요!',            'romanization' => 'Ne, isseoyo!',             'translation_as' => 'হয়, আছে!',                       'translation_en' => 'Yes, we do!'],
            ['speaker_label' => 'Customer', 'text_ko' => '얼마예요?',              'romanization' => 'Eolmayeyo?',               'translation_as' => 'কিমান দাম?',                     'translation_en' => 'How much is it?'],
            ['speaker_label' => 'Seller',   'text_ko' => '오천 원이에요.',         'romanization' => 'Ocheon wonieyo.',          'translation_as' => 'পাঁচ হাজাৰ ৱন।',                 'translation_en' => 'It is 5,000 won.'],
            ['speaker_label' => 'Customer', 'text_ko' => '두 개 주세요.',          'romanization' => 'Du gae juseyo.',           'translation_as' => 'দুটা দিয়ক।',                    'translation_en' => 'Please give me two.'],
            ['speaker_label' => 'Seller',   'text_ko' => '네! 감사합니다.',        'romanization' => 'Ne! Gamsahamnida.',        'translation_as' => 'হয়! ধন্যবাদ।',                    'translation_en' => 'Yes! Thank you.'],
        ];

        foreach ($lines as $i => $line) {
            ConversationLine::create(array_merge($line, ['conversation_id' => $conv->id, 'order_index' => $i]));
        }

        return $conv;
    }

    private function seedLesson2CulturalNote(): CulturalNote
    {
        return CulturalNote::create([
            'title_en' => 'Two Number Systems in Korean',
            'title_as' => 'কোৰিয়ান ভাষাত দুটা সংখ্যা পদ্ধতি',
            'body_en'  => 'Korean has two number systems: Sino-Korean (일, 이, 삼... from Chinese) and Native Korean (하나, 둘, 셋...). Sino-Korean numbers are used for money, dates, phone numbers, and minutes. Native Korean numbers are used for counting objects with counters (개, 명, 마리), hours, and ages informally. In the market conversation you just learned, prices use Sino-Korean numbers — this is always the case for money.',
            'body_as'  => 'কোৰিয়ান ভাষাত দুটা সংখ্যা পদ্ধতি আছে: চিনো-কোৰিয়ান (일, 이, 삼... চীনা ভাষাৰ পৰা) আৰু দেশীয় কোৰিয়ান (하나, 둘, 셋...)। চিনো-কোৰিয়ান সংখ্যা ধন, তাৰিখ, ফোন নম্বৰ আৰু মিনিটৰ বাবে ব্যৱহাৰ হয়। দেশীয় কোৰিয়ান সংখ্যা বস্তু গণনা (개, 명, 마리), ঘণ্টা আৰু অনানুষ্ঠানিক বয়সৰ বাবে ব্যৱহাৰ হয়।',
            'category' => 'language',
        ]);
    }

    private function seedLesson2Quiz(): \Illuminate\Support\Collection
    {
        $questions = [
            [
                'type'           => 'multiple_choice',
                'question_text'  => 'What does 오 (o) mean in Sino-Korean?',
                'options'        => [
                    ['text' => 'Three', 'romanization' => '삼 (sam)'],
                    ['text' => 'Four',  'romanization' => '사 (sa)'],
                    ['text' => 'Five',  'romanization' => '오 (o)'],
                    ['text' => 'Ten',   'romanization' => '십 (sip)'],
                ],
                'correct_index'  => 2,
                'explanation_en' => '오 (o) means five in Sino-Korean. Remember: 일 (1), 이 (2), 삼 (3), 사 (4), 오 (5), 육 (6), 칠 (7), 팔 (8), 구 (9), 십 (10).',
                'explanation_as' => '오 (o) চিনো-কোৰিয়ানত পাঁচ। মনত ৰাখক: 일 (১), 이 (২), 삼 (৩), 사 (৪), 오 (৫), 십 (১০)।',
                'level'          => 'beginner',
            ],
            [
                'type'           => 'fill_in_blank',
                'question_text'  => 'To say "How much is it?" in Korean, say: ___ 예요?',
                'options'        => [
                    ['text' => '얼마', 'romanization' => 'eolma'],
                    ['text' => '몇',   'romanization' => 'myeot'],
                    ['text' => '이름', 'romanization' => 'ireum'],
                    ['text' => '원',   'romanization' => 'won'],
                ],
                'correct_index'  => 0,
                'explanation_en' => '얼마예요? means "How much is it?" — the standard phrase for asking prices. 얼마 = how much.',
                'explanation_as' => '얼마예요? মানে "কিমান দাম?" — দাম সোধাৰ মানক বাক্যাংশ। 얼마 = কিমান।',
                'level'          => 'beginner',
            ],
            [
                'type'           => 'multiple_choice',
                'question_text'  => 'Which number system is used for prices in Korean?',
                'options'        => [
                    ['text' => 'Native Korean (하나, 둘, 셋)', 'romanization' => 'hana, dul, set'],
                    ['text' => 'Sino-Korean (일, 이, 삼)',     'romanization' => 'il, i, sam'],
                    ['text' => 'Either can be used'],
                    ['text' => 'Neither — English numbers are used'],
                ],
                'correct_index'  => 1,
                'explanation_en' => 'Prices in Korean always use Sino-Korean numbers. For example, 오천 원 (5,000 won) uses 오 (5) and 천 (1,000) — both Sino-Korean.',
                'explanation_as' => 'কোৰিয়ানত দাম সদায় চিনো-কোৰিয়ান সংখ্যা ব্যৱহাৰ কৰে। উদাহৰণস্বৰূপে, 오천 원 (পাঁচ হাজাৰ ৱন)।',
                'level'          => 'beginner',
            ],
            [
                'type'           => 'multiple_choice',
                'question_text'  => '두 개 주세요 means:',
                'options'        => [
                    ['text' => 'Give me one, please'],
                    ['text' => 'Give me two, please'],
                    ['text' => 'Give me three, please'],
                    ['text' => 'How many do you want?'],
                ],
                'correct_index'  => 1,
                'explanation_en' => '두 = two (Native Korean), 개 = general object counter, 주세요 = please give me. Together: "Please give me two (of them)."',
                'explanation_as' => '두 = দুই (দেশীয় কোৰিয়ান), 개 = সাধাৰণ বস্তু গণক, 주세요 = দিয়ক। একেলগে: "দুটা দিয়ক।"',
                'level'          => 'beginner',
            ],
            [
                'type'           => 'matching',
                'question_text'  => 'Match the Sino-Korean number to its value.',
                'options'        => [
                    ['text' => '일 → 1'],
                    ['text' => '삼 → 3'],
                    ['text' => '오 → 5'],
                    ['text' => '십 → 10'],
                ],
                'correct_index'  => 0,
                'explanation_en' => 'All four are correct. These four numbers form the foundation of the Sino-Korean number system.',
                'explanation_as' => 'চাৰিওটা শুদ্ধ। এই চাৰিটা সংখ্যা চিনো-কোৰিয়ান সংখ্যা পদ্ধতিৰ ভিত্তি।',
                'level'          => 'beginner',
            ],
        ];

        return collect($questions)->map(fn ($q) => QuizQuestion::create($q));
    }

    // ─────────────────────────────────────────────────────────────────────────
    // ROLES — add learning roles
    // ─────────────────────────────────────────────────────────────────────────

    private function seedLearningRoles(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $learningPermissions = [
            'view learning',
            'create learning',
            'edit learning',
            'delete learning',
            'publish learning',
            'manage learning modules',
            'manage learning audio',
        ];

        foreach ($learningPermissions as $permission) {
            \Spatie\Permission\Models\Permission::firstOrCreate(['name' => $permission]);
        }

        // Give super_admin and admin all learning permissions
        $superAdmin = \Spatie\Permission\Models\Role::where('name', 'super_admin')->first();
        $admin      = \Spatie\Permission\Models\Role::where('name', 'admin')->first();
        if ($superAdmin) $superAdmin->givePermissionTo($learningPermissions);
        if ($admin)      $admin->givePermissionTo($learningPermissions);

        // Academic Lead — all learning except delete
        $academicLead = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'academic_lead']);
        $academicLead->givePermissionTo([
            'view learning', 'create learning', 'edit learning',
            'publish learning', 'manage learning modules', 'manage learning audio',
        ]);

        // Study Coordinator — create and edit only
        $studyCoord = \Spatie\Permission\Models\Role::firstOrCreate(['name' => 'study_coordinator']);
        $studyCoord->givePermissionTo([
            'view learning', 'create learning', 'edit learning', 'manage learning audio',
        ]);

        // Create test users for the two new roles
        $alUser = \App\Models\User::firstOrCreate(
            ['email' => 'academic@dkc.local'],
            ['name' => 'Academic Lead', 'password' => bcrypt('academic123'), 'is_active' => true]
        );
        $alUser->assignRole('academic_lead');

        $scUser = \App\Models\User::firstOrCreate(
            ['email' => 'coordinator@dkc.local'],
            ['name' => 'Study Coordinator', 'password' => bcrypt('coordinator123'), 'is_active' => true]
        );
        $scUser->assignRole('study_coordinator');
    }
}
