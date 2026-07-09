<?php

namespace Database\Seeders\Learning;

use Illuminate\Database\Seeder;
use App\Models\Learning\Lesson;
use App\Models\Learning\QuizQuestion;

/**
 * Seeds quiz questions for the 13 lessons that RelationshipsSeeder's
 * quizFor() returns an empty array for. Links them directly to lessons
 * via syncWithoutDetaching so re-running is idempotent.
 */
class QuizGapSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->allQuestions() as $slug => $questions) {
            $lesson = Lesson::where('slug', $slug)->first();
            if (! $lesson) {
                $this->command?->warn("Lesson '$slug' not found — skipping quiz.");
                continue;
            }

            $pivot = [];
            foreach ($questions as $i => $q) {
                $record = QuizQuestion::firstOrCreate(
                    ['question_text' => $q['question_text']],
                    $q
                );
                $pivot[$record->id] = ['order_index' => $i + 1];
            }

            if ($pivot) {
                $lesson->quizQuestions()->syncWithoutDetaching($pivot);
            }
        }
    }

    // ── Question bank per lesson slug ─────────────────────────────────────────

    private function allQuestions(): array
    {
        return [

            // ── MODULE 2 ────────────────────────────────────────────────────

            'shopping-and-money' => [
                [
                    'question_text'  => '얼마예요? means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'How much is it?',    'romanization' => ''],
                        ['text' => 'What is this?',      'romanization' => ''],
                        ['text' => 'Where is the shop?', 'romanization' => ''],
                        ['text' => 'How are you?',       'romanization' => ''],
                    ],
                    'correct_index'  => 0,
                    'explanation_en' => '얼마 means "how much" and 예요 is the copula ending, so 얼마예요? = "How much is it?"',
                    'explanation_as' => '얼마 মানে "কিমান" আৰু 예요 হল কপুলা বিভক্তি, সেয়েহে 얼마예요? = "এইটো কিমান?"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => 'Which Korean word means "expensive"?',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => '싸다',  'romanization' => 'ssada'],
                        ['text' => '비싸다', 'romanization' => 'bissada'],
                        ['text' => '할인',  'romanization' => 'hal-in'],
                        ['text' => '카드',  'romanization' => 'kadeu'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '비싸다 means "to be expensive." 싸다 means "cheap," 할인 means "discount," and 카드 means "card."',
                    'explanation_as' => '비싸다 মানে "দামী।" 싸다 মানে "সস্তা," 할인 মানে "ছাড়," আৰু 카드 মানে "কাৰ্ড।"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '할인 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'receipt',  'romanization' => '영수증'],
                        ['text' => 'cash',     'romanization' => '현금'],
                        ['text' => 'discount', 'romanization' => '할인'],
                        ['text' => 'card',     'romanization' => '카드'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '할인 (hal-in) means discount. You may hear it in stores as "할인 있어요?" (Is there a discount?)',
                    'explanation_as' => '할인 মানে ছাড়/ৰেহাই। দোকানত "할인 있어요?" (ছাড় আছে নে?) শুনিব পাৰি।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '현금으로 계산할게요 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'I paid by card',       'romanization' => ''],
                        ['text' => 'I will pay in cash',   'romanization' => ''],
                        ['text' => 'I need a discount',    'romanization' => ''],
                        ['text' => 'Where is the cashier?','romanization' => ''],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '현금 = cash, 으로 = by/with (instrument particle), 계산할게요 = I will pay/settle (promise form). Together: "I will pay in cash."',
                    'explanation_as' => '현금 = নগদ, 으로 = দ্বাৰা, 계산할게요 = পৰিশোধ কৰিম। একত্ৰে: "মই নগদে পৰিশোধ কৰিম।"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => 'Which word means "department store"?',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => '시장',  'romanization' => 'sijang'],
                        ['text' => '백화점', 'romanization' => 'baekhwajeom'],
                        ['text' => '물건',  'romanization' => 'mulgeon'],
                        ['text' => '영수증', 'romanization' => 'yeongsujeung'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '백화점 means "department store." 시장 is a traditional market, 물건 means item/goods, and 영수증 is a receipt.',
                    'explanation_as' => '백화점 মানে "ডিপাৰ্টমেণ্ট ষ্টোৰ।" 시장 হল পৰম্পৰাগত বজাৰ, 물건 মানে সামগ্ৰী, আৰু 영수증 মানে ৰচিদ।',
                    'level'          => 'beginner',
                ],
            ],

            'school-and-university' => [
                [
                    'question_text'  => '숙제 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'exam',     'romanization' => '시험'],
                        ['text' => 'grade',    'romanization' => '성적'],
                        ['text' => 'homework', 'romanization' => '숙제'],
                        ['text' => 'lecture',  'romanization' => '강의'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '숙제 (sukje) means homework. You may hear "숙제 다 했어요?" (Did you finish your homework?)',
                    'explanation_as' => '숙제 মানে গৃহকাৰ্য। "숙제 다 했어요?" মানে "গৃহকাৰ্য সম্পূৰ্ণ কৰিলে নে?"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '시험을 보다 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'to study',       'romanization' => '공부하다'],
                        ['text' => 'to take an exam','romanization' => '시험을 보다'],
                        ['text' => 'to grade',       'romanization' => '채점하다'],
                        ['text' => 'to graduate',    'romanization' => '졸업하다'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '시험을 보다 literally means "to see an exam" but idiomatically means "to take a test/exam."',
                    'explanation_as' => '시험을 보다 আক্ষৰিকভাৱে "পৰীক্ষা চোৱা" কিন্তু ইডিয়মিকভাৱে "পৰীক্ষা দিয়া" বুজায়।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => 'Which word means "scholarship"?',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => '전공',  'romanization' => 'jeon-gong'],
                        ['text' => '캠퍼스', 'romanization' => 'kaempeo-seu'],
                        ['text' => '장학금', 'romanization' => 'janghak-geum'],
                        ['text' => '성적',  'romanization' => 'seong-jeok'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '장학금 means scholarship. 전공 is major, 캠퍼스 is campus, and 성적 is academic grade.',
                    'explanation_as' => '장학금 মানে বৃত্তি। 전공 হল বিষয়, 캠퍼스 হল চৌহদ, আৰু 성적 হল শৈক্ষিক নম্বৰ।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '전공 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'library',          'romanization' => '도서관'],
                        ['text' => 'grade',            'romanization' => '성적'],
                        ['text' => 'campus',           'romanization' => '캠퍼스'],
                        ['text' => 'major / field of study', 'romanization' => '전공'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '전공 means your academic major or field of study. "전공이 뭐예요?" = "What is your major?"',
                    'explanation_as' => '전공 মানে আপোনাৰ অধ্যয়নৰ বিষয়। "전공이 뭐예요?" = "আপোনাৰ বিষয় কি?"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '도서관 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'classroom',  'romanization' => '교실'],
                        ['text' => 'library',    'romanization' => '도서관'],
                        ['text' => 'dormitory',  'romanization' => '기숙사'],
                        ['text' => 'cafeteria',  'romanization' => '식당'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '도서관 (doseogwan) means library. Korean universities often have large multi-story 도서관.',
                    'explanation_as' => '도서관 মানে পুথিভঁৰাল। কোৰিয়ান বিশ্ববিদ্যালয়ত প্ৰায়ে বহু মহলীয়া 도서관 থাকে।',
                    'level'          => 'beginner',
                ],
            ],

            // ── MODULE 3 ────────────────────────────────────────────────────

            'hobbies-and-free-time' => [
                [
                    'question_text'  => '취미가 뭐예요? means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'What do you do?',    'romanization' => ''],
                        ['text' => 'What is your hobby?','romanization' => ''],
                        ['text' => 'Where do you go?',   'romanization' => ''],
                        ['text' => 'What time is it?',   'romanization' => ''],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '취미 means "hobby" and 뭐예요 means "what is it?" So the question asks: "What is your hobby?"',
                    'explanation_as' => '취미 মানে "চখ" আৰু 뭐예요 মানে "কি?" সেয়েহে প্ৰশ্নটো হল: "আপোনাৰ চখ কি?"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '독서 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'music',   'romanization' => '음악'],
                        ['text' => 'hiking',  'romanization' => '등산'],
                        ['text' => 'reading', 'romanization' => '독서'],
                        ['text' => 'swimming','romanization' => '수영'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '독서 (dokseo) means reading books as a hobby. It comes from 독 (reading) + 서 (book/writing).',
                    'explanation_as' => '독서 মানে কিতাপ পঢ়া। এইটো 독 (পঢ়া) + 서 (কিতাপ/লিখন) শব্দদ্বয়ৰ সমষ্টি।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '등산 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'yoga',                   'romanization' => '요가'],
                        ['text' => 'gaming',                 'romanization' => '게임'],
                        ['text' => 'photography',            'romanization' => '사진'],
                        ['text' => 'hiking / mountain climbing','romanization' => '등산'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '등산 (deungsan) means hiking or mountain climbing. Koreans love 등산 — it is a very popular weekend activity.',
                    'explanation_as' => '등산 মানে পাহাৰত ভ্ৰমণ বা পাহাৰ বগোৱা। কোৰিয়ানসকলে 등산 অত্যন্ত ভালপায়।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => 'Which Korean word means "swimming"?',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => '운동', 'romanization' => 'undong'],
                        ['text' => '수영', 'romanization' => 'suyeong'],
                        ['text' => '요가', 'romanization' => 'yoga'],
                        ['text' => '축구', 'romanization' => 'chukgu'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '수영 means swimming. 운동 is exercise/sport in general, 요가 is yoga, and 축구 is football/soccer.',
                    'explanation_as' => '수영 মানে সাঁতুৰা। 운동 হল ব্যায়াম, 요가 হল য়োগা, আৰু 축구 হল ফুটবল।',
                    'level'          => 'beginner',
                ],
            ],

            'talking-about-family' => [
                [
                    'question_text'  => '부모님 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'siblings',    'romanization' => '형제자매'],
                        ['text' => 'grandparents','romanization' => '조부모님'],
                        ['text' => 'parents',     'romanization' => '부모님'],
                        ['text' => 'relatives',   'romanization' => '친척'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '부모님 means parents. 부 (father) + 모 (mother) + 님 (honorific suffix). The 님 shows respect.',
                    'explanation_as' => '부모님 মানে বাপ-মাক। 부 (পিতা) + 모 (মাতা) + 님 (সন্মানসূচক প্ৰত্যয়)।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '동생 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'older brother',    'romanization' => '형/오빠'],
                        ['text' => 'younger sibling',  'romanization' => '동생'],
                        ['text' => 'older sister',     'romanization' => '언니/누나'],
                        ['text' => 'cousin',           'romanization' => '사촌'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '동생 means younger sibling (gender-neutral). For a younger brother you can say 남동생, and for a younger sister 여동생.',
                    'explanation_as' => '동생 মানে সৰু ভাই বা ভনী (লিঙ্গ-নিৰপেক্ষ)। সৰু ভাইক 남동생 আৰু সৰু ভনীক 여동생 বোলা হয়।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '할머니 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'grandfather', 'romanization' => '할아버지'],
                        ['text' => 'aunt',        'romanization' => '이모/고모'],
                        ['text' => 'grandmother', 'romanization' => '할머니'],
                        ['text' => 'mother',      'romanization' => '어머니'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '할머니 means grandmother (paternal or maternal). The grandfather is 할아버지.',
                    'explanation_as' => '할머니 মানে আইতা। দেউতাক-পিনৰ বা মাক-পিনৰ দুয়োজন আইতাকেই 할머니 বোলা হয়।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '가족 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'friend',   'romanization' => '친구'],
                        ['text' => 'neighbor', 'romanization' => '이웃'],
                        ['text' => 'teacher',  'romanization' => '선생님'],
                        ['text' => 'family',   'romanization' => '가족'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '가족 (gajok) means family. "가족이 몇 명이에요?" = "How many people are in your family?"',
                    'explanation_as' => '가족 মানে পৰিয়াল। "가족이 몇 명이에요?" = "আপোনাৰ পৰিয়ালত কেইজন মানুহ আছে?"',
                    'level'          => 'beginner',
                ],
            ],

            'countries-and-nationalities' => [
                [
                    'question_text'  => '한국인 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'Japanese person', 'romanization' => '일본인'],
                        ['text' => 'Korean person',   'romanization' => '한국인'],
                        ['text' => 'Chinese person',  'romanization' => '중국인'],
                        ['text' => 'American person', 'romanization' => '미국인'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '한국인 = 한국 (Korea) + 인 (person). The suffix -인 is used to say a person\'s nationality.',
                    'explanation_as' => '한국인 = 한국 (কোৰিয়া) + 인 (মানুহ)। -인 প্ৰত্যয় ব্যৱহাৰ কৰি যিকোনো দেশৰ নাগৰিক বুজোৱা হয়।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '외국인 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'citizen',   'romanization' => '시민'],
                        ['text' => 'tourist',   'romanization' => '관광객'],
                        ['text' => 'foreigner', 'romanization' => '외국인'],
                        ['text' => 'resident',  'romanization' => '거주자'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '외국인 means foreigner. 외국 means "foreign country" and 인 means "person."',
                    'explanation_as' => '외국인 মানে বিদেশী মানুহ। 외국 মানে "বিদেশী দেশ" আৰু 인 মানে "মানুহ।"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => 'How do you say "India" in Korean?',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => '인디아', 'romanization' => 'india'],
                        ['text' => '인도',  'romanization' => 'indo'],
                        ['text' => '힌두',  'romanization' => 'hindu'],
                        ['text' => '남아시아','romanization' => 'nam asia'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => 'India is called 인도 in Korean, not 인디아. This is the standard Sino-Korean form of the name.',
                    'explanation_as' => 'কোৰিয়ান ভাষাত ভাৰতক 인도 বোলা হয়, 인디아 নহয়। এইটো প্ৰামাণিক চীনা-কোৰিয়ান ৰূপ।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '언어 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'country',  'romanization' => '나라'],
                        ['text' => 'culture',  'romanization' => '문화'],
                        ['text' => 'language', 'romanization' => '언어'],
                        ['text' => 'people',   'romanization' => '사람들'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '언어 means language. "몇 개의 언어를 할 수 있어요?" = "How many languages can you speak?"',
                    'explanation_as' => '언어 মানে ভাষা। "몇 개의 언어를 할 수 있어요?" = "আপুনি কেইটা ভাষা কব পাৰে?"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '미국 refers to:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'United Kingdom', 'romanization' => '영국'],
                        ['text' => 'Japan',          'romanization' => '일본'],
                        ['text' => 'Australia',      'romanization' => '호주'],
                        ['text' => 'United States',  'romanization' => '미국'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '미국 (miguk) means the United States of America. It comes from the Chinese 美國 (Beautiful Country), a traditional name for America.',
                    'explanation_as' => '미국 মানে আমেৰিকা যুক্তৰাষ্ট্ৰ। চীনা ভাষাত 美國 (সুন্দৰ দেশ) শব্দৰ পৰা আহিছে।',
                    'level'          => 'beginner',
                ],
            ],

            'weather-and-seasons' => [
                [
                    'question_text'  => '날씨가 어때요? means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'How are you?',       'romanization' => '어떻게 지내요?'],
                        ['text' => 'How is the weather?','romanization' => '날씨가 어때요?'],
                        ['text' => 'What season is it?', 'romanization' => '무슨 계절이에요?'],
                        ['text' => 'Is it raining?',     'romanization' => '비가 와요?'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '날씨 means weather and 어때요? means "how is it?" Together: "How is the weather?"',
                    'explanation_as' => '날씨 মানে বতৰ আৰু 어때요? মানে "কেনেকুৱা?" একত্ৰে: "বতৰ কেনেকুৱা?"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '봄 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'summer', 'romanization' => '여름'],
                        ['text' => 'autumn', 'romanization' => '가을'],
                        ['text' => 'spring', 'romanization' => '봄'],
                        ['text' => 'winter', 'romanization' => '겨울'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '봄 means spring. The four seasons are 봄 (spring), 여름 (summer), 가을 (autumn), 겨울 (winter).',
                    'explanation_as' => '봄 মানে বসন্ত। চাৰিটা ঋতু হল 봄 (বসন্ত), 여름 (গ্ৰীষ্ম), 가을 (শৰৎ), 겨울 (শীত)।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '추워요 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'It is hot',   'romanization' => '더워요'],
                        ['text' => 'It is windy', 'romanization' => '바람이 불어요'],
                        ['text' => 'It is cold',  'romanization' => '추워요'],
                        ['text' => 'It is sunny', 'romanization' => '맑아요'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '추워요 comes from 춥다 (to be cold). The opposite is 더워요 from 덥다 (to be hot).',
                    'explanation_as' => '추워요 আহিছে 춥다 (ঠাণ্ডা হোৱা) ক্ৰিয়াৰ পৰা। ইয়াৰ বিপৰীত হল 더워요, 덥다 (গৰম হোৱা) পৰা।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '흐리다 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'sunny',   'romanization' => '맑다'],
                        ['text' => 'snowy',   'romanization' => '눈이 오다'],
                        ['text' => 'windy',   'romanization' => '바람이 불다'],
                        ['text' => 'cloudy',  'romanization' => '흐리다'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '흐리다 (heurida) means cloudy or overcast. The clear/sunny opposite is 맑다 (makda).',
                    'explanation_as' => '흐리다 মানে মেঘলীয়া বা আকাশ ঢকা। ইয়াৰ বিপৰীত 맑다 মানে পৰিষ্কাৰ/ৰ\'দালি।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '겨울 is which season?',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'spring', 'romanization' => '봄'],
                        ['text' => 'summer', 'romanization' => '여름'],
                        ['text' => 'autumn', 'romanization' => '가을'],
                        ['text' => 'winter', 'romanization' => '겨울'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '겨울 (gyeoul) is winter. Korean winters can be very cold, especially in Seoul and northern regions.',
                    'explanation_as' => '겨울 মানে শীতকাল। কোৰিয়াৰ শীত অত্যন্ত ঠাণ্ডা, বিশেষকৈ ছিউল আৰু উত্তৰ অঞ্চলত।',
                    'level'          => 'beginner',
                ],
            ],

            // ── MODULE 4 ────────────────────────────────────────────────────

            'honorifics-deep-dive' => [
                [
                    'question_text'  => 'What infix is added to a verb stem to make it honorific?',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => '-어요',   'romanization' => '-eoyo'],
                        ['text' => '-(으)시-', 'romanization' => '-(eu)si-'],
                        ['text' => '-지',     'romanization' => '-ji'],
                        ['text' => '-고',     'romanization' => '-go'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '-(으)시- is inserted between the verb stem and the ending to show respect for the subject. Example: 가다 → 가시다 (to go — honorific).',
                    'explanation_as' => '-(으)시- ক্ৰিয়া ষ্টেম আৰু বিভক্তিৰ মাজত ব্যৱহাৰ কৰা হয় বিষয়ৰ প্ৰতি সন্মান দেখুৱাবলৈ। যেনে: 가다 → 가시다।',
                    'level'          => 'intermediate',
                ],
                [
                    'question_text'  => '존댓말 refers to:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'informal speech',      'romanization' => '반말'],
                        ['text' => 'written language',     'romanization' => '문어체'],
                        ['text' => 'formal/polite speech', 'romanization' => '존댓말'],
                        ['text' => 'dialects',             'romanization' => '사투리'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '존댓말 is the formal/polite speech register used with elders, strangers, and in professional settings. The casual form is 반말.',
                    'explanation_as' => '존댓말 হল আনুষ্ঠানিক/বিনম্ৰ কথ্যৰূপ যি বয়সস্থ, অপৰিচিত, আৰু পেছাদাৰ পৰিৱেশত ব্যৱহাৰ হয়। অনানুষ্ঠানিক ৰূপ হল 반말।',
                    'level'          => 'intermediate',
                ],
                [
                    'question_text'  => '드시다 is the honorific form of:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => '가다 (to go)',             'romanization' => 'gada'],
                        ['text' => '자다 (to sleep)',          'romanization' => 'jada'],
                        ['text' => '먹다 / 마시다 (eat/drink)', 'romanization' => 'meokda / masida'],
                        ['text' => '말하다 (to speak)',         'romanization' => 'malhada'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '드시다 is the honorific equivalent of both 먹다 (to eat) and 마시다 (to drink). "드세요" is a polite offer meaning "Please eat/drink."',
                    'explanation_as' => '드시다 হল 먹다 (খোৱা) আৰু 마시다 (পিয়া) দুয়োটাৰ সন্মানসূচক ৰূপ। "드세요" মানে "অনুগ্ৰহ কৰি খাওক/পিয়োক।"',
                    'level'          => 'intermediate',
                ],
                [
                    'question_text'  => 'When should you use 존댓말?',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'With close friends',      'romanization' => '친한 친구들과'],
                        ['text' => 'With younger siblings',   'romanization' => '남동생/여동생과'],
                        ['text' => 'When texting informally', 'romanization' => ''],
                        ['text' => 'With elders and strangers','romanization' => '어른들과 낯선 사람들과'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '존댓말 is used with people older than you, strangers, and in professional settings. With close friends of the same age you can use 반말.',
                    'explanation_as' => '존댓말 আপোনাতকৈ বয়সস্থ, অপৰিচিত আৰু কৰ্মক্ষেত্ৰৰ মানুহৰ সৈতে ব্যৱহাৰ হয়। একে বয়সৰ ঘনিষ্ঠ বন্ধুৰ সৈতে 반말 ব্যৱহাৰ কৰিব পাৰি।',
                    'level'          => 'intermediate',
                ],
                [
                    'question_text'  => 'The honorific title suffix 님 is added after:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'verbs',        'romanization' => '동사'],
                        ['text' => 'particles',    'romanization' => '조사'],
                        ['text' => 'adjectives',   'romanization' => '형용사'],
                        ['text' => 'names / roles','romanization' => '이름/직함'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '님 is a respectful suffix added to names or titles. 선생님 (teacher + 님), 사장님 (company president + 님), 고객님 (customer + 님).',
                    'explanation_as' => '님 হল নাম বা পদবীৰ পিছত যোগ দিয়া সন্মানসূচক প্ৰত্যয়। যেনে: 선생님, 사장님, 고객님।',
                    'level'          => 'intermediate',
                ],
            ],

            // ── MODULE 5 ────────────────────────────────────────────────────

            'comparisons-and-preferences' => [
                [
                    'question_text'  => '좋아하다 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'to love',   'romanization' => '사랑하다'],
                        ['text' => 'to hate',   'romanization' => '싫어하다'],
                        ['text' => 'to like',   'romanization' => '좋아하다'],
                        ['text' => 'to prefer', 'romanization' => '선호하다'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '좋아하다 means "to like." Note: 좋다 (adjective, "it is good/nice") vs. 좋아하다 (verb, "to like").',
                    'explanation_as' => '좋아하다 মানে "ভালপোৱা।" মনত ৰাখক: 좋다 (বিশেষণ, "ভাল") বনাম 좋아하다 (ক্ৰিয়া, "ভালপোৱা")।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '더 좋아요 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'I like it least',       'romanization' => ''],
                        ['text' => 'I hate it',             'romanization' => ''],
                        ['text' => 'I like it more / better','romanization' => ''],
                        ['text' => 'I do not like it',      'romanization' => ''],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '더 means "more" and 좋아요 means "I like it / it is good." Together: "I like it more / it is better."',
                    'explanation_as' => '더 মানে "বেছি" আৰু 좋아요 মানে "ভাল লাগে।" একত্ৰে: "এইটো বেছি ভাল লাগে।"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => 'A보다 B가 더 좋아요 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'A is better than B',       'romanization' => ''],
                        ['text' => 'I like B more than A',     'romanization' => ''],
                        ['text' => 'A and B are equal',        'romanization' => ''],
                        ['text' => 'I do not like A or B',     'romanization' => ''],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => 'A보다 B가 더 좋아요 = "I like B more than A." 보다 is the comparison particle meaning "than."',
                    'explanation_as' => 'A보다 B가 더 좋아요 = "মই A-তকৈ B বেছি ভালপাওঁ।" 보다 হল তুলনামূলক কণিকা মানে "তকৈ।"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '싫어하다 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'to like',    'romanization' => '좋아하다'],
                        ['text' => 'to miss',    'romanization' => '그리워하다'],
                        ['text' => 'to prefer',  'romanization' => '선호하다'],
                        ['text' => 'to dislike', 'romanization' => '싫어하다'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '싫어하다 means to dislike or hate. "한국어 공부하는 게 싫어요?" = "Do you dislike studying Korean?"',
                    'explanation_as' => '싫어하다 মানে অপছন্দ কৰা বা ঘিণ কৰা। "한국어 공부하는 게 싫어요?" = "কোৰিয়ান পঢ়াটো অপছন্দ নে?"',
                    'level'          => 'beginner',
                ],
            ],

            'emotions-and-opinions' => [
                [
                    'question_text'  => '기분이 어때요? means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'What happened?',   'romanization' => '무슨 일이에요?'],
                        ['text' => 'How do you feel?', 'romanization' => '기분이 어때요?'],
                        ['text' => 'Are you tired?',   'romanization' => '피곤해요?'],
                        ['text' => 'What do you think?','romanization' => '어떻게 생각해요?'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '기분 means "mood/feeling" and 어때요 means "how is it?" Together: "How do you feel? / How is your mood?"',
                    'explanation_as' => '기분 মানে "মন/অনুভৱ" আৰু 어때요 মানে "কেনেকুৱা?" একত্ৰে: "আপোনাৰ মন কেনেকুৱা?"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '행복하다 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'to be tired',  'romanization' => '피곤하다'],
                        ['text' => 'to be sad',    'romanization' => '슬프다'],
                        ['text' => 'to be happy',  'romanization' => '행복하다'],
                        ['text' => 'to be scared', 'romanization' => '무섭다'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '행복하다 means to be happy or content. "행복해요!" = "I am happy!"',
                    'explanation_as' => '행복하다 মানে সুখী বা সন্তুষ্ট হোৱা। "행복해요!" = "মই সুখী!"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '피곤하다 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'to be excited', 'romanization' => '신나다'],
                        ['text' => 'to be angry',   'romanization' => '화나다'],
                        ['text' => 'to be worried', 'romanization' => '걱정되다'],
                        ['text' => 'to be tired',   'romanization' => '피곤하다'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '피곤하다 means to be tired or exhausted. "너무 피곤해요." = "I am so tired."',
                    'explanation_as' => '피곤하다 মানে ভাগৰুৱা বা ক্লান্ত হোৱা। "너무 피곤해요." = "মই অতিশয় ভাগৰুৱা।"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '그립다 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'to be bored',               'romanization' => '지루하다'],
                        ['text' => 'to be nervous',             'romanization' => '긴장되다'],
                        ['text' => 'to miss (someone/something)','romanization' => '그립다'],
                        ['text' => 'to be jealous',             'romanization' => '질투하다'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '그립다 means to miss someone or something. "한국이 그리워요." = "I miss Korea."',
                    'explanation_as' => '그립다 মানে কাৰোবাক বা কিবা এটাক মনত পেলোৱা/মিছ কৰা। "한국이 그리워요." = "কোৰিয়াক মিছ কৰোঁ।"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '화나다 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'to be happy',    'romanization' => '행복하다'],
                        ['text' => 'to be angry',    'romanization' => '화나다'],
                        ['text' => 'to be afraid',   'romanization' => '무섭다'],
                        ['text' => 'to be surprised','romanization' => '놀라다'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '화나다 means to be angry. 화 means anger/fire and 나다 means to arise/occur. "화났어요." = "I am angry."',
                    'explanation_as' => '화나다 মানে খং উঠা বা ৰাগী হোৱা। 화 মানে খং আৰু 나다 মানে উঠা। "화났어요." = "মোৰ খং উঠিছে।"',
                    'level'          => 'beginner',
                ],
            ],

            'travel-and-tourism' => [
                [
                    'question_text'  => '공항 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'train station', 'romanization' => '기차역'],
                        ['text' => 'bus terminal',  'romanization' => '버스 터미널'],
                        ['text' => 'hotel',         'romanization' => '호텔'],
                        ['text' => 'airport',       'romanization' => '공항'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '공항 (gong-hang) means airport. Incheon International Airport (인천국제공항) is one of the world\'s busiest.',
                    'explanation_as' => '공항 মানে বিমানবন্দৰ। ইনচিয়ন আন্তৰ্জাতিক বিমানবন্দৰ (인천국제공항) পৃথিৱীৰ অন্যতম ব্যস্ততম।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '여행 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'passport', 'romanization' => '여권'],
                        ['text' => 'luggage',  'romanization' => '짐/가방'],
                        ['text' => 'travel',   'romanization' => '여행'],
                        ['text' => 'ticket',   'romanization' => '티켓'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '여행 (yeohaeng) means travel or trip. "여행을 좋아해요?" = "Do you like traveling?"',
                    'explanation_as' => '여행 মানে ভ্ৰমণ। "여행을 좋아해요?" = "আপুনি ভ্ৰমণ ভালপাওনে?"',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '호텔을 예약하다 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'to check out of a hotel',   'romanization' => '체크아웃하다'],
                        ['text' => 'to book / reserve a hotel', 'romanization' => '예약하다'],
                        ['text' => 'to pay for a hotel',        'romanization' => '계산하다'],
                        ['text' => 'to find a hotel',           'romanization' => '찾다'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '예약하다 means to book or reserve. 호텔을 예약하다 = to book a hotel. You can also 식당을 예약하다 (book a restaurant).',
                    'explanation_as' => '예약하다 মানে আগতীয়াকৈ বুক কৰা বা সংৰক্ষণ কৰা। 호텔을 예약하다 = হোটেল বুক কৰা।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '비행기 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'ship',     'romanization' => '배'],
                        ['text' => 'train',    'romanization' => '기차'],
                        ['text' => 'subway',   'romanization' => '지하철'],
                        ['text' => 'airplane', 'romanization' => '비행기'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '비행기 (bihaenggi) means airplane. 비행 means flight and 기 (機) means machine.',
                    'explanation_as' => '비행기 মানে উৰাজাহাজ। 비행 মানে উৰন আৰু 기 মানে যন্ত্ৰ।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '기차역 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'bus stop',       'romanization' => '버스 정류장'],
                        ['text' => 'airport',        'romanization' => '공항'],
                        ['text' => 'train station',  'romanization' => '기차역'],
                        ['text' => 'subway station', 'romanization' => '지하철역'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '기차역 = 기차 (train) + 역 (station). For subway, it is 지하철역. For bus, it is 버스 정류장.',
                    'explanation_as' => '기차역 = 기차 (ৰেলগাড়ী) + 역 (ষ্টেচন)। ছাবৱেৰ বাবে 지하철역 আৰু বাছৰ বাবে 버스 정류장।',
                    'level'          => 'beginner',
                ],
            ],

            // ── MODULE 6 ────────────────────────────────────────────────────

            'korean-work-culture' => [
                [
                    'question_text'  => '면접 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'salary',       'romanization' => '월급'],
                        ['text' => 'company',      'romanization' => '회사'],
                        ['text' => 'job interview','romanization' => '면접'],
                        ['text' => 'colleague',    'romanization' => '동료'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '면접 means a job interview. "내일 면접이 있어요." = "I have a job interview tomorrow."',
                    'explanation_as' => '면접 মানে চাকৰিৰ সাক্ষাৎকাৰ। "내일 면접이 있어요." = "কাইলৈ মোৰ সাক্ষাৎকাৰ আছে।"',
                    'level'          => 'intermediate',
                ],
                [
                    'question_text'  => '월급 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'job',            'romanization' => '일/직업'],
                        ['text' => 'bonus',          'romanization' => '보너스'],
                        ['text' => 'allowance',      'romanization' => '용돈'],
                        ['text' => 'monthly salary', 'romanization' => '월급'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '월급 = 월 (month) + 급 (pay). It means monthly salary. "월급날이 언제예요?" = "When is payday?"',
                    'explanation_as' => '월급 = 월 (মাহ) + 급 (বেতন)। মানে মাহিলী দৰমহা। "월급날이 언제예요?" = "দৰমহাৰ দিন কেতিয়া?"',
                    'level'          => 'intermediate',
                ],
                [
                    'question_text'  => '회사원 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'teacher',       'romanization' => '선생님'],
                        ['text' => 'chef',          'romanization' => '요리사'],
                        ['text' => 'journalist',    'romanization' => '기자'],
                        ['text' => 'office worker', 'romanization' => '회사원'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '회사원 = 회사 (company) + 원 (member/person). It means a company employee or office worker.',
                    'explanation_as' => '회사원 = 회사 (কোম্পানী) + 원 (সদস্য)। মানে কোম্পানীৰ কৰ্মচাৰী বা অফিচ কৰ্মী।',
                    'level'          => 'intermediate',
                ],
                [
                    'question_text'  => '기자 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'driver',     'romanization' => '운전기사'],
                        ['text' => 'singer',     'romanization' => '가수'],
                        ['text' => 'journalist', 'romanization' => '기자'],
                        ['text' => 'engineer',   'romanization' => '기술자'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '기자 means journalist or reporter. "그 사람은 기자예요." = "That person is a journalist."',
                    'explanation_as' => '기자 মানে সাংবাদিক। "그 사람은 기자예요." = "সেই মানুহজন এজন সাংবাদিক।"',
                    'level'          => 'intermediate',
                ],
                [
                    'question_text'  => '요리사 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'cook / chef', 'romanization' => '요리사'],
                        ['text' => 'nurse',       'romanization' => '간호사'],
                        ['text' => 'artist',      'romanization' => '예술가'],
                        ['text' => 'dancer',      'romanization' => '댄서'],
                    ],
                    'correct_index'  => 0,
                    'explanation_en' => '요리사 means cook or chef. 요리 means cooking and 사 (師) means a professional/master.',
                    'explanation_as' => '요리사 মানে ৰান্ধনী বা চেফ। 요리 মানে ৰন্ধা-বঢ়া আৰু 사 মানে পেছাদাৰ ব্যক্তি।',
                    'level'          => 'intermediate',
                ],
            ],

            'telephone-conversations' => [
                [
                    'question_text'  => '여보세요 is used when:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'saying goodbye',          'romanization' => '안녕히 계세요'],
                        ['text' => 'answering/starting a call','romanization' => '여보세요'],
                        ['text' => 'asking for directions',   'romanization' => ''],
                        ['text' => 'ordering food',           'romanization' => ''],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '여보세요 is the Korean equivalent of "Hello?" when answering a phone call or getting someone\'s attention on the phone.',
                    'explanation_as' => '여보세요 হল ফোন তোলোঁতে বা কথা পতাৰ আৰম্ভণিতে কোৱা "হেলো?" ৰ সমতুল্য।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '잠깐만요 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'I understand',           'romanization' => '알겠어요'],
                        ['text' => 'Please wait a moment',  'romanization' => '잠깐만요'],
                        ['text' => 'Thank you',              'romanization' => '감사합니다'],
                        ['text' => 'I am sorry',             'romanization' => '죄송합니다'],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '잠깐만요 means "Just a moment please" or "Please hold on." It is very common in telephone conversations.',
                    'explanation_as' => '잠깐만요 মানে "এটু ৰাওক" বা "অনুগ্ৰহ কৰি ধৰি থাকক।" ফোনত এইটো সচৰাচৰ ব্যৱহাৰ হয়।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '메시지를 남기다 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'to make a call',     'romanization' => '전화하다'],
                        ['text' => 'to hang up',         'romanization' => '끊다'],
                        ['text' => 'to leave a message', 'romanization' => '메시지를 남기다'],
                        ['text' => 'to answer the phone','romanization' => '전화를 받다'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '메시지를 남기다 = to leave a message. 메시지 (message) + 를 (object particle) + 남기다 (to leave behind).',
                    'explanation_as' => '메시지를 남기다 = বাৰ্তা এৰি যোৱা। 메시지 + 를 + 남기다 (এৰি যোৱা)।',
                    'level'          => 'beginner',
                ],
                [
                    'question_text'  => '통화 중이에요 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'The call ended',   'romanization' => ''],
                        ['text' => 'Please call back', 'romanization' => ''],
                        ['text' => 'The line is busy', 'romanization' => '통화 중이에요'],
                        ['text' => 'Wrong number',     'romanization' => ''],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '통화 means "phone call/conversation" and 중 means "in the middle of." Together: "I am on a call / The line is busy."',
                    'explanation_as' => '통화 মানে "ফোন কথোপকথন" আৰু 중 মানে "মাজত।" একত্ৰে: "মই ফোনত আছোঁ / লাইন ব্যস্ত।"',
                    'level'          => 'beginner',
                ],
            ],

            'shopping-and-bargaining' => [
                [
                    'question_text'  => '깎아 주세요 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'Please wrap it',           'romanization' => '포장해 주세요'],
                        ['text' => 'Please give me a receipt', 'romanization' => '영수증 주세요'],
                        ['text' => 'Please give me a discount','romanization' => '깎아 주세요'],
                        ['text' => 'Please give me a bag',     'romanization' => '봉투 주세요'],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '깎다 means to cut/shave (the price). 깎아 주세요 = "Please cut the price" = "Please give me a discount." Very useful in traditional markets.',
                    'explanation_as' => '깎다 মানে (দাম) কাটা। 깎아 주세요 = "দাম কমাই দিয়ক।" পৰম্পৰাগত বজাৰত অত্যন্ত উপযোগী।',
                    'level'          => 'intermediate',
                ],
                [
                    'question_text'  => '현금으로 드릴게요 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'I will pay by card',  'romanization' => ''],
                        ['text' => 'I will pay in cash',  'romanization' => ''],
                        ['text' => 'I need change',       'romanization' => ''],
                        ['text' => 'Give me cash',        'romanization' => ''],
                    ],
                    'correct_index'  => 1,
                    'explanation_en' => '현금 = cash, 으로 = with/by, 드릴게요 = I will give (honorific). Together: "I will give (pay) in cash."',
                    'explanation_as' => '현금 = নগদ, 으로 = দ্বাৰা, 드릴게요 = দিম (সন্মানসূচক)। একত্ৰে: "নগদে পৰিশোধ কৰিম।"',
                    'level'          => 'intermediate',
                ],
                [
                    'question_text'  => '영수증 주세요 means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'Do you have a bag?',        'romanization' => ''],
                        ['text' => 'Can I exchange this?',      'romanization' => ''],
                        ['text' => 'Please give me a receipt',  'romanization' => '영수증 주세요'],
                        ['text' => 'What is the price?',        'romanization' => ''],
                    ],
                    'correct_index'  => 2,
                    'explanation_en' => '영수증 means receipt and 주세요 means "please give me." Always useful when shopping!',
                    'explanation_as' => '영수증 মানে ৰচিদ আৰু 주세요 মানে "দিয়ক।" কিনা-কটাৰ সময়ত সদায় উপকাৰী!',
                    'level'          => 'intermediate',
                ],
                [
                    'question_text'  => '더 싼 것 있어요? means:',
                    'type'           => 'multiple_choice',
                    'options'        => [
                        ['text' => 'Is this on sale?',          'romanization' => ''],
                        ['text' => 'Do you have a larger size?','romanization' => ''],
                        ['text' => 'Can I try this on?',        'romanization' => ''],
                        ['text' => 'Do you have anything cheaper?','romanization' => '더 싼 것 있어요?'],
                    ],
                    'correct_index'  => 3,
                    'explanation_en' => '더 = more, 싼 = cheap (adjective form of 싸다), 것 = thing, 있어요? = do you have? Together: "Do you have anything cheaper?"',
                    'explanation_as' => '더 = বেছি, 싼 = সস্তা (싸다-ৰ বিশেষণ ৰূপ), 것 = বস্তু, 있어요? = আছে নে? একত্ৰে: "আৰু সস্তা কিবা আছে নে?"',
                    'level'          => 'intermediate',
                ],
            ],
        ];
    }
}
