<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\GalleryPhoto;
use App\Models\MagazineIssue;
use App\Models\MagazineArticle;
use App\Models\Goodie;
use App\Models\Member;
use App\Models\KoreanPhrase;
use App\Models\FunFact;
use App\Models\MediaPick;
use App\Models\SiteSetting;

class DkcSeeder extends Seeder
{
    public function run(): void
    {
        // -------------------------
        // Events
        // -------------------------
        $events = [
            [
                'slug' => 'hangul-day-celebration-2024',
                'title' => 'Hangul Day Celebration',
                'korean_title' => '한글날 기념행사',
                'date' => 'October 9, 2024',
                'date_iso' => '2024-10-09 18:00:00',
                'time' => '6:00 PM',
                'location' => 'Dibrugarh University Auditorium',
                'category' => 'Cultural',
                'status' => 'completed',
                'description' => 'Celebrate the beauty of the Korean alphabet with performances, calligraphy workshops, and cultural exhibitions.',
                'long_description' => 'Join us for a grand celebration of Hangul, the Korean writing system invented by King Sejong the Great in 1443. This event features live performances, calligraphy workshops, and an exhibition on the history of Hangul.',
                'highlights' => json_encode(['Hangul calligraphy workshop', 'Cultural performances', 'Traditional Korean snacks', 'Photo exhibition']),
                'image' => null,
                'color' => '#4F46E5',
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'korean-film-night-2024',
                'title' => 'Korean Film Night',
                'korean_title' => '한국 영화의 밤',
                'date' => 'November 15, 2024',
                'date_iso' => '2024-11-15 19:00:00',
                'time' => '7:00 PM',
                'location' => 'Central Library, Dibrugarh University',
                'category' => 'Film',
                'status' => 'completed',
                'description' => 'An evening of award-winning Korean cinema showcasing the best of Korean storytelling and filmmaking.',
                'long_description' => 'Experience the magic of Korean cinema with a special screening of acclaimed films. Includes a post-screening discussion on Korean culture and storytelling.',
                'highlights' => json_encode(['Film screening', 'Post-screening discussion', 'Korean snacks', 'Director Q&A']),
                'image' => null,
                'color' => '#7C3AED',
                'is_featured' => false,
                'sort_order' => 2,
            ],
            [
                'slug' => 'chuseok-harvest-festival-2024',
                'title' => 'Chuseok Harvest Festival',
                'korean_title' => '추석 추수 축제',
                'date' => 'September 17, 2024',
                'date_iso' => '2024-09-17 17:00:00',
                'time' => '5:00 PM',
                'location' => 'DU Campus Ground',
                'category' => 'Festival',
                'status' => 'completed',
                'description' => 'Experience the joy of Chuseok, Korea\'s most beloved harvest festival, with traditional games, food, and folk dances.',
                'long_description' => 'Chuseok is one of the most important traditional Korean holidays. Join us for a cultural immersion with traditional games like yutnori, enjoy homemade songpyeon rice cakes, and watch beautiful traditional folk dances.',
                'highlights' => json_encode(['Traditional games (Yutnori, Neolttwigi)', 'Songpyeon making', 'Hanbok wearing experience', 'Folk dance performance']),
                'image' => null,
                'color' => '#D97706',
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'k-culture-quiz-night-2025',
                'title' => 'K-Culture Quiz Night',
                'korean_title' => 'K-문화 퀴즈 나이트',
                'date' => 'February 14, 2025',
                'date_iso' => '2025-02-14 18:30:00',
                'time' => '6:30 PM',
                'location' => 'Student Union Hall',
                'category' => 'Quiz',
                'status' => 'completed',
                'description' => 'Test your knowledge of Korean culture, K-pop, K-drama, history, and language in this fun-filled quiz night.',
                'long_description' => 'A competitive yet fun quiz night covering all aspects of Korean culture. Teams of 4 compete across rounds on K-pop, K-dramas, Korean history, food, and language.',
                'highlights' => json_encode(['Team quiz competition', 'K-pop round', 'K-drama round', 'Prizes for winners']),
                'image' => null,
                'color' => '#EC4899',
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'slug' => 'korean-language-bootcamp-2025',
                'title' => 'Korean Language Bootcamp',
                'korean_title' => '한국어 부트캠프',
                'date' => 'March 22, 2025',
                'date_iso' => '2025-03-22 10:00:00',
                'time' => '10:00 AM',
                'location' => 'Language Lab, Dibrugarh University',
                'category' => 'Workshop',
                'status' => 'upcoming',
                'description' => 'An intensive one-day Korean language learning bootcamp for beginners, covering Hangul, basic phrases, and pronunciation.',
                'long_description' => 'Join our expert language instructors for an immersive day of Korean language learning. Perfect for beginners who want to learn Hangul, basic conversational phrases, and the nuances of Korean pronunciation.',
                'highlights' => json_encode(['Hangul mastery session', 'Conversational practice', 'Pronunciation workshop', 'Certificate of participation']),
                'image' => null,
                'color' => '#059669',
                'is_featured' => true,
                'sort_order' => 5,
            ],
            [
                'slug' => 'seollal-new-year-2025',
                'title' => '설날 New Year Celebration',
                'korean_title' => '설날 새해 기념행사',
                'date' => 'January 29, 2025',
                'date_iso' => '2025-01-29 17:00:00',
                'time' => '5:00 PM',
                'location' => 'Community Hall, Dibrugarh',
                'category' => 'Festival',
                'status' => 'completed',
                'description' => 'Ring in the Korean Lunar New Year with traditional rituals, ancestral rites, and a feast of traditional New Year foods.',
                'long_description' => 'Seollal (설날) marks the first day of the Korean lunar calendar. Celebrate with traditional sebae (bowing ceremony), enjoy tteokguk (rice cake soup) for good luck, and participate in traditional games.',
                'highlights' => json_encode(['Sebae ceremony', 'Tteokguk preparation', 'Traditional games', 'Hanbok photo session']),
                'image' => null,
                'color' => '#DC2626',
                'is_featured' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }

        // -------------------------
        // Gallery Photos
        // -------------------------
        // category ENUM: events, members, culture, campus
        $photos = [
            ['caption' => 'Hangul Day calligraphy session', 'category' => 'culture', 'event_name' => 'Hangul Day 2024', 'year' => 2024, 'aspect' => 'landscape', 'image_path' => null, 'color' => '#4F46E5', 'icon' => null, 'sort_order' => 1, 'is_visible' => true],
            ['caption' => 'Chuseok traditional games', 'category' => 'events', 'event_name' => 'Chuseok 2024', 'year' => 2024, 'aspect' => 'portrait', 'image_path' => null, 'color' => '#D97706', 'icon' => null, 'sort_order' => 2, 'is_visible' => true],
            ['caption' => 'Korean Film Night screening', 'category' => 'events', 'event_name' => 'Film Night 2024', 'year' => 2024, 'aspect' => 'landscape', 'image_path' => null, 'color' => '#7C3AED', 'icon' => null, 'sort_order' => 3, 'is_visible' => true],
            ['caption' => 'K-Quiz winners photo', 'category' => 'members', 'event_name' => 'Quiz Night 2025', 'year' => 2025, 'aspect' => 'landscape', 'image_path' => null, 'color' => '#EC4899', 'icon' => null, 'sort_order' => 4, 'is_visible' => true],
            ['caption' => 'Seollal sebae ceremony', 'category' => 'culture', 'event_name' => 'Seollal 2025', 'year' => 2025, 'aspect' => 'portrait', 'image_path' => null, 'color' => '#DC2626', 'icon' => null, 'sort_order' => 5, 'is_visible' => true],
            ['caption' => 'Language bootcamp participants', 'category' => 'campus', 'event_name' => 'Language Bootcamp 2025', 'year' => 2025, 'aspect' => 'landscape', 'image_path' => null, 'color' => '#059669', 'icon' => null, 'sort_order' => 6, 'is_visible' => true],
            ['caption' => 'Hanbok photoshoot', 'category' => 'culture', 'event_name' => 'Chuseok 2024', 'year' => 2024, 'aspect' => 'portrait', 'image_path' => null, 'color' => '#D97706', 'icon' => null, 'sort_order' => 7, 'is_visible' => true],
            ['caption' => 'Songpyeon making workshop', 'category' => 'events', 'event_name' => 'Chuseok 2024', 'year' => 2024, 'aspect' => 'square', 'image_path' => null, 'color' => '#D97706', 'icon' => null, 'sort_order' => 8, 'is_visible' => true],
            ['caption' => 'Tteokguk preparation', 'category' => 'culture', 'event_name' => 'Seollal 2025', 'year' => 2025, 'aspect' => 'square', 'image_path' => null, 'color' => '#DC2626', 'icon' => null, 'sort_order' => 9, 'is_visible' => true],
            ['caption' => 'Club members group photo', 'category' => 'members', 'event_name' => 'General', 'year' => 2024, 'aspect' => 'landscape', 'image_path' => null, 'color' => '#4F46E5', 'icon' => null, 'sort_order' => 10, 'is_visible' => true],
            ['caption' => 'Hangul Day exhibition', 'category' => 'culture', 'event_name' => 'Hangul Day 2024', 'year' => 2024, 'aspect' => 'landscape', 'image_path' => null, 'color' => '#4F46E5', 'icon' => null, 'sort_order' => 11, 'is_visible' => true],
            ['caption' => 'K-pop dance performance', 'category' => 'events', 'event_name' => 'Cultural Night 2024', 'year' => 2024, 'aspect' => 'portrait', 'image_path' => null, 'color' => '#EC4899', 'icon' => null, 'sort_order' => 12, 'is_visible' => true],
            ['caption' => 'Korean food stall', 'category' => 'culture', 'event_name' => 'Chuseok 2024', 'year' => 2024, 'aspect' => 'landscape', 'image_path' => null, 'color' => '#D97706', 'icon' => null, 'sort_order' => 13, 'is_visible' => true],
            ['caption' => 'Language learning session', 'category' => 'campus', 'event_name' => 'Language Bootcamp 2025', 'year' => 2025, 'aspect' => 'landscape', 'image_path' => null, 'color' => '#059669', 'icon' => null, 'sort_order' => 14, 'is_visible' => true],
            ['caption' => 'Yutnori traditional game', 'category' => 'culture', 'event_name' => 'Chuseok 2024', 'year' => 2024, 'aspect' => 'square', 'image_path' => null, 'color' => '#D97706', 'icon' => null, 'sort_order' => 15, 'is_visible' => true],
            ['caption' => 'Magazine launch ceremony', 'category' => 'campus', 'event_name' => 'Magazine Launch 2024', 'year' => 2024, 'aspect' => 'landscape', 'image_path' => null, 'color' => '#4F46E5', 'icon' => null, 'sort_order' => 16, 'is_visible' => true],
            ['caption' => 'Club orientation day', 'category' => 'campus', 'event_name' => 'Orientation 2024', 'year' => 2024, 'aspect' => 'landscape', 'image_path' => null, 'color' => '#7C3AED', 'icon' => null, 'sort_order' => 17, 'is_visible' => true],
            ['caption' => 'Korean drama watch party', 'category' => 'events', 'event_name' => 'Watch Party 2025', 'year' => 2025, 'aspect' => 'landscape', 'image_path' => null, 'color' => '#7C3AED', 'icon' => null, 'sort_order' => 18, 'is_visible' => true],
        ];

        foreach ($photos as $photo) {
            GalleryPhoto::create($photo);
        }

        // -------------------------
        // Magazine Issues + Articles
        // -------------------------
        $issues = [
            [
                'slug' => 'han-vol-1',
                'title' => 'HAN Magazine',
                'issue_label' => 'Vol. 1',
                'year' => 2023,
                'month' => 10,
                'cover_color' => '#4F46E5',
                'cover_accent' => '#818CF8',
                'tagline' => 'The Beginning of Something Beautiful',
                'description' => 'Our debut issue celebrating the launch of DKC and the spirit of Korean culture in Dibrugarh.',
                'is_featured' => false,
                'page_count' => 24,
                'pdf_path' => null,
                'sort_order' => 1,
                'articles' => [
                    ['title' => 'Why Korean Culture?', 'excerpt' => 'An exploration of why Korean culture is captivating hearts across Assam.', 'content' => 'Korean culture has been sweeping across the globe, and Dibrugarh is no exception. From the melodious rhythms of K-pop to the gripping narratives of K-dramas, Korean culture offers something for everyone...', 'author' => 'Editorial Team', 'tag' => 'Culture', 'sort_order' => 1],
                    ['title' => 'Learning Hangul: A Beginner\'s Journey', 'excerpt' => 'Our founder shares her experience learning the Korean alphabet.', 'content' => 'Hangul, the Korean writing system, is considered one of the most scientific writing systems ever devised. Unlike many other writing systems, Hangul was deliberately created...', 'author' => 'Park Ji-won', 'tag' => 'Language', 'sort_order' => 2],
                    ['title' => 'K-Drama Recommendations for Beginners', 'excerpt' => 'Top 5 K-dramas to start your Korean culture journey.', 'content' => 'If you\'re new to K-dramas, starting can feel overwhelming with thousands of titles to choose from. Here are our top 5 recommendations for newcomers...', 'author' => 'Kim Min-jun', 'tag' => 'Entertainment', 'sort_order' => 3],
                ],
            ],
            [
                'slug' => 'han-vol-2',
                'title' => 'HAN Magazine',
                'issue_label' => 'Vol. 2',
                'year' => 2024,
                'month' => 2,
                'cover_color' => '#DC2626',
                'cover_accent' => '#FCA5A5',
                'tagline' => 'Love, Language, and Lunar New Year',
                'description' => 'Valentine\'s special issue exploring love in Korean culture, with features on Seollal traditions.',
                'is_featured' => false,
                'page_count' => 28,
                'pdf_path' => null,
                'sort_order' => 2,
                'articles' => [
                    ['title' => 'Love in Korean Culture', 'excerpt' => 'From 사랑 to 우정 — understanding love in its many forms.', 'content' => 'In Korean culture, love is expressed in many nuanced ways. The concept of nunchi (눈치) — the ability to read the room — plays a significant role in how Koreans express and receive affection...', 'author' => 'Park Ji-won', 'tag' => 'Culture', 'sort_order' => 1],
                    ['title' => 'Seollal: New Year, New Beginnings', 'excerpt' => 'A deep dive into Korea\'s most important traditional holiday.', 'content' => 'Seollal, the Korean Lunar New Year, is a time for family reunions, ancestral rites, and looking forward to the year ahead. The holiday spans three days...', 'author' => 'Editorial Team', 'tag' => 'Traditions', 'sort_order' => 2],
                ],
            ],
            [
                'slug' => 'han-vol-3',
                'title' => 'HAN Magazine',
                'issue_label' => 'Vol. 3',
                'year' => 2024,
                'month' => 6,
                'cover_color' => '#059669',
                'cover_accent' => '#6EE7B7',
                'tagline' => 'Summer Vibes, Korean Style',
                'description' => 'A summer special with K-pop spotlight, Korean skincare secrets, and summer food culture.',
                'is_featured' => false,
                'page_count' => 32,
                'pdf_path' => null,
                'sort_order' => 3,
                'articles' => [
                    ['title' => 'The K-pop Phenomenon', 'excerpt' => 'How K-pop conquered the world and what makes it so special.', 'content' => 'The Korean pop music industry, commonly known as K-pop, has transformed from a domestic music genre into a global cultural phenomenon. With meticulously choreographed performances...', 'author' => 'Kim Min-jun', 'tag' => 'Music', 'sort_order' => 1],
                    ['title' => 'Korean Skincare: The 10-Step Routine', 'excerpt' => 'Unlocking the secrets behind the famous Korean glass skin.', 'content' => 'Korean skincare has taken the beauty world by storm, and for good reason. The multi-step approach focuses on hydration, protection, and nourishment rather than heavy coverage...', 'author' => 'Editorial Team', 'tag' => 'Lifestyle', 'sort_order' => 2],
                    ['title' => 'Summer Foods of Korea', 'excerpt' => 'From naengmyeon to patbingsu — cooling Korean summer delights.', 'content' => 'Korean summers are hot and humid, and Korean cuisine has evolved delicious ways to beat the heat. Naengmyeon (cold buckwheat noodles), bingsu (shaved ice desserts), and mul-naengmyeon are summer staples...', 'author' => 'Park Ji-won', 'tag' => 'Food', 'sort_order' => 3],
                ],
            ],
            [
                'slug' => 'han-vol-4',
                'title' => 'HAN Magazine',
                'issue_label' => 'Vol. 4',
                'year' => 2024,
                'month' => 10,
                'cover_color' => '#D97706',
                'cover_accent' => '#FCD34D',
                'tagline' => 'Harvest, Heritage, and Hangul',
                'description' => 'Autumn special celebrating Chuseok, Hangul Day, and Korean autumnal traditions.',
                'is_featured' => true,
                'page_count' => 36,
                'pdf_path' => null,
                'sort_order' => 4,
                'articles' => [
                    ['title' => 'Chuseok: Korea\'s Thanksgiving', 'excerpt' => 'A comprehensive guide to Korea\'s most beloved harvest festival.', 'content' => 'Chuseok (추석) is often called Korean Thanksgiving, though it has its own unique traditions and significance. Celebrated on the 15th day of the 8th month of the lunar calendar...', 'author' => 'Editorial Team', 'tag' => 'Festivals', 'sort_order' => 1],
                    ['title' => 'The Genius of King Sejong', 'excerpt' => 'How one king changed the course of Korean literacy forever.', 'content' => 'King Sejong the Great (세종대왕) is arguably one of the greatest rulers in Korean history. Among his many achievements, none is more lasting than his creation of Hangul in 1443...', 'author' => 'Kim Min-jun', 'tag' => 'History', 'sort_order' => 2],
                ],
            ],
            [
                'slug' => 'han-vol-5',
                'title' => 'HAN Magazine',
                'issue_label' => 'Vol. 5',
                'year' => 2025,
                'month' => 1,
                'cover_color' => '#7C3AED',
                'cover_accent' => '#C4B5FD',
                'tagline' => 'New Year, New Horizons',
                'description' => 'Our landmark fifth issue — celebrating one year of DKC with reflections, achievements, and dreams.',
                'is_featured' => true,
                'page_count' => 40,
                'pdf_path' => null,
                'sort_order' => 5,
                'articles' => [
                    ['title' => 'One Year of DKC: A Reflection', 'excerpt' => 'Looking back at our first year and the journey ahead.', 'content' => 'One year ago, a small group of Korean culture enthusiasts in Dibrugarh had a dream: to create a community where people could explore, celebrate, and learn about Korean culture together...', 'author' => 'Editorial Team', 'tag' => 'Club News', 'sort_order' => 1],
                    ['title' => 'Korean Cinema: Beyond Parasite', 'excerpt' => 'Exploring the rich landscape of Korean film beyond its Oscar-winning highlight.', 'content' => 'When Parasite won the Academy Award for Best Picture in 2020, the world took notice of Korean cinema. But Korean film has a rich history stretching back decades...', 'author' => 'Kim Min-jun', 'tag' => 'Cinema', 'sort_order' => 2],
                    ['title' => 'Learning Korean: Our Members\' Stories', 'excerpt' => 'DKC members share their Korean language learning journeys.', 'content' => 'Language learning is a deeply personal journey. We asked some of our members to share their experiences learning Korean — the challenges, the breakthroughs, and the moments that made it all worthwhile...', 'author' => 'Park Ji-won', 'tag' => 'Language', 'sort_order' => 3],
                ],
            ],
        ];

        foreach ($issues as $issueData) {
            $articles = $issueData['articles'];
            unset($issueData['articles']);
            $issue = MagazineIssue::create($issueData);
            foreach ($articles as $article) {
                $article['magazine_issue_id'] = $issue->id;
                MagazineArticle::create($article);
            }
        }

        // -------------------------
        // Goodies
        // -------------------------
        // category ENUM: stationery, apparel, accessories, collectibles
        // availability ENUM: available, limited, sold-out
        $goodies = [
            ['name' => 'DKC Tote Bag', 'korean_name' => 'DKC 토트백', 'category' => 'accessories', 'price' => 250.00, 'description' => 'Eco-friendly canvas tote bag with DKC logo and Korean calligraphy design.', 'availability' => 'available', 'image_path' => null, 'color' => '#4F46E5', 'icon' => null, 'tags' => json_encode(['bag', 'eco', 'logo']), 'sort_order' => 1],
            ['name' => 'Hangul Bookmark Set', 'korean_name' => '한글 북마크 세트', 'category' => 'stationery', 'price' => 80.00, 'description' => 'Set of 5 beautifully designed bookmarks featuring Hangul characters and their meanings.', 'availability' => 'available', 'image_path' => null, 'color' => '#D97706', 'icon' => null, 'tags' => json_encode(['bookmark', 'hangul', 'stationery']), 'sort_order' => 2],
            ['name' => 'K-culture Pin Set', 'korean_name' => 'K-문화 핀 세트', 'category' => 'accessories', 'price' => 120.00, 'description' => 'Set of 6 enamel pins featuring iconic Korean cultural elements.', 'availability' => 'available', 'image_path' => null, 'color' => '#EC4899', 'icon' => null, 'tags' => json_encode(['pins', 'enamel', 'k-culture']), 'sort_order' => 3],
            ['name' => 'DKC Hoodie', 'korean_name' => 'DKC 후디', 'category' => 'apparel', 'price' => 650.00, 'description' => 'Premium quality hoodie with DKC branding and Korean text on the back.', 'availability' => 'limited', 'image_path' => null, 'color' => '#7C3AED', 'icon' => null, 'tags' => json_encode(['hoodie', 'apparel', 'premium']), 'sort_order' => 4],
            ['name' => 'Korean Recipe Zine', 'korean_name' => '한국 요리 진', 'category' => 'collectibles', 'price' => 60.00, 'description' => 'A hand-crafted zine with 10 easy Korean recipes adapted for Indian kitchens.', 'availability' => 'available', 'image_path' => null, 'color' => '#059669', 'icon' => null, 'tags' => json_encode(['recipe', 'zine', 'food']), 'sort_order' => 5],
            ['name' => 'Hangul Learning Poster', 'korean_name' => '한글 학습 포스터', 'category' => 'stationery', 'price' => 100.00, 'description' => 'A3 size colorful poster showing the complete Hangul alphabet with romanization.', 'availability' => 'available', 'image_path' => null, 'color' => '#4F46E5', 'icon' => null, 'tags' => json_encode(['poster', 'hangul', 'learning']), 'sort_order' => 6],
            ['name' => 'DKC Mug', 'korean_name' => 'DKC 머그컵', 'category' => 'accessories', 'price' => 180.00, 'description' => 'Ceramic mug with DKC logo and Korean motivational phrase.', 'availability' => 'sold-out', 'image_path' => null, 'color' => '#D97706', 'icon' => null, 'tags' => json_encode(['mug', 'ceramic', 'logo']), 'sort_order' => 7],
            ['name' => 'HAN Magazine Bundle', 'korean_name' => 'HAN 매거진 번들', 'category' => 'collectibles', 'price' => 200.00, 'description' => 'Complete bundle of all 5 HAN Magazine issues — a collector\'s edition.', 'availability' => 'limited', 'image_path' => null, 'color' => '#7C3AED', 'icon' => null, 'tags' => json_encode(['magazine', 'bundle', 'collector']), 'sort_order' => 8],
        ];

        foreach ($goodies as $goodie) {
            Goodie::create($goodie);
        }

        // -------------------------
        // Members
        // -------------------------
        $members = [
            [
                'name' => 'Park Ji-won',
                'initials' => 'PJ',
                'role' => 'Founder & President',
                'department' => 'Korean Studies',
                'joined_month' => 'September',
                'joined_year' => 2023,
                'quote' => '한국 문화는 우리를 하나로 만들어요 — Korean culture brings us together.',
                'dream' => 'Visit Korea',
                'favourite_word' => '사랑 (Sa-rang) — Love',
                'photo_path' => null,
                'is_spotlight' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Kim Min-jun',
                'initials' => 'KM',
                'role' => 'Vice President & Editor',
                'department' => 'Linguistics',
                'joined_month' => 'September',
                'joined_year' => 2023,
                'quote' => '언어는 문화의 창문이에요 — Language is a window into culture.',
                'dream' => 'Become Translator',
                'favourite_word' => '친구 (Chingu) — Friend',
                'photo_path' => null,
                'is_spotlight' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($members as $member) {
            Member::create($member);
        }

        // -------------------------
        // Korean Phrases
        // -------------------------
        $phrases = [
            ['korean' => '안녕하세요', 'english' => 'Hello', 'romanized' => 'Annyeonghaseyo', 'sort_order' => 1, 'is_active' => true],
            ['korean' => '감사합니다', 'english' => 'Thank you', 'romanized' => 'Gamsahamnida', 'sort_order' => 2, 'is_active' => true],
            ['korean' => '잘 부탁드립니다', 'english' => 'Please take care of me', 'romanized' => 'Jal butakdeurimnida', 'sort_order' => 3, 'is_active' => true],
            ['korean' => '화이팅!', 'english' => 'Fighting! (You can do it!)', 'romanized' => 'Hwaiting!', 'sort_order' => 4, 'is_active' => true],
            ['korean' => '사랑해요', 'english' => 'I love you', 'romanized' => 'Saranghaeyo', 'sort_order' => 5, 'is_active' => true],
            ['korean' => '수고했어요', 'english' => 'Good job! / You worked hard!', 'romanized' => 'Sugohaesseoyo', 'sort_order' => 6, 'is_active' => true],
            ['korean' => '반갑습니다', 'english' => 'Nice to meet you', 'romanized' => 'Bangapseumnida', 'sort_order' => 7, 'is_active' => true],
            ['korean' => '맛있어요', 'english' => 'It\'s delicious', 'romanized' => 'Masisseoyo', 'sort_order' => 8, 'is_active' => true],
            ['korean' => '괜찮아요', 'english' => 'It\'s okay / I\'m fine', 'romanized' => 'Gwaenchanayo', 'sort_order' => 9, 'is_active' => true],
        ];

        foreach ($phrases as $phrase) {
            KoreanPhrase::create($phrase);
        }

        // -------------------------
        // Fun Facts
        // -------------------------
        $funFacts = [
            // fun_fact type
            ['type' => 'fun_fact', 'korean_word' => '눈치', 'romanized' => 'Nunchi', 'fact' => 'Koreans have a concept called "nunchi" — the subtle art of gauging others\' feelings and responding appropriately. It\'s considered a crucial social skill!', 'is_active' => true, 'sort_order' => 1],
            ['type' => 'fun_fact', 'korean_word' => '빨리빨리', 'romanized' => 'Ppalli-ppalli', 'fact' => 'Korea has a "ppalli-ppalli" (hurry-hurry) culture. South Korea has one of the world\'s fastest internet speeds and fastest delivery services!', 'is_active' => true, 'sort_order' => 2],
            ['type' => 'fun_fact', 'korean_word' => '한', 'romanized' => 'Han', 'fact' => '"Han" is an untranslatable Korean emotion — a deep, collective feeling of sorrow, oppression, and yearning that has shaped Korean art and culture.', 'is_active' => true, 'sort_order' => 3],
            // did_you_know type
            ['type' => 'did_you_know', 'korean_word' => '세종대왕', 'romanized' => 'Sejong Daewang', 'fact' => 'Hangul, the Korean alphabet, was created in 1443 by King Sejong the Great. It was designed to be learned in a single morning — and it truly can be!', 'is_active' => true, 'sort_order' => 4],
            ['type' => 'did_you_know', 'korean_word' => '김치', 'romanized' => 'Kimchi', 'fact' => 'Korea has over 200 varieties of kimchi! The fermented dish is so culturally significant that kimchi-making (kimjang) is recognized as UNESCO Intangible Cultural Heritage.', 'is_active' => true, 'sort_order' => 5],
            ['type' => 'did_you_know', 'korean_word' => '태권도', 'romanized' => 'Taekwondo', 'fact' => 'Taekwondo, the Korean martial art, is practised by over 80 million people in 188 countries. It became an Olympic sport in 2000 at the Sydney Games.', 'is_active' => true, 'sort_order' => 6],
        ];

        foreach ($funFacts as $fact) {
            FunFact::create($fact);
        }

        // -------------------------
        // Media Picks
        // -------------------------
        $mediaPicks = [
            ['type' => 'Drama', 'title' => 'Crash Landing on You', 'korean_title' => '사랑의 불시착', 'description' => 'A South Korean heiress accidentally crash-lands in North Korea and falls in love with a military officer. A perfect blend of romance, humor, and drama.', 'tag' => 'Netflix', 'streaming_platform' => 'Netflix', 'is_active' => true, 'sort_order' => 1],
            ['type' => 'Movie', 'title' => 'Parasite', 'korean_title' => '기생충', 'description' => 'Bong Joon-ho\'s Oscar-winning masterpiece about class struggle and social inequality. The first non-English film to win Best Picture at the Academy Awards.', 'tag' => 'Oscar Winner', 'streaming_platform' => 'Various platforms', 'is_active' => true, 'sort_order' => 2],
            ['type' => 'Book', 'title' => 'Please Look After Mom', 'korean_title' => '엄마를 부탁해', 'description' => 'Kyung-sook Shin\'s internationally acclaimed novel about a Korean family searching for their missing mother. A deeply moving exploration of love and regret.', 'tag' => 'Bestseller', 'streaming_platform' => null, 'is_active' => true, 'sort_order' => 3],
        ];

        foreach ($mediaPicks as $pick) {
            MediaPick::create($pick);
        }

        // -------------------------
        // Site Settings
        // -------------------------
        $settings = [
            ['key' => 'members_count', 'value' => '550+', 'type' => 'text', 'group' => 'stats', 'label' => 'Total Members'],
            ['key' => 'events_count', 'value' => '25+', 'type' => 'text', 'group' => 'stats', 'label' => 'Events Held'],
            ['key' => 'celebrations_count', 'value' => '12+', 'type' => 'text', 'group' => 'stats', 'label' => 'Celebrations'],
            ['key' => 'memories_count', 'value' => '1000+', 'type' => 'text', 'group' => 'stats', 'label' => 'Memories Created'],
            ['key' => 'tagline', 'value' => 'One Family', 'type' => 'text', 'group' => 'general', 'label' => 'Club Tagline'],
            ['key' => 'club_name', 'value' => 'Dibrugarh Korean Club', 'type' => 'text', 'group' => 'general', 'label' => 'Club Name'],
            ['key' => 'club_short_name', 'value' => 'DKC', 'type' => 'text', 'group' => 'general', 'label' => 'Club Short Name'],
            ['key' => 'founded_year', 'value' => '2023', 'type' => 'text', 'group' => 'general', 'label' => 'Year Founded'],
            ['key' => 'contact_email', 'value' => 'info@dkc.local', 'type' => 'email', 'group' => 'contact', 'label' => 'Contact Email'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com/dkc_dibrugarh', 'type' => 'url', 'group' => 'social', 'label' => 'Instagram URL'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::create($setting);
        }
    }
}
