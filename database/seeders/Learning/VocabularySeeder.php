<?php

namespace Database\Seeders\Learning;

use Illuminate\Database\Seeder;
use App\Models\Learning\Vocabulary;

/**
 * Adds ~180 vocabulary entries not yet in the database.
 * Organised by theme to match the curriculum modules.
 * Content order everywhere: Korean → Romanization → Assamese → English.
 */
class VocabularySeeder extends Seeder
{
    private function upsert(array $data): void
    {
        Vocabulary::firstOrCreate(['korean' => $data['korean']], $data);
    }

    public function run(): void
    {
        $this->seedDaysOfWeek();
        $this->seedMonthsOfYear();
        $this->seedDateTimeExpressions();
        $this->seedFoodAndDrinks();
        $this->seedShoppingMoney();
        $this->seedSchoolUniversity();
        $this->seedTransportDirections();
        $this->seedBodyHealth();
        $this->seedHobbiesLeisure();
        $this->seedCountriesNationalities();
        $this->seedWeatherNature();
        $this->seedEmotionsFeelings();
        $this->seedEssentialVerbs();
        $this->seedDescriptiveAdjectives();
        $this->seedWorkProfessions();
        $this->seedKoreanCultureWords();
    }

    // ─── Days of the week ────────────────────────────────────────────────────

    private function seedDaysOfWeek(): void
    {
        $days = [
            ['월요일', 'woryoil',  'সোমবাৰ',   'Monday'],
            ['화요일', 'hwayoil',  'মঙলবাৰ',   'Tuesday'],
            ['수요일', 'suyoil',   'বুধবাৰ',    'Wednesday'],
            ['목요일', 'mogyoil',  'বৃহস্পতিবাৰ','Thursday'],
            ['금요일', 'geumyoil', 'শুক্ৰবাৰ',  'Friday'],
            ['토요일', 'toyoil',   'শনিবাৰ',    'Saturday'],
            ['일요일', 'iryoil',   'দেওবাৰ',    'Sunday'],
        ];

        foreach ($days as [$ko, $rom, $as, $en]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> 'noun',
                'level'         => 'beginner',
                'example_ko'    => '오늘은 ' . $ko . '이에요.',
                'example_as'    => 'আজি ' . $as . '।',
                'example_en'    => 'Today is ' . $en . '.',
            ]);
        }
    }

    // ─── Months ──────────────────────────────────────────────────────────────

    private function seedMonthsOfYear(): void
    {
        $months = [
            ['일월',   'irwol',    'জানুৱাৰী',   'January'],
            ['이월',   'iwol',     'ফেব্ৰুৱাৰী',  'February'],
            ['삼월',   'samwol',   'মাৰ্চ',       'March'],
            ['사월',   'sawol',    'এপ্ৰিল',      'April'],
            ['오월',   'owol',     'মে',          'May'],
            ['유월',   'yuwol',    'জুন',         'June'],
            ['칠월',   'chirwol',  'জুলাই',       'July'],
            ['팔월',   'parwol',   'আগষ্ট',       'August'],
            ['구월',   'guwol',    'ছেপ্টেম্বৰ',  'September'],
            ['시월',   'siwol',    'অক্টোবৰ',    'October'],
            ['십일월', 'sibiwol',  'নৱেম্বৰ',     'November'],
            ['십이월', 'sibiwol2', 'ডিচেম্বৰ',    'December'],
        ];

        foreach ($months as [$ko, $rom, $as, $en]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> 'noun',
                'level'         => 'beginner',
                'example_ko'    => null,
                'example_as'    => null,
                'example_en'    => null,
            ]);
        }
    }

    // ─── Date & time expressions ─────────────────────────────────────────────

    private function seedDateTimeExpressions(): void
    {
        $items = [
            ['년',    'nyeon',      'বছৰ',       'Year',       'noun',    '이 년에 태어났어요.', 'এই বছৰত জন্ম হৈছিল।', 'I was born this year.'],
            ['달',    'dal',        'মাহ',        'Month',      'noun',    '이 달에 여행해요.',  'এই মাহত ভ্ৰমণ কৰো।',   'I travel this month.'],
            ['주',    'ju',         'সপ্তাহ',     'Week',       'noun',    '다음 주에 봐요.',    'আহিলা সপ্তাহত দেখা হব।', 'See you next week.'],
            ['날',    'nal',        'দিন',        'Day',        'noun',    '매일 공부해요.',     'প্ৰতিদিন পঢ়ো।',       'I study every day.'],
            ['시',    'si',         'বাজিছে / ঘণ্টা','O\'clock / Hour','noun','몇 시예요?',      'কেইটা বাজিছে?',         'What time is it?'],
            ['오전',  'ojeon',      'পূৱা',        'AM / Morning','noun',   '오전 9시에 수업이에요.','পূৱা ৯টাত ক্লাছ।',    'Class is at 9 AM.'],
            ['오후',  'ohu',        'বিয়লি',      'PM / Afternoon','noun', '오후 2시에 만나요.', 'বিয়লি ২টাত লগ পাওঁ।', 'Meet at 2 PM.'],
            ['밤',    'bam',        'ৰাতি',        'Night',      'noun',    '밤에 공부해요.',     'ৰাতি পঢ়ো।',            'I study at night.'],
            ['매일',  'maeil',      'প্ৰতিদিন',   'Every day',  'adverb',  '매일 운동해요.',     'প্ৰতিদিন ব্যায়াম কৰো।','I exercise every day.'],
            ['항상',  'hangsang',   'সদায়',       'Always',     'adverb',  '항상 행복하세요.',   'সদায় সুখী থাকিব।',     'Always be happy.'],
            ['가끔',  'gakkeum',    'কেতিয়াবা',  'Sometimes',  'adverb',  '가끔 영화 봐요.',    'কেতিয়াবা চিনেমা চাওঁ।','I sometimes watch movies.'],
            ['자주',  'jaju',       'সঘনাই',      'Often',      'adverb',  '자주 밥 먹어요.',   'সঘনাই ভাত খাওঁ।',       'I eat rice often.'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Food & Drinks (additions — some basics exist already) ───────────────

    private function seedFoodAndDrinks(): void
    {
        $items = [
            ['차',      'cha',       'চাহ',         'Tea',              'noun',       '녹차 한 잔 주세요.',  'এক কাপ সেউজ চাহ দিয়ক।', 'One cup of green tea please.'],
            ['녹차',    'nokcha',    'সেউজ চাহ',    'Green tea',        'noun',       null, null, null],
            ['우유',    'uyu',       'গাখীৰ',       'Milk',             'noun',       '우유 좋아해요.',     'মই গাখীৰ ভাল পাওঁ।',      'I like milk.'],
            ['주스',    'juseu',     'জুচ',          'Juice',            'noun',       '오렌지 주스 주세요.','অৰেঞ্জ জুচ দিয়ক।',        'Give me orange juice.'],
            ['국',      'guk',       'জোল/ছুপ',     'Soup (broth)',     'noun',       '국이 뜨거워요.',     'ছুপটো গৰম।',               'The soup is hot.'],
            ['찌개',    'jjigae',    'মছলাযুক্ত জোল','Stew',            'noun',       '김치찌개 주세요.',   'কিমচি ষ্টু দিয়ক।',         'Give me kimchi stew.'],
            ['반찬',    'banchan',   'পাৰ্শ্ব ব্যঞ্জন','Side dishes',    'noun',       '반찬이 많아요.',     'পাৰ্শ্ব ব্যঞ্জন বহু।',     'There are many side dishes.'],
            ['비빔밥',  'bibimbap',  'বিবিমবাপ',    'Bibimbap (mixed rice)','noun',   '비빔밥 하나 주세요.','এটা বিবিমবাপ দিয়ক।',       'One bibimbap please.'],
            ['불고기',  'bulgogi',   'বুলগোগি (মাংস)','Bulgogi (BBQ beef)','noun',    '불고기가 맛있어요.', 'বুলগোগি সুস্বাদু।',          'Bulgogi is delicious.'],
            ['떡볶이',  'tteokbokki','টেকবোকি',     'Tteokbokki (spicy rice cakes)','noun','떡볶이 좋아해요.','মই টেকবোকি ভাল পাওঁ।', 'I like tteokbokki.'],
            ['삼겹살',  'samgyeopsal','ছামগিয়পছাল','Samgyeopsal (pork belly)','noun', '삼겹살 먹어요.',    'ছামগিয়পছাল খাওঁ।',          'I eat samgyeopsal.'],
            ['순두부',  'sundubu',   'নৰম টোফু',    'Soft tofu',        'noun',       null, null, null],
            ['달다',    'dalda',     'মিঠা',         'Sweet',            'adjective',  '이 케이크가 달아요.','এই কেকটো মিঠা।',            'This cake is sweet.'],
            ['짜다',    'jjada',     'নিমখীয়া',    'Salty',            'adjective',  '국이 짜요.',         'ছুপটো নিমখীয়া।',           'The soup is salty.'],
            ['시다',    'sida',      'টেঙা',         'Sour',             'adjective',  '레몬이 셔요.',       'লেমন টেঙা।',                'Lemon is sour.'],
            ['쓰다',    'sseuda',    'তিতা',         'Bitter',           'adjective',  '약이 써요.',         'ঔষধ তিতা।',                 'Medicine is bitter.'],
            ['배고프다','baegopeuda','ভোক লাগিছে',  'Hungry',           'adjective',  '배고파요.',          'ভোক লাগিছে।',               'I am hungry.'],
            ['배부르다','baebureuda','পেট ভৰিছে',   'Full (not hungry)','adjective',  '배불러요.',          'পেট ভৰিছে।',                'I am full.'],
            ['먹다',    'meokda',    'খোৱা',         'To eat',           'verb',       '밥을 먹어요.',       'ভাত খাওঁ।',                  'I eat rice.'],
            ['마시다',  'masida',    'পান কৰা',      'To drink',         'verb',       '물을 마셔요.',       'পানী পান কৰো।',              'I drink water.'],
            ['요리하다','yorihada',  'ৰন্ধা',         'To cook',          'verb',       '어머니가 요리해요.','মাই ৰান্ধে।',                 'My mother cooks.'],
            ['주문하다','jumunhada', 'অৰ্ডাৰ কৰা',  'To order (food)',  'verb',       '음식을 주문해요.',  'খাদ্য অৰ্ডাৰ কৰো।',          'I order food.'],
            ['포장되다','pojangtoi da','পেক কৰা',    'Takeaway / packed','verb',       '포장해 주세요.',    'পেক কৰি দিয়ক।',             'Please pack it (takeaway).'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Shopping & Money ────────────────────────────────────────────────────

    private function seedShoppingMoney(): void
    {
        $items = [
            ['돈',      'don',       'টকা',         'Money',             'noun',       '돈이 없어요.',       'টকা নাই।',                   'I have no money.'],
            ['가격',    'gagyeok',   'মূল্য/দাম',   'Price',             'noun',       '가격이 얼마예요?',  'মূল্য কিমান?',                'What is the price?'],
            ['얼마',    'eolma',     'কিমান',        'How much',          'noun',       '이게 얼마예요?',    'এইটো কিমান?',                  'How much is this?'],
            ['비싸다',  'bissada',   'দামী',         'Expensive',         'adjective',  '이 옷이 비싸요.',  'এই কাপোৰ দামী।',               'This clothing is expensive.'],
            ['싸다',    'ssada',     'সস্তা',        'Cheap / Inexpensive','adjective', '이 가게가 싸요.',  'এই দোকান সস্তা।',              'This shop is cheap.'],
            ['할인',    'harin',     'ছাড়/ডিস্কাউন্ট','Discount',        'noun',       '할인이 있어요?',   'ছাড় আছেনে?',                  'Is there a discount?'],
            ['영수증',  'yeongsujeung','ৰচিদ',        'Receipt',           'noun',       '영수증 주세요.',   'ৰচিদ দিয়ক।',                  'Please give me a receipt.'],
            ['카드',    'kadeu',     'কাৰ্ড',         'Card (credit/debit)','noun',      '카드로 계산할게요.','কাৰ্ডেৰে পেমেন্ট কৰো।',       'I will pay by card.'],
            ['현금',    'hyeongeum', 'নগদ',          'Cash',              'noun',       '현금으로 낼게요.', 'নগদেৰে দিওঁ।',                 'I will pay cash.'],
            ['사다',    'sada',      'কিনা',         'To buy',            'verb',       '옷을 사요.',        'কাপোৰ কিনো।',                 'I buy clothes.'],
            ['팔다',    'palda',     'বিক্ৰি কৰা',  'To sell',           'verb',       '과일을 팔아요.',    'ফল বিক্ৰি কৰো।',              'I sell fruit.'],
            ['계산하다','gyesanhada','হিচাপ কৰা/দাম ধৰা','To pay / calculate','verb','계산해 주세요.',    'হিচাপ কৰি দিয়ক।',            'Please calculate (the bill).'],
            ['시장',    'sijang',    'বজাৰ',         'Market',            'noun',       '시장에서 쇼핑해요.','বজাৰত কেনাকাটা কৰো।',         'I shop at the market.'],
            ['백화점',  'baekwhajeom','বিপণী কেন্দ্ৰ','Department store', 'noun',       '백화점이 커요.',   'বিপণী কেন্দ্ৰটো ডাঙৰ।',       'The department store is big.'],
            ['물건',    'mulgeon',   'বস্তু/সামগ্ৰী','Item / Goods',       'noun',       '이 물건이 좋아요.','এই বস্তুটো ভাল।',              'This item is good.'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── School & University ─────────────────────────────────────────────────

    private function seedSchoolUniversity(): void
    {
        $items = [
            ['대학교',  'daehakgyo',  'বিশ্ববিদ্যালয়', 'University',       'noun',    '대학교에 다녀요.',    'বিশ্ববিদ্যালয়ত পঢ়ো।',        'I attend university.'],
            ['교수',    'gyosu',      'অধ্যাপক',       'Professor',        'noun',    '교수님이 좋아요.',   'অধ্যাপক ভাল মানুহ।',          'The professor is kind.'],
            ['교실',    'gyosil',     'শ্ৰেণীকক্ষ',     'Classroom',        'noun',    '교실이 넓어요.',     'শ্ৰেণীকক্ষটো বহল।',           'The classroom is spacious.'],
            ['수업',    'sueop',      'ক্লাছ/পাঠ',      'Class / Lesson',   'noun',    '수업이 재미있어요.', 'ক্লাছ মজাদাৰ।',               'The class is interesting.'],
            ['숙제',    'sukje',      'গৃহকাৰ্য',       'Homework',         'noun',    '숙제가 많아요.',     'গৃহকাৰ্য বহু।',               'There is a lot of homework.'],
            ['시험',    'siheom',     'পৰীক্ষা',        'Exam / Test',      'noun',    '내일 시험이에요.',   'কাইলৈ পৰীক্ষা।',              'Tomorrow is the exam.'],
            ['성적',    'seongjeok',  'নম্বৰ/ফলাফল',    'Grade / Score',    'noun',    '성적이 좋아요.',     'নম্বৰ ভাল।',                  'My grades are good.'],
            ['도서관',  'doseogwan',  'পুথিভঁৰাল',     'Library',          'noun',    '도서관에서 공부해요.','পুথিভঁৰালত পঢ়ো।',            'I study in the library.'],
            ['캠퍼스',  'kaempeos',   'ক্যাম্পাছ',      'Campus',           'noun',    '캠퍼스가 아름다워요.','ক্যাম্পাছটো সুন্দৰ।',         'The campus is beautiful.'],
            ['졸업',    'joreop',     'স্নাতক',         'Graduation',       'noun',    '내년에 졸업해요.',   'আহিলা বছৰ স্নাতক হওঁ।',       'I graduate next year.'],
            ['강의',    'gangui',     'বক্তৃতা',        'Lecture',          'noun',    '강의가 길어요.',     'বক্তৃতা দীঘল।',               'The lecture is long.'],
            ['발표',    'balpyo',     'উপস্থাপনা',      'Presentation',     'noun',    '발표가 있어요.',     'উপস্থাপনা আছে।',              'There is a presentation.'],
            ['과제',    'gwaje',      'প্ৰকল্প কাৰ্য',  'Assignment / Project','noun', '과제를 내요.',       'প্ৰকল্প কাৰ্য জমা দিওঁ।',     'I submit the assignment.'],
            ['전공',    'jeongong',   'বিষয়/স্পেচিয়েলাইজেচন','Major/Specialization','noun','전공이 뭐예요?', 'বিষয় কি?',                    'What is your major?'],
            ['장학금',  'janghakgeum','বৃত্তি',         'Scholarship',      'noun',    '장학금을 받았어요.', 'বৃত্তি পালো।',                 'I received a scholarship.'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Transport & Directions ──────────────────────────────────────────────

    private function seedTransportDirections(): void
    {
        $items = [
            ['버스',    'beoseu',     'বাছ',           'Bus',              'noun',    '버스를 타요.',        'বাছ চলো।',                    'I take the bus.'],
            ['택시',    'taeksi',     'টেক্সি',         'Taxi',             'noun',    '택시를 불러요.',      'টেক্সি মাতো।',                'I call a taxi.'],
            ['기차',    'gicha',      'ৰেলগাড়ী',       'Train',            'noun',    '기차를 탔어요.',      'ৰেলগাড়ীত উঠিলো।',             'I took the train.'],
            ['비행기',  'bihaenggi',  'বিমান',          'Airplane',         'noun',    '비행기로 왔어요.',    'বিমানেৰে আহিলো।',             'I came by airplane.'],
            ['자동차',  'jadongcha',  'গাড়ী',           'Car',              'noun',    '자동차가 있어요.',    'গাড়ী আছে।',                  'I have a car.'],
            ['자전거',  'jajeonje',   'চাইকেল',         'Bicycle',          'noun',    '자전거를 타요.',      'চাইকেল চলো।',                 'I ride a bicycle.'],
            ['걸어서',  'georeoseo',  'খোজকাঢ়ি',       'On foot / Walking','adverb',  '걸어서 학교에 가요.','খোজকাঢ়ি বিদ্যালয়লৈ যাওঁ।', 'I walk to school.'],
            ['정류장',  'jeongnyujang','বাছ ষ্টপ',      'Bus stop',         'noun',    '정류장에서 기다려요.','বাছ ষ্টপত ৰৈ থাকো।',              'I wait at the bus stop.'],
            ['역',      'yeok',       'ৰেলৱে ষ্টেচন',  'Station',          'noun',    '역에서 만나요.',      'ষ্টেচনত লগ পাওঁ।',            'Let\'s meet at the station.'],
            ['공항',    'gonghang',   'বিমানবন্দৰ',    'Airport',          'noun',    '공항에 도착했어요.',  'বিমানবন্দৰত আহি পালো।',       'I arrived at the airport.'],
            ['오른쪽',  'oreunjjok',  'সোঁফালে',        'Right side',       'noun',    '오른쪽으로 가세요.', 'সোঁফালে যাওক।',               'Go to the right.'],
            ['왼쪽',    'oenjjok',    'বাঁওফালে',       'Left side',        'noun',    '왼쪽으로 도세요.',   'বাঁওফালে ঘুৰক।',              'Turn left.'],
            ['직진',    'jikjin',     'পোনে যোৱা',     'Go straight',      'noun',    '직진으로 가세요.',   'পোনে যাওক।',                  'Go straight.'],
            ['근처',    'geuncho',    'ওচৰত',           'Nearby',           'noun',    '여기 근처에 있어요.','ইয়াৰ ওচৰত আছে।',              'It is nearby here.'],
            ['얼마나 걸려요','eolmana geollyeoyo','কিমান সময় লাগে','How long does it take?','expression','걸어서 얼마나 걸려요?','খোজকাঢ়ি কিমান সময় লাগে?','How long does it take walking?'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Body & Health ───────────────────────────────────────────────────────

    private function seedBodyHealth(): void
    {
        $items = [
            ['머리',    'meori',      'মূৰ',           'Head',             'noun',    '머리가 아파요.',     'মূৰ বিষাইছে।',                'My head hurts.'],
            ['눈',      'nun',        'চকু',           'Eye(s)',           'noun',    '눈이 피곤해요.',     'চকু ভাগৰি পৰিছে।',            'My eyes are tired.'],
            ['코',      'ko',         'নাক',           'Nose',             'noun',    '코가 막혀요.',       'নাক বন্ধ হৈ গৈছে।',           'My nose is blocked.'],
            ['귀',      'gwi',        'কাণ',           'Ear(s)',           'noun',    '귀가 잘 안 들려요.', 'কাণত ভালকৈ নুশুনো।',          'I cannot hear well.'],
            ['입',      'ip',         'মুখ',           'Mouth',            'noun',    '입이 아파요.',       'মুখ বিষাইছে।',                'My mouth hurts.'],
            ['손',      'son',        'হাত',           'Hand(s)',          'noun',    '손을 씻으세요.',     'হাত ধুওক।',                   'Please wash your hands.'],
            ['발',      'bal',        'ঠেং/ভৰি',       'Foot / Feet',      'noun',    '발이 아파요.',       'ঠেং বিষাইছে।',                'My feet hurt.'],
            ['배',      'bae',        'পেট',           'Stomach / Belly',  'noun',    '배가 아파요.',       'পেট বিষাইছে।',                'My stomach hurts.'],
            ['아프다',  'apeuda',     'বিষোৱা/অসুস্থ', 'To hurt / Sick',   'adjective','아파요.',           'বিষাইছে।',                    'It hurts.'],
            ['약',      'yak',        'ঔষধ',           'Medicine',         'noun',    '약을 먹어요.',       'ঔষধ খাওঁ।',                   'I take medicine.'],
            ['의사',    'uisa',       'চিকিৎসক',       'Doctor',           'noun',    '의사를 만났어요.',   'চিকিৎসকক লগ পালো।',          'I met the doctor.'],
            ['간호사',  'ganhosa',    'নাৰ্চ',          'Nurse',            'noun',    '간호사가 친절해요.', 'নাৰ্চ দয়ালু।',                'The nurse is kind.'],
            ['두통',    'dutong',     'মূৰৰ বিষ',      'Headache',         'noun',    '두통이 있어요.',     'মূৰৰ বিষ আছে।',               'I have a headache.'],
            ['감기',    'gamgi',      'পেলু',           'Cold (illness)',    'noun',    '감기 걸렸어요.',     'পেলু হৈছে।',                  'I have a cold.'],
            ['열',      'yeol',       'জ্বৰ',           'Fever',            'noun',    '열이 나요.',         'জ্বৰ আহিছে।',                 'I have a fever.'],
            ['약국',    'yakguk',     'ঔষধালয়',       'Pharmacy',         'noun',    '약국이 어디에요?',   'ঔষধালয় কত?',                 'Where is the pharmacy?'],
            ['건강',    'geonggang',  'স্বাস্থ্য',     'Health',           'noun',    '건강이 중요해요.',   'স্বাস্থ্য গুৰুত্বপূৰ্ণ।',    'Health is important.'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Hobbies & Leisure ───────────────────────────────────────────────────

    private function seedHobbiesLeisure(): void
    {
        $items = [
            ['취미',    'chwimi',     'চখ',            'Hobby',            'noun',    '취미가 뭐예요?',     'আপোনাৰ চখ কি?',               'What is your hobby?'],
            ['음악',    'eumak',      'সংগীত',         'Music',            'noun',    '음악을 들어요.',     'সংগীত শুনো।',                  'I listen to music.'],
            ['노래',    'norae',      'গান',            'Song',             'noun',    '노래를 불러요.',     'গান গাওঁ।',                    'I sing a song.'],
            ['영화',    'yeonghwa',   'চিনেমা',         'Movie / Film',     'noun',    '영화를 봐요.',       'চিনেমা চাওঁ।',                 'I watch movies.'],
            ['책',      'chaek',      'কিতাপ',          'Book',             'noun',    '책을 읽어요.',       'কিতাপ পঢ়ো।',                  'I read books.'],
            ['운동',    'undong',     'ব্যায়াম/খেল',  'Exercise / Sports','noun',    '매일 운동해요.',     'প্ৰতিদিন ব্যায়াম কৰো।',       'I exercise every day.'],
            ['축구',    'chukgu',     'ফুটবল',          'Soccer / Football','noun',    '축구를 좋아해요.',   'মই ফুটবল ভাল পাওঁ।',          'I like soccer.'],
            ['수영',    'suyeong',    'সাঁতোৰ',         'Swimming',         'noun',    '수영을 배우고 싶어요.','সাঁতুৰ শিকিব বিচাৰো।',        'I want to learn swimming.'],
            ['여행',    'yeohaeng',   'ভ্ৰমণ',          'Travel',           'noun',    '여행을 좋아해요.',   'ভ্ৰমণ ভাল পাওঁ।',              'I like to travel.'],
            ['독서',    'dokseo',     'পঠন',            'Reading',          'noun',    '독서가 취미예요.',   'পঠন চখ।',                      'Reading is my hobby.'],
            ['그림',    'geurim',     'ছবি আঁকা',       'Drawing / Painting','noun',   '그림을 그려요.',     'ছবি আঁকো।',                    'I draw pictures.'],
            ['사진',    'sajin',      'ফটোগ্ৰাফী/ফটো','Photo / Photography','noun',   '사진을 찍어요.',     'ফটো তোলো।',                   'I take photos.'],
            ['게임',    'geim',       'গেম',            'Game (video)',      'noun',    '게임을 해요.',       'গেম কৰো।',                     'I play games.'],
            ['등산',    'deungsan',   'পাহাৰত উঠা',    'Hiking / Mountain climbing','noun','등산을 좋아해요.','পাহাৰত উঠিব ভাল পাওঁ।',    'I like hiking.'],
            ['요가',    'yoga',       'যোগব্যায়াম',    'Yoga',             'noun',    '요가를 해요.',       'যোগব্যায়াম কৰো।',             'I do yoga.'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Countries & Nationalities ───────────────────────────────────────────

    private function seedCountriesNationalities(): void
    {
        $items = [
            ['한국',    'hanguk',     'কোৰিয়া',        'South Korea',      'noun',    '한국에서 왔어요.',   'কোৰিয়াৰ পৰা আহিছো।',         'I came from Korea.'],
            ['한국인',  'hangukin',   'কোৰিয়ান মানুহ', 'Korean person',    'noun',    '한국인 친구가 있어요.','কোৰিয়ান বন্ধু আছে।',         'I have a Korean friend.'],
            ['인도',    'indo',       'ভাৰত',           'India',            'noun',    '인도에서 왔어요.',   'ভাৰতৰ পৰা আহিছো।',            'I came from India.'],
            ['인도인',  'indoin',     'ভাৰতীয়',        'Indian person',    'noun',    null, null, null],
            ['미국',    'miguk',      'আমেৰিকা',        'United States',    'noun',    '미국에 가고 싶어요.','আমেৰিকালৈ যাব বিচাৰো।',        'I want to go to the US.'],
            ['일본',    'ilbon',      'জাপান',          'Japan',            'noun',    '일본어를 공부해요.', 'জাপানী ভাষা পঢ়ো।',            'I study Japanese.'],
            ['중국',    'jungguk',    'চীন',            'China',            'noun',    '중국 음식을 좋아해요.','চীনা খাদ্য ভাল পাওঁ।',        'I like Chinese food.'],
            ['영국',    'yeongguk',   'ব্ৰিটেইন',       'United Kingdom',   'noun',    null, null, null],
            ['외국인',  'oegukin',    'বিদেশী মানুহ',  'Foreigner',        'noun',    '외국인 친구가 있어요.','বিদেশী বন্ধু আছে।',            'I have a foreign friend.'],
            ['언어',    'eoneo',      'ভাষা',           'Language',         'noun',    '한국어를 배워요.',   'কোৰিয়ান ভাষা শিকো।',          'I learn Korean.'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Weather & Nature ────────────────────────────────────────────────────

    private function seedWeatherNature(): void
    {
        $items = [
            ['날씨',    'nalsi',      'বতৰ',           'Weather',          'noun',    '날씨가 어때요?',     'বতৰ কেনেকুৱা?',               'How is the weather?'],
            ['맑다',    'makda',      'পৰিষ্কাৰ',       'Clear (sky)',      'adjective','오늘 날씨가 맑아요.','আজি বতৰ পৰিষ্কাৰ।',           'The weather is clear today.'],
            ['흐리다',  'heurida',    'মেঘলা',          'Cloudy',           'adjective','날씨가 흐려요.',     'বতৰ মেঘলা।',                  'The weather is cloudy.'],
            ['비',      'bi',         'বৰষুণ',          'Rain',             'noun',    '비가 와요.',         'বৰষুণ পৰিছে।',                'It is raining.'],
            ['눈',      'nun',        'বৰফ',            'Snow',             'noun',    '눈이 내려요.',       'বৰফ পৰিছে।',                  'It is snowing.'],
            ['바람',    'baram',      'বতাহ',           'Wind',             'noun',    '바람이 불어요.',     'বতাহ বলিছে।',                  'The wind is blowing.'],
            ['더워요',  'deowoyo',    'গৰম',            'Hot (weather)',    'adjective','오늘 너무 더워요.',  'আজি অতি গৰম।',                'It is very hot today.'],
            ['추워요',  'chuwoyo',    'ঠাণ্ডা',         'Cold (weather)',   'adjective','겨울에 추워요.',     'শীতকালত ঠাণ্ডা।',             'It is cold in winter.'],
            ['봄',      'bom',        'বসন্ত',          'Spring',           'noun',    '봄에 꽃이 피어요.',  'বসন্তত ফুল ফোটে।',            'Flowers bloom in spring.'],
            ['여름',    'yeoreum',    'গ্ৰীষ্মকাল',     'Summer',           'noun',    '여름에 바다에 가요.','গ্ৰীষ্মকালত সমুদ্ৰলৈ যাওঁ।', 'I go to the sea in summer.'],
            ['가을',    'gaeul',      'শৰৎ',            'Autumn / Fall',    'noun',    '가을에 단풍이 들어요.','শৰতত পাত ৰঙা হয়।',           'Leaves turn red in autumn.'],
            ['겨울',    'gyeoul',     'শীতকাল',         'Winter',           'noun',    '겨울에 눈이 와요.',  'শীতকালত বৰফ পৰে।',            'Snow falls in winter.'],
            ['강',      'gang',       'নদী',            'River',            'noun',    '강이 아름다워요.',   'নদী সুন্দৰ।',                  'The river is beautiful.'],
            ['산',      'san',        'পাহাৰ',          'Mountain',         'noun',    '산이 높아요.',       'পাহাৰটো ওখ।',                 'The mountain is high.'],
            ['바다',    'bada',       'সমুদ্ৰ',         'Sea / Ocean',      'noun',    '바다에 가고 싶어요.','সমুদ্ৰলৈ যাব বিচাৰো।',         'I want to go to the sea.'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Emotions & Feelings ─────────────────────────────────────────────────

    private function seedEmotionsFeelings(): void
    {
        $items = [
            ['기분',    'gibun',      'অনুভূতি/মেজাজ','Feeling / Mood',   'noun',    '기분이 좋아요.',     'মেজাজ ভাল।',                  'I am in a good mood.'],
            ['행복하다','haengbokhada','সুখী হোৱা',    'To be happy',      'adjective','오늘 행복해요.',     'আজি সুখী।',                   'I am happy today.'],
            ['슬프다',  'seulpeuda',  'দুখী',           'Sad',              'adjective','슬퍼요.',            'দুখী।',                        'I am sad.'],
            ['화나다',  'hwanada',    'খঙাল হোৱা',     'To be angry',      'adjective','화가 나요.',         'খং উঠিছে।',                   'I am angry.'],
            ['무섭다',  'museoda',    'ভয় লগা',        'To be scared',    'adjective','무서워요.',          'ভয় লাগিছে।',                  'I am scared.'],
            ['걱정되다','geokjeongdoeda','চিন্তিত হোৱা','To be worried',   'adjective','걱정돼요.',           'চিন্তা হৈছে।',                'I am worried.'],
            ['기쁘다',  'gippeuda',   'আনন্দিত',        'Joyful',          'adjective','기뻐요.',            'আনন্দিত।',                    'I am joyful.'],
            ['피곤하다','pigonhada',  'ভাগৰা',          'To be tired',     'adjective','피곤해요.',           'ভাগৰি পৰিছো।',                'I am tired.'],
            ['신나다',  'sinnada',    'উৎসাহিত',        'Excited',         'adjective','신나요!',            'উৎসাহিত!',                    'I am excited!'],
            ['그립다',  'geuripda',   'মনত পৰা',        'To miss (someone)','adjective','고향이 그리워요.',  'গাঁৱৰ কথা মনত পৰে।',          'I miss my hometown.'],
            ['사랑하다','saranghada', 'ভাল পোৱা/মৰম কৰা','To love',        'verb',    '사랑해요.',           'ভাল পাওঁ।',                   'I love you.'],
            ['좋아하다','joahada',    'পচন্দ কৰা',     'To like',          'verb',    '음악을 좋아해요.',   'সংগীত ভাল পাওঁ।',              'I like music.'],
            ['싫어하다','silheohada', 'ভাল নলগা',      'To dislike',       'verb',    '거짓말을 싫어해요.', 'মিছা কথা ভাল নালাগে।',         'I dislike lying.'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Essential Verbs ─────────────────────────────────────────────────────

    private function seedEssentialVerbs(): void
    {
        $items = [
            ['가다',    'gada',       'যোৱা',           'To go',            'verb',    '학교에 가요.',       'বিদ্যালয়লৈ যাওঁ।',           'I go to school.'],
            ['오다',    'oda',        'অহা',            'To come',          'verb',    '친구가 와요.',       'বন্ধু আহিছে।',                 'A friend is coming.'],
            ['보다',    'boda',       'চোৱা',           'To see / watch',   'verb',    '영화를 봐요.',       'চিনেমা চাওঁ।',                 'I watch a movie.'],
            ['말하다',  'malhada',    'কোৱা/কথা কোৱা', 'To speak / say',   'verb',    '한국어로 말해요.',   'কোৰিয়ানত কওঁ।',               'I speak in Korean.'],
            ['듣다',    'deutda',     'শোনা',           'To listen',        'verb',    '음악을 들어요.',     'সংগীত শুনো।',                  'I listen to music.'],
            ['읽다',    'ikda',       'পঢ়া',            'To read',          'verb',    '책을 읽어요.',       'কিতাপ পঢ়ো।',                  'I read a book.'],
            ['쓰다',    'sseuda',     'লিখা',           'To write',         'verb',    '편지를 써요.',       'চিঠি লিখো।',                   'I write a letter.'],
            ['만나다',  'mannada',    'লগ পোৱা',        'To meet',          'verb',    '친구를 만나요.',     'বন্ধুক লগ পাওঁ।',              'I meet a friend.'],
            ['알다',    'alda',       'জনা',            'To know',          'verb',    '그 사람을 알아요.',  'সেই মানুহজনক চিনো।',           'I know that person.'],
            ['모르다',  'moreuda',    'নজনা',           'To not know',      'verb',    '그 이름을 몰라요.', 'সেই নামটো নাজানো।',             'I do not know that name.'],
            ['생각하다','saenggakhada','ভবা/চিন্তা কৰা','To think',         'verb',    '좋은 생각이에요.',  'ভাল ধাৰণা।',                   'That is a good idea.'],
            ['시작하다','sijakhada',  'আৰম্ভ কৰা',      'To start',         'verb',    '수업이 시작해요.',  'ক্লাছ আৰম্ভ হয়।',             'Class starts.'],
            ['끝나다',  'keunnada',   'শেষ হোৱা',       'To end / finish',  'verb',    '수업이 끝났어요.',  'ক্লাছ শেষ হল।',               'Class ended.'],
            ['도착하다','dochakhada', 'আহি পোৱা',       'To arrive',        'verb',    '집에 도착했어요.',  'ঘৰত আহি পালো।',               'I arrived home.'],
            ['출발하다','chulbalhada','যাত্ৰা আৰম্ভ কৰা','To depart',      'verb',    '오전 9시에 출발해요.','পূৱা ৯টাত যাত্ৰা আৰম্ভ।',    'Departing at 9 AM.'],
            ['도와주다','dowajuda',   'সহায় কৰা',      'To help',          'verb',    '도와주세요.',        'সহায় কৰক।',                  'Please help.'],
            ['기다리다','gidarida',   'অপেক্ষা কৰা',   'To wait',          'verb',    '조금 기다려 주세요.','অলপ অপেক্ষা কৰক।',            'Please wait a moment.'],
            ['찾다',    'chatda',     'বিচৰা',          'To find / look for','verb',   '길을 찾아요.',       'পথ বিচাৰিছো।',                'I am looking for the way.'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Descriptive Adjectives ──────────────────────────────────────────────

    private function seedDescriptiveAdjectives(): void
    {
        $items = [
            ['크다',    'keuda',      'ডাঙৰ',          'Big / Large',      'adjective','가방이 커요.',       'বেগটো ডাঙৰ।',                 'The bag is big.'],
            ['작다',    'jakda',      'সৰু',           'Small',            'adjective','강아지가 작아요.',   'কুকুৰৰ পোৱালিটো সৰু।',        'The puppy is small.'],
            ['길다',    'gilda',      'দীঘল',          'Long',             'adjective','머리가 길어요.',     'চুলি দীঘল।',                   'The hair is long.'],
            ['짧다',    'jjalda',     'চুটি',          'Short',            'adjective','바지가 짧아요.',     'পায়জামাটো চুটি।',             'The pants are short.'],
            ['빠르다',  'ppareuda',   'দ্ৰুত',         'Fast',             'adjective','기차가 빨라요.',     'ৰেলগাড়ী দ্ৰুত।',              'The train is fast.'],
            ['느리다',  'neurida',    'লেহেম',          'Slow',             'adjective','거북이가 느려요.',  'কাছটো লেহেম।',                 'The turtle is slow.'],
            ['많다',    'manta',      'বহু/বেছি',      'Many / Much',      'adjective','사람이 많아요.',     'মানুহ বেছি।',                  'There are many people.'],
            ['적다',    'jeokda',     'কম',            'Few / Little',     'adjective','시간이 적어요.',     'সময় কম।',                     'There is little time.'],
            ['어렵다',  'eoryeopda',  'কঠিন',          'Difficult / Hard', 'adjective','한국어가 어려워요.','কোৰিয়ান কঠিন।',               'Korean is difficult.'],
            ['쉽다',    'swipda',     'সহজ',           'Easy',             'adjective','이 문제가 쉬워요.', 'এই প্ৰশ্নটো সহজ।',            'This question is easy.'],
            ['재미있다','jaemiitda',  'আমোদজনক',       'Interesting / Fun','adjective','수업이 재미있어요.','ক্লাছ আমোদজনক।',              'The class is interesting.'],
            ['지루하다','jiruihada',  'বিৰক্তিকৰ',     'Boring',           'adjective','수업이 지루해요.',  'ক্লাছ বিৰক্তিকৰ।',            'The class is boring.'],
            ['중요하다','jungyohada', 'গুৰুত্বপূৰ্ণ', 'Important',        'adjective','건강이 중요해요.',  'স্বাস্থ্য গুৰুত্বপূৰ্ণ।',    'Health is important.'],
            ['다르다',  'dareuda',    'বেলেগ',          'Different',        'adjective','문화가 달라요.',     'সংস্কৃতি বেলেগ।',              'The culture is different.'],
            ['같다',    'gatda',      'একে/সমান',      'Same / Equal',     'adjective','우리는 같아요.',     'আমি একে।',                     'We are the same.'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Work & Professions ──────────────────────────────────────────────────

    private function seedWorkProfessions(): void
    {
        $items = [
            ['일',      'il',         'কাম',           'Work / Job',       'noun',    '일이 많아요.',       'কাম বেছি।',                   'There is a lot of work.'],
            ['회사',    'hoesa',      'কোম্পানী',       'Company',          'noun',    '회사에 다녀요.',     'কোম্পানীত কাম কৰো।',           'I work at a company.'],
            ['회사원',  'hoesawon',   'কৰ্মচাৰী',      'Office worker',    'noun',    '저는 회사원이에요.', 'মই কৰ্মচাৰী।',                 'I am an office worker.'],
            ['의사',    'uisa',       'ডাক্তৰ',         'Doctor',           'noun',    null, null, null],  // already seeded above but from body section
            ['간호사',  'ganhosa',    'নাৰ্চ',           'Nurse',            'noun',    null, null, null],
            ['선생님',  'seonsaengnim','শিক্ষক',         'Teacher',          'noun',    '선생님께 배워요.',   'শিক্ষকৰ পৰা শিকো।',            'I learn from the teacher.'],
            ['요리사',  'yorisa',     'ৰান্ধনি',         'Cook / Chef',      'noun',    '요리사가 되고 싶어요.','ৰান্ধনি হব বিচাৰো।',          'I want to become a chef.'],
            ['운전기사','unjeonhgisa','চালক',            'Driver',           'noun',    null, null, null],
            ['가수',    'gasu',       'গায়ক',           'Singer',           'noun',    '가수가 되고 싶어요.','গায়ক হব বিচাৰো।',              'I want to become a singer.'],
            ['기자',    'gija',       'সাংবাদিক',       'Journalist',       'noun',    null, null, null],
            ['월급',    'wolgup',     'মাহিলী দৰমহা',  'Monthly salary',   'noun',    '월급을 받아요.',     'মাহিলী দৰমহা পাওঁ।',           'I receive monthly salary.'],
            ['면접',    'myeonjeop',  'সাক্ষাৎকাৰ',     'Interview (job)',   'noun',    '면접을 봐요.',       'সাক্ষাৎকাৰ দিওঁ।',            'I have a job interview.'],
        ];

        $existing = ['의사', '간호사'];
        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            if (in_array($ko, $existing)) continue;
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'intermediate',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }

    // ─── Korean Culture Words ────────────────────────────────────────────────

    private function seedKoreanCultureWords(): void
    {
        $items = [
            ['한복',    'hanbok',     'হানবক (কোৰিয়ান পোচাক)','Hanbok (traditional costume)','noun','한복을 입어요.','হানবক পিন্ধো।','I wear hanbok.'],
            ['한류',    'hallyu',     'হালৃউ (কোৰিয়ান ঢৌ)',  'Hallyu (Korean Wave)',    'noun',   '한류를 좋아해요.','হালৃউ ভাল পাওঁ।',           'I like the Korean Wave.'],
            ['케이팝',  'keipap',     'কে-পপ',               'K-pop',                   'noun',   '케이팝을 들어요.','কে-পপ শুনো।',               'I listen to K-pop.'],
            ['드라마',  'deurama',    'নাটক/ড্ৰামা',          'TV Drama',                'noun',   '드라마를 봐요.', 'নাটক চাওঁ।',                'I watch a drama.'],
            ['추석',    'chuseok',    'চুছক (কোৰিয়ান চন)',   'Chuseok (harvest festival)','noun', '추석에 가족을 만나요.','চুছকত পৰিয়ালক লগ পাওঁ।','I meet family on Chuseok.'],
            ['설날',    'seollal',    'কোৰিয়ান নৱবৰ্ষ',      'Korean New Year (Lunar)',  'noun',   '설날에 세배해요.','কোৰিয়ান নৱবৰ্ষত প্ৰণাম কৰো।','I bow on Korean New Year.'],
            ['태권도',  'taekwondo',  'তায়কোৱান্দো',         'Taekwondo',               'noun',   '태권도를 배워요.','তায়কোৱান্দো শিকো।',         'I learn taekwondo.'],
            ['인사',    'insa',       'অভিবাদন/প্ৰণাম',       'Greeting / Bow',          'noun',   '인사를 해요.',   'প্ৰণাম কৰো।',               'I greet/bow.'],
            ['존경',    'jongyeong',  'সন্মান',               'Respect',                 'noun',   '어른을 존경해요.','বয়োজ্যেষ্ঠক সন্মান কৰো।',  'I respect elders.'],
            ['문화',    'munhwa',     'সংস্কৃতি',             'Culture',                 'noun',   '문화를 배워요.', 'সংস্কৃতি শিকো।',            'I learn about culture.'],
        ];

        foreach ($items as [$ko, $rom, $as, $en, $pos, $exko, $exas, $exen]) {
            $this->upsert([
                'korean'        => $ko,
                'romanization'  => $rom,
                'assamese'      => $as,
                'english'       => $en,
                'part_of_speech'=> $pos,
                'level'         => 'beginner',
                'example_ko'    => $exko,
                'example_as'    => $exas,
                'example_en'    => $exen,
            ]);
        }
    }
}

