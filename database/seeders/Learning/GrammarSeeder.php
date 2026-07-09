<?php

namespace Database\Seeders\Learning;

use Illuminate\Database\Seeder;
use App\Models\Learning\GrammarPoint;

/**
 * Adds 12 grammar points that build progressively on the 14 already in the DB.
 * Covers: past tense, future, connectors, reasons, negation, conditionals,
 * honorific past, and two intermediate patterns.
 */
class GrammarSeeder extends Seeder
{
    public function run(): void
    {
        $points = [

            // ── PAST TENSE ──────────────────────────────────────────────────
            [
                'title_ko'          => '-었어요 / -았어요 (과거 시제)',
                'title_en'          => 'Past Tense — -었어요 / -았어요',
                'title_as'          => 'অতীত কাল — -었어요 / -았어요',
                'pattern_formula'   => '[Verb stem] + 었어요 (dark vowel) / 았어요 (bright vowel ㅏ ㅗ)',
                'explanation_as'    => 'কোৰিয়ান অতীত কালৰ বাবে ক্ৰিয়া মূলত 었어요 বা 았어요 যোগ কৰিব লাগে। মূলৰ শেষ স্বৰ ㅏ বা ㅗ হলে 았어요, বাকী সকলোৰ বাবে 었어요 ব্যৱহাৰ হয়। বিশেষ ক্ষেত্ৰ: 하다 ক্ৰিয়াৰ অতীত হয় 했어요।',
                'explanation_en'    => 'To express the past tense, add 었어요 or 았어요 to the verb stem. If the last vowel in the stem is ㅏ or ㅗ (bright vowels), add 았어요. All other vowels take 었어요. Special case: 하다 verbs become 했어요 in the past.',
                'level'             => 'beginner',
                'category'          => 'tense',
                'examples'          => [
                    ['korean' => '어제 밥을 먹었어요.',        'romanization' => 'eoje babeul meogeosseoyo',      'assamese' => 'কালি ভাত খালো।',          'english' => 'I ate rice yesterday.'],
                    ['korean' => '학교에 갔어요.',             'romanization' => 'hakgyoe gasseoyo',              'assamese' => 'বিদ্যালয়লৈ গৈছিলো।',    'english' => 'I went to school.'],
                    ['korean' => '한국어를 공부했어요.',       'romanization' => 'hangugeoreul gongbughaesseoyo', 'assamese' => 'কোৰিয়ান পঢ়িছিলো।',      'english' => 'I studied Korean.'],
                    ['korean' => '어제 비가 왔어요.',          'romanization' => 'eoje biga wasseoyo',            'assamese' => 'কালি বৰষুণ পৰিছিল।',     'english' => 'It rained yesterday.'],
                    ['korean' => '친구를 만났어요.',           'romanization' => 'chinguреул mannasseoyo',        'assamese' => 'বন্ধুক লগ পাইছিলো।',     'english' => 'I met a friend.'],
                ],
            ],

            // ── FUTURE / INTENTION ──────────────────────────────────────────
            [
                'title_ko'          => '-(으)ㄹ 거예요 (미래/의도)',
                'title_en'          => 'Future / Intention — -(으)ㄹ 거예요',
                'title_as'          => 'ভৱিষ্যৎ কাল / ইচ্ছা — -(으)ㄹ 거예요',
                'pattern_formula'   => '[Verb stem] + ㄹ 거예요 (vowel-ending) / 을 거예요 (consonant-ending)',
                'explanation_as'    => 'ভৱিষ্যতে কিবা কৰাৰ পৰিকল্পনা বা ইচ্ছা প্ৰকাশ কৰিবলৈ -(으)ㄹ 거예요 ব্যৱহাৰ কৰা হয়। ক্ৰিয়া মূল স্বৰেৰে শেষ হলে ㄹ 거예요 আৰু ব্যঞ্জনেৰে শেষ হলে 을 거예요 যোগ হয়। ইংৰাজীত "will" বা "going to"ৰ সমতুল্য।',
                'explanation_en'    => 'Expresses a plan, intention, or prediction about the future — equivalent to "will" or "going to." Attach ㄹ 거예요 after vowel-ending stems, 을 거예요 after consonant-ending stems.',
                'level'             => 'beginner',
                'category'          => 'tense',
                'examples'          => [
                    ['korean' => '내일 공부할 거예요.',        'romanization' => 'naeil gongbuhal geoyeyo',       'assamese' => 'কাইলৈ পঢ়িম।',            'english' => 'I will study tomorrow.'],
                    ['korean' => '한국에 갈 거예요.',          'romanization' => 'hanguee gal geoyeyo',           'assamese' => 'কোৰিয়ালৈ যাম।',          'english' => 'I will go to Korea.'],
                    ['korean' => '저녁을 먹을 거예요.',        'romanization' => 'jeonyeogeul meogeul geoyeyo',   'assamese' => 'ৰাতিৰ আহাৰ খাম।',        'english' => 'I will eat dinner.'],
                    ['korean' => '친구를 만날 거예요.',        'romanization' => 'chinguреул mannal geoyeyo',     'assamese' => 'বন্ধুক লগ পাম।',          'english' => 'I will meet a friend.'],
                    ['korean' => '비가 올 거예요.',            'romanization' => 'biga ol geoyeyo',               'assamese' => 'বৰষুণ পৰিব।',             'english' => 'It will rain.'],
                ],
            ],

            // ── -고 CONNECTOR (AND / THEN) ──────────────────────────────────
            [
                'title_ko'          => '-고 (나열/순서)',
                'title_en'          => 'Connector -고 — And / Then',
                'title_as'          => '-고 সংযোগকাৰী — আৰু / তাৰপিছত',
                'pattern_formula'   => '[Verb/Adj stem] + 고 + [next clause]',
                'explanation_as'    => '-고 দুটা ক্ৰিয়া বা বিশেষণ সংযোগ কৰে। "আৰু" বা "তাৰপিছত" অৰ্থ প্ৰকাশ কৰে। কাৰ্যকলাপসমূহ তালিকাভুক্ত কৰিবলৈ বা ক্ৰমানুসাৰে বৰ্ণনা কৰিবলৈ ব্যৱহাৰ হয়। -고 ব্যৱহাৰ কৰিলে কাল পৰিৱৰ্তন নহয় — শেষ ক্ৰিয়াতহে কাল প্ৰকাশ পায়।',
                'explanation_en'    => '-고 connects two verbs or adjectives, meaning "and" or "and then." Use it to list actions or describe a sequence of events. Tense is only marked on the final verb — the -고 part stays in the base form.',
                'level'             => 'beginner',
                'category'          => 'connective',
                'examples'          => [
                    ['korean' => '아침에 밥을 먹고 학교에 가요.',    'romanization' => 'achime babeul meokgo hakgyoe gayo',           'assamese' => 'পুৱাতে ভাত খাই বিদ্যালয়লৈ যাওঁ।', 'english' => 'I eat rice and then go to school.'],
                    ['korean' => '도서관에서 책을 읽고 공부해요.',   'romanization' => 'doseogwaneseo chaekeul ikgo gongbuhaeyo',      'assamese' => 'পুথিভঁৰালত কিতাপ পঢ়ি পঢ়া-শুনা কৰো।', 'english' => 'I read books at the library and study.'],
                    ['korean' => '키가 크고 눈이 커요.',             'romanization' => 'kiga keugo nuni keoyo',                        'assamese' => 'ওখ আৰু চকু ডাঙৰ।',                  'english' => 'He/she is tall and has big eyes.'],
                    ['korean' => '샤워하고 잠을 자요.',              'romanization' => 'syawohago jameul jayo',                         'assamese' => 'গা ধুই শুওঁ।',                        'english' => 'I shower and then sleep.'],
                ],
            ],

            // ── -지만 (BUT) ─────────────────────────────────────────────────
            [
                'title_ko'          => '-지만 (대조)',
                'title_en'          => 'Contrast — -지만 (but / however)',
                'title_as'          => 'বৈপৰীত্য — -지만 (কিন্তু)',
                'pattern_formula'   => '[Verb/Adj stem] + 지만 + [contrasting clause]',
                'explanation_as'    => '-지만 দুটা বিপৰীত ভাব প্ৰকাশ কৰে, যেনে ইংৰাজী "but" বা "however।" প্ৰথম অংশত কিবা এটা কোৱা হয় আৰু -지만ৰ পিছত বিপৰীত বা আচৰিত কথা যোগ হয়। -지만 পূৰ্বৱৰ্তী ক্ৰিয়াত সংযোজিত হয়, তাৰ কাল অনুযায়ী।',
                'explanation_en'    => '-지만 connects two contrasting clauses — equivalent to "but" or "however." The first clause states one thing, and the clause after -지만 presents a contrast or unexpected information. Attach directly to the verb or adjective stem.',
                'level'             => 'beginner',
                'category'          => 'connective',
                'examples'          => [
                    ['korean' => '한국어가 어렵지만 재미있어요.',   'romanization' => 'hangugeoga eoryeopjiman jaemiisseoyo', 'assamese' => 'কোৰিয়ান কঠিন কিন্তু মজাদাৰ।',       'english' => 'Korean is difficult but interesting.'],
                    ['korean' => '비가 오지만 나가요.',             'romanization' => 'biga ojiman nagayo',                    'assamese' => 'বৰষুণ পৰিছে কিন্তু ওলাই যাওঁ।',      'english' => 'It is raining but I am going out.'],
                    ['korean' => '피곤하지만 공부해요.',            'romanization' => 'pigonhajiman gongbuhaeyo',              'assamese' => 'ভাগৰিছো কিন্তু পঢ়িছো।',              'english' => 'I am tired but I am studying.'],
                    ['korean' => '비싸지만 맛있어요.',              'romanization' => 'bissajiman massisseoyo',                 'assamese' => 'দামী কিন্তু সুস্বাদু।',                'english' => 'It is expensive but delicious.'],
                ],
            ],

            // ── -아/어서 (REASON / SEQUENTIAL) ─────────────────────────────
            [
                'title_ko'          => '-아/어서 (이유/순서)',
                'title_en'          => 'Reason & Sequence — -아/어서',
                'title_as'          => 'কাৰণ আৰু ক্ৰম — -아/어서',
                'pattern_formula'   => '[Verb/Adj stem] + 아서 (bright vowel) / 어서 (dark vowel) + [result/next action]',
                'explanation_as'    => '-아/어서 দুটা কাম ব্যৱহাৰ হয়: (১) কাৰণ প্ৰকাশ কৰিবলৈ — "কাৰণে, সেয়ে" অৰ্থত; (২) ক্ৰমানুসাৰী কাৰ্য বৰ্ণনা কৰিবলৈ — "কৰি তাৰপিছত" অৰ্থত। গুৰুত্বপূৰ্ণ: -아/어서 ব্যৱহাৰ কৰিলে আদেশ বা প্ৰস্তাৱনা দিব নোৱাৰি — তাৰ বাবে -기 때문에 ব্যৱহাৰ কৰিব।',
                'explanation_en'    => '-아/어서 has two uses: (1) expressing reason — "because / so"; (2) describing a sequence — "after doing X, then Y." Important: cannot be used with commands or suggestions — use -기 때문에 for those.',
                'level'             => 'beginner',
                'category'          => 'connective',
                'examples'          => [
                    ['korean' => '배고파서 밥을 먹어요.',           'romanization' => 'baegopaseo babeul meogeoyo',     'assamese' => 'ভোক লাগিছে সেয়ে ভাত খাওঁ।',   'english' => 'I am hungry so I eat rice.'],
                    ['korean' => '손을 씻어서 밥을 먹어요.',        'romanization' => 'soneul ssisseoseo babeul meogeoyo','assamese' => 'হাত ধুই ভাত খাওঁ।',            'english' => 'I wash my hands and then eat.'],
                    ['korean' => '비가 와서 집에 있어요.',          'romanization' => 'biga waseo jibe isseoyo',        'assamese' => 'বৰষুণ পৰিছে সেয়ে ঘৰত আছো।', 'english' => 'Because it is raining I am home.'],
                    ['korean' => '서울에 가서 친구를 만났어요.',    'romanization' => 'seoure gaseo chinguреул mannasseoyo','assamese' => 'ছিউললৈ গৈ বন্ধুক লগ পালো।', 'english' => 'I went to Seoul and met a friend.'],
                ],
            ],

            // ── -기 때문에 (FORMAL REASON) ──────────────────────────────────
            [
                'title_ko'          => '-기 때문에 (이유 - 격식)',
                'title_en'          => 'Formal Reason — -기 때문에',
                'title_as'          => 'আনুষ্ঠানিক কাৰণ — -기 때문에',
                'pattern_formula'   => '[Verb stem] + 기 때문에 + [result clause]',
                'explanation_as'    => '-기 때문에 "কাৰণে, সেয়ে" বোজায় কিন্তু -아/어서তকৈ বেছি আনুষ্ঠানিক। লিখিত ভাষা আৰু আনুষ্ঠানিক পৰিৱেশত ব্যৱহাৰ হয়। -아/어서ৰ বিপৰীতে এই গঠনৰ পিছত আদেশ বা পৰামৰ্শ দিব পাৰি।',
                'explanation_en'    => '-기 때문에 also means "because / since" but is more formal than -아/어서. Used in writing and formal speech. Unlike -아/어서, it CAN be followed by commands and suggestions.',
                'level'             => 'intermediate',
                'category'          => 'connective',
                'examples'          => [
                    ['korean' => '시간이 없기 때문에 못 가요.',     'romanization' => 'sigani eopgi ttaemune mot gayo',   'assamese' => 'সময় নথকাৰ কাৰণে যাব নোৱাৰো।', 'english' => 'I cannot go because I have no time.'],
                    ['korean' => '한국어가 중요하기 때문에 공부해요.','romanization' => 'hangugeoga junggyohagi ttaemune gongbuhaeyo','assamese' => 'কোৰিয়ান গুৰুত্বপূৰ্ণ কাৰণে পঢ়ো।','english' => 'I study because Korean is important.'],
                    ['korean' => '비가 오기 때문에 우산을 쓰세요.', 'romanization' => 'biga ogi ttaemune usaneul seuseyo',  'assamese' => 'বৰষুণ পৰিছে কাৰণে চাতি ব্যৱহাৰ কৰক।','english' => 'Use an umbrella because it is raining.'],
                    ['korean' => '건강하기 때문에 운동이 중요해요.','romanization' => 'geonganghagi ttaemune undongi junggyohaeyo','assamese' => 'সুস্থ থাকিবলৈ ব্যায়াম গুৰুত্বপূৰ্ণ।','english' => 'Exercise is important to be healthy.'],
                ],
            ],

            // ── 안 NEGATION ─────────────────────────────────────────────────
            [
                'title_ko'          => '안 + 동사 (부정)',
                'title_en'          => 'Short Negation — 안 + Verb',
                'title_as'          => 'সংক্ষিপ্ত অস্বীকৃতি — 안 + ক্ৰিয়া',
                'pattern_formula'   => '안 + [Verb in 아/어요 form]',
                'explanation_as'    => '안 ক্ৰিয়াৰ আগত ৰাখি সহজ অস্বীকৃতি প্ৰকাশ কৰা হয়। সাধাৰণ কথোপকথনত এই চুটি ৰূপটো বেছি ব্যৱহাৰ হয়। কিন্তু 하다 ক্ৰিয়াৰ বাবে 안 শব্দটো হ্যান্ডেলৰ আগত ৰাখিব লাগে: 공부안해요 নহয়, 공부 안 해요 শুদ্ধ।',
                'explanation_en'    => '안 placed before a verb creates a simple negation. This short form is preferred in everyday conversation. For 하다 verbs, 안 goes between the noun and 하다: not 공부안해요, but 공부 안 해요.',
                'level'             => 'beginner',
                'category'          => 'negation',
                'examples'          => [
                    ['korean' => '오늘 학교에 안 가요.',            'romanization' => 'oneul hakgyoe an gayo',     'assamese' => 'আজি বিদ্যালয়লৈ নাযাওঁ।',     'english' => 'I am not going to school today.'],
                    ['korean' => '고기를 안 먹어요.',               'romanization' => 'gogireul an meogeoyo',     'assamese' => 'মাংস নাখাওঁ।',                 'english' => 'I do not eat meat.'],
                    ['korean' => '한국어 공부 안 해요.',            'romanization' => 'hangugeoreo gongbu an haeyo','assamese' => 'কোৰিয়ান পঢ়া নকৰো।',          'english' => 'I do not study Korean.'],
                    ['korean' => '오늘은 안 피곤해요.',             'romanization' => 'oneureun an pigonhaeyo',    'assamese' => 'আজি ভাগৰিয়া নহয়।',           'english' => 'I am not tired today.'],
                ],
            ],

            // ── 못 NEGATION (INABILITY) ─────────────────────────────────────
            [
                'title_ko'          => '못 + 동사 (불가능)',
                'title_en'          => 'Inability — 못 + Verb',
                'title_as'          => 'অপাৰগতা — 못 + ক্ৰিয়া',
                'pattern_formula'   => '못 + [Verb in 아/어요 form]',
                'explanation_as'    => '못 "পাৰো না" অৰ্থ প্ৰকাশ কৰে — হয় বাহ্যিক কাৰণত, নহয় দক্ষতাৰ অভাৱত। 안ৰ সৈতে পাৰ্থক্য: 안 = নকৰো (ইচ্ছা নাই), 못 = নোৱাৰো (পাৰো না)। 하다 ক্ৰিয়াৰ বাবে: 공부 못 해요।',
                'explanation_en'    => '못 expresses inability — "cannot" due to external circumstances or lack of skill. Key distinction: 안 = "do not" (choice), 못 = "cannot" (inability). For 하다 verbs: 공부 못 해요.',
                'level'             => 'beginner',
                'category'          => 'negation',
                'examples'          => [
                    ['korean' => '오늘 학교에 못 가요.',            'romanization' => 'oneul hakgyoe mot gayo',     'assamese' => 'আজি বিদ্যালয়লৈ যাব নোৱাৰো।', 'english' => 'I cannot go to school today.'],
                    ['korean' => '한국어를 못 해요.',               'romanization' => 'hangugeoreul mot haeyo',    'assamese' => 'কোৰিয়ান কব নোৱাৰো।',          'english' => 'I cannot speak Korean.'],
                    ['korean' => '매운 음식을 못 먹어요.',          'romanization' => 'maeeun eumsigueul mot meogeoyo','assamese' => 'জলা খাদ্য খাব নোৱাৰো।',     'english' => 'I cannot eat spicy food.'],
                    ['korean' => '바빠서 공부 못 했어요.',          'romanization' => 'bappaseo gongbu mot haesseoyo','assamese' => 'ব্যস্ত আছিলো সেয়ে পঢ়িব নোৱাৰিলো।','english' => 'I was busy so I could not study.'],
                ],
            ],

            // ── -(으)ㄹ 때 (WHEN) ───────────────────────────────────────────
            [
                'title_ko'          => '-(으)ㄹ 때 (시간 표현)',
                'title_en'          => 'Time Expression — -(으)ㄹ 때 (when)',
                'title_as'          => 'সময় প্ৰকাশ — -(으)ㄹ 때 (কেতিয়া)',
                'pattern_formula'   => '[Verb/Adj stem] + ㄹ 때 (vowel-ending) / 을 때 (consonant-ending)',
                'explanation_as'    => '-(으)ㄹ 때 "কেতিয়া" বা "সময়ত" অৰ্থ প্ৰকাশ কৰে। কোনো ক্ৰিয়া বা অৱস্থাৰ সময় বৰ্ণনা কৰিবলৈ ব্যৱহাৰ হয়। স্বৰেৰে শেষ হোৱা মূলত ㄹ 때, ব্যঞ্জনেৰে শেষ হোৱা মূলত 을 때 যোগ হয়।',
                'explanation_en'    => '-(으)ㄹ 때 means "when" and expresses the time at which an action or state occurs. Add ㄹ 때 after vowel-ending stems and 을 때 after consonant-ending stems.',
                'level'             => 'intermediate',
                'category'          => 'time',
                'examples'          => [
                    ['korean' => '피곤할 때 커피를 마셔요.',        'romanization' => 'pigonhal ttae keopireul masyeoyo',  'assamese' => 'ভাগৰিলে কফি খাওঁ।',            'english' => 'I drink coffee when I am tired.'],
                    ['korean' => '한국에 갈 때 한복을 입어요.',     'romanization' => 'hanguee gal ttae hanbogueul ibeoyo', 'assamese' => 'কোৰিয়ালৈ যাওঁতে হানবক পিন্ধো।','english' => 'I wear hanbok when I go to Korea.'],
                    ['korean' => '시험이 있을 때 열심히 공부해요.','romanization' => 'siheomi isseul ttae yeolsimhi gongbuhaeyo','assamese' => 'পৰীক্ষা থাকিলে মনোযোগেৰে পঢ়ো।','english' => 'I study hard when there is an exam.'],
                    ['korean' => '어릴 때 한국어를 배웠어요.',      'romanization' => 'eorril ttae hangugeoreul baewosseoyo',  'assamese' => 'ধেমালি কালত কোৰিয়ান শিকিছিলো।','english' => 'I learned Korean when I was young.'],
                ],
            ],

            // ── -(으)면 (IF / CONDITIONAL) ──────────────────────────────────
            [
                'title_ko'          => '-(으)면 (조건)',
                'title_en'          => 'Conditional — -(으)면 (if)',
                'title_as'          => 'শর্ত — -(으)면 (যদি)',
                'pattern_formula'   => '[Verb/Adj stem] + 면 (vowel-ending) / 으면 (consonant-ending)',
                'explanation_as'    => '-(으)면 "যদি" বা "যদিহে" অৰ্থ প্ৰকাশ কৰে। এটা শর্ত পূৰণ হলে আন এটা কাম হব বুজাবলৈ ব্যৱহাৰ হয়। স্বৰেৰে শেষ হোৱা মূলত 면, ব্যঞ্জনেৰে শেষ হোৱা মূলত 으면 যোগ হয়।',
                'explanation_en'    => '-(으)면 expresses a condition — "if / when (condition is met), then (result)." Add 면 after vowel-ending stems, 으면 after consonant-ending stems.',
                'level'             => 'intermediate',
                'category'          => 'conditional',
                'examples'          => [
                    ['korean' => '시간이 있으면 같이 가요.',        'romanization' => 'sigani isseumyeon gachi gayo',    'assamese' => 'সময় থাকিলে একেলগে যাওঁ।',     'english' => 'If you have time, let\'s go together.'],
                    ['korean' => '열심히 공부하면 성공해요.',       'romanization' => 'yeolsimhi gongbuhamyeon seonggonghaeyo','assamese' => 'মনোযোগেৰে পঢ়িলে সফল হোৱা যায়।','english' => 'If you study hard, you will succeed.'],
                    ['korean' => '비가 오면 우산을 쓰세요.',        'romanization' => 'biga omyeon usaneul seuseyo',      'assamese' => 'বৰষুণ পৰিলে চাতি ব্যৱহাৰ কৰক।','english' => 'If it rains, use an umbrella.'],
                    ['korean' => '한국에 가면 김치를 먹어 보세요.','romanization' => 'hanguee gamyeon kimchireul meogeo boseyo','assamese' => 'কোৰিয়ালৈ গলে কিমচি খাই চাওক।','english' => 'If you go to Korea, try eating kimchi.'],
                ],
            ],

            // ── -(으)ㄹ게요 (PROMISE / WILL) ────────────────────────────────
            [
                'title_ko'          => '-(으)ㄹ게요 (약속/의지)',
                'title_en'          => 'Promise / Willingness — -(으)ㄹ게요',
                'title_as'          => 'প্ৰতিশ্ৰুতি / ইচ্ছাশক্তি — -(으)ㄹ게요',
                'pattern_formula'   => '[Verb stem] + ㄹ게요 (vowel-ending) / 을게요 (consonant-ending)',
                'explanation_as'    => '-(으)ㄹ 거예요 আৰু -(으)ㄹ게요 দুয়োটাই ভৱিষ্যৎ বুজায়, কিন্তু -(으)ㄹ게요 বিশেষভাৱে কথকৰ প্ৰতিশ্ৰুতি বা সিদ্ধান্ত প্ৰকাশ কৰে — "মই কৰিম" (শুনোৱাজনৰ প্ৰতিক্ৰিয়াত)। -(으)ㄹ 거예요 কেৱল পৰিকল্পনা বুজায়।',
                'explanation_en'    => 'Both -(으)ㄹ 거예요 and -(으)ㄹ게요 express the future, but -(으)ㄹ게요 specifically shows the speaker\'s promise or decision in response to the listener — "I will (do it)." -(으)ㄹ 거예요 states a plan regardless of the listener.',
                'level'             => 'intermediate',
                'category'          => 'verb-ending',
                'examples'          => [
                    ['korean' => '제가 할게요.',                    'romanization' => 'jega halkkeyo',                     'assamese' => 'মই কৰিম।',                      'english' => 'I will do it.'],
                    ['korean' => '내일 전화할게요.',                'romanization' => 'naeil jeonhwahalkkeyo',             'assamese' => 'কাইলৈ ফোন কৰিম।',              'english' => 'I will call tomorrow.'],
                    ['korean' => '늦지 않을게요.',                  'romanization' => 'neutji aneulkkeyo',                 'assamese' => 'দেৰি নকৰিম।',                  'english' => 'I will not be late.'],
                    ['korean' => '열심히 공부할게요.',              'romanization' => 'yeolsimhi gongbuhalkkeyo',          'assamese' => 'মনোযোগেৰে পঢ়িম।',             'english' => 'I will study hard.'],
                ],
            ],

            // ── -(으)면 어때요? (SUGGESTION) ────────────────────────────────
            [
                'title_ko'          => '-(으)면 어때요? (제안)',
                'title_en'          => 'Making Suggestions — -(으)면 어때요?',
                'title_as'          => 'পৰামৰ্শ দিয়া — -(으)면 어때요?',
                'pattern_formula'   => '[Verb stem] + (으)면 어때요?',
                'explanation_as'    => '-(으)면 어때요? "... কৰিলে কেনেকুৱা হব?" অৰ্থ প্ৰকাশ কৰে — কোনো পৰামৰ্শ দিবলৈ বা মতামত জানিবলৈ ব্যৱহাৰ হয়। ইংৰাজীত "How about...?" বা "Why don\'t you...?"ৰ সমতুল্য।',
                'explanation_en'    => '-(으)면 어때요? means "How about doing...?" or "What if you...?" — used to make gentle suggestions or ask for opinions. A polite and common way to recommend something.',
                'level'             => 'intermediate',
                'category'          => 'expression',
                'examples'          => [
                    ['korean' => '쉬면 어때요?',                    'romanization' => 'swimyeon eottaeyo',                 'assamese' => 'বিশ্ৰাম ললে কেনেকুৱা হব?',     'english' => 'How about resting?'],
                    ['korean' => '한국 음식을 먹어 보면 어때요?',  'romanization' => 'hanguk eumsigueul meogeo bomyeon eottaeyo', 'assamese' => 'কোৰিয়ান খাদ্য খাই চালে কেনেকুৱা?','english' => 'How about trying Korean food?'],
                    ['korean' => '같이 공부하면 어때요?',           'romanization' => 'gachi gongbuhamyeon eottaeyo',       'assamese' => 'একেলগে পঢ়িলে কেনেকুৱা হব?',  'english' => 'How about studying together?'],
                ],
            ],

        ];

        foreach ($points as $p) {
            GrammarPoint::firstOrCreate(['title_ko' => $p['title_ko']], $p);
        }
    }
}
