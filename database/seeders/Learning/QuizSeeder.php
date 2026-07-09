<?php

namespace Database\Seeders\Learning;

use Illuminate\Database\Seeder;
use App\Models\Learning\QuizQuestion;

/**
 * Seeds quiz questions across all levels and topics.
 * Questions are reusable standalone objects — they are linked to lessons
 * via the RelationshipsSeeder (lesson_quiz_questions pivot).
 *
 * Types: multiple_choice | fill_in_blank | matching | translation
 */
class QuizSeeder extends Seeder
{
    public function run(): void
    {
        $this->greetingsAndBasics();
        $this->numbersAndTime();
        $this->foodAndDrinks();
        $this->transportAndDirections();
        $this->bodyAndHealth();
        $this->grammarPastTense();
        $this->grammarFuture();
        $this->grammarConnectors();
        $this->grammarNegation();
        $this->cultureAndFestivals();
    }

    // ── 1. GREETINGS & BASICS (lesson: greetings-and-introductions) ──────────
    private function greetingsAndBasics(): void
    {
        $questions = [
            [
                'type'          => 'multiple_choice',
                'question_text' => '안녕하세요 means:',
                'options'       => [
                    ['text' => 'Goodbye'],
                    ['text' => 'Hello / How are you? (Recommended)'],
                    ['text' => 'Thank you'],
                    ['text' => 'I am sorry'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '안녕하세요 is the standard polite greeting in Korean, used at any time of day.',
                'explanation_as'=> '안녕하세요 কোৰিয়ানৰ মানক সৌজন্যপূৰ্ণ অভিনন্দন, দিনৰ যিকোনো সময়তে ব্যৱহাৰ কৰা হয়।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'How do you say "My name is Priya" in Korean?',
                'options'       => [
                    ['text' => '저는 프리야예요.'],
                    ['text' => '제 이름 프리야.'],
                    ['text' => '나 프리야입니다.'],
                    ['text' => '내가 프리야다.'],
                ],
                'correct_index' => 0,
                'explanation_en'=> '저는 [Name]예요 / 이에요 is the polite way to introduce yourself. Use 예요 after a vowel, 이에요 after a consonant.',
                'explanation_as'=> '저는 [নাম]예요 / 이에요 হয় নিজকে পৰিচয় দিয়াৰ সৌজন্যপূৰ্ণ উপায়।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'What does 감사합니다 mean?',
                'options'       => [
                    ['text' => 'Excuse me'],
                    ['text' => 'I am sorry'],
                    ['text' => 'Thank you (formal)'],
                    ['text' => 'See you later'],
                ],
                'correct_index' => 2,
                'explanation_en'=> '감사합니다 is the formal way to say thank you. Informal: 고마워요 or 고마워.',
                'explanation_as'=> '감사합니다 ধন্যবাদ কোৱাৰ আনুষ্ঠানিক উপায়। অনানুষ্ঠানিক: 고마워요।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'fill_in_blank',
                'question_text' => 'Fill in the blank: 저는 학생_____. (I am a student.)',
                'options'       => [
                    ['text' => '이에요'],
                    ['text' => '예요'],
                    ['text' => '해요'],
                    ['text' => '있어요'],
                ],
                'correct_index' => 0,
                'explanation_en'=> 'After the noun 학생 (student) which ends in a consonant (ㅇ as the final consonant of 생), we use 이에요.',
                'explanation_as'=> '학생 (ছাত্ৰ) ব্যঞ্জনেৰে শেষ হোৱা বাবে 이에요 ব্যৱহাৰ হয়।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => '실례합니다 is used to:',
                'options'       => [
                    ['text' => 'Say goodbye'],
                    ['text' => 'Excuse yourself / get someone\'s attention politely'],
                    ['text' => 'Apologise sincerely'],
                    ['text' => 'Introduce a friend'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '실례합니다 literally means "I am being rude" and is used to politely excuse yourself or get attention.',
                'explanation_as'=> '실례합니다ৰ আক্ষৰিক অৰ্থ "মই অভদ্ৰ হৈছো" আৰু সৌজন্যেৰে মনোযোগ আকৰ্ষণ কৰিবলৈ ব্যৱহাৰ হয়।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'What is the polite way to ask "Where are you from?"',
                'options'       => [
                    ['text' => '어디서 왔어요?'],
                    ['text' => '어디 가요?'],
                    ['text' => '어디 있어요?'],
                    ['text' => '어디예요?'],
                ],
                'correct_index' => 0,
                'explanation_en'=> '어디서 왔어요? = "Where did you come from?" 어디서 = from where, 왔어요 = came.',
                'explanation_as'=> '어디서 왔어요? = "ক\'ৰ পৰা আহিছা?" 어디서 = ক\'ৰ পৰা, 왔어요 = আহিছে।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'Choose the correct translation of "Nice to meet you":',
                'options'       => [
                    ['text' => '반갑습니다'],
                    ['text' => '괜찮아요'],
                    ['text' => '잠깐만요'],
                    ['text' => '어서 오세요'],
                ],
                'correct_index' => 0,
                'explanation_en'=> '반갑습니다 (or 반가워요 informally) means "Nice to meet you" and is said when meeting someone for the first time.',
                'explanation_as'=> '반갑습니다 (বা অনানুষ্ঠানিকভাৱে 반가워요) মানে "আপোনাক লগ পাই ভাল লাগিল"।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'fill_in_blank',
                'question_text' => 'Complete the sentence: _____ 수호예요. (I am Suho.)',
                'options'       => [
                    ['text' => '제가'],
                    ['text' => '저는'],
                    ['text' => '나는'],
                    ['text' => '내가'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '저는 is the polite topic marker form of "I" (저). Both 저는 and 제가 are correct, but 저는 [Name]예요 is the standard introduction formula.',
                'explanation_as'=> '저는 হয় "মই"ৰ সৌজন্যপূৰ্ণ ৰূপ। 저는 [নাম]예요 হয় মানক পৰিচয় সূত্ৰ।',
                'level'         => 'beginner',
            ],
        ];

        foreach ($questions as $q) {
            QuizQuestion::firstOrCreate(['question_text' => $q['question_text']], $q);
        }
    }

    // ── 2. NUMBERS & TIME ────────────────────────────────────────────────────
    private function numbersAndTime(): void
    {
        $questions = [
            [
                'type'          => 'multiple_choice',
                'question_text' => '오 (5) + 삼 (3) = ?',
                'options'       => [['text' => '칠'], ['text' => '팔'], ['text' => '여덟'], ['text' => '구']],
                'correct_index' => 1,
                'explanation_en'=> '5 + 3 = 8. In Sino-Korean: 팔 (pal). In Native Korean: 여덟 (yeodeol).',
                'explanation_as'=> '5 + 3 = 8। চীনো-কোৰিয়ানত: 팔। স্থানীয় কোৰিয়ানত: 여덟।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'Which number system is used for telling the time (hours)?',
                'options'       => [
                    ['text' => 'Sino-Korean (일, 이, 삼...)'],
                    ['text' => 'Native Korean (하나, 둘, 셋...)'],
                    ['text' => 'Either can be used'],
                    ['text' => 'Arabic numerals only'],
                ],
                'correct_index' => 1,
                'explanation_en'=> 'Hours are counted with Native Korean numbers (한 시, 두 시, 세 시...). Minutes use Sino-Korean (일 분, 이 분...).',
                'explanation_as'=> 'ঘণ্টা স্থানীয় কোৰিয়ান সংখ্যাৰে গণনা কৰা হয় (한 시, 두 시...)। মিনিটত চীনো-কোৰিয়ান (일 분, 이 분...)।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => '지금 몇 시예요? — "3시 30분입니다" means:',
                'options'       => [
                    ['text' => 'It is 3:03'],
                    ['text' => 'It is 3:30'],
                    ['text' => 'It is 30:03'],
                    ['text' => 'It is 13:30'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '세 시 삼십 분 = 3 hours and 30 minutes = 3:30.',
                'explanation_as'=> 'তিনি বাজি ত্ৰিশ মিনিট = ৩:৩০।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'fill_in_blank',
                'question_text' => '오늘은 월요일이고 내일은 _____이에요. (Today is Monday so tomorrow is _____.)',
                'options'       => [
                    ['text' => '화요일'],
                    ['text' => '수요일'],
                    ['text' => '목요일'],
                    ['text' => '금요일'],
                ],
                'correct_index' => 0,
                'explanation_en'=> 'The days of the week in order: 월 (Mon), 화 (Tue), 수 (Wed), 목 (Thu), 금 (Fri), 토 (Sat), 일 (Sun).',
                'explanation_as'=> 'সপ্তাহৰ দিনসমূহ: 월 (সোমবাৰ), 화 (মঙলবাৰ), 수 (বুধবাৰ), 목 (বৃহস্পতিবাৰ), 금 (শুক্ৰবাৰ), 토 (শনিবাৰ), 일 (ৰবিবাৰ)।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'How do you say "every day" in Korean?',
                'options'       => [
                    ['text' => '오늘'],
                    ['text' => '내일'],
                    ['text' => '매일'],
                    ['text' => '어제'],
                ],
                'correct_index' => 2,
                'explanation_en'=> '매일 means "every day." 오늘 = today, 내일 = tomorrow, 어제 = yesterday.',
                'explanation_as'=> '매일 মানে "প্ৰতিদিন।" 오늘 = আজি, 내일 = কাইলৈ, 어제 = কালি।',
                'level'         => 'beginner',
            ],
        ];

        // Fix the malformed options in question 1
        $questions[0]['options'] = [
            ['text' => '칠'],
            ['text' => '팔'],
            ['text' => '여덟'],
            ['text' => '구'],
        ];

        foreach ($questions as $q) {
            QuizQuestion::firstOrCreate(['question_text' => $q['question_text']], $q);
        }
    }

    // ── 3. FOOD & DRINKS ─────────────────────────────────────────────────────
    private function foodAndDrinks(): void
    {
        $questions = [
            [
                'type'          => 'multiple_choice',
                'question_text' => '비빔밥 is:',
                'options'       => [
                    ['text' => 'Spicy rice cakes'],
                    ['text' => 'Mixed rice with vegetables and sauce'],
                    ['text' => 'Fermented cabbage'],
                    ['text' => 'Korean barbecued pork'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '비빔밥 (bibimbap) = mixed rice. 비비다 = to mix, 밥 = rice. Topped with vegetables, egg, and gochujang.',
                'explanation_as'=> '비빔밥 (বিবিম্বাব) = মিশ্ৰিত ভাত। 비비다 = মিহলাই, 밥 = ভাত। শাকপাচলি, কণী, আৰু গোচুজাংৰে সজোৱা।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'How do you politely say "please give me one bowl of rice"?',
                'options'       => [
                    ['text' => '밥 하나 줘.'],
                    ['text' => '밥 하나 주세요.'],
                    ['text' => '밥 하나 있어요?'],
                    ['text' => '밥 하나 먹을게요.'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '[item] + [quantity] + 주세요 is the polite ordering formula. 주세요 = please give me.',
                'explanation_as'=> '[বস্তু] + [পৰিমাণ] + 주세요 হয় সৌজন্যপূৰ্ণ অৰ্ডাৰৰ সূত্ৰ। 주세요 = দিয়ক।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'fill_in_blank',
                'question_text' => 'This food is delicious! _____ 맛있어요!',
                'options'       => [
                    ['text' => '이것은'],
                    ['text' => '이것이'],
                    ['text' => '이게'],
                    ['text' => '이걸'],
                ],
                'correct_index' => 0,
                'explanation_en'=> '이것은 = "This (topic)" — marks "this" as the topic of the sentence. 이것이 also works (subject marker).',
                'explanation_as'=> '이것은 = "এইটো (বিষয়)" — "এইটো"ক বাক্যৰ বিষয় হিচাপে চিহ্নিত কৰে।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => '배고프다 means:',
                'options'       => [
                    ['text' => 'I am thirsty'],
                    ['text' => 'I am full'],
                    ['text' => 'I am hungry'],
                    ['text' => 'The food is spicy'],
                ],
                'correct_index' => 2,
                'explanation_en'=> '배고프다 (baegopda) = to be hungry. 배 = stomach, 고프다 = to be empty/hungry. Opposite: 배부르다 = to be full.',
                'explanation_as'=> '배고프다 = ভোক লগা। 배 = পেট, 고프다 = খালী থকা। বিপৰীত: 배부르다 = পেট ভৰা।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'Which of these words means "spicy" in Korean?',
                'options'       => [
                    ['text' => '달다'],
                    ['text' => '짜다'],
                    ['text' => '맵다'],
                    ['text' => '쓰다'],
                ],
                'correct_index' => 2,
                'explanation_en'=> '맵다 = spicy. 달다 = sweet, 짜다 = salty, 쓰다 = bitter, 시다 = sour.',
                'explanation_as'=> '맵다 = জলা। 달다 = মিঠা, 짜다 = নিমখীয়া, 쓰다 = তিতা, 시다 = টেঙা।',
                'level'         => 'beginner',
            ],
        ];

        foreach ($questions as $q) {
            QuizQuestion::firstOrCreate(['question_text' => $q['question_text']], $q);
        }
    }

    // ── 4. TRANSPORT & DIRECTIONS ────────────────────────────────────────────
    private function transportAndDirections(): void
    {
        $questions = [
            [
                'type'          => 'multiple_choice',
                'question_text' => '오른쪽 means:',
                'options'       => [
                    ['text' => 'Left'],
                    ['text' => 'Straight ahead'],
                    ['text' => 'Right'],
                    ['text' => 'Behind'],
                ],
                'correct_index' => 2,
                'explanation_en'=> '오른쪽 = right. 왼쪽 = left, 직진 = straight ahead, 뒤 = behind.',
                'explanation_as'=> '오른쪽 = সোঁফাল। 왼쪽 = বাঁওফাল, 직진 = পোনে, 뒤 = পিছফাল।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'fill_in_blank',
                'question_text' => '지하철역이 _____ 있어요? (Where is the subway station?)',
                'options'       => [
                    ['text' => '어디에'],
                    ['text' => '어디서'],
                    ['text' => '어디를'],
                    ['text' => '어디가'],
                ],
                'correct_index' => 0,
                'explanation_en'=> '어디에 있어요? = "Where is [it]?" The particle 에 marks location. 어디서 = "from where."',
                'explanation_as'=> '어디에 있어요? = "[ই] ক\'ত আছে?" কণ 에 স্থান চিহ্নিত কৰে। 어디서 = "ক\'ৰ পৰা।"',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'How do you ask "How long does it take?"',
                'options'       => [
                    ['text' => '얼마예요?'],
                    ['text' => '얼마나 걸려요?'],
                    ['text' => '몇 시예요?'],
                    ['text' => '어디서 왔어요?'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '얼마나 걸려요? = "How long does it take?" 걸리다 = to take (time). 얼마나 = how much/many.',
                'explanation_as'=> '얼마나 걸려요? = "কিমান সময় লাগে?" 걸리다 = লগা (সময়)। 얼마나 = কিমান।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'What does 근처 mean?',
                'options'       => [
                    ['text' => 'Far away'],
                    ['text' => 'Nearby / in the vicinity'],
                    ['text' => 'Opposite direction'],
                    ['text' => 'Entrance'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '근처 (guncheo) = nearby, in the vicinity. Used in: 역 근처에 있어요 = It is near the station.',
                'explanation_as'=> '근처 = ওচৰত, নিকটৱৰ্তী। ব্যৱহাৰ: 역 근처에 있어요 = ষ্টেশ্বনৰ ওচৰত আছে।',
                'level'         => 'beginner',
            ],
        ];

        foreach ($questions as $q) {
            QuizQuestion::firstOrCreate(['question_text' => $q['question_text']], $q);
        }
    }

    // ── 5. BODY & HEALTH ─────────────────────────────────────────────────────
    private function bodyAndHealth(): void
    {
        $questions = [
            [
                'type'          => 'multiple_choice',
                'question_text' => '머리가 아파요 means:',
                'options'       => [
                    ['text' => 'My stomach hurts'],
                    ['text' => 'I have a headache'],
                    ['text' => 'I have a fever'],
                    ['text' => 'I am tired'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '머리 = head, 아프다 = to hurt/be sick. 머리가 아파요 = My head hurts (headache).',
                'explanation_as'=> '머리 = মূৰ, 아프다 = বিষোৱা। 머리가 아파요 = মোৰ মূৰ বিষাইছে।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => '열이 있어요 means:',
                'options'       => [
                    ['text' => 'I have energy'],
                    ['text' => 'I have a fever'],
                    ['text' => 'I am hot'],
                    ['text' => 'I have a cold'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '열 = fever/heat, 있어요 = have. 감기 = cold (illness). 열이 있어요 ≠ I am hot (날씨가 더워요 = the weather is hot).',
                'explanation_as'=> '열 = জ্বৰ, 있어요 = আছে। 감기 = চৰ্দি। 열이 있어요 ≠ মই গৰম (날씨가 더워요 = বতৰ গৰম)।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'fill_in_blank',
                'question_text' => 'At the pharmacy: _____ 주세요. (Please give me medicine.)',
                'options'       => [
                    ['text' => '약을'],
                    ['text' => '약이'],
                    ['text' => '약은'],
                    ['text' => '약도'],
                ],
                'correct_index' => 0,
                'explanation_en'=> '약을 주세요 = Please give me medicine. 을 is the object particle attached to 약 (medicine) as the object of 주다 (to give).',
                'explanation_as'=> '약을 주세요 = ঔষধ দিয়ক। 을 হয় কৰ্ম কণ, 약 (ঔষধ)-ৰ সৈতে যোগ হয়।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'Where do you go when you need to buy medicine in Korea?',
                'options'       => [
                    ['text' => '병원 (hospital)'],
                    ['text' => '약국 (pharmacy)'],
                    ['text' => '편의점 (convenience store)'],
                    ['text' => '시장 (market)'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '약국 (yakguk) = pharmacy/drugstore. 병원 = hospital (for seeing doctors). In Korea, pharmacies are everywhere and very accessible.',
                'explanation_as'=> '약국 = ঔষধালয়। 병원 = চিকিৎসালয় (ডাক্তৰ দেখা)। কোৰিয়াত ঔষধালয় সৰ্বত্ৰ পোৱা যায়।',
                'level'         => 'beginner',
            ],
        ];

        foreach ($questions as $q) {
            QuizQuestion::firstOrCreate(['question_text' => $q['question_text']], $q);
        }
    }

    // ── 6. GRAMMAR: PAST TENSE ───────────────────────────────────────────────
    private function grammarPastTense(): void
    {
        $questions = [
            [
                'type'          => 'multiple_choice',
                'question_text' => 'What is the past tense of 먹다 (to eat) in polite form?',
                'options'       => [
                    ['text' => '먹어요'],
                    ['text' => '먹었어요'],
                    ['text' => '먹을 거예요'],
                    ['text' => '먹겠어요'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '먹다 stem = 먹. Last vowel ㅓ is a dark vowel, so add 었어요 → 먹었어요.',
                'explanation_as'=> '먹다ৰ মূল = 먹। শেষ স্বৰ ㅓ অন্ধকাৰ স্বৰ, সেয়ে 었어요 যোগ হয় → 먹었어요।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'What is the past tense of 가다 (to go) in polite form?',
                'options'       => [
                    ['text' => '갔어요'],
                    ['text' => '가었어요'],
                    ['text' => '가요'],
                    ['text' => '갈 거예요'],
                ],
                'correct_index' => 0,
                'explanation_en'=> '가다: stem = 가. Last vowel ㅏ is a bright vowel, so add 았어요 → 가+았어요 → contracts to 갔어요.',
                'explanation_as'=> '가다: মূল = 가। শেষ স্বৰ ㅏ উজ্জ্বল স্বৰ, সেয়ে 았어요 যোগ → 가+았어요 → সংকোচিত হয় 갔어요।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'fill_in_blank',
                'question_text' => '공부하다 (to study) → past tense: 공부_____',
                'options'       => [
                    ['text' => '했어요'],
                    ['text' => '하었어요'],
                    ['text' => '하았어요'],
                    ['text' => '할 거예요'],
                ],
                'correct_index' => 0,
                'explanation_en'=> '하다 verbs are special — their past tense is always 했어요 (하+였어요 → 했어요). So 공부했어요.',
                'explanation_as'=> '하다 ক্ৰিয়া বিশেষ — তেওঁলোকৰ অতীত সদায় 했어요 (하+였어요 → 했어요)। সেয়ে 공부했어요।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'Translate: "I met a friend yesterday."',
                'options'       => [
                    ['text' => '어제 친구를 만나요.'],
                    ['text' => '어제 친구를 만났어요.'],
                    ['text' => '어제 친구를 만날 거예요.'],
                    ['text' => '어제 친구가 만나요.'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '만나다 → past: 만났어요. 친구를 = friend (object). 어제 = yesterday.',
                'explanation_as'=> '만나다 → অতীত: 만났어요। 친구를 = বন্ধু (কৰ্ম)। 어제 = কালি।',
                'level'         => 'beginner',
            ],
        ];

        foreach ($questions as $q) {
            QuizQuestion::firstOrCreate(['question_text' => $q['question_text']], $q);
        }
    }

    // ── 7. GRAMMAR: FUTURE ───────────────────────────────────────────────────
    private function grammarFuture(): void
    {
        $questions = [
            [
                'type'          => 'multiple_choice',
                'question_text' => 'What is the future form of 먹다 (to eat)?',
                'options'       => [
                    ['text' => '먹었어요'],
                    ['text' => '먹어요'],
                    ['text' => '먹을 거예요'],
                    ['text' => '먹겠어요'],
                ],
                'correct_index' => 2,
                'explanation_en'=> '먹다 stem = 먹 (ends in consonant), so add 을 거예요 → 먹을 거예요.',
                'explanation_as'=> '먹다 মূল = 먹 (ব্যঞ্জনেৰে শেষ), সেয়ে 을 거예요 যোগ → 먹을 거예요।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => '내일 비가 올 거예요 means:',
                'options'       => [
                    ['text' => 'It rained yesterday'],
                    ['text' => 'It is raining now'],
                    ['text' => 'It will rain tomorrow'],
                    ['text' => 'It does not rain here'],
                ],
                'correct_index' => 2,
                'explanation_en'=> '내일 = tomorrow, 비가 오다 = rain comes, 올 거예요 = will come. "It will rain tomorrow."',
                'explanation_as'=> '내일 = কাইলৈ, 비가 오다 = বৰষুণ পৰে, 올 거예요 = পৰিব। "কাইলৈ বৰষুণ পৰিব।"',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'What is the difference between -(으)ㄹ 거예요 and -(으)ㄹ게요?',
                'options'       => [
                    ['text' => 'No difference — both mean the same thing'],
                    ['text' => '거예요 = personal plan; ㄹ게요 = promise to the listener'],
                    ['text' => '거예요 = past intention; ㄹ게요 = present action'],
                    ['text' => '거예요 is formal; ㄹ게요 is informal'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '거예요 states a plan or prediction regardless of listener. ㄹ게요 is a promise or decision made in response to the listener ("I will do it for you / in response to this situation").',
                'explanation_as'=> '거예요 শুনোৱাজনৰ নিৰ্বিশেষে পৰিকল্পনা বা অনুমান প্ৰকাশ কৰে। ㄹ게요 শুনোৱাজনৰ প্ৰতিক্ৰিয়াত প্ৰতিশ্ৰুতি প্ৰকাশ কৰে।',
                'level'         => 'intermediate',
            ],
        ];

        foreach ($questions as $q) {
            QuizQuestion::firstOrCreate(['question_text' => $q['question_text']], $q);
        }
    }

    // ── 8. GRAMMAR: CONNECTORS (-고, -지만, -아/어서) ────────────────────────
    private function grammarConnectors(): void
    {
        $questions = [
            [
                'type'          => 'multiple_choice',
                'question_text' => 'Choose the connector that means "but / however":',
                'options'       => [
                    ['text' => '-고'],
                    ['text' => '-지만'],
                    ['text' => '-아서'],
                    ['text' => '-(으)면'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '-지만 = but / however (contrast). -고 = and/then, -아서 = because/so/sequence, -(으)면 = if.',
                'explanation_as'=> '-지만 = কিন্তু (বৈপৰীত্য)। -고 = আৰু/তাৰপিছত, -아서 = কাৰণে/সেয়ে, -(으)면 = যদি।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'fill_in_blank',
                'question_text' => 'He is tired _____ still studying. (피곤하_____ 아직 공부해요.)',
                'options'       => [
                    ['text' => '-고'],
                    ['text' => '-지만'],
                    ['text' => '-아서'],
                    ['text' => '-기 때문에'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '-지만 connects two contrasting facts: "tired" vs "still studying."',
                'explanation_as'=> '-지만 দুটা বিপৰীত তথ্য সংযোগ কৰে: "ভাগৰিছে" বনাম "এতিয়াও পঢ়িছে।"',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'Which sentence is grammatically correct?',
                'options'       => [
                    ['text' => '배고파서 밥을 먹었어요.'],
                    ['text' => '배고파서 밥을 먹어라.'],
                    ['text' => '배고파서 밥을 먹어도 돼요?'],
                    ['text' => '배고파서 밥을 드세요.'],
                ],
                'correct_index' => 0,
                'explanation_en'=> '-아/어서 (reason) cannot be followed by commands or requests — that makes 배고파서 밥을 먹어라 / 드세요 wrong. Only declarative or question forms are correct after -아/어서.',
                'explanation_as'=> '-아/어서 (কাৰণ)-ৰ পিছত আদেশ বা অনুৰোধ নিদিব — সেয়ে 먹어라 / 드세요 ভুল। কেৱল বিবৃতি বা প্ৰশ্ন শুদ্ধ।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'Translate: "I shower and then sleep."',
                'options'       => [
                    ['text' => '샤워하지만 잠을 자요.'],
                    ['text' => '샤워해서 잠을 자요.'],
                    ['text' => '샤워하고 잠을 자요.'],
                    ['text' => '샤워하면 잠을 자요.'],
                ],
                'correct_index' => 2,
                'explanation_en'=> '-고 expresses sequence of actions: "do X and then do Y." 샤워하고 잠을 자요 = shower and (then) sleep.',
                'explanation_as'=> '-고 কাৰ্যৰ ক্ৰম প্ৰকাশ কৰে: "X কৰি তাৰপিছত Y কৰা।" 샤워하고 잠을 자요 = গা ধুই তাৰপিছত শোওঁ।',
                'level'         => 'beginner',
            ],
        ];

        foreach ($questions as $q) {
            QuizQuestion::firstOrCreate(['question_text' => $q['question_text']], $q);
        }
    }

    // ── 9. GRAMMAR: NEGATION ─────────────────────────────────────────────────
    private function grammarNegation(): void
    {
        $questions = [
            [
                'type'          => 'multiple_choice',
                'question_text' => 'What is the difference between 안 먹어요 and 못 먹어요?',
                'options'       => [
                    ['text' => 'No difference — both mean "I don\'t eat"'],
                    ['text' => '안 먹어요 = I choose not to eat; 못 먹어요 = I am unable to eat'],
                    ['text' => '안 먹어요 = past; 못 먹어요 = future'],
                    ['text' => '안 먹어요 = formal; 못 먹어요 = informal'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '안 = volitional negation (I choose not to). 못 = ability negation (I cannot / am unable to).',
                'explanation_as'=> '안 = ইচ্ছাকৃত অস্বীকৃতি (মই নকৰো বিছাৰো)। 못 = সামৰ্থ্যৰ অস্বীকৃতি (মই কৰিব নোৱাৰো)।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'fill_in_blank',
                'question_text' => '"I cannot speak Korean." → 한국어를 _____ 해요.',
                'options'       => [
                    ['text' => '안'],
                    ['text' => '못'],
                    ['text' => '없'],
                    ['text' => '아니'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '못 해요 = cannot do. For 하다 verbs: 공부 못 해요 (NOT 못 공부해요).',
                'explanation_as'=> '못 해요 = কৰিব নোৱাৰো। 하다 ক্ৰিয়াৰ বাবে: 공부 못 해요 (못 공부해요 নহয়)।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'For the 하다 verb 공부하다, the correct NEGATIVE form is:',
                'options'       => [
                    ['text' => '안공부해요'],
                    ['text' => '공부안해요'],
                    ['text' => '공부 안 해요'],
                    ['text' => '안 공부해요'],
                ],
                'correct_index' => 2,
                'explanation_en'=> 'For 하다 verbs, 안 goes between the noun and 하다: 공부 안 해요. All one word options are wrong.',
                'explanation_as'=> 'হ্যান্ডা ক্ৰিয়াৰ বাবে, 안 বিশেষ্য আৰু 하다ৰ মাজত ৰখা হয়: 공부 안 해요।',
                'level'         => 'beginner',
            ],
        ];

        foreach ($questions as $q) {
            QuizQuestion::firstOrCreate(['question_text' => $q['question_text']], $q);
        }
    }

    // ── 10. CULTURE & FESTIVALS ──────────────────────────────────────────────
    private function cultureAndFestivals(): void
    {
        $questions = [
            [
                'type'          => 'multiple_choice',
                'question_text' => '추석 (Chuseok) is:',
                'options'       => [
                    ['text' => 'Korean New Year'],
                    ['text' => 'Korean mid-autumn harvest festival'],
                    ['text' => 'Korean Independence Day'],
                    ['text' => 'A Korean spring festival'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '추석 is the mid-autumn harvest festival (15th day of the 8th lunar month). Korean New Year is 설날 (Seollal).',
                'explanation_as'=> '추석 হয় মধ্য শৰৎকালৰ ফচল উৎসৱ। কোৰিয়ান নৱবৰ্ষ হয় 설날 (চোলাল)।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => '비후 (Bihu) in Assam is most similar to which Korean festival?',
                'options'       => [
                    ['text' => '설날 (Seollal — New Year)'],
                    ['text' => '추석 (Chuseok — harvest)'],
                    ['text' => '어린이날 (Children\'s Day)'],
                    ['text' => '광복절 (Liberation Day)'],
                ],
                'correct_index' => 1,
                'explanation_en'=> 'Both Bihu and Chuseok are harvest festivals that bring families together, feature traditional food, music, and dance.',
                'explanation_as'=> 'বিহু আৰু চুছোক উভয়ে ফচল উৎসৱ যি পৰিয়ালক একগোট কৰে, পাৰম্পৰিক খাদ্য, সংগীত, আৰু নৃত্য প্ৰদৰ্শন কৰে।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => '한류 (Hallyu) refers to:',
                'options'       => [
                    ['text' => 'Traditional Korean music'],
                    ['text' => 'The Korean Wave — global spread of Korean pop culture'],
                    ['text' => 'Korean martial arts'],
                    ['text' => 'A Korean river festival'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '한류 (Hallyu) = The Korean Wave — the global popularity of Korean pop culture including K-pop, K-drama, food, fashion.',
                'explanation_as'=> '한류 (হাল্লু) = কোৰিয়ান ঢৌ — কোৰিয়ান পপ সংস্কৃতিৰ বৈশ্বিক জনপ্ৰিয়তা।',
                'level'         => 'beginner',
            ],
            [
                'type'          => 'multiple_choice',
                'question_text' => 'In Korean culture, bowing at 30° is appropriate for:',
                'options'       => [
                    ['text' => 'Greeting peers and friends'],
                    ['text' => 'Greeting elders and people of higher status'],
                    ['text' => 'Formal apologies'],
                    ['text' => 'Thanking a cashier'],
                ],
                'correct_index' => 1,
                'explanation_en'=> '15° = peers, 30° = seniors/higher status, 45° = deep apology or gratitude.',
                'explanation_as'=> '১৫° = সমনীয়া, ৩০° = বয়োজ্যেষ্ঠ/উচ্চ মৰ্যাদাৰ, ৪৫° = গভীৰ ক্ষমা বা কৃতজ্ঞতা।',
                'level'         => 'beginner',
            ],
        ];

        foreach ($questions as $q) {
            QuizQuestion::firstOrCreate(['question_text' => $q['question_text']], $q);
        }
    }
}
