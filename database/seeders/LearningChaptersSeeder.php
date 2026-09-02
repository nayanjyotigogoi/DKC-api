<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeds all 6 Korean learning chapters with their items and conversations.
 * This mirrors the static data from lib/learning/chapters-data.ts.
 */
class LearningChaptersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('learning_chapter_conversations')->truncate();
        DB::table('learning_chapter_items')->truncate();
        DB::table('learning_chapters')->truncate();

        $chapters = [
            [
                'slug' => 'vowels', 'number' => 1,
                'title_en' => 'Vowels', 'title_ko' => '모음',
                'description' => 'Learn all basic and compound Korean vowels with pronunciation.',
                'accent_color' => '#8B1E24', 'tint_color' => '#FEF3F0', 'border_color' => '#F5CECA', 'icon' => '아',
                'sort_order' => 1,
            ],
            [
                'slug' => 'consonants', 'number' => 2,
                'title_en' => 'Consonants', 'title_ko' => '자음',
                'description' => 'Basic consonants and tense (double) consonants with pronunciation.',
                'accent_color' => '#2D5F7A', 'tint_color' => '#EBF3F8', 'border_color' => '#B5D4E8', 'icon' => 'ㄱ',
                'sort_order' => 2,
            ],
            [
                'slug' => 'making-simple-words', 'number' => 3,
                'title_en' => 'Making Simple Words', 'title_ko' => '간단한 단어 만들기',
                'description' => 'Combine vowels and consonants into real everyday Korean words.',
                'accent_color' => '#3B6B3A', 'tint_color' => '#EEF5EE', 'border_color' => '#BDD4BD', 'icon' => '📝',
                'sort_order' => 3,
            ],
            [
                'slug' => 'sino-korean-numbers', 'number' => 4,
                'title_en' => 'Sino-Korean Numbers', 'title_ko' => '한자 숫자',
                'description' => 'Count in Sino-Korean — used for dates, money, floors, and phone numbers.',
                'accent_color' => '#6B5C3E', 'tint_color' => '#F4F0E8', 'border_color' => '#DDD4BE', 'icon' => '🔢',
                'sort_order' => 4,
            ],
            [
                'slug' => 'introducing-yourself', 'number' => 5,
                'title_en' => 'Introducing Yourself', 'title_ko' => '자기소개',
                'description' => 'Say your name, country, and occupation — a complete self-introduction.',
                'accent_color' => '#6B3A7A', 'tint_color' => '#F5EEF8', 'border_color' => '#D4B5E8', 'icon' => '👋',
                'sort_order' => 5,
            ],
            [
                'slug' => 'native-korean-numbers', 'number' => 6,
                'title_en' => 'Native Korean Numbers', 'title_ko' => '순우리말 숫자',
                'description' => 'The native counting system for age, hours, and objects.',
                'accent_color' => '#8B6B1A', 'tint_color' => '#FBF5E6', 'border_color' => '#DDD4A0', 'icon' => '🔢',
                'sort_order' => 6,
            ],
        ];

        foreach ($chapters as $chData) {
            $chData['created_at'] = now();
            $chData['updated_at'] = now();
            $chData['is_published'] = true;
            $id = DB::table('learning_chapters')->insertGetId($chData);

            $slug = $chData['slug'];
            $this->seedItems($id, $slug);
            $this->seedConversations($id, $slug);
        }
    }

    private function seedItems(int $chapterId, string $slug): void
    {
        $items = match ($slug) {
            'vowels'               => $this->vowelItems(),
            'consonants'           => $this->consonantItems(),
            'making-simple-words'  => $this->simpleWordItems(),
            'sino-korean-numbers'  => $this->sinoNumberItems(),
            'introducing-yourself' => $this->introItems(),
            'native-korean-numbers'=> $this->nativeNumberItems(),
            default => [],
        };

        foreach ($items as $item) {
            $item['chapter_id'] = $chapterId;
            $item['is_active']  = true;
            $item['created_at'] = now();
            $item['updated_at'] = now();
            if (isset($item['meta']) && is_array($item['meta'])) {
                $item['meta'] = json_encode($item['meta']);
            }
            DB::table('learning_chapter_items')->insert($item);
        }
    }

    private function seedConversations(int $chapterId, string $slug): void
    {
        $lines = match ($slug) {
            'making-simple-words'   => $this->ch3Conversation(),
            'sino-korean-numbers'   => $this->ch4Conversation(),
            'introducing-yourself'  => $this->ch5Conversation(),
            'native-korean-numbers' => $this->ch6Conversation(),
            default => [],
        };

        foreach ($lines as $line) {
            $line['chapter_id'] = $chapterId;
            $line['created_at'] = now();
            $line['updated_at'] = now();
            DB::table('learning_chapter_conversations')->insert($line);
        }
    }

    // ── Chapter 1: Vowels ─────────────────────────────────────────────────────

    private function vowelItems(): array
    {
        $basic = [
            ['아','a','"ah"','অ'], ['야','ya','"ya"','য়া'], ['어','eo','"uh"','এ'],
            ['여','yeo','"yuh"','য়ে'], ['오','o','"oh"','অ'], ['요','yo','"yo"','য়'],
            ['우','u','"oo"','উ'], ['유','yu','"you"','য়ু'],
            ['으','eu','"uh" (lips flat)',null], ['이','i','"ee"','ই'],
        ];
        $compound = [
            ['애','ae','"eh"',null], ['에','e','"eh"',null], ['의','ui','"eui" (unique)',null],
            ['와','wa','"wa"','ৱা'], ['워','wo','"wuh"',null], ['왜','wae','"weh"',null],
            ['웨','we','"weh"',null], ['위','wi','"wee"',null], ['외','oe','"weh"',null],
            ['얘','yae','"yeh"',null], ['예','ye','"yeh"',null],
        ];

        $items = [];
        foreach ($basic as $i => [$k,$r,$s,$a]) {
            $items[] = ['section'=>'basic_vowels','korean'=>$k,'romanization'=>$r,'english'=>$s,'assamese'=>$a,'sort_order'=>$i+1];
        }
        foreach ($compound as $i => [$k,$r,$s,$a]) {
            $items[] = ['section'=>'compound_vowels','korean'=>$k,'romanization'=>$r,'english'=>$s,'assamese'=>$a,'sort_order'=>$i+1];
        }
        return $items;
    }

    // ── Chapter 2: Consonants ─────────────────────────────────────────────────

    private function consonantItems(): array
    {
        $basic = [
            ['ㄱ','g / k','"g" at start · "k" at end'],
            ['ㄴ','n','"n"'], ['ㄷ','d / t','"d" at start · "t" at end'],
            ['ㄹ','r / l','"r" at start · "l" at end'], ['ㅁ','m','"m"'],
            ['ㅂ','b / p','"b" at start · "p" at end'], ['ㅅ','s','"s"'],
            ['ㅇ','— / ng','silent at start · "ng" at end'], ['ㅈ','j','"j"'],
            ['ㅊ','ch','"ch" (aspirated)'], ['ㅋ','k','"k" (aspirated)'],
            ['ㅌ','t','"t" (aspirated)'], ['ㅍ','p','"p" (aspirated)'], ['ㅎ','h','"h"'],
        ];
        $tense = [
            ['ㄲ','kk','tense "k" — like holding breath before "k"'],
            ['ㄸ','tt','tense "t" — sharper, no aspiration'],
            ['ㅃ','pp','tense "p" — stronger push of lips'],
            ['ㅆ','ss','tense "s" — sharper than ㅅ'],
            ['ㅉ','jj','tense "j" — sharper than ㅈ'],
        ];

        $items = [];
        foreach ($basic as $i => [$k,$r,$s]) {
            $items[] = ['section'=>'basic_consonants','korean'=>$k,'romanization'=>$r,'english'=>$s,'sort_order'=>$i+1];
        }
        foreach ($tense as $i => [$k,$r,$s]) {
            $items[] = ['section'=>'tense_consonants','korean'=>$k,'romanization'=>$r,'english'=>$s,'meta'=>json_encode(['tense'=>true]),'sort_order'=>$i+1];
        }
        return $items;
    }

    // ── Chapter 3: Simple Words ───────────────────────────────────────────────

    private function simpleWordItems(): array
    {
        $syllables = [
            ['ㅂ+아=바','바','ba',null,null,'syllable_blocks'],
            ['ㄱ+이=기','기','gi',null,null,'syllable_blocks'],
            ['ㅁ+우=무','무','mu',null,null,'syllable_blocks'],
            ['ㄴ+아=나','나','na',null,null,'syllable_blocks'],
            ['ㅅ+오=소','소','so',null,null,'syllable_blocks'],
            ['ㄷ+어=더','더','deo',null,null,'syllable_blocks'],
        ];
        $words = [
            ['나','na','I / me','মই'],['너','neo','you','তুমি'],['우리','uri','we / us','আমি'],
            ['물','mul','water','পানী'],['밥','bap','rice / meal','ভাত'],
            ['책','chaek','book','কিতাপ'],['집','jip','house / home','ঘৰ'],
            ['눈','nun','eye / snow','চকু / বৰফ'],['손','son','hand','হাত'],
            ['발','bal','foot','ভৰি'],['입','ip','mouth','মুখ'],['귀','gwi','ear','কান'],
        ];

        $items = [];
        foreach ($syllables as $i => $row) {
            $items[] = ['section'=>'syllable_blocks','korean'=>$row[1],'romanization'=>$row[2],'english'=>$row[0],'sort_order'=>$i+1];
        }
        foreach ($words as $i => [$k,$r,$e,$a]) {
            $items[] = ['section'=>'simple_words','korean'=>$k,'romanization'=>$r,'english'=>$e,'assamese'=>$a,'sort_order'=>$i+1];
        }
        return $items;
    }

    // ── Chapter 4: Sino-Korean Numbers ────────────────────────────────────────

    private function sinoNumberItems(): array
    {
        $numbers = [
            ['일','il',1,'এক'],['이','i',2,'দুই'],['삼','sam',3,'তিনি'],
            ['사','sa',4,'চাৰি'],['오','o',5,'পাঁচ'],['육','yuk',6,'ছয়'],
            ['칠','chil',7,'সাত'],['팔','pal',8,'আঠ'],['구','gu',9,'ন'],
            ['십','sip',10,'দহ'],
            ['십일','sibil',11,'এঘাৰ'],['십이','sibi',12,'বাৰ'],
            ['십삼','sipsam',13,'তেৰ'],['십사','sipsa',14,'চৈধ্য'],
            ['십오','sibo',15,'পোন্ধৰ'],['십육','simnyuk',16,'ষোল'],
            ['십칠','sipchil',17,'সোতৰ'],['십팔','sippal',18,'আঠৰ'],
            ['십구','sipgu',19,'উনৈশ'],
            ['이십','isip',20,'বিশ'],['삼십','samsip',30,'ত্ৰিশ'],
            ['사십','sasip',40,'চল্লিশ'],['오십','osip',50,'পঞ্চাশ'],
            ['육십','yuksip',60,'ষাঠি'],['칠십','chilsip',70,'সত্তৰ'],
            ['팔십','palsip',80,'আশী'],['구십','gusip',90,'নব্বৈ'],
            ['백','baek',100,'এশ'],['천','cheon',1000,'এহাজাৰ'],
            ['만','man',10000,'দহহাজাৰ'],
        ];
        $useCases = [
            ['오월 삼일','o-wol sam-il','May 3rd','মে মাহৰ ৩ তাৰিখ','📅 Dates'],
            ['오천 원','o-cheon won','5,000 won','৫,০০০ ৱন','💰 Money'],
            ['삼층','sam-cheung','3rd floor','তৃতীয় মহলা','🏢 Floors'],
            ['공일공','gong-il-gong','010','০১০','📞 Phone'],
            ['삼십 분','sam-sip bun','30 minutes','৩০ মিনিট','⏱ Minutes'],
        ];

        $items = [];
        foreach ($numbers as $i => [$k,$r,$v,$a]) {
            $items[] = ['section'=>'sino_numbers','korean'=>$k,'romanization'=>$r,'english'=>(string)$v,'assamese'=>$a,'meta'=>json_encode(['value'=>$v]),'sort_order'=>$i+1];
        }
        foreach ($useCases as $i => [$k,$r,$e,$a,$title]) {
            $items[] = ['section'=>'sino_use_cases','korean'=>$k,'romanization'=>$r,'english'=>$e,'assamese'=>$a,'meta'=>json_encode(['title'=>$title]),'sort_order'=>$i+1];
        }
        return $items;
    }

    // ── Chapter 5: Introducing Yourself ──────────────────────────────────────

    private function introItems(): array
    {
        $phrases = [
            ['저는 ___입니다.','Jeoneun ___ imnida.','I am ___.','মই ___।'],
            ['제 이름은 ___이에요.','Je ireumeun ___ ieyo.','My name is ___.','মোৰ নাম ___।'],
            ['___에서 왔어요.','___ eseo wasseoyo.','I am from ___.','মই ___ ৰ পৰা আহিছোঁ।'],
            ['저는 ___이에요.','Jeoneun ___ ieyo.','I am a ___.','মই এজন/এগৰাকী ___।'],
            ['반갑습니다.','Bangapseumnida.','Nice to meet you.','আপোনাক লগ পাই ভাল লাগিল।'],
        ];
        $countries = [
            ['인도','Indo','India','ভাৰত','🇮🇳'],['한국','Hanguk','Korea','কোৰিয়া','🇰🇷'],
            ['일본','Ilbon','Japan','জাপান','🇯🇵'],['중국','Jungguk','China','চীন','🇨🇳'],
            ['미국','Miguk','USA','আমেৰিকা','🇺🇸'],['영국','Yeongguk','UK','ব্ৰিটেইন','🇬🇧'],
            ['네팔','Nepal','Nepal','নেপাল','🇳🇵'],['프랑스','Peurangseu','France','ফ্ৰান্স','🇫🇷'],
        ];
        $occupations = [
            ['학생','haksaeng','Student','ছাত্ৰ/ছাত্ৰী'],
            ['선생님','seonsaengnim','Teacher','শিক্ষক'],
            ['의사','uisa','Doctor','চিকিৎসক'],
            ['간호사','ganhosa','Nurse','নাৰ্ছ'],
            ['엔지니어','enjinieo','Engineer','অভিযন্তা'],
            ['요리사','yolisa','Chef / Cook','ৰান্ধনি'],
            ['음악가','eumakga','Musician','সংগীতশিল্পী'],
            ['회사원','hoesawon','Office worker','কৰ্মচাৰী'],
        ];

        $examples = [
            ['저는 나얀입니다.','Jeoneun Nayan imnida.','I am Nayan. (replace "Nayan" with your own name)','মই নায়ান। (আপোনাৰ নিজৰ নামটো ব্যৱহাৰ কৰক)'],
            ['제 이름은 나얀죠티 고고이예요.','Je ireumeun Nayanjyoti Gogoi ieyo.','My name is Nayanjyoti Gogoi. (replace with your full name)','মোৰ নাম নায়ানজ্যোতি গগৈ। (আপোনাৰ নামটো ব্যৱহাৰ কৰক)'],
            ['디브루가르에서 왔어요.','Dibrugareeseo wasseoyo.','I am from Dibrugarh. (replace with your city)','মই ডিব্ৰুগড়ৰ পৰা আহিছোঁ। (আপোনাৰ চহৰটো ব্যৱহাৰ কৰক)'],
            ['저는 대학생이에요.','Jeoneun daehaksaeng ieyo.','I am a university student. (replace with your occupation)','মই এজন বিশ্ববিদ্যালয়ৰ ছাত্ৰ। (আপোনাৰ পেশা ব্যৱহাৰ কৰক)'],
            ['반갑습니다.','Bangapseumnida.','Nice to meet you.','আপোনাক লগ পাই ভাল লাগিল।'],
        ];

        $items = [];
        foreach ($phrases as $i => [$k,$r,$e,$a]) {
            $items[] = ['section'=>'intro_phrases','korean'=>$k,'romanization'=>$r,'english'=>$e,'assamese'=>$a,'sort_order'=>$i+1];
        }
        foreach ($examples as $i => [$k,$r,$e,$a]) {
            $items[] = ['section'=>'intro_phrases','korean'=>$k,'romanization'=>$r,'english'=>$e,'assamese'=>$a,'sort_order'=>count($phrases)+$i+1];
        }
        foreach ($countries as $i => [$k,$r,$e,$a,$flag]) {
            $items[] = ['section'=>'countries','korean'=>$k,'romanization'=>$r,'english'=>$e,'assamese'=>$a,'meta'=>json_encode(['flag'=>$flag]),'sort_order'=>$i+1];
        }
        foreach ($occupations as $i => [$k,$r,$e,$a]) {
            $items[] = ['section'=>'occupations','korean'=>$k,'romanization'=>$r,'english'=>$e,'assamese'=>$a,'sort_order'=>$i+1];
        }
        return $items;
    }

    // ── Chapter 6: Native Korean Numbers ─────────────────────────────────────

    private function nativeNumberItems(): array
    {
        $numbers = [
            ['하나','hana',1,'এটা'],['둘','dul',2,'দুটা'],['셋','set',3,'তিনিটা'],
            ['넷','net',4,'চাৰিটা'],['다섯','daseot',5,'পাঁচটা'],['여섯','yeoseot',6,'ছটা'],
            ['일곱','ilgop',7,'সাতটা'],['여덟','yeodeol',8,'আঠটা'],
            ['아홉','ahop',9,'নটা'],['열','yeol',10,'দহটা'],
            ['열하나','yeolhana',11,'এঘাৰটা'],['열둘','yeoldul',12,'বাৰটা'],
            ['열셋','yeolset',13,'তেৰটা'],['열넷','yeolnet',14,'চৈধ্যটা'],
            ['열다섯','yeoldaseot',15,'পোন্ধৰটা'],['열여섯','yeolyeoseot',16,'ষোলটা'],
            ['열일곱','yeolilgop',17,'সোতৰটা'],['열여덟','yeolyeodeol',18,'আঠৰটা'],
            ['열아홉','yeolahop',19,'উনৈশটা'],
            ['스물','seumul',20,'বিশটা'],['서른','seoreun',30,'ত্ৰিশটা'],
            ['마흔','maheun',40,'চল্লিশটা'],['쉰','swin',50,'পঞ্চাশটা'],
            ['예순','yesun',60,'ষাঠিটা'],['일흔','ilheun',70,'সত্তৰটা'],
            ['여든','yeodeun',80,'আশীটা'],['아흔','aheun',90,'নব্বৈটা'],
            ['백','baek',100,'এশটা'],['천','cheon',1000,'এহাজাৰটা'],
            ['만','man',10000,'দহহাজাৰটা'],
        ];
        $useCases = [
            ['스물다섯 살','seumul-daseot sal','25 years old','পঁচিশ বছৰ','🎂 Age'],
            ['두 시','du si','2 o\'clock','দুই বাজিছে','🕐 Hours'],
            ['사과 세 개','sagwa se gae','3 apples','তিনিটা আপেল','🍎 Counting'],
            ['두 명','du myeong','2 people','দুজন মানুহ','👥 People'],
            ['물 한 병','mul han byeong','1 bottle of water','এবটল পানী','🍶 Bottles'],
        ];

        $items = [];
        foreach ($numbers as $i => [$k,$r,$v,$a]) {
            $items[] = ['section'=>'native_numbers','korean'=>$k,'romanization'=>$r,'english'=>(string)$v,'assamese'=>$a,'meta'=>json_encode(['value'=>$v]),'sort_order'=>$i+1];
        }
        foreach ($useCases as $i => [$k,$r,$e,$a,$title]) {
            $items[] = ['section'=>'native_use_cases','korean'=>$k,'romanization'=>$r,'english'=>$e,'assamese'=>$a,'meta'=>json_encode(['title'=>$title]),'sort_order'=>$i+1];
        }
        return $items;
    }

    // ── Conversations ─────────────────────────────────────────────────────────

    private function ch3Conversation(): array
    {
        return [
            ['speaker'=>'A','korean'=>'이게 뭐예요?','english'=>'What is this?','assamese'=>'এইটো কি?','sort_order'=>1],
            ['speaker'=>'B','korean'=>'이것은 책이에요.','english'=>'This is a book.','assamese'=>'এইটো এখন কিতাপ।','sort_order'=>2],
            ['speaker'=>'A','korean'=>'저것은요?','english'=>'And that?','assamese'=>'আৰু সেইটো?','sort_order'=>3],
            ['speaker'=>'B','korean'=>'저것은 물이에요.','english'=>'That is water.','assamese'=>'সেইটো পানী।','sort_order'=>4],
        ];
    }

    private function ch4Conversation(): array
    {
        return [
            ['speaker'=>'A','korean'=>'이거 얼마예요?','english'=>'How much is this?','assamese'=>'এইটোৰ দাম কিমান?','sort_order'=>1],
            ['speaker'=>'B','korean'=>'오천 원이에요.','english'=>'It is 5,000 won.','assamese'=>'পাঁচ হাজাৰ ৱন।','sort_order'=>2],
            ['speaker'=>'A','korean'=>'오늘 몇 월 며칠이에요?','english'=>"What is today's date?",'assamese'=>'আজি কেইতাৰিখ?','sort_order'=>3],
            ['speaker'=>'B','korean'=>'오월 이십일일이에요.','english'=>'It is May 21st.','assamese'=>'মে মাহৰ একৈছ তাৰিখ।','sort_order'=>4],
        ];
    }

    private function ch5Conversation(): array
    {
        return [
            ['speaker'=>'A','korean'=>'안녕하세요! 저는 프리야입니다. 인도에서 왔어요.','english'=>'Hello! I am Priya. I am from India.','assamese'=>'নমস্কাৰ! মই প্ৰিয়া। মই ভাৰতৰ পৰা আহিছোঁ।','sort_order'=>1],
            ['speaker'=>'B','korean'=>'안녕하세요! 저는 민준이에요. 한국에서 왔어요. 반갑습니다!','english'=>'Hello! I am Minjun. I am from Korea. Nice to meet you!','assamese'=>'নমস্কাৰ! মই মিনজুন। মই কোৰিয়াৰ পৰা আহিছোঁ। আপোনাক লগ পাই ভাল লাগিল!','sort_order'=>2],
            ['speaker'=>'A','korean'=>'저도 반갑습니다! 무슨 일 하세요?','english'=>'Nice to meet you too! What do you do?','assamese'=>'মোৰো ভাল লাগিল! আপুনি কি কাম কৰে?','sort_order'=>3],
            ['speaker'=>'B','korean'=>'저는 학생이에요. 프리야 씨는요?','english'=>'I am a student. What about you, Priya?','assamese'=>'মই এজন ছাত্ৰ। আপুনি?','sort_order'=>4],
            ['speaker'=>'A','korean'=>'저는 선생님이에요.','english'=>'I am a teacher.','assamese'=>'মই এগৰাকী শিক্ষক।','sort_order'=>5],
        ];
    }

    private function ch6Conversation(): array
    {
        return [
            ['speaker'=>'A','korean'=>'몇 살이에요?','english'=>'How old are you?','assamese'=>'আপোনাৰ বয়স কিমান?','sort_order'=>1],
            ['speaker'=>'B','korean'=>'저는 스물두 살이에요. 언니는요?','english'=>'I am 22 years old. What about you?','assamese'=>'মোৰ বয়স বাইশ বছৰ। আপোনাৰ?','sort_order'=>2],
            ['speaker'=>'A','korean'=>'저는 스물다섯 살이에요.','english'=>'I am 25 years old.','assamese'=>'মোৰ বয়স পঁচিশ বছৰ।','sort_order'=>3],
            ['speaker'=>'B','korean'=>'지금 몇 시예요?','english'=>'What time is it now?','assamese'=>'এতিয়া কেইটা বাজিছে?','sort_order'=>4],
            ['speaker'=>'A','korean'=>'지금 두 시 삼십 분이에요.','english'=>'It is 2:30 now.','assamese'=>'এতিয়া দুই বাজি ত্ৰিশ মিনিট।','sort_order'=>5],
        ];
    }
}
