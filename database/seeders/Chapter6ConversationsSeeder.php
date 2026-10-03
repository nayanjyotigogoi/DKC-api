<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Chapter6ConversationsSeeder extends Seeder
{
    public function run(): void
    {
        $speakers = json_encode([
            ['label' => 'Pema',      'gender' => 'female'],
            ['label' => 'Jung Kook', 'gender' => 'male'],
        ]);

        $conversations = [

            // ── 1. First Meeting ────────────────────────────────────────────
            [
                'conv' => [
                    'title_ko' => '처음 만나요',
                    'title_en' => 'First Meeting',
                    'title_as' => 'প্ৰথম সাক্ষাৎ',
                    'scene_en' => 'Pema and Jung Kook meet for the very first time at a DKC club session.',
                    'scene_as' => 'পেমা আৰু জুং কুক DKC ক্লাব চেছনত প্ৰথমবাৰ লগ হয়।',
                    'level'    => 'beginner',
                    'speakers' => $speakers,
                ],
                'lines' => [
                    ['Jung Kook', '안녕하세요!',                                          'Annyeonghaseyo!',                                                   'নমস্কাৰ!',                                                          'Hello!'],
                    ['Pema',      '안녕하세요!',                                          'Annyeonghaseyo!',                                                   'নমস্কাৰ!',                                                          'Hello!'],
                    ['Jung Kook', '이름이 뭐예요?',                                      'Ireumi mwoyeyo?',                                                   'আপোনাৰ নাম কি?',                                                   'What is your name?'],
                    ['Pema',      '저는 페마예요. 이름이 뭐예요?',                       'Jeoneun Pemayeyo. Ireumi mwoyeyo?',                                 'মোৰ নাম পেমা। আপোনাৰ নাম কি?',                                    'I am Pema. What is your name?'],
                    ['Jung Kook', '저는 정국이에요. 반갑습니다!',                        'Jeoneun Jeonggug-ieyo. Bangapseumnida!',                            'মোৰ নাম জুং কুক। আপোনাক লগ পাই ভাল লাগিল!',                      'I am Jung Kook. Nice to meet you!'],
                    ['Pema',      '반갑습니다! 몇 살이에요?',                             'Bangapseumnida! Myeot sal-ieyo?',                                   'আপোনাক লগ পাই ভাল লাগিল! বয়স কিমান?',                           'Nice to meet you! How old are you?'],
                    ['Jung Kook', '저는 스물두 살이에요. 페마 씨는요?',                  'Jeoneun seumuldu sal-ieyo. Pema ssi-neunyo?',                       'মোৰ বয়স বাইশ বছৰ। পেমাৰ?',                                       'I am twenty-two. And you, Pema?'],
                    ['Pema',      '저는 스무 살이에요.',                                  'Jeoneun seumu sal-ieyo.',                                           'মোৰ বয়স বিছ বছৰ।',                                               'I am twenty.'],
                    ['Jung Kook', '어디에서 왔어요?',                                    'Eodieseo wasseoyo?',                                                'আপুনি ক\'ৰ পৰা আহিছে?',                                           'Where are you from?'],
                    ['Pema',      '저는 디브루가르에서 왔어요. 정국 씨는요?',            'Jeoneun Dibrugareseo wasseoyo. Jeongguk ssi-neunyo?',               'মই ডিব্ৰুগড়ৰ পৰা আহিছো। জুং কুকৰ?',                             'I am from Dibrugarh. And you?'],
                    ['Jung Kook', '저는 부산에서 왔어요.',                                'Jeoneun Busaneseo wasseoyo.',                                       'মই বুছানৰ পৰা আহিছো।',                                            'I am from Busan.'],
                    ['Pema',      '한국어 공부가 재미있어요!',                            'Hangugeo gongbuga jaemi isseoyo!',                                  'কোৰিয়ান পঢ়া বহুত মজাৰ!',                                         'Studying Korean is fun!'],
                ],
            ],

            // ── 2. My Family ────────────────────────────────────────────────
            [
                'conv' => [
                    'title_ko' => '가족 이야기',
                    'title_en' => 'My Family',
                    'title_as' => 'মোৰ পৰিয়াল',
                    'scene_en' => 'Pema and Jung Kook chat during a break, sharing about their families.',
                    'scene_as' => 'পেমা আৰু জুং কুক বিৰতিৰ সময়ত নিজৰ পৰিয়ালৰ বিষয়ে কথা পাতে।',
                    'level'    => 'beginner',
                    'speakers' => $speakers,
                ],
                'lines' => [
                    ['Jung Kook', '페마 씨, 가족이 몇 명이에요?',                        'Pema ssi, gajogi myeot myeong-ieyo?',                               'পেমা, পৰিয়ালত কিমানজন?',                                          'Pema, how many people are in your family?'],
                    ['Pema',      '네 명이에요. 아버지, 어머니, 오빠, 그리고 저예요.',   'Ne myeong-ieyo. Abeoji, eomeoni, oppa, geurigo jeoyeyo.',           'চাৰিজন। দেউতা, মা, দাদা, আৰু মই।',                               'Four. Father, mother, older brother, and me.'],
                    ['Jung Kook', '오빠가 있어요? 몇 살이에요?',                         'Oppaga isseoyo? Myeot sal-ieyo?',                                   'দাদা আছে? বয়স কিমান?',                                            'You have an older brother? How old is he?'],
                    ['Pema',      '오빠는 스물다섯 살이에요. 대학교에 다녀요.',           'Oppaneun seumuldaseos sal-ieyo. Daehakgyoe danyeoyo.',              'দাদাৰ বয়স পঁচিছ। বিশ্ববিদ্যালয়ত পঢ়ে।',                         'My brother is twenty-five. He goes to university.'],
                    ['Jung Kook', '아버지는 뭐 해요?',                                   'Abeojineun mwo haeyo?',                                             'দেউতা কি কাম কৰে?',                                               'What does your father do?'],
                    ['Pema',      '아버지는 선생님이에요. 어머니는 의사예요. 정국 씨 가족은요?', 'Abeojineun seonsaengnim-ieyo. Eomeonineun uisayeyo. Jeongguk ssi gajog-eunyo?', 'দেউতা শিক্ষক। মা চিকিৎসক। জুং কুকৰ পৰিয়াল?',   'Father is a teacher. Mother is a doctor. Your family?'],
                    ['Jung Kook', '저는 세 명이에요. 어머니, 형, 그리고 저예요.',        'Jeoneun se myeong-ieyo. Eomeoni, hyeong, geurigo jeoyeyo.',         'আমি তিনিজন। মা, দাদা, আৰু মই।',                                  'Three of us. Mother, older brother, and me.'],
                    ['Pema',      '아버지는 없어요?',                                    'Abeojineun eopseoyo?',                                              'দেউতা নাই?',                                                       'Your father is not there?'],
                    ['Jung Kook', '네, 아버지는 일찍 돌아가셨어요.',                     'Ne, abeojineun iljjik doragasyeosseoyo.',                           'হয়, দেউতা সৰুতেই গুচি গৈছিল।',                                   'Yes, my father passed away early.'],
                    ['Pema',      '아, 미안해요. 형은 뭐 해요?',                         'A, mianhaeyo. Hyeongeun mwo haeyo?',                                'আহ, মাফ কৰিব। দাদা কি কৰে?',                                      'Oh, I\'m sorry. What does your brother do?'],
                    ['Jung Kook', '형은 회사원이에요. 서울에서 일해요.',                 'Hyeongeun hoesawon-ieyo. Seoureseo ilhaeyo.',                       'দাদা অফিচ কৰ্মচাৰী। চিউলত কাম কৰে।',                             'My brother is an office worker in Seoul.'],
                    ['Pema',      '가족이 보고 싶겠어요.',                               'Gajogi bogo sipgeseoyo.',                                           'পৰিয়ালক মনত পৰিব নিশ্চয়।',                                       'You must miss your family.'],
                ],
            ],

            // ── 3. How Do You Feel Today? ────────────────────────────────────
            [
                'conv' => [
                    'title_ko' => '오늘 기분이 어때요?',
                    'title_en' => 'How Do You Feel Today?',
                    'title_as' => 'আজি কেনে লাগিছে?',
                    'scene_en' => 'Jung Kook notices Pema looks a bit different today at the club.',
                    'scene_as' => 'জুং কুকে লক্ষ্য কৰে যে পেমা আজি অলপ বেলেগ দেখা গৈছে।',
                    'level'    => 'beginner',
                    'speakers' => $speakers,
                ],
                'lines' => [
                    ['Jung Kook', '페마 씨, 오늘 기분이 어때요?',                        'Pema ssi, oneul gibun-i eottaeyo?',                                 'পেমা, আজি কেনে লাগিছে?',                                          'Pema, how are you feeling today?'],
                    ['Pema',      '조금 피곤해요. 어젯밤에 잠을 못 잤어요.',             'Jogeum pigonhaeyo. Eojetbam-e jam-eul mot jasseoyo.',               'অলপ ভাগৰ লাগিছে। কালি ৰাতি টোপনি নাহিল।',                        'A little tired. I couldn\'t sleep last night.'],
                    ['Jung Kook', '왜요? 무슨 일 있어요?',                               'Waeyo? Museun il isseoyo?',                                         'কিয়? কিবা হৈছে নেকি?',                                            'Why? Is something wrong?'],
                    ['Pema',      '시험이 있어요. 그래서 걱정돼요.',                     'Siheom-i isseoyo. Geuraeseo geokjeongdwaeyo.',                      'পৰীক্ষা আছে। সেইবাবে চিন্তা হৈছে।',                              'I have an exam. So I\'m worried.'],
                    ['Jung Kook', '저도 가끔 걱정해요. 배는 고파요?',                    'Jeodo gakkeum geokjeunghaeyo. Baeneun gopayo?',                     'মোৰো মাজে মাজে চিন্তা হয়। ভোক লাগিছে নেকি?',                   'I get worried sometimes too. Are you hungry?'],
                    ['Pema',      '네, 배가 고파요! 오늘 아침을 못 먹었어요.',           'Ne, baega gopayo! Oneul achim-eul mot meogeosseoyo.',               'হয়, ভোক লাগিছে! আজি পুৱা খোৱা নহ\'ল।',                          'Yes, I\'m hungry! I didn\'t eat breakfast today.'],
                    ['Jung Kook', '그건 안 돼요. 같이 밥 먹어요!',                       'Geugeon an dwaeyo. Gachi bap meogeayo!',                            'সেইটো ঠিক নহয়। একেলগে খাওঁ!',                                   'That\'s not okay. Let\'s eat together!'],
                    ['Pema',      '고마워요! 정국 씨는 오늘 기분이 어때요?',             'Gomawoyo! Jeongguk ssi-neun oneul gibun-i eottaeyo?',               'ধন্যবাদ! জুং কুক আজি কেনে লাগিছে?',                              'Thank you! How are you feeling today, Jung Kook?'],
                    ['Jung Kook', '저는 오늘 너무 행복해요! 어제 어머니한테서 전화가 왔어요.', 'Jeoneun oneul neomu haengbokhaeyo! Eoie eomeonihanteseo jeonhwaga wasseoyo.', 'মই আজি বহুত সুখী! কালি মাৰ ফোন আহিছিল।',       'I\'m very happy today! My mother called yesterday.'],
                    ['Pema',      '와, 좋겠어요! 어머니 목소리를 들으면 기분이 좋아지죠.', 'Wa, jokgeseoyo! Eomeoni moksori-reul deureumyeon gibun-i joajijyo.', 'ৱাহ, ভালেই! মাৰ মাত শুনিলে মন ভাল হয় নহয়।',                 'Wow, great! Hearing your mother\'s voice makes you feel better, right?'],
                    ['Jung Kook', '맞아요! 이제 기분이 좀 나아졌어요, 페마 씨?',         'Majayo! Ije gibun-i jom naajyeosseoyo, Pema ssi?',                  'ঠিকেই! এতিয়া অলপ ভাল লাগিছে নেকি পেমা?',                       'Right! Do you feel a bit better now, Pema?'],
                    ['Pema',      '네, 이야기하니까 기분이 좋아졌어요. 고마워요!',       'Ne, iyagihaniikka gibun-i joajyeosseoyo. Gomawoyo!',                'হয়, কথা পাতিলে মন ভাল হৈ গ\'ল। ধন্যবাদ!',                      'Yes, talking made me feel better. Thank you!'],
                ],
            ],

            // ── 4. Colors & Numbers in Real Life ────────────────────────────
            [
                'conv' => [
                    'title_ko' => '색깔과 숫자',
                    'title_en' => 'Colors & Numbers in Real Life',
                    'title_as' => 'ৰং আৰু সংখ্যা',
                    'scene_en' => 'Pema and Jung Kook are at a stationery shop before class.',
                    'scene_as' => 'পেমা আৰু জুং কুক ক্লাছৰ আগতে এখন দোকানত আছে।',
                    'level'    => 'beginner',
                    'speakers' => $speakers,
                ],
                'lines' => [
                    ['Pema',      '정국 씨, 이 가방 색깔이 뭐예요?',                    'Jeongguk ssi, i gabang saekgal-i mwoyeyo?',                         'জুং কুক, এই বেগটোৰ ৰং কি?',                                       'Jung Kook, what color is this bag?'],
                    ['Jung Kook', '빨간색이에요. 예쁘죠?',                               'Ppalganssaeg-ieyo. Yeppeujyo?',                                     'ৰঙা। সুন্দৰ নহয় নেকি?',                                           'It\'s red. Pretty, isn\'t it?'],
                    ['Pema',      '네! 저는 파란색을 좋아해요.',                         'Ne! Jeoneun paransaeg-eul joahaeyo.',                               'হয়! মই নীলা ৰং ভালপাওঁ।',                                         'Yes! I like blue.'],
                    ['Jung Kook', '저는 초록색이 좋아요. 이 책 봐요 — 초록색이에요!',   'Jeoneun chorokssaegi joayo. I chaek bwayo — chorokssaeg-ieyo!',     'মই সেউজীয়া ভালপাওঁ। এই কিতাপখন চাওক — সেউজীয়া!',             'I like green. Look at this book — it\'s green!'],
                    ['Pema',      '맞아요! 책이 몇 권 있어요?',                          'Majayo! Chaegi myeot gwon isseoyo?',                                'ঠিকেই! কিমানখন কিতাপ আছে?',                                       'Right! How many books do you have?'],
                    ['Jung Kook', '다섯 권 있어요. 모두 한국어 책이에요. 페마 씨는요?', 'Daseos gwon isseoyo. Modu hangugeo chaeg-ieyo. Pema ssi-neunyo?',   'পাঁচখন। সকলো কোৰিয়ান। পেমাৰ?',                                   'Five books. All Korean. And you?'],
                    ['Pema',      '저는 세 권 있어요. 이 연필은 얼마예요?',              'Jeoneun se gwon isseoyo. I yeonpil-eun eolmayeyo?',                 'মোৰ তিনিখন। এই পেঞ্চিলটো কিমান?',                                'I have three. How much is this pencil?'],
                    ['Jung Kook', '오백 원이에요. 저렴하죠?',                            'Obaek won-ieyo. Jeoryeomhajyo?',                                    'পাঁচশ ৱন। সস্তা নহয়?',                                             'Five hundred won. Cheap, right?'],
                    ['Pema',      '와, 정말 저렴해요! 두 개 살게요. 노란색 있어요?',    'Wa, jeongmal jeoryeomhaeyo! Du gae salgeyo. Noransaek isseoyo?',    'ৱাহ, সঁচাকৈ সস্তা! দুটা কিনিম। হালধীয়া আছে নেকি?',             'Wow, really cheap! I\'ll buy two. Is there yellow?'],
                    ['Jung Kook', '아니요, 노란색은 없어요. 흰색이랑 검은색만 있어요.', 'Aniyo, noransaegeun eopseoyo. Huinsaegnirang geomeunsaengman isseoyo.', 'হালধীয়া নাই। বগা আৰু ক\'লাহে আছে।',                         'No yellow. Only white and black.'],
                    ['Pema',      '그럼 흰색으로 살게요. 모두 얼마예요?',                'Geureom huinsaeg-euro salgeyo. Modu eolmayeyo?',                    'তেন্তে বগাটা লম। মুঠ কিমান?',                                     'Then I\'ll take white. How much altogether?'],
                    ['Jung Kook', '모두 천 원이에요!',                                   'Modu cheon won-ieyo!',                                              'মুঠ এক হাজাৰ ৱন!',                                                'Everything is one thousand won!'],
                ],
            ],

            // ── 5. What Do You Like? ─────────────────────────────────────────
            [
                'conv' => [
                    'title_ko' => '뭐 좋아해요?',
                    'title_en' => 'What Do You Like?',
                    'title_as' => 'আপুনি কি ভালপায়?',
                    'scene_en' => 'Pema and Jung Kook relax after a DKC session, getting to know each other.',
                    'scene_as' => 'DKC চেছনৰ পিছত পেমা আৰু জুং কুক একেলগে বহি কথা পাতে।',
                    'level'    => 'beginner',
                    'speakers' => $speakers,
                ],
                'lines' => [
                    ['Jung Kook', '페마 씨, 뭐 좋아해요?',                               'Pema ssi, mwo joahaeyo?',                                           'পেমা, আপুনি কি ভালপায়?',                                          'Pema, what do you like?'],
                    ['Pema',      '저는 음악을 좋아해요. 정국 씨는요?',                  'Jeoneun eumag-eul joahaeyo. Jeongguk ssi-neunyo?',                  'মই সংগীত ভালপাওঁ। জুং কুকৰ?',                                    'I like music. And you?'],
                    ['Jung Kook', '저도 음악을 좋아해요! 어떤 음악을 좋아해요?',         'Jeodo eumag-eul joahaeyo! Eotteon eumag-eul joahaeyo?',             'মোও সংগীত ভালপাওঁ! কি ধৰণৰ?',                                    'I like music too! What kind?'],
                    ['Pema',      '저는 K-팝을 좋아해요! 좋아하는 가수가 있어요?',      'Jeoneun K-pab-eul joahaeyo! Joahaneun gasuga isseoyo?',             'মই কে-পপ ভালপাওঁ! প্ৰিয় গায়ক আছে?',                            'I like K-pop! Do you have a favourite singer?'],
                    ['Jung Kook', '네, BTS를 좋아해요. 페마 씨는요?',                    'Ne, BTS-reul joahaeyo. Pema ssi-neunyo?',                           'হয়, BTS ভালপাওঁ। পেমাৰ?',                                         'Yes, I like BTS. And you?'],
                    ['Pema',      '저도 BTS 좋아해요! 음식은 뭘 좋아해요?',             'Jeodo BTS joahaeyo! Eumsig-eun mwol joahaeyo?',                     'মোও BTS ভালপাওঁ! খাদ্য কি ভালপায়?',                              'I like BTS too! What food do you like?'],
                    ['Jung Kook', '김치찌개를 좋아해요. 매운 음식 좋아해요?',           'Gimchi jjigae-reul joahaeyo. Maeun eumsig joahaeyo?',               'কিমচি জিগে ভালপাওঁ। জলা খাদ্য ভালপায়?',                         'I like kimchi jjigae. Do you like spicy food?'],
                    ['Pema',      '네, 매운 음식 아주 좋아해요! 싫어하는 음식 있어요?', 'Ne, maeun eumsig aju joahaeyo! Silheoaneun eumsig isseoyo?',        'হয়, জলা বহুত ভালপাওঁ! অপছন্দৰ খাদ্য আছে নেকি?',                 'Yes, I love spicy! Is there food you dislike?'],
                    ['Jung Kook', '저는 고수를 싫어해요. 냄새가 강해요. 페마 씨는요?',  'Jeoneun gosureul silheoahaeyo. Naemsaega ganghaeyo. Pema ssi-neunyo?', 'মই ধনিয়া পাত অপছন্দ। গোন্ধ বেছি। পেমাৰ?',                   'I dislike coriander. Too strong. And you?'],
                    ['Pema',      '저는 쓴 음식을 싫어해요. 동물은 뭘 좋아해요?',       'Jeoneun sseun eumsig-eul silheoahaeyo. Dongmul-eun mwol joahaeyo?', 'মই তিতা খাদ্য অপছন্দ। কি জন্তু ভালপায়?',                       'I dislike bitter food. What animal do you like?'],
                    ['Jung Kook', '강아지를 좋아해요. 너무 귀여워요! 페마 씨는요?',      'Gang-ajireul joahaeyo. Neomu gwiyeowoyo! Pema ssi-neunyo?',         'কুকুৰ ভালপাওঁ। বহুত মৰমলগা! পেমাৰ?',                             'I like dogs. So cute! And you?'],
                    ['Pema',      '저는 고양이를 좋아해요. 조용하고 귀여워요!',          'Jeoneun goyangireul joahaeyo. Joyonghago gwiyeowoyo!',              'মেকুৰী ভালপাওঁ। চুপ আৰু মৰমলগা!',                                'I like cats. Quiet and cute!'],
                ],
            ],

            // ── 6. What Time Is It? ──────────────────────────────────────────
            [
                'conv' => [
                    'title_ko' => '지금 몇 시예요?',
                    'title_en' => 'What Time Is It?',
                    'title_as' => 'এতিয়া কিমান বাজে?',
                    'scene_en' => 'Pema and Jung Kook plan their daily study schedule together.',
                    'scene_as' => 'পেমা আৰু জুং কুক একেলগে পঢ়াৰ সময়সূচী ঠিক কৰে।',
                    'level'    => 'beginner',
                    'speakers' => $speakers,
                ],
                'lines' => [
                    ['Pema',      '정국 씨, 지금 몇 시예요?',                            'Jeongguk ssi, jigeum myeot si-eyo?',                                'জুং কুক, এতিয়া কিমান বাজে?',                                      'Jung Kook, what time is it now?'],
                    ['Jung Kook', '지금 두 시예요. 왜요?',                               'Jigeum du si-eyo. Waeyo?',                                          'এতিয়া দুই বাজে। কিয়?',                                           'It\'s two o\'clock. Why?'],
                    ['Pema',      '세 시에 수업이 있어요. 한 시간 남았어요.',             'Se si-e sueob-i isseoyo. Han sigan namasseoyo.',                    'তিনি বাজত ক্লাছ আছে। এক ঘণ্টা বাকী।',                            'I have class at three. One hour left.'],
                    ['Jung Kook', '페마 씨는 보통 몇 시에 일어나요?',                    'Pema ssi-neun botong myeot si-e ireonayo?',                         'পেমা সাধাৰণতে কিমান বাজত উঠে?',                                   'What time do you usually wake up?'],
                    ['Pema',      '저는 여섯 시에 일어나요. 정국 씨는요?',               'Jeoneun yeoseos si-e ireonayo. Jeongguk ssi-neunyo?',               'মই ছয় বাজত উঠো। জুং কুকৰ?',                                      'I wake up at six. And you?'],
                    ['Jung Kook', '저는 일곱 시에 일어나요. 아침을 몇 시에 먹어요?',    'Jeoneun ilgop si-e ireonayo. Achim-eul myeot si-e meogeayo?',       'মই সাত বাজত উঠো। কিমান বাজত পুৱাৰ আহাৰ খায়?',                  'I wake up at seven. What time do you eat breakfast?'],
                    ['Pema',      '일곱 시 반에 먹어요. 점심은 열두 시에 먹어요. 저녁은요?', 'Ilgop si ban-e meogeayo. Jeomsim-eun yeoldu si-e meogeayo. Jeonyeogeunyo?', 'সাত বাজি ত্ৰিছত খাওঁ। দুপৰীয়া বাৰটাত। ৰাতিৰ আহাৰ?',  'Half past seven. Lunch at twelve. Dinner?'],
                    ['Jung Kook', '저는 저녁을 여덟 시에 먹어요. 몇 시에 자요?',         'Jeoneun jeonyeog-eul yeodeol si-e meogeayo. Myeot si-e jayo?',      'মই ৰাতি আঠ বাজত খাওঁ। কিমান বাজত শোৱে?',                        'I eat dinner at eight. What time do you sleep?'],
                    ['Pema',      '열한 시에 자요. 너무 늦게 자는 것 같아요.',           'Yeolhan si-e jayo. Neomu neutge janeun geot gatayo.',               'এঘাৰ বাজত শোৱো। বেছি দেৰিকৈ শোৱা হয় যেন।',                     'I sleep at eleven. I think I sleep too late.'],
                    ['Jung Kook', '저는 열 시에 자요. 일찍 자는 게 좋아요.',             'Jeoneun yeol si-e jayo. Iljjik janeun ge joayo.',                   'মই দহ বাজত শোৱো। সোনকালে শোৱাটো ভাল।',                          'I sleep at ten. Sleeping early is good.'],
                    ['Pema',      '맞아요! 한국어 공부는 몇 시에 해요?',                 'Majayo! Hangugeo gongbuneun myeot si-e haeyo?',                     'ঠিকেই! কোৰিয়ান পঢ়া কিমান বাজত কৰে?',                            'Right! What time do you study Korean?'],
                    ['Jung Kook', '저는 아홉 시에 해요. 같이 공부해요!',                 'Jeoneun ahop si-e haeyo. Gachi gongbuhaeyo!',                       'মই ন বাজত কৰো। একেলগে পঢ়ো!',                                     'I study at nine. Let\'s study together!'],
                ],
            ],

            // ── 7. Today's Weather ───────────────────────────────────────────
            [
                'conv' => [
                    'title_ko' => '오늘 날씨',
                    'title_en' => 'Today\'s Weather',
                    'title_as' => 'আজিৰ বতৰ',
                    'scene_en' => 'Pema and Jung Kook stand outside the DKC room looking at the sky.',
                    'scene_as' => 'পেমা আৰু জুং কুক DKC কোঠাৰ বাহিৰত আকাশলৈ চাই থিয় হৈ আছে।',
                    'level'    => 'beginner',
                    'speakers' => $speakers,
                ],
                'lines' => [
                    ['Pema',      '정국 씨, 오늘 날씨가 어때요?',                        'Jeongguk ssi, oneul nalssiga eottaeyo?',                            'জুং কুক, আজি বতৰ কেনে?',                                          'Jung Kook, how is the weather today?'],
                    ['Jung Kook', '오늘 너무 더워요! 땀이 나요.',                         'Oneul neomu deowoyo! Ttam-i nayo.',                                 'আজি বহুত গৰম! ঘাম ওলাইছে।',                                       'So hot today! I\'m sweating.'],
                    ['Pema',      '맞아요. 디브루가르는 항상 더워요. 부산은 어때요?',    'Majayo. Dibrugareun hangsang deowoyo. Busaneun eottaeyo?',          'ঠিকেই। ডিব্ৰুগড় সদায় গৰম। বুছান কেনে?',                         'Right. Dibrugarh is always hot. How about Busan?'],
                    ['Jung Kook', '부산은 여름에 덥고 겨울에 추워요. 근데 여기보다는 덜 더워요.', 'Busaneun yeoreum-e deopgo gyeoure chuwoyo. Geunde yeogibodaneun deol deowoyo.', 'বুছান গ্ৰীষ্মত গৰম, শীতত ঠাণ্ডা। কিন্তু ইয়াতকৈ কম গৰম।', 'Busan is hot in summer, cold in winter. But less hot than here.'],
                    ['Pema',      '한국 겨울은 얼마나 추워요?',                           'Hanguk gyeoul-eun eolmana chuwoyo?',                               'কোৰিয়াৰ শীতকাল কিমান ঠাণ্ডা?',                                   'How cold is Korean winter?'],
                    ['Jung Kook', '많이 추워요. 영하 십 도까지 내려가요. 눈도 많이 와요!', 'Mani chuwoyo. Yeongha sip dokaji naeryeogayo. Nundo mani wayo!',   'বহুত ঠাণ্ডা। মাইনাছ দহ ডিগ্ৰীলৈ নামে। বৰফো বহুত পৰে!',         'Very cold. Minus ten degrees. It snows a lot too!'],
                    ['Pema',      '와! 눈을 본 적이 없어요. 여기는 겨울에도 안 추워요.',  'Wa! Nun-eul bon jeog-i eopseoyo. Yeogineun gyeouredо an chuwoyo.', 'ৱাহ! বৰফ কেতিয়াও দেখা নাই। ইয়াত শীতকালতো ঠাণ্ডা নহয়।',      'Wow! I\'ve never seen snow. Here it\'s not cold even in winter.'],
                    ['Jung Kook', '정말요? 비는 많이 와요?',                              'Jeongmallyo? Bineun mani wayo?',                                    'সঁচাকৈ? বৰষুণ বহুত হয় নেকি?',                                    'Really? Does it rain a lot?'],
                    ['Pema',      '네! 6월부터 9월까지 비가 많이 와요. 홍수도 가끔 돼요.', 'Ne! Yuworbuteo guwolkkaji biga mani wayo. Hongsudo gakkeum dwaeyo.', 'হয়! জুনৰ পৰা ছেপ্তেম্বৰলৈ বৰষুণ বহুত হয়। মাজে মাজে বানপানীও হয়।', 'Yes! From June to September it rains a lot. Sometimes floods too.'],
                    ['Jung Kook', '홍수요? 무섭겠어요. 오늘은 구름이 많아요. 비 올 것 같아요.', 'Hongsуyo? Museobgeseoyo. Oneureun gureum-i manayo. Bi ol geot gatayo.', 'বানপানী? ভয় লাগে! আজি মেঘ বহুত। বৰষুণ হ\'ব পাৰে যেন।',     'Floods? Scary! Today there are many clouds. Looks like rain.'],
                    ['Pema',      '맞아요! 우산 있어요?',                                 'Majayo! Usan isseoyo?',                                             'ঠিকেই! চাতি আছে নেকি?',                                           'Right! Do you have an umbrella?'],
                    ['Jung Kook', '아니요, 없어요! 같이 뛰어요!',                         'Aniyo, eopseoyo! Gachi ttwieyo!',                                   'নহয়, নাই! একেলগে দৌৰো!',                                          'No, I don\'t! Let\'s run together!'],
                ],
            ],

        ];

        foreach ($conversations as $entry) {
            $convId = DB::table('learning_conversations')->insertGetId(
                array_merge($entry['conv'], [
                    'created_at' => now(),
                    'updated_at' => now(),
                ])
            );

            foreach ($entry['lines'] as $i => [$speaker, $ko, $rom, $as, $en]) {
                DB::table('conversation_lines')->insert([
                    'conversation_id' => $convId,
                    'order_index'     => $i + 1,
                    'speaker_label'   => $speaker,
                    'text_ko'         => $ko,
                    'romanization'    => $rom,
                    'translation_as'  => $as,
                    'translation_en'  => $en,
                    'audio_id'        => null,
                    'created_at'      => now(),
                    'updated_at'      => now(),
                ]);
            }
        }
    }
}
