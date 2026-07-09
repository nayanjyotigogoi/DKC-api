<?php

namespace Database\Seeders\Learning;

use Illuminate\Database\Seeder;
use App\Models\Learning\CulturalNote;

/**
 * Seeds 8 cultural notes comparing Assam and Korea across food, festivals,
 * customs, geography, student life, K-pop, and street food.
 */
class CulturalNoteSeeder extends Seeder
{
    public function run(): void
    {
        $notes = [

            [
                'title_en'   => 'Tea Culture — Assam and Korea',
                'title_as'   => 'চাহ সংস্কৃতি — অসম আৰু কোৰিয়া',
                'body_en'    => "Assam is the world's largest tea-growing region, producing the bold, malty Assam black tea famous worldwide. Tea is woven into every aspect of Assamese daily life — from morning meals to welcoming guests.\n\nIn Korea, tea culture centres on green tea (녹차), barley tea (보리차), and a wide variety of herbal teas. Koreans typically drink barley tea cold throughout the day instead of water. Traditional Korean tea ceremonies emphasise mindfulness and seasonal ingredients.\n\nBoth cultures treat tea as a social bond: in Assam you offer tea (চাহ খাবানে?) to every visitor; in Korea restaurants serve barley tea complimentary with every meal. The shared ritual of tea-sharing reflects a deep hospitality that transcends geography.",
                'body_as'    => "অসম বিশ্বৰ সৰ্ববৃহৎ চাহ উৎপাদনকাৰী অঞ্চল। শক্তিশালী, মালটি অসম কলা চাহ বিশ্বজুৰি বিখ্যাত। অসমীয়া দৈনন্দিন জীৱনৰ প্ৰতিটো দিশত চাহ আছে — পুৱাৰ আহাৰৰ পৰা আৰম্ভ কৰি অতিথিক আদৰ কৰালৈকে।\n\nকোৰিয়াত চাহ সংস্কৃতিৰ কেন্দ্ৰত আছে সেউজীয়া চাহ (녹차), যৱ চাহ (보리차), আৰু বিভিন্ন ভেষজ চাহ। কোৰিয়ানসকলে সাধাৰণতে সাৰাদিন পানীৰ সলনি ঠাণ্ডা যৱ চাহ পান কৰে।\n\nদুয়ো সংস্কৃতিয়ে চাহক সামাজিক বন্ধন হিচাপে গণ্য কৰে: অসমত প্ৰতিজন অতিথিক চাহ আগবঢ়োৱা হয়; কোৰিয়াত ভোজনালয়ত প্ৰতিটো আহাৰৰ সৈতে বিনামূলীয়াকৈ যৱ চাহ পৰিবেশন কৰা হয়।",
                'level'      => 'beginner',
                'category'   => 'food-culture',
                'tags'       => ['tea', 'food', 'daily-life', 'Assam', 'Korea'],
            ],

            [
                'title_en'   => 'Bihu and Chuseok — Harvest Festivals',
                'title_as'   => 'বিহু আৰু চুছোক — ফচল উৎসৱ',
                'body_en'    => "Bihu (বিহু) is the most important festival of Assam, celebrated three times a year: Rongali Bihu (spring/April — new year), Kongali Bihu (October — austere harvest prayer), and Bhogali Bihu (January — feast harvest).\n\nChuseok (추석) is Korea's mid-autumn harvest festival, held on the 15th day of the 8th lunar month (usually September). Families travel home, bow before ancestors, eat songpyeon (half-moon rice cakes), and give thanks for the harvest.\n\nShared themes: both celebrate agricultural cycles, bring families together, feature traditional dances and music (Bihu dance / ganggangsullae), and include special foods prepared communally. The underlying emotion — gratitude for the earth's abundance — is universal.",
                'body_as'    => "বিহু অসমৰ আটাইতকৈ গুৰুত্বপূৰ্ণ উৎসৱ, বছৰত তিনিবাৰ পালন কৰা হয়: ৰঙালী বিহু (বসন্ত/এপ্ৰিল — নৱবৰ্ষ), কঙালী বিহু (অক্টোবৰ — ফচলৰ প্ৰাৰ্থনা), আৰু ভোগালী বিহু (জানুৱাৰী — ফচলৰ ভোজ)।\n\nচুছোক কোৰিয়াৰ মধ্য শৰৎকালৰ ফচল উৎসৱ, অষ্টম চন্দ্ৰমাহৰ ১৫তম দিনত পালন কৰা হয়। পৰিয়ালবোৰ একগোট হয়, পূৰ্বপুৰুষক প্ৰণাম কৰে, চংপিয়ন (অৰ্ধচন্দ্ৰাকৃতি ভাতৰ কেক) খায়, আৰু ফচলৰ বাবে কৃতজ্ঞতা প্ৰকাশ কৰে।\n\nউভয় উৎসৱে কৃষি চক্ৰ উদযাপন কৰে, পৰিয়ালক একত্ৰিত কৰে, পাৰম্পৰিক নৃত্য আৰু সংগীত প্ৰদৰ্শন কৰে, আৰু সামূহিকভাৱে বিশেষ খাদ্য প্ৰস্তুত কৰে।",
                'level'      => 'beginner',
                'category'   => 'festivals',
                'tags'       => ['Bihu', 'Chuseok', 'harvest', 'festival', 'family'],
            ],

            [
                'title_en'   => 'Greeting Customs — Bowing and Folding Hands',
                'title_as'   => 'অভিনন্দন প্ৰথা — প্ৰণাম আৰু হাত জোৰ',
                'body_en'    => "In Korea, bowing (인사, insa) is the fundamental greeting. The depth of the bow reflects the degree of respect: a 15° bow for peers, 30° for seniors, and a full 45° bow for deep apology or gratitude. Koreans also say 안녕하세요 (annyeonghaseyo) while bowing.\n\nIn Assam (and broader India), the traditional greeting is 'Namaste' or 'Nomoskar' (নমস্কাৰ), performed by pressing both palms together and bowing slightly — particularly toward elders. Among youth a handshake is common.\n\nKey similarity: both cultures express respect through physical posture rather than just words. Age hierarchy is central to both — in Korea you must always speak in a more formal register to anyone older, just as Assamese youth address elders with respectful suffixes (দেউতা, মা, দা, বাই).",
                'body_as'    => "কোৰিয়াত প্ৰণাম (인사, ইনচা) মূল অভিনন্দন প্ৰথা। প্ৰণামৰ গভীৰতা সন্মানৰ মাত্ৰা প্ৰতিফলিত কৰে: সমনীয়াৰ বাবে ১৫°, বয়োজ্যেষ্ঠৰ বাবে ৩০°, গভীৰ ক্ষমা বা কৃতজ্ঞতাৰ বাবে ৪৫°।\n\nঅসম (আৰু ব্যাপক ভাৰত)ত পাৰম্পৰিক অভিনন্দন হয় 'নমস্তে' বা 'নমস্কাৰ' (নমস্কাৰ), দুই হাত একত্ৰিত কৰি সামান্য মূৰ নমাই — বিশেষকৈ বয়োজ্যেষ্ঠৰ প্ৰতি।\n\nমূল মিল: উভয় সংস্কৃতিয়ে কেৱল শব্দৰ সলনি শাৰীৰিক ভঙ্গিমাৰে সন্মান প্ৰকাশ কৰে। বয়স-শ্ৰেণীবিভাজন উভয়ৰ কেন্দ্ৰীয় — কোৰিয়াত বয়সত ডাঙৰ যিকোনো মানুহৰ সৈতে সদায় আনুষ্ঠানিক ভাষা ব্যৱহাৰ কৰিব লাগে।",
                'level'      => 'beginner',
                'category'   => 'customs',
                'tags'       => ['greeting', 'respect', 'customs', 'body-language'],
            ],

            [
                'title_en'   => 'Rice — The Heart of Both Cuisines',
                'title_as'   => 'ভাত — উভয় ৰান্ধনীৰ হৃদয়',
                'body_en'    => "Rice (밥, bap in Korean; ভাত, bhat in Assamese) is the foundation of both cuisines. In Korean meals, steamed short-grain rice is served in individual bowls alongside multiple small side dishes called 반찬 (banchan). Eating the last grain of rice is polite in Korea.\n\nAssamese cuisine also centres on rice — typically long-grain or sticky rice varieties. Traditional Assamese meals include pitika (mashed vegetables), khar (alkaline curry), tenga (sour fish curry), and various leafy greens alongside rice.\n\nInteresting parallel: both cultures have a rice-based fermented drink — Korean makgeolli (막걸리, milky rice wine) and Assamese rice beer called laopani (লাওপানী) or apong. Both are made by fermenting cooked rice and are central to traditional celebrations.",
                'body_as'    => "ভাত (বাপ, কোৰিয়ানত; ভাত, অসমীয়াত) উভয় ৰান্ধনীৰ ভিত্তি। কোৰিয়ান আহাৰত ভাপত পকোৱা চুটি-দানাৰ ভাত বাচনত পৰিবেশন কৰা হয় 반찬 (বানচান) নামৰ সৰু সৰু পাৰ্শ্বব্যঞ্জনৰ সৈতে।\n\nঅসমীয়া ৰান্ধনীও ভাতকেন্দ্ৰিক — সাধাৰণতে দীৰ্ঘ-দানা বা আঠাযুক্ত ভাত। পৰম্পৰাগত অসমীয়া আহাৰত পিটিকা, খাৰ, টেঙা, আৰু বিভিন্ন পাচলি থাকে।\n\nআকৰ্ষণীয় মিল: উভয় সংস্কৃতিতে ভাতৰ পৰা তৈয়াৰ গাঁজন পানীয় আছে — কোৰিয়ান মাক্গোলি (막걸리, গাখীৰীয়া চাউলৰ মদ) আৰু অসমীয়া চাউলৰ মদ লাওপানী বা আপং।",
                'level'      => 'beginner',
                'category'   => 'food-culture',
                'tags'       => ['rice', 'food', 'cuisine', 'banchan'],
            ],

            [
                'title_en'   => 'Rivers — Brahmaputra and Han',
                'title_as'   => 'নদী — ব্ৰহ্মপুত্ৰ আৰু হান',
                'body_en'    => "The Brahmaputra (ব্ৰহ্মপুত্ৰ, called Luit locally) flows through Assam as one of Asia's mightiest rivers. It is sacred in Assamese culture, considered a male river god — unusual among the world's great rivers. The annual Brahmaputra flooding both gives life (fertile silt) and takes it (devastating floods).\n\nThe Han River (한강, Hangang) flows through Seoul and is the heart of modern Korean urban life. Han River parks (한강공원) are beloved gathering spaces where Koreans picnic, cycle, and watch fireworks. The river is inseparable from Seoul's identity.\n\nBoth rivers shape the identity, culture, and livelihood of their people — not just as waterways but as spiritual and cultural symbols. The Bihu song 'Bistirno Parore' references the vast banks of the Luit just as Korean poems and songs constantly invoke the Han.",
                'body_as'    => "ব্ৰহ্মপুত্ৰ (স্থানীয়ভাৱে লুইত বুলি কোৱা) এছিয়াৰ শক্তিশালী নদীসমূহৰ মাজৰ এটি। অসমীয়া সংস্কৃতিত ই পবিত্ৰ — পুং নদী দেৱতা হিচাপে গণ্য।\n\nহান নদী (한강, হাংগাং) ছিউলৰ মাজেদি বৈ যায় আৰু আধুনিক কোৰিয়ান নগৰীয়া জীৱনৰ হৃদয়। হান নদী উদ্যান (한강공원) প্ৰিয় সমাবেশ স্থান।\n\nউভয় নদীয়ে তেওঁলোকৰ মানুহৰ পৰিচয়, সংস্কৃতি আৰু জীৱিকা গঢ়ে — কেৱল জলপথ হিচাপে নহয়, আধ্যাত্মিক আৰু সাংস্কৃতিক প্ৰতীক হিচাপেও।",
                'level'      => 'intermediate',
                'category'   => 'geography',
                'tags'       => ['river', 'geography', 'Brahmaputra', 'Han', 'culture'],
            ],

            [
                'title_en'   => 'University Culture — Studying in Assam and Korea',
                'title_as'   => 'বিশ্ববিদ্যালয় সংস্কৃতি — অসম আৰু কোৰিয়াত পঢ়া',
                'body_en'    => "Korean universities are highly competitive — entry into SKY universities (Seoul National, Korea, Yonsei) determines much of a student's career trajectory. Korean students typically study until midnight in study cafes (스터디카페) and cram schools (학원, hagwon). Group study and senior-junior (선후배, seonhubae) mentorship are central to campus life.\n\nDibrugarh University, founded in 1965, is Assam's premier university and a hub for northeast India's academic community. Assamese campus life blends rigorous academics with rich cultural activities — Bihu performances, Satra drama, and literature festivals.\n\nKey difference: Korea's academic pressure (입시지옥 — exam hell) is intense from high school. Assam values a more holistic education with strong emphasis on community and cultural identity. Exchange students from both regions often find the other's approach refreshing.",
                'body_as'    => "কোৰিয়ান বিশ্ববিদ্যালয়সমূহ অত্যন্ত প্ৰতিযোগিতামূলক — SKY বিশ্ববিদ্যালয়ত প্ৰৱেশ এজন ছাত্ৰৰ কেৰিয়াৰ নিৰ্ধাৰণ কৰে। কোৰিয়ান ছাত্ৰসকলে সাধাৰণতে মধ্যৰাতিলৈকে অধ্যয়ন কেফে আৰু হাগৱনত পঢ়ে।\n\n১৯৬৫ চনত প্ৰতিষ্ঠিত ডিব্ৰুগড় বিশ্ববিদ্যালয় অসমৰ প্ৰধান বিশ্ববিদ্যালয় আৰু উত্তৰ-পূব ভাৰতৰ শিক্ষাজগতৰ কেন্দ্ৰ।\n\nমূল পাৰ্থক্য: কোৰিয়াৰ একাডেমিক চাপ উচ্চবিদ্যালয়ৰ পৰাই তীব্ৰ। অসম সামগ্ৰিক শিক্ষাত গুৰুত্ব দিয়ে আৰু সম্প্ৰদায় আৰু সাংস্কৃতিক পৰিচয়ত অধিক গুৰুত্ব দিয়ে।",
                'level'      => 'intermediate',
                'category'   => 'education',
                'tags'       => ['university', 'education', 'student-life', 'campus'],
            ],

            [
                'title_en'   => 'K-pop and K-drama in Assam',
                'title_as'   => 'অসমত কে-পপ আৰু কোৰিয়ান নাটক',
                'body_en'    => "The Korean Wave (한류, Hallyu) has reached the far northeast of India. In Assam, K-pop fandom communities have formed in Guwahati, Dibrugarh, and even rural areas. Young Assamese fans learn Korean through drama subtitles, song lyrics, and social media — making the language accessible long before formal classes.\n\nK-drama (한국 드라마) themes of family loyalty, education pressure, workplace hierarchy, and romance resonate with Assamese viewers who find cultural parallels with their own society. Shows like 'Reply 1988' and 'Hospital Playlist' have large fan bases in Assam.\n\nThis cultural bridge has practical value: Assamese students who start learning Korean through Hallyu often achieve conversational fluency faster because their motivation is intrinsic and emotionally connected. Learning vocabulary from drama context is a recognized linguistic advantage.",
                'body_as'    => "কোৰিয়ান ঢৌ (한류, হাল্লু) ভাৰতৰ উত্তৰ-পূব প্ৰান্তলৈও পাইছে। অসমত গুৱাহাটী, ডিব্ৰুগড়, আৰু গ্ৰামাঞ্চলতো কে-পপ ফেনডম সম্প্ৰদায় গঠিত হৈছে। তৰুণ অসমীয়া ভক্তসকলে নাটকৰ উপশিৰোনাম, গানৰ কথা, আৰু সামাজিক মাধ্যমৰ জৰিয়তে কোৰিয়ান শিকিছে।\n\nকোৰিয়ান নাটকৰ পৰিয়ালৰ আনুগত্য, শিক্ষাৰ চাপ, কৰ্মক্ষেত্ৰৰ শ্ৰেণীবিভাজন, আৰু প্ৰেমৰ বিষয়বস্তু অসমীয়া দৰ্শকৰ সৈতে অনুৰণিত হয়।\n\nএই সাংস্কৃতিক সেতুৰ ব্যৱহাৰিক মূল্য আছে: হাল্লুৰ মাধ্যমেৰে কোৰিয়ান শিকা আৰম্ভ কৰা অসমীয়া ছাত্ৰসকলে প্ৰায়ে দ্ৰুত কথোপকথন দক্ষতা অৰ্জন কৰে কাৰণ তেওঁলোকৰ প্ৰেৰণা আন্তৰিক।",
                'level'      => 'beginner',
                'category'   => 'pop-culture',
                'tags'       => ['K-pop', 'K-drama', 'Hallyu', 'media', 'language-learning'],
            ],

            [
                'title_en'   => 'Street Food — Tteokbokki and Jolpan',
                'title_as'   => 'ৰাজপথৰ খাদ্য — ডোইকবোকি আৰু জলপান',
                'body_en'    => "Korean street food culture is world-famous: tteokbokki (떡볶이, spicy rice cakes), hotteok (호떡, sweet pancakes), and gimbap (김밥, seaweed rice rolls) are sold from pojangmacha (포장마차, street stalls) that glow orange under tent lights late at night.\n\nAssamese street food — jolpan (জলপান) — is equally beloved: pitha (rice cakes in many forms), chira (beaten rice), muri (puffed rice), and handoh (roasted rice powder) form the backbone of Assamese snacking culture. Street vendors at weekly haat markets are social hubs.\n\nParallel: both cultures have a deep rice-cake tradition (tteok / pitha) for festivals and daily snacking. The communal experience of eating street food — standing around a stall, sharing with strangers — is a social ritual in both Dibrugarh's Paltan Bazar and Seoul's Myeongdong district.",
                'body_as'    => "কোৰিয়ান ৰাজপথৰ খাদ্য সংস্কৃতি বিশ্বপ্ৰখ্যাত: ডোইকবোকি (떡볶이, জলা ভাতৰ কেক), হোডোক (호떡, মিঠা পেনকেক), আৰু গিম্বাপ (김밥, শেউলা-ভাতৰ ৰোল) পোজাংমাচা (포장마차, ৰাস্তাৰ দোকান)ত বিক্ৰি হয়।\n\nঅসমীয়া ৰাজপথৰ খাদ্য — জলপান — সমানে প্ৰিয়: পিঠা (বিভিন্ন ৰূপত ভাতৰ কেক), চিৰা, মুড়ি, আৰু হাঁহচৰণ অসমীয়া জলপান সংস্কৃতিৰ মূল ভিত্তি।\n\nমিল: উভয় সংস্কৃতিতে উৎসৱ আৰু দৈনন্দিন জলপানৰ বাবে গভীৰ ভাতৰ-কেক পৰম্পৰা (ডোইক / পিঠা) আছে।",
                'level'      => 'beginner',
                'category'   => 'food-culture',
                'tags'       => ['street-food', 'tteokbokki', 'pitha', 'snacks', 'market'],
            ],

        ];

        foreach ($notes as $n) {
            CulturalNote::firstOrCreate(['title_en' => $n['title_en']], $n);
        }
    }
}
