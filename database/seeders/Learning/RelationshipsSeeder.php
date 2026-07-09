<?php

namespace Database\Seeders\Learning;

use Illuminate\Database\Seeder;
use App\Models\Learning\Lesson;
use App\Models\Learning\Vocabulary;
use App\Models\Learning\GrammarPoint;
use App\Models\Learning\Conversation;
use App\Models\Learning\CulturalNote;
use App\Models\Learning\QuizQuestion;

/**
 * Links all seeded content objects to lessons via pivot tables.
 * Uses slug/korean/title lookups — not hardcoded IDs — so this
 * seeder is order-independent relative to other seeders.
 *
 * Pivot tables:
 *   lesson_vocabulary         (lesson_id, vocabulary_id, order_index)
 *   lesson_grammar            (lesson_id, grammar_id, order_index)
 *   lesson_conversations      (lesson_id, conversation_id, order_index)
 *   lesson_cultural_notes     (lesson_id, cultural_note_id, order_index)
 *   lesson_quiz_questions     (lesson_id, quiz_question_id, order_index)
 */
class RelationshipsSeeder extends Seeder
{
    // ── Caches ─────────────────────────────────────────────────────────────────
    private array $lessonCache        = [];
    private array $vocabCache         = [];
    private array $grammarCache       = [];
    private array $convCache          = [];
    private array $noteCache          = [];
    private array $quizCache          = [];

    public function run(): void
    {
        $this->buildCaches();

        // Module 2 — Daily Life
        $this->linkLesson('days-months-dates');
        $this->linkLesson('food-and-drinks');
        $this->linkLesson('shopping-and-money');
        $this->linkLesson('school-and-university');
        $this->linkLesson('transport-and-directions');
        $this->linkLesson('health-and-body');

        // Module 3 — Social Korean
        $this->linkLesson('hobbies-and-free-time');
        $this->linkLesson('making-plans');
        $this->linkLesson('talking-about-family');
        $this->linkLesson('korea-and-assam-culture');
        $this->linkLesson('countries-and-nationalities');
        $this->linkLesson('weather-and-seasons');

        // Module 4 — Grammar Foundations
        $this->linkLesson('past-tense');
        $this->linkLesson('future-and-intentions');
        $this->linkLesson('connecting-ideas');
        $this->linkLesson('giving-reasons');
        $this->linkLesson('negation-and-inability');
        $this->linkLesson('honorifics-deep-dive');

        // Module 5 — Real-World Korean
        $this->linkLesson('at-a-korean-restaurant');
        $this->linkLesson('asking-for-directions');
        $this->linkLesson('at-the-hospital');
        $this->linkLesson('comparisons-and-preferences');
        $this->linkLesson('emotions-and-opinions');
        $this->linkLesson('travel-and-tourism');

        // Module 6 — Expanding Expression
        $this->linkLesson('korean-work-culture');
        $this->linkLesson('telephone-conversations');
        $this->linkLesson('shopping-and-bargaining');
        $this->linkLesson('describing-experiences');
        $this->linkLesson('korean-festivals-holidays');
        $this->linkLesson('intermediate-review');
    }

    // ── Build lookup caches ────────────────────────────────────────────────────

    private function buildCaches(): void
    {
        foreach (Lesson::all()       as $l) { $this->lessonCache[$l->slug]       = $l; }
        foreach (Vocabulary::all()   as $v) { $this->vocabCache[$v->korean]      = $v; }
        foreach (GrammarPoint::all() as $g) { $this->grammarCache[$g->title_ko]  = $g; }
        foreach (Conversation::all() as $c) { $this->convCache[$c->title_en]     = $c; }
        foreach (CulturalNote::all() as $n) { $this->noteCache[$n->title_en]     = $n; }

        // Quiz questions by question_text for stable lookup
        foreach (QuizQuestion::all() as $q) {
            $this->quizCache[$q->question_text] = $q;
        }
    }

    // ── Generic attach helper ──────────────────────────────────────────────────

    private function linkLesson(string $slug): void
    {
        $lesson = $this->lessonCache[$slug] ?? null;
        if (! $lesson) {
            $this->command?->warn("Lesson '$slug' not found — skipping.");
            return;
        }

        $this->attachVocab($lesson, ...$this->vocabFor($slug));
        $this->attachGrammar($lesson, ...$this->grammarFor($slug));
        $this->attachConversations($lesson, ...$this->conversationsFor($slug));
        $this->attachNotes($lesson, ...$this->notesFor($slug));
        $this->attachQuiz($lesson, ...$this->quizFor($slug));
    }

    private function attachVocab(Lesson $lesson, string ...$koreans): void
    {
        $pivot = [];
        foreach ($koreans as $i => $ko) {
            $v = $this->vocabCache[$ko] ?? null;
            if ($v) { $pivot[$v->id] = ['order_index' => $i + 1]; }
        }
        if ($pivot) { $lesson->vocabulary()->syncWithoutDetaching($pivot); }
    }

    private function attachGrammar(Lesson $lesson, string ...$titleKos): void
    {
        $pivot = [];
        foreach ($titleKos as $i => $tk) {
            $g = $this->grammarCache[$tk] ?? null;
            if ($g) { $pivot[$g->id] = ['order_index' => $i + 1]; }
        }
        if ($pivot) { $lesson->grammar()->syncWithoutDetaching($pivot); }
    }

    private function attachConversations(Lesson $lesson, string ...$titleEns): void
    {
        $pivot = [];
        foreach ($titleEns as $i => $te) {
            $c = $this->convCache[$te] ?? null;
            if ($c) { $pivot[$c->id] = ['order_index' => $i + 1]; }
        }
        if ($pivot) { $lesson->conversations()->syncWithoutDetaching($pivot); }
    }

    private function attachNotes(Lesson $lesson, string ...$titleEns): void
    {
        $pivot = [];
        foreach ($titleEns as $i => $te) {
            $n = $this->noteCache[$te] ?? null;
            if ($n) { $pivot[$n->id] = ['order_index' => $i + 1]; }
        }
        if ($pivot) { $lesson->culturalNotes()->syncWithoutDetaching($pivot); }
    }

    private function attachQuiz(Lesson $lesson, string ...$questionTexts): void
    {
        $pivot = [];
        foreach ($questionTexts as $i => $qt) {
            $q = $this->quizCache[$qt] ?? null;
            if ($q) { $pivot[$q->id] = ['order_index' => $i + 1]; }
        }
        if ($pivot) { $lesson->quizQuestions()->syncWithoutDetaching($pivot); }
    }

    // ── Content maps per lesson ────────────────────────────────────────────────
    // Each method returns the korean/title strings for that lesson's content.
    // Keep arrays short — lessons share reusable objects.

    // MODULE 2 — DAILY LIFE ────────────────────────────────────────────────────

    private function vocabFor(string $slug): array
    {
        return match ($slug) {
            'days-months-dates' => [
                '월요일', '화요일', '수요일', '목요일', '금요일', '토요일', '일요일',
                '일월', '이월', '삼월', '사월', '오월', '육월',
                '칠월', '팔월', '구월', '십월', '십일월', '십이월',
                '년', '달', '주', '날', '시', '오전', '오후', '밤', '매일', '항상', '가끔', '자주',
            ],
            'food-and-drinks' => [
                '차', '녹차', '우유', '주스', '국', '찌개', '반찬',
                '비빔밥', '불고기', '떡볶이', '삼겹살', '순두부',
                '달다', '짜다', '시다', '쓰다', '배고프다', '배부르다',
                '먹다', '마시다', '요리하다', '주문하다', '포장되다',
            ],
            'shopping-and-money' => [
                '돈', '가격', '얼마', '비싸다', '싸다', '할인', '영수증',
                '카드', '현금', '사다', '팔다', '계산하다', '시장', '백화점', '물건',
            ],
            'school-and-university' => [
                '대학교', '교수', '교실', '수업', '숙제', '시험', '성적',
                '도서관', '캠퍼스', '졸업', '강의', '발표', '과제', '전공', '장학금',
            ],
            'transport-and-directions' => [
                '버스', '택시', '기차', '비행기', '자동차', '자전거', '걸어서',
                '정류장', '역', '공항', '오른쪽', '왼쪽', '직진', '근처', '얼마나 걸려요',
            ],
            'health-and-body' => [
                '머리', '눈', '코', '귀', '입', '손', '발', '배',
                '아프다', '약', '의사', '간호사', '두통', '감기', '열', '약국', '건강',
            ],

            // MODULE 3
            'hobbies-and-free-time' => [
                '취미', '음악', '노래', '영화', '책', '운동', '축구',
                '수영', '여행', '독서', '그림', '사진', '게임', '등산', '요가',
            ],
            'making-plans' => [
                '날', '시', '오전', '오후', '밤', '매일', '가끔', '자주',
            ],
            'talking-about-family' => [
                '달', '주', '년',
            ],
            'korea-and-assam-culture' => [
                '한복', '한류', '케이팝', '드라마', '추석', '설날', '태권도', '인사', '존경', '문화',
            ],
            'countries-and-nationalities' => [
                '한국', '한국인', '인도', '인도인', '미국', '일본', '중국', '영국', '외국인', '언어',
            ],
            'weather-and-seasons' => [
                '날씨', '맑다', '흐리다', '비', '눈', '바람', '더워요', '추워요',
                '봄', '여름', '가을', '겨울', '강', '산', '바다',
            ],

            // MODULE 4
            'past-tense' => ['먹다', '가다', '말하다', '듣다', '만나다'],
            'future-and-intentions' => ['시작하다', '끝나다', '도착하다', '출발하다'],
            'connecting-ideas' => ['생각하다', '알다', '모르다'],
            'giving-reasons' => ['도와주다', '기다리다', '찾다'],
            'negation-and-inability' => ['읽다', '쓰다', '보다'],
            'honorifics-deep-dive' => ['인사', '존경'],

            // MODULE 5
            'at-a-korean-restaurant' => [
                '비빔밥', '불고기', '떡볶이', '삼겹살', '순두부', '국', '찌개', '반찬',
                '먹다', '마시다', '주문하다', '달다', '짜다', '맵다',
            ],
            'asking-for-directions' => [
                '오른쪽', '왼쪽', '직진', '근처', '얼마나 걸려요',
                '버스', '역', '걸어서', '정류장',
            ],
            'at-the-hospital' => [
                '아프다', '약', '의사', '간호사', '두통', '감기', '열', '약국', '건강',
                '머리', '눈', '코', '귀', '입', '손', '발', '배',
            ],
            'comparisons-and-preferences' => ['좋아하다', '싫어하다', '사랑하다'],
            'emotions-and-opinions' => [
                '기분', '행복하다', '슬프다', '화나다', '무섭다', '걱정되다',
                '기쁘다', '피곤하다', '신나다', '그립다',
            ],
            'travel-and-tourism' => [
                '비행기', '공항', '여행', '기차', '버스', '호텔',
            ],

            // MODULE 6
            'korean-work-culture' => [
                '일', '회사', '회사원', '선생님', '요리사', '운전기사', '가수', '기자', '월급', '면접',
            ],
            'telephone-conversations' => ['말하다', '듣다'],
            'shopping-and-bargaining' => [
                '돈', '가격', '얼마', '비싸다', '싸다', '할인', '영수증', '카드', '현금',
                '사다', '팔다', '계산하다', '시장', '백화점',
            ],
            'describing-experiences' => ['생각하다', '알다', '모르다', '그립다'],
            'korean-festivals-holidays' => [
                '추석', '설날', '한복', '문화', '케이팝', '드라마', '한류',
            ],
            'intermediate-review' => [
                '중요하다', '다르다', '같다', '재미있다', '어렵다', '쉽다',
            ],

            default => [],
        };
    }

    private function grammarFor(string $slug): array
    {
        // Grammar point title_ko strings from original LearningSeeder + new GrammarSeeder
        return match ($slug) {
            'days-months-dates' => [
                '이다 / 아니다 (be / not be)',
                '이/가 있다 vs. 이/가 없다',
            ],
            'food-and-drinks' => [
                '을/를 (목적격 조사)',
                '에서 (Location particle — action)',
                '-고 (나열/순서)',
            ],
            'shopping-and-money' => [
                '은/는 (주제 조사)',
                '고 싶다 (원하다)',
            ],
            'school-and-university' => [
                '고 싶다 (원하다)',
                '에서 (Location particle — action)',
            ],
            'transport-and-directions' => [
                '에 가다 / 에 있다',
                '이/가 있다 vs. 이/가 없다',
            ],
            'health-and-body' => [
                '이다 / 아니다 (be / not be)',
                '이/가 있다 vs. 이/가 없다',
            ],
            'hobbies-and-free-time' => [
                '고 싶다 (원하다)',
                '도 (포함)',
                '-고 (나열/순서)',
            ],
            'making-plans' => [
                '-(으)ㄹ 거예요 (미래/의도)',
                '-(으)면 어때요? (제안)',
                '을/를 (목적격 조사)',
            ],
            'talking-about-family' => [
                '은/는 (주제 조사)',
                '이다 / 아니다 (be / not be)',
            ],
            'korea-and-assam-culture' => [
                '에 대해서 (about / regarding)',
                '-지만 (대조)',
            ],
            'countries-and-nationalities' => [
                '이다 / 아니다 (be / not be)',
                '은/는 (주제 조사)',
            ],
            'weather-and-seasons' => [
                '-아/어서 (이유/순서)',
                '-고 (나열/순서)',
            ],
            'past-tense' => [
                '-었어요 / -았어요 (과거 시제)',
            ],
            'future-and-intentions' => [
                '-(으)ㄹ 거예요 (미래/의도)',
                '-(으)ㄹ게요 (약속/의지)',
            ],
            'connecting-ideas' => [
                '-고 (나열/순서)',
                '-지만 (대조)',
                '-(으)면 어때요? (제안)',
            ],
            'giving-reasons' => [
                '-아/어서 (이유/순서)',
                '-기 때문에 (이유 - 격식)',
            ],
            'negation-and-inability' => [
                '안 + 동사 (부정)',
                '못 + 동사 (불가능)',
            ],
            'honorifics-deep-dive' => [
                '-(으)세요 (공손한 명령)',
                '에 대해서 (about / regarding)',
            ],
            'at-a-korean-restaurant' => [
                '을/를 (목적격 조사)',
                '에서 (Location particle — action)',
                '고 싶다 (원하다)',
            ],
            'asking-for-directions' => [
                '에 가다 / 에 있다',
                '-아/어서 (이유/순서)',
                '-(으)ㄹ 때 (시간 표현)',
            ],
            'at-the-hospital' => [
                '이/가 있다 vs. 이/가 없다',
                '안 + 동사 (부정)',
                '못 + 동사 (불가능)',
            ],
            'comparisons-and-preferences' => [
                '-지만 (대조)',
                '고 싶다 (원하다)',
            ],
            'emotions-and-opinions' => [
                '-아/어서 (이유/순서)',
                '-기 때문에 (이유 - 격식)',
            ],
            'travel-and-tourism' => [
                '-(으)ㄹ 거예요 (미래/의도)',
                '-(으)면 (조건)',
            ],
            'korean-work-culture' => [
                '-(으)세요 (공손한 명령)',
                '에 대해서 (about / regarding)',
            ],
            'telephone-conversations' => [
                '-(으)ㄹ게요 (약속/의지)',
                '-(으)면 (조건)',
            ],
            'shopping-and-bargaining' => [
                '-고 (나열/순서)',
                '-아/어서 (이유/순서)',
            ],
            'describing-experiences' => [
                '-었어요 / -았어요 (과거 시제)',
                '-(으)ㄹ 때 (시간 표현)',
            ],
            'korean-festivals-holidays' => [
                '-고 (나열/순서)',
                '에 대해서 (about / regarding)',
            ],
            'intermediate-review' => [
                '-었어요 / -았어요 (과거 시제)',
                '-(으)ㄹ 거예요 (미래/의도)',
                '-지만 (대조)',
                '-아/어서 (이유/순서)',
                '-기 때문에 (이유 - 격식)',
                '안 + 동사 (부정)',
                '못 + 동사 (불가능)',
            ],
            default => [],
        };
    }

    private function conversationsFor(string $slug): array
    {
        return match ($slug) {
            'food-and-drinks',
            'at-a-korean-restaurant'
                => ['At a Korean Restaurant'],

            'transport-and-directions',
            'asking-for-directions'
                => ['Asking for Directions near Dibrugarh University'],

            'health-and-body',
            'at-the-hospital'
                => ['At the Pharmacy'],

            'making-plans'
                => ['Making Weekend Plans'],

            'shopping-and-money',
            'shopping-and-bargaining'
                => ['Shopping at Paltan Market, Dibrugarh'],

            'korea-and-assam-culture',
            'korean-festivals-holidays'
                => ['Bihu and Chuseok — A Cultural Exchange'],

            'school-and-university',
            'countries-and-nationalities'
                => ['University Orientation'],

            'telephone-conversations',
            'korean-work-culture'
                => ['Making a Phone Call'],

            default => [],
        };
    }

    private function notesFor(string $slug): array
    {
        return match ($slug) {
            'food-and-drinks',
            'at-a-korean-restaurant',
            'shopping-and-bargaining'
                => ['Tea Culture — Assam and Korea', 'Rice — The Heart of Both Cuisines', 'Street Food — Tteokbokki and Jolpan'],

            'korea-and-assam-culture',
            'korean-festivals-holidays'
                => ['Bihu and Chuseok — Harvest Festivals', 'K-pop and K-drama in Assam'],

            'hobbies-and-free-time'
                => ['K-pop and K-drama in Assam'],

            'transport-and-directions',
            'travel-and-tourism'
                => ['Rivers — Brahmaputra and Han'],

            'school-and-university',
            'korean-work-culture'
                => ['University Culture — Studying in Assam and Korea'],

            'greetings-and-introductions',
            'honorifics-deep-dive'
                => ['Greeting Customs — Bowing and Folding Hands'],

            'countries-and-nationalities'
                => ['Greeting Customs — Bowing and Folding Hands'],

            default => [],
        };
    }

    private function quizFor(string $slug): array
    {
        return match ($slug) {
            'greetings-and-introductions' => [
                '안녕하세요 means:',
                'How do you say "My name is Priya" in Korean?',
                'What does 감사합니다 mean?',
                'Fill in the blank: 저는 학생_____. (I am a student.)',
                '실례합니다 is used to:',
                'What is the polite way to ask "Where are you from?"',
                'Choose the correct translation of "Nice to meet you":',
                'Complete the sentence: _____ 수호예요. (I am Suho.)',
            ],
            'days-months-dates' => [
                '오늘은 월요일이고 내일은 _____이에요. (Today is Monday so tomorrow is ___.)',
                'How do you say "every day" in Korean?',
                '지금 몇 시예요? — "3시 30분입니다" means:',
                'Which number system is used for telling the time (hours)?',
            ],
            'food-and-drinks',
            'at-a-korean-restaurant' => [
                '비빔밥 is:',
                'How do you politely say "please give me one bowl of rice"?',
                'Fill in the blank: This food is delicious! _____ 맛있어요!',
                '배고프다 means:',
                'Which of these words means "spicy" in Korean?',
            ],
            'transport-and-directions',
            'asking-for-directions' => [
                '오른쪽 means:',
                '지하철역이 _____ 있어요? (Where is the subway station?)',
                'How do you ask "How long does it take?"',
                'What does 근처 mean?',
            ],
            'health-and-body',
            'at-the-hospital' => [
                '머리가 아파요 means:',
                '열이 있어요 means:',
                'Fill in the blank: _____ 주세요. (Please give me medicine.)',
                'Where do you go when you need to buy medicine in Korea?',
            ],
            'past-tense',
            'describing-experiences' => [
                'What is the past tense of 먹다 (to eat) in polite form?',
                'What is the past tense of 가다 (to go) in polite form?',
                '공부하다 (to study) → past tense: 공부_____',
                'Translate: "I met a friend yesterday."',
            ],
            'future-and-intentions',
            'making-plans' => [
                'What is the future form of 먹다 (to eat)?',
                '내일 비가 올 거예요 means:',
                'What is the difference between -(으)ㄹ 거예요 and -(으)ㄹ게요?',
            ],
            'connecting-ideas' => [
                'Choose the connector that means "but / however":',
                'He is tired _____ still studying. (피곤하_____ 아직 공부해요.)',
                'Which sentence is grammatically correct?',
                'Translate: "I shower and then sleep."',
            ],
            'giving-reasons' => [
                'Which sentence is grammatically correct?',
            ],
            'negation-and-inability' => [
                'What is the difference between 안 먹어요 and 못 먹어요?',
                '"I cannot speak Korean." → 한국어를 _____ 해요.',
                'For the 하다 verb 공부하다, the correct NEGATIVE form is:',
            ],
            'korea-and-assam-culture',
            'korean-festivals-holidays' => [
                '추석 (Chuseok) is:',
                '비후 (Bihu) in Assam is most similar to which Korean festival?',
                '한류 (Hallyu) refers to:',
                'In Korean culture, bowing at 30° is appropriate for:',
            ],
            'intermediate-review' => [
                'What is the past tense of 먹다 (to eat) in polite form?',
                '내일 비가 올 거예요 means:',
                'Choose the connector that means "but / however":',
                'What is the difference between 안 먹어요 and 못 먹어요?',
                '추석 (Chuseok) is:',
                '한류 (Hallyu) refers to:',
            ],
            default => [],
        };
    }
}
