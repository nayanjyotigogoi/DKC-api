<?php

namespace Database\Seeders\Learning;

use Illuminate\Database\Seeder;
use App\Models\Learning\Conversation;
use App\Models\Learning\ConversationLine;

/**
 * Seeds 8 real-world conversations with full Korean/Romanization/Assamese/English.
 * Each conversation is self-contained and reusable across multiple lessons.
 */
class ConversationSeeder extends Seeder
{
    private function makeConversation(array $attrs): Conversation
    {
        return Conversation::firstOrCreate(['title_en' => $attrs['title_en']], $attrs);
    }

    private function addLine(Conversation $c, array $attrs): void
    {
        // Map seeder field names to actual DB column names
        $data = [
            'conversation_id' => $c->id,
            'order_index'     => $attrs['order_index'],
            'speaker_label'   => $attrs['speaker_label'],
            'text_ko'         => $attrs['korean'],
            'romanization'    => $attrs['romanization'],
            'translation_as'  => $attrs['assamese'],
            'translation_en'  => $attrs['english'],
        ];

        ConversationLine::firstOrCreate(
            ['conversation_id' => $c->id, 'order_index' => $attrs['order_index']],
            $data
        );
    }

    public function run(): void
    {
        $this->atKoreanRestaurant();
        $this->askingForDirections();
        $this->atThePharmacy();
        $this->weekendPlans();
        $this->marketShopping();
        $this->bihuChuseokExchange();
        $this->universityOrientation();
        $this->telephoneCall();
    }

    // ── 1. AT A KOREAN RESTAURANT ────────────────────────────────────────────
    private function atKoreanRestaurant(): void
    {
        $c = $this->makeConversation([
            'title_ko'    => '한국 식당에서',
            'title_en'    => 'At a Korean Restaurant',
            'title_as'    => 'কোৰিয়ান ভোজনালয়ত',
            'level'       => 'beginner',
            'context_en'  => 'Priya and her Korean friend Jiyeon visit a Korean restaurant. Priya tries to order in Korean for the first time.',
            'context_as'  => 'প্ৰিয়া আৰু তেওঁৰ কোৰিয়ান বন্ধু জিয়েওন এটা কোৰিয়ান ভোজনালয়ত যায়। প্ৰিয়া প্ৰথমবাৰৰ বাবে কোৰিয়ানত খাদ্য অৰ্ডাৰ কৰিবলৈ চেষ্টা কৰে।',
            'speakers'    => [
                ['label' => 'Priya',   'gender' => 'female'],
                ['label' => 'Jiyeon',  'gender' => 'female'],
                ['label' => '직원',    'gender' => 'female'],
            ],
            'tags'        => ['restaurant', 'food', 'ordering', 'beginner'],
        ]);

        $lines = [
            [1,'직원',  '어서 오세요! 몇 분이세요?',               'Eoseo oseyo! Myeot buniseyo?',                    'আহকচোন! কেইজন মানুহ?',                         'Welcome! How many people?'],
            [2,'Jiyeon','두 명이에요.',                             'Du myeongieyo.',                                  'দুজন।',                                          'There are two of us.'],
            [3,'직원',  '이쪽으로 오세요. 메뉴 드릴게요.',         'Ijjogeuro oseyo. Menyu deurilgeyo.',              'এফালে আহক। মেনু দিম।',                          'Please come this way. I will bring the menu.'],
            [4,'Priya', '지영아, 뭐가 맛있어?',                    'Jiyeonga, mwoga massisseo?',                      'জিয়েওনা, কি সুস্বাদু?',                        'Jiyeon, what is delicious here?'],
            [5,'Jiyeon','비빔밥이랑 된장찌개가 맛있어. 뭐 좋아해?','Bibimbabiran doenjangjjigaega massisseo. Mwo joahae?','বিবিম্বাব আৰু ডোইনজাংচিগে সুস্বাদু। তুমি কি পছন্দ কৰা?','Bibimbap and doenjang jjigae are delicious. What do you like?'],
            [6,'Priya', '저는 채소를 좋아해요.',                   'Jeoneun chaesoreul joahaeyo.',                    'মই শাক-পাচলি পছন্দ কৰো।',                      'I like vegetables.'],
            [7,'Jiyeon','그럼 비빔밥이 좋을 것 같아.',              'Geureom bibimbabi joheul geot gata.',             'তেনেহলে বিবিম্বাব ভালে হব।',                   'Then bibimbap will be good.'],
            [8,'직원',  '주문하시겠어요?',                          'Jumunhasigesseoyo?',                              'অৰ্ডাৰ দিবনে?',                                 'Are you ready to order?'],
            [9,'Priya', '비빔밥 하나 주세요.',                      'Bibimbab hana juseyo.',                           'এটা বিবিম্বাব দিয়ক।',                           'One bibimbap, please.'],
            [10,'Jiyeon','된장찌개 주세요.',                        'Doenjangjjigae juseyo.',                          'ডোইনজাংচিগে দিয়ক।',                            'Doenjang jjigae, please.'],
            [11,'직원', '음료는요?',                               'Eumnyoneunyo?',                                   'পানীয়?',                                        'And drinks?'],
            [12,'Priya','물 주세요.',                               'Mul juseyo.',                                     'পানী দিয়ক।',                                    'Water, please.'],
            [13,'직원', '네, 잠시만 기다려 주세요.',               'Ne, jamsiman gidaryeo juseyo.',                   'হয়, অলপ ৰৈ থাকক।',                             'Yes, please wait a moment.'],
            [14,'Priya','아, 맛있겠다! 고마워, 지영아.',            'A, masissgeda! Gomawo, Jiyeonga.',                'আহ, সুস্বাদু হব! ধন্যবাদ, জিয়েওনা।',          'Ah, it looks delicious! Thank you, Jiyeon.'],
            [15,'Jiyeon','맛있게 먹어!',                            'Masitge meogeo!',                                 'সুস্বাদুকৈ খাবি!',                              'Enjoy your meal!'],
        ];

        foreach ($lines as [$order, $speaker, $ko, $rom, $as, $en]) {
            $this->addLine($c, [
                'conversation_id' => $c->id,
                'speaker_label'   => $speaker,
                'korean'          => $ko,
                'romanization'    => $rom,
                'assamese'        => $as,
                'english'         => $en,
                'order_index'     => $order,
            ]);
        }
    }

    // ── 2. ASKING FOR DIRECTIONS ─────────────────────────────────────────────
    private function askingForDirections(): void
    {
        $c = $this->makeConversation([
            'title_ko'    => '길 찾기 — 디브루가르 대학교 근처',
            'title_en'    => 'Asking for Directions near Dibrugarh University',
            'title_as'    => 'ডিব্ৰুগড় বিশ্ববিদ্যালয়ৰ ওচৰত দিশ বিচৰা',
            'level'       => 'beginner',
            'context_en'  => 'Suho, a Korean exchange student, asks Priya for directions to the university library.',
            'context_as'  => 'কোৰিয়ান বিনিময় ছাত্ৰ চুহো, প্ৰিয়াক বিশ্ববিদ্যালয়ৰ পুথিভঁৰাললৈ যোৱাৰ দিশ সোধে।',
            'speakers'    => [
                ['label' => 'Suho',  'gender' => 'male'],
                ['label' => 'Priya', 'gender' => 'female'],
            ],
            'tags'        => ['directions', 'campus', 'transport', 'beginner'],
        ]);

        $lines = [
            [1,'Suho',  '저기요, 실례합니다.',                      'Jeogiyo, sillyehamnida.',                         'এইখিনিতে, মাফ কৰিব।',                          'Excuse me.'],
            [2,'Priya', '네, 무슨 일이에요?',                       'Ne, museun irieyo?',                              'হয়, কি হল?',                                    'Yes, what is it?'],
            [3,'Suho',  '도서관이 어디 있어요?',                    'Doseogwani eodi isseoyo?',                        'পুথিভঁৰাল ক\'ত আছে?',                           'Where is the library?'],
            [4,'Priya', '여기서 쭉 가면 오른쪽에 있어요.',          'Yeogiseo jjuk gamyeon oreunjoge isseoyo.',        'ইয়াৰ পৰা পোনে গলে সোঁফালে আছে।',              'Go straight from here; it is on the right.'],
            [5,'Suho',  '얼마나 걸려요?',                           'Eolmana geolyeoyo?',                              'কিমান সময় লাগে?',                               'How long does it take?'],
            [6,'Priya', '걸어서 5분쯤 걸려요.',                     'Georeoseo 5bunjjeum geolyeoyo.',                  'খোজ কাঢ়ি প্ৰায় ৫ মিনিট লাগে।',               'About 5 minutes on foot.'],
            [7,'Suho',  '그 앞에 카페가 있어요?',                   'Geu ape kapega isseoyo?',                         'তাৰ সন্মুখত কেফে আছেনে?',                       'Is there a café in front of it?'],
            [8,'Priya', '네, 큰 나무 옆에 있어요.',                 'Ne, keun namu yope isseoyo.',                     'হয়, এটা ডাঙৰ গছৰ কাষত আছে।',                  'Yes, it is next to a big tree.'],
            [9,'Suho',  '감사합니다!',                              'Gamsahamnida!',                                   'ধন্যবাদ!',                                      'Thank you!'],
            [10,'Priya','천만에요. 좋은 하루 되세요!',              'Cheonmaneyo. Joeun haru doeseyo!',               'কোনো কথা নাই। ভালে থাকক!',                     'You are welcome. Have a great day!'],
        ];

        foreach ($lines as [$order, $speaker, $ko, $rom, $as, $en]) {
            $this->addLine($c, [
                'conversation_id' => $c->id,
                'speaker_label'   => $speaker,
                'korean'          => $ko,
                'romanization'    => $rom,
                'assamese'        => $as,
                'english'         => $en,
                'order_index'     => $order,
            ]);
        }
    }

    // ── 3. AT THE PHARMACY / HOSPITAL ────────────────────────────────────────
    private function atThePharmacy(): void
    {
        $c = $this->makeConversation([
            'title_ko'    => '약국에서',
            'title_en'    => 'At the Pharmacy',
            'title_as'    => 'ঔষধালয়ত',
            'level'       => 'beginner',
            'context_en'  => 'Rohan has a headache and visits a Korean pharmacy.',
            'context_as'  => 'ৰোহানৰ মূৰ বিষাইছে আৰু তেওঁ এটা কোৰিয়ান ঔষধালয়লৈ যায়।',
            'speakers'    => [
                ['label' => 'Rohan',  'gender' => 'male'],
                ['label' => '약사',   'gender' => 'female'],
            ],
            'tags'        => ['pharmacy', 'health', 'body', 'beginner'],
        ]);

        $lines = [
            [1,'Rohan',  '안녕하세요. 두통약이 있어요?',             'Annyeonghaseyo. Dutongagi isseoyo?',              'নমস্কাৰ। মূৰ বিষৰ ঔষধ আছেনে?',               'Hello. Do you have headache medicine?'],
            [2,'약사',   '네, 있어요. 많이 아프세요?',               'Ne, isseoyo. Mani apeuseoyo?',                    'হয়, আছে। বহুত বিষাইছেনে?',                    'Yes, we do. Does it hurt a lot?'],
            [3,'Rohan',  '네, 아침부터 머리가 아파요.',              'Ne, achimbuteo meoriga apayo.',                   'হয়, পুৱাৰে পৰা মূৰ বিষাইছে।',                 'Yes, my head has been hurting since morning.'],
            [4,'약사',   '열이 있어요?',                             'Yeori isseoyo?',                                  'জ্বৰ আছেনে?',                                   'Do you have a fever?'],
            [5,'Rohan',  '아니요, 열은 없어요.',                    'Aniyo, yeoreun eopseoyo.',                        'নাই, জ্বৰ নাই।',                                'No, I do not have a fever.'],
            [6,'약사',   '이 약을 드세요. 하루에 두 번, 식후에.',   'I yageul deuseyo. Harue du beon, sikue.',         'এই ঔষধ খাওক। দিনত দুবাৰ, খোৱাৰ পিছত।',      'Take this medicine. Twice a day, after meals.'],
            [7,'Rohan',  '물이랑 같이 먹어도 돼요?',                'Murirang gachi meogeo do dwaeyo?',                'পানীৰ সৈতে খাব পাৰিমনে?',                      'Can I take it with water?'],
            [8,'약사',   '네, 물이랑 드세요. 충분히 쉬세요.',       'Ne, murirang deuseyo. Chungbunhi swiseyo.',       'হয়, পানীৰে খাওক। পৰ্যাপ্ত বিশ্ৰাম লওক।',    'Yes, take it with water. Get enough rest.'],
            [9,'Rohan',  '얼마예요?',                               'Eolmayeyo?',                                     'কিমান?',                                        'How much is it?'],
            [10,'약사',  '오천 원이에요.',                           'Ocheon wonievo.',                                 'পাঁচ হাজাৰ ৱোন।',                               'It is five thousand won.'],
            [11,'Rohan', '감사합니다. 빨리 낫고 싶어요.',           'Gamsahamnida. Ppalri natgo sipeoyo.',             'ধন্যবাদ। সোনকালে ভালে হব খুজিছো।',            'Thank you. I hope I get better soon.'],
            [12,'약사',  '빨리 나으세요!',                          'Ppalri naeuseyo!',                               'সোনকালে ভালে যাওক!',                           'Get well soon!'],
        ];

        foreach ($lines as [$order, $speaker, $ko, $rom, $as, $en]) {
            $this->addLine($c, [
                'conversation_id' => $c->id,
                'speaker_label'   => $speaker,
                'korean'          => $ko,
                'romanization'    => $rom,
                'assamese'        => $as,
                'english'         => $en,
                'order_index'     => $order,
            ]);
        }
    }

    // ── 4. MAKING WEEKEND PLANS ──────────────────────────────────────────────
    private function weekendPlans(): void
    {
        $c = $this->makeConversation([
            'title_ko'    => '주말 계획 세우기',
            'title_en'    => 'Making Weekend Plans',
            'title_as'    => 'সপ্তাহান্তৰ পৰিকল্পনা',
            'level'       => 'beginner',
            'context_en'  => 'Two university friends, Mina and Rohan, discuss their weekend plans.',
            'context_as'  => 'দুজন বিশ্ববিদ্যালয়ৰ বন্ধু মিনা আৰু ৰোহান তেওঁলোকৰ সপ্তাহান্তৰ পৰিকল্পনাৰ বিষয়ে আলোচনা কৰে।',
            'speakers'    => [
                ['label' => 'Mina',  'gender' => 'female'],
                ['label' => 'Rohan', 'gender' => 'male'],
            ],
            'tags'        => ['plans', 'weekend', 'leisure', 'beginner'],
        ]);

        $lines = [
            [1,'Mina',  '로한아, 이번 주말에 뭐 해?',               'Rohana, ibeon jumare mwo hae?',                   'ৰোহান, এই সপ্তাহান্তত কি কৰা?',                'Rohan, what are you doing this weekend?'],
            [2,'Rohan', '아직 계획 없어. 왜?',                      'Ajik gyehoek eopseo. Wae?',                       'এতিয়ালৈ পৰিকল্পনা নাই। কিয়?',                'I have no plans yet. Why?'],
            [3,'Mina',  '우리 영화 보러 갈까?',                     'Uri yeonghwa boreo galkka?',                      'আমি চিনেমা চাবলৈ যাওঁনে?',                     'Shall we go watch a movie?'],
            [4,'Rohan', '좋아! 무슨 영화 볼 거야?',                 'Joa! Museun yeonghwa bol geoya?',                 'ভালে! কোন চিনেমা চাবো?',                        'Great! Which movie will we watch?'],
            [5,'Mina',  '새로 나온 한국 영화가 있어. 보고 싶어?',  'Saero naon hanguk yeonghwaga isseo. Bogo sipeo?', 'এটা নতুন কোৰিয়ান চিনেমা আছে। চাব খোজানে?',   'There is a new Korean movie out. Do you want to see it?'],
            [6,'Rohan', '물론이지! 몇 시에 만날까?',               'Mullonji! Myeot sie mannalkka?',                  'অৱশ্যেই! কিমান বাজিলে লগ হোৱা?',              'Of course! What time shall we meet?'],
            [7,'Mina',  '오후 세 시에 영화관 앞에서 만나자.',       'Ohu se sie yeonghwagwan apeseo mannaja.',         'আবেলি তিনি বাজিলে চিনেমা হলৰ সন্মুখত লগ হওঁ।','Let\'s meet in front of the cinema at 3 pm.'],
            [8,'Rohan', '알겠어. 그다음에 뭐 할 거야?',             'Algesseo. Geudaeume mwo hal geoya?',              'বুজিলো। তাৰ পিছত কি কৰিম?',                    'Got it. What will we do after?'],
            [9,'Mina',  '밥 먹고 카페 갈까?',                       'Bap meokgo kape galkka?',                         'ভাত খাই কেফেলৈ যাওঁনে?',                        'Shall we eat and then go to a café?'],
            [10,'Rohan','완벽해! 기대된다.',                        'Wanbyeoghae! Gidaedoenda.',                       'নিখুঁত! অপেক্ষাত আছো।',                         'Perfect! I am looking forward to it.'],
        ];

        foreach ($lines as [$order, $speaker, $ko, $rom, $as, $en]) {
            $this->addLine($c, [
                'conversation_id' => $c->id,
                'speaker_label'   => $speaker,
                'korean'          => $ko,
                'romanization'    => $rom,
                'assamese'        => $as,
                'english'         => $en,
                'order_index'     => $order,
            ]);
        }
    }

    // ── 5. PALTAN MARKET SHOPPING ────────────────────────────────────────────
    private function marketShopping(): void
    {
        $c = $this->makeConversation([
            'title_ko'    => '시장에서 쇼핑하기',
            'title_en'    => 'Shopping at Paltan Market, Dibrugarh',
            'title_as'    => 'ডিব্ৰুগড়ৰ পল্টন বজাৰত কিনা-বেচা',
            'level'       => 'intermediate',
            'context_en'  => 'Jiyeon visits Paltan Market in Dibrugarh and practises bargaining in Korean with a shopkeeper who has learned some Korean from TV dramas.',
            'context_as'  => 'জিয়েওন ডিব্ৰুগড়ৰ পল্টন বজাৰলৈ যায় আৰু টিভি নাটক দেখি কোৰিয়ান শিকা এজন ব্যৱসায়ীৰ সৈতে দৰদাম কৰিবলৈ চেষ্টা কৰে।',
            'speakers'    => [
                ['label' => 'Jiyeon',    'gender' => 'female'],
                ['label' => '주인아저씨', 'gender' => 'male'],
            ],
            'tags'        => ['shopping', 'bargaining', 'market', 'intermediate'],
        ]);

        $lines = [
            [1,'Jiyeon',     '이 스카프 얼마예요?',                     'I seukape eolmayeyo?',                            'এই স্কাৰ্ফটো কিমান?',                           'How much is this scarf?'],
            [2,'주인아저씨', '오만 원이에요.',                           'Oman wonievo.',                                    'পঞ্চাশ হাজাৰ ৱোন।',                             'It is fifty thousand won.'],
            [3,'Jiyeon',     '좀 비싸네요. 깎아 주실 수 있어요?',       'Jom bissaneyo. Kkakka jusil su isseoyo?',         'একটু দামী। কম কৰি দিব পাৰিবনে?',               'It is a bit expensive. Can you give a discount?'],
            [4,'주인아저씨', '이건 최고 품질이에요. 사만 오천 어때요?','Igeon choego pumjilineyo. Saman ocheon eottaeyo?', 'এইটো সৰ্বোচ্চ মানৰ। চল্লিশ পাঁচ হাজাৰ কেনেকুৱা?','This is top quality. How about 45,000?'],
            [5,'Jiyeon',     '사만 원에 드릴게요.',                      'Saman wone deurilgeyo.',                           'চল্লিশ হাজাৰত দিওক।',                           'I will give you 40,000 won.'],
            [6,'주인아저씨', '에이, 어려워요. 사만 이천에 해요.',       'Ei, eoryeowo. Saman icheon haeyo.',               'এইটো কঠিন। বিয়াল্লিশ হাজাৰত দিওঁ।',           'That is tough. Let\'s do 42,000.'],
            [7,'Jiyeon',     '좋아요! 카드 돼요?',                       'Joayo! Kadeu dwaeyo?',                             'ঠিক আছে! কাৰ্ড চলেনে?',                         'OK! Do you accept cards?'],
            [8,'주인아저씨', '현금만 받아요.',                           'Hyeongeummaan badayo.',                            'নগদ টকাহে লওঁ।',                               'Cash only.'],
            [9,'Jiyeon',     '알겠어요. 잠깐만요.',                      'Algesseoyo. Jamkkanmanyo.',                        'বুজিলো। একটু ৰওক।',                            'I understand. Just a moment.'],
            [10,'Jiyeon',    '여기 있어요. 감사합니다!',                 'Yeogi isseoyo. Gamsahamnida!',                    'এই লওক। ধন্যবাদ!',                              'Here you are. Thank you!'],
            [11,'주인아저씨','감사합니다! 또 오세요.',                   'Gamsahamnida! Tto oseyo.',                        'ধন্যবাদ! আকৌ আহিব।',                           'Thank you! Please come again.'],
        ];

        foreach ($lines as [$order, $speaker, $ko, $rom, $as, $en]) {
            $this->addLine($c, [
                'conversation_id' => $c->id,
                'speaker_label'   => $speaker,
                'korean'          => $ko,
                'romanization'    => $rom,
                'assamese'        => $as,
                'english'         => $en,
                'order_index'     => $order,
            ]);
        }
    }

    // ── 6. BIHU & CHUSEOK CULTURAL EXCHANGE ─────────────────────────────────
    private function bihuChuseokExchange(): void
    {
        $c = $this->makeConversation([
            'title_ko'    => '비후와 추석 — 문화 이야기',
            'title_en'    => 'Bihu and Chuseok — A Cultural Exchange',
            'title_as'    => 'বিহু আৰু চুছোক — সাংস্কৃতিক বিনিময়',
            'level'       => 'intermediate',
            'context_en'  => 'Suho asks Priya about Bihu and compares it with Chuseok. A rich Assam-Korea cultural discussion.',
            'context_as'  => 'চুহো প্ৰিয়াক বিহুৰ বিষয়ে সোধে আৰু চুছোকৰ সৈতে তুলনা কৰে। অসম-কোৰিয়াৰ সমৃদ্ধ সাংস্কৃতিক আলোচনা।',
            'speakers'    => [
                ['label' => 'Suho',  'gender' => 'male'],
                ['label' => 'Priya', 'gender' => 'female'],
            ],
            'tags'        => ['culture', 'festival', 'Bihu', 'Chuseok', 'intermediate'],
        ]);

        $lines = [
            [1,'Suho',  '비후가 뭐예요?',                             'Bihuga mwoyeyo?',                                 'বিহু কি?',                                      'What is Bihu?'],
            [2,'Priya', '비후는 아삼의 전통 축제예요. 봄, 여름, 겨울에 세 번 있어요.',
                        'Bihunun asamui jeontong chukjeyeyo. Bom, yeoreum, gyeoure se beon isseoyo.',
                        'বিহু অসমৰ পাৰম্পৰিক উৎসৱ। বসন্ত, গ্ৰীষ্ম, শীতত তিনিবাৰ হয়।',
                        'Bihu is the traditional festival of Assam. It happens three times in spring, summer, and winter.'],
            [3,'Suho',  '한국의 추석과 비슷한가요?',                   'Hanguguii chuseokkwa biseutangayo?',               'কোৰিয়াৰ চুছোকৰ দৰেই?',                        'Is it similar to Korea\'s Chuseok?'],
            [4,'Priya', '네, 조금 비슷해요. 두 축제 모두 수확을 축하해요.',
                        'Ne, jogeum biseutaeyo. Du chukje modu suhwageul chukahaeyo.',
                        'হয়, কিছু পৰিমাণে একে। দুয়োটা উৎসৱেই ফচল উদযাপন কৰে।',
                        'Yes, a bit similar. Both festivals celebrate the harvest.'],
            [5,'Suho',  '추석에는 가족이 모여서 송편을 먹어요.',      'Chuseoene gaoki moyeoseo songpyeoneul meogeoyo.','চুছোকত পৰিয়াল একগোট হৈ চংপিয়ন খায়।',        'At Chuseok, family gathers and eats songpyeon.'],
            [6,'Priya', '비후에도 가족이 모여요. 그리고 비후 나아치 (춤)이 있어요.',
                        'Biuhedo gaoki moyeoyo. Geurigo bihu naaci (chum)i isseoyo.',
                        'বিহুতো পৰিয়াল একত্ৰিত হয়। আৰু বিহু নাচ (নৃত্য) থাকে।',
                        'At Bihu, family also gathers. And there is Bihu Naach (dance).'],
            [7,'Suho',  '와, 멋있다! 언제 비후가 있어요?',            'Wa, meositda! Eonje bihuga isseoyo?',             'ৱাহ, সুন্দৰ! বিহু কেতিয়া হয়?',                'Wow, that sounds wonderful! When is Bihu?'],
            [8,'Priya', '제일 큰 비후는 봄에 4월에 있어요.',         'Jeil keun bihunun bome sawore isseoyo.',           'আটাইতকৈ ডাঙৰ বিহু বসন্তত এপ্ৰিলত হয়।',      'The biggest Bihu is in spring, in April.'],
            [9,'Suho',  '꼭 보고 싶어요. 초대해 줄 수 있어요?',      'Kkok bogo sipeoyo. Chodaehae jul su isseoyo?',   'অৱশ্যেই দেখিব খুজিছো। মোক নিমন্ত্ৰণ কৰিব পাৰিবনে?','I really want to see it. Can you invite me?'],
            [10,'Priya','물론이에요! 환영해요, 수호 씨.',             'Mullonieyo! Hwanyeonghaeyo, suho ssi.',           'অৱশ্যেই! স্বাগতম, চুহো।',                      'Of course! You are welcome, Suho.'],
        ];

        foreach ($lines as [$order, $speaker, $ko, $rom, $as, $en]) {
            $this->addLine($c, [
                'conversation_id' => $c->id,
                'speaker_label'   => $speaker,
                'korean'          => $ko,
                'romanization'    => $rom,
                'assamese'        => $as,
                'english'         => $en,
                'order_index'     => $order,
            ]);
        }
    }

    // ── 7. UNIVERSITY ORIENTATION ────────────────────────────────────────────
    private function universityOrientation(): void
    {
        $c = $this->makeConversation([
            'title_ko'    => '대학교 오리엔테이션',
            'title_en'    => 'University Orientation',
            'title_as'    => 'বিশ্ববিদ্যালয়ৰ নতুন শিক্ষাৰ্থী পৰিচয়',
            'level'       => 'beginner',
            'context_en'  => 'Suho, a new Korean exchange student, meets Mina at orientation and introduces himself.',
            'context_as'  => 'নতুন কোৰিয়ান বিনিময় ছাত্ৰ চুহো পৰিচয় অনুষ্ঠানত মিনাক লগ পায় আৰু নিজকে পৰিচয় দিয়ে।',
            'speakers'    => [
                ['label' => 'Suho',  'gender' => 'male'],
                ['label' => 'Mina',  'gender' => 'female'],
            ],
            'tags'        => ['introduction', 'university', 'beginner'],
        ]);

        $lines = [
            [1,'Mina',  '안녕하세요! 새로 오셨어요?',                 'Annyeonghaseyo! Saero osyeosseoyo?',              'নমস্কাৰ! নতুন আহিছানে?',                        'Hello! Are you new here?'],
            [2,'Suho',  '네, 안녕하세요. 저는 수호예요. 한국에서 왔어요.',
                        'Ne, annyeonghaseyo. Jeoneun suhoyeyo. Hangugeso wasseoyo.',
                        'হয়, নমস্কাৰ। মোৰ নাম চুহো। কোৰিয়াৰ পৰা আহিছো।',
                        'Yes, hello. I am Suho. I came from Korea.'],
            [3,'Mina',  '오! 반가워요. 저는 미나예요. 아쌈에서 왔어요.',
                        'O! Bangaweo. Jeoneun minayeyo. Assameseo wasseoyo.',
                        'আহ! ভালেই হল। মোৰ নাম মিনা। অসমৰ পৰা।',
                        'Oh! Nice to meet you. I am Mina. I am from Assam.'],
            [4,'Suho',  '아쌈이요? 인도 동북부에 있는 곳이죠?',      'Assamiyo? Indo dongbugue innneun gositjyo?',      'অসম? ভাৰতৰ উত্তৰ-পূবত থকা ঠাই?',              'Assam? Isn\'t that in northeast India?'],
            [5,'Mina',  '맞아요! 한국에 대해 많이 알고 있네요.',      'Majayo! Hanguge daehae mani algo itneyo.',        'শুদ্ধ! কোৰিয়াৰ বিষয়ে বহুত জানে।',             'Correct! You know a lot about Korea.'],
            [6,'Suho',  '전공이 뭐예요?',                             'Jeongongi mwoyeyo?',                              'বিষয় কি?',                                      'What is your major?'],
            [7,'Mina',  '한국어와 한국 문화요. 수호 씨는요?',        'Hangugeowa hanguk munhwayo. Suho ssineunyo?',    'কোৰিয়ান ভাষা আৰু সংস্কৃতি। চুহোৰ?',           'Korean language and culture. And you, Suho?'],
            [8,'Suho',  '저는 컴퓨터 공학이에요.',                    'Jeoneun keompyuteo gonghagieyo.',                 'মোৰ কম্পিউটাৰ বিজ্ঞান।',                        'I am studying computer science.'],
            [9,'Mina',  '멋있다! 나중에 같이 밥 먹을까요?',          'Meositda! Najunge gachi bab meogeulkkayo?',      'সুন্দৰ! পিছত একেলগে ভাত খাবনে?',               'Cool! Shall we eat together later?'],
            [10,'Suho', '좋아요! 기대할게요.',                        'Joayo! Gidaehalgeyo.',                            'ভালে! অপেক্ষাত থাকিম।',                         'Sounds great! I will look forward to it.'],
        ];

        foreach ($lines as [$order, $speaker, $ko, $rom, $as, $en]) {
            $this->addLine($c, [
                'conversation_id' => $c->id,
                'speaker_label'   => $speaker,
                'korean'          => $ko,
                'romanization'    => $rom,
                'assamese'        => $as,
                'english'         => $en,
                'order_index'     => $order,
            ]);
        }
    }

    // ── 8. TELEPHONE CONVERSATION ────────────────────────────────────────────
    private function telephoneCall(): void
    {
        $c = $this->makeConversation([
            'title_ko'    => '전화 통화',
            'title_en'    => 'Making a Phone Call',
            'title_as'    => 'টেলিফোন কথোপকথন',
            'level'       => 'intermediate',
            'context_en'  => 'Rohan calls the Korean Cultural Centre to ask about Korean language class times.',
            'context_as'  => 'ৰোহান কোৰিয়ান সাংস্কৃতিক কেন্দ্ৰলৈ ফোন কৰি কোৰিয়ান ভাষাৰ ক্লাছৰ সময় জানিবলৈ চেষ্টা কৰে।',
            'speakers'    => [
                ['label' => 'Rohan',  'gender' => 'male'],
                ['label' => '직원',   'gender' => 'female'],
            ],
            'tags'        => ['telephone', 'formal', 'class', 'intermediate'],
        ]);

        $lines = [
            [1,'직원',  '여보세요, 한국문화원입니다.',                 'Yeoboseyo, hangukmunhwawonimnida.',               'হেলো, কোৰিয়ান সাংস্কৃতিক কেন্দ্ৰ।',           'Hello, this is the Korean Cultural Centre.'],
            [2,'Rohan', '안녕하세요. 한국어 수업에 대해 문의하고 싶어요.',
                        'Annyeonghaseyo. Hangugeosup-e daehae munuihago sipeoyo.',
                        'নমস্কাৰ। কোৰিয়ান ভাষাৰ ক্লাছৰ বিষয়ে জানিব বিছাৰিছো।',
                        'Hello. I would like to enquire about Korean language classes.'],
            [3,'직원',  '네, 말씀하세요. 초급, 중급, 고급 중 어떤 걸 찾으세요?',
                        'Ne, malssumhaseyo. Chogeup, junggeup, gogeup jung eotteon geol chajeuseyo?',
                        'হয়, কওক। প্ৰাৰম্ভিক, মধ্যৱৰ্তী নে উচ্চ স্তৰ?',
                        'Yes, please go ahead. Are you looking for beginner, intermediate, or advanced?'],
            [4,'Rohan', '초급을 찾고 있어요.',                        'Chogeub-eul chatgo isseoyo.',                     'প্ৰাৰম্ভিক স্তৰ বিচাৰিছো।',                    'I am looking for beginner level.'],
            [5,'직원',  '초급 수업은 화요일과 목요일 오후 6시예요.',  'Chogeup sueobeun hwayoilgwa mogyoil ohu yeossieyeoyo.',
                        'প্ৰাৰম্ভিক ক্লাছ মঙলবাৰ আৰু বৃহস্পতিবাৰে আবেলি ৬টাত।',
                        'Beginner class is on Tuesdays and Thursdays at 6 pm.'],
            [6,'Rohan', '수업료가 얼마예요?',                         'Sueomnyoga eolmayeyo?',                           'ক্লাছৰ মাচুল কিমান?',                           'How much is the tuition fee?'],
            [7,'직원',  '한 달에 오만 원이에요.',                     'Han dare oman wonieyeoyo.',                        'মাহে পঞ্চাশ হাজাৰ ৱোন।',                        'It is 50,000 won per month.'],
            [8,'Rohan', '등록하려면 어떻게 해요?',                    'Deungnokharyeomyeon eotteokhae?',                 'নাম নিবন্ধন কৰিবলৈ কি কৰিব লাগে?',             'How do I register?'],
            [9,'직원',  '홈페이지에서 온라인으로 등록하시면 돼요.',  'Hompeijieseo onlainuro deungnokhashimyeon dwaeyo.','আমাৰ ৱেবচাইটত অনলাইনত নিবন্ধন কৰিব পাৰে।',   'You can register online on our website.'],
            [10,'Rohan','감사합니다. 빨리 등록할게요.',               'Gamsahamnida. Ppalli deungnokhalgeyo.',            'ধন্যবাদ। সোনকালে নিবন্ধন কৰিম।',              'Thank you. I will register soon.'],
            [11,'직원', '네, 기다리겠습니다. 좋은 하루 되세요.',     'Ne, gidarigessseumnida. Joeun haru doeseyo.',     'হয়, অপেক্ষাত থাকিম। শুভ দিন!',               'Yes, we look forward to it. Have a great day.'],
        ];

        foreach ($lines as [$order, $speaker, $ko, $rom, $as, $en]) {
            $this->addLine($c, [
                'conversation_id' => $c->id,
                'speaker_label'   => $speaker,
                'korean'          => $ko,
                'romanization'    => $rom,
                'assamese'        => $as,
                'english'         => $en,
                'order_index'     => $order,
            ]);
        }
    }
}
