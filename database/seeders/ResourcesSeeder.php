<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourcesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('resources')->truncate();

        $resources = [
            // ── Study Materials ──────────────────────────────────────────────
            [
                'category' => 'study-materials',
                'type' => 'article',
                'title' => 'Complete Beginner Roadmap: Your First 3 Months',
                'difficulty' => 'beginner',
                'author' => 'DKC Language Team',
                'description' => 'A structured 12-week plan to take you from zero knowledge to basic conversational Korean.',
                'content' => "## Your First 3 Months of Korean\n\nLearning Korean can feel overwhelming at first. This roadmap breaks your first three months into clear, achievable weekly goals.\n\n## Week 1–2: The Alphabet\n\nHangul is your first and most important task. Spend the first two weeks doing nothing else. The Korean alphabet has 24 base letters and a set of compound vowels and consonants. Most learners can read all basic syllables within two weeks of consistent 30-minute daily practice.\n\n> Don't try to memorise Romanised Korean. Learn to read Hangul from day one.\n\n## Week 3–4: Basic Phrases and Survival Korean\n\nOnce you can read, begin with the phrases that make immediate difference: greetings, introductions, numbers (there are two systems — learn both basic sets), and asking how much something costs.\n\n## Month 2: Grammar Foundations\n\nKorean grammar is structured differently from English. Subject-Object-Verb order, postpositions instead of prepositions, and verb endings that carry a huge amount of meaning. Focus on:\n\n- Topic vs subject particles (은/는 vs 이/가)\n- Object particle (을/를)\n- Basic verb conjugation in present tense\n- Polite speech level (합쇼체 and 해요체)\n\n## Month 3: Vocabulary and Listening\n\nAim for 300–500 words by the end of month 3. Use spaced repetition (Anki is excellent). Begin watching Korean content with subtitles — even 20 minutes a day makes a measurable difference to your listening comprehension.\n\n## Daily Study Schedule\n\nA sustainable daily routine for a beginner:\n- 15 minutes: Anki vocabulary review\n- 15 minutes: Grammar study (one pattern per day)\n- 15 minutes: Reading practice (even children's books count)\n- 15 minutes: Listening (a drama, a YouTube channel, a podcast)\n\nConsistency beats intensity. 60 minutes every day will outpace 7 hours on Saturday.",
                'sort_order' => 1,
            ],
            [
                'category' => 'study-materials',
                'type' => 'article',
                'title' => 'TOPIK Preparation Guide: Levels 1–4',
                'difficulty' => 'intermediate',
                'author' => 'Priya Sharma',
                'description' => 'Everything you need to know about registering for and preparing for the Test of Proficiency in Korean.',
                'content' => "## What is TOPIK?\n\nTOPIK (Test of Proficiency in Korean) is the official Korean language proficiency test administered by the Korean government. It is recognised by Korean universities, employers and the Global Korea Scholarship programme.\n\n## The Two Tests\n\nTOPIK I covers Levels 1 and 2 (beginner). It has two sections: Listening and Reading. No writing required.\n\nTOPIK II covers Levels 3–6 (intermediate to advanced). It has Listening, Reading and Writing sections.\n\n> Most DKC members aim for TOPIK I initially, then work toward Level 3 or 4 for scholarship eligibility.\n\n## Registration\n\nTOPIK is administered in India through the Korean Cultural Centre India (KCCI). Check the KCCI website for exam dates — they typically offer 2–3 sittings per year in major cities.\n\n## Level 1 Preparation (approx. 4–6 months from zero)\n\n- Vocabulary: 800 words minimum\n- Grammar: 80 core patterns\n- Focus: past TOPIK I papers (available free on the TOPIK website)\n- Practice listening at normal speed daily\n\n## Level 3 Preparation (approx. 12–18 months from zero)\n\n- Vocabulary: 3,000 words\n- Grammar: 250+ patterns\n- Writing: ability to produce 300–400 word essays on assigned topics\n- Resources: TOPIK Master textbooks, Hackers Korean\n\n## Tips From Our Members\n\nStudents who passed TOPIK in our club consistently mention three things: flashcard discipline (Anki daily, no exceptions), listening to Korean radio or podcasts during commute time, and doing timed practice papers at least six weeks before the exam.",
                'sort_order' => 2,
            ],

            // ── Vocabulary ───────────────────────────────────────────────────
            [
                'category' => 'vocabulary',
                'type' => 'article',
                'title' => 'Essential 100: The Words Korean Beginners Need First',
                'difficulty' => 'beginner',
                'author' => 'DKC Language Team',
                'description' => 'The 100 most immediately useful Korean words, with pronunciation guides and example sentences.',
                'content' => "## The 100 Words You Need First\n\nThis list is not the 100 most common words in the Korean language (that would include many grammatical particles that are better learned as grammar). These are the 100 words that will make the most immediate difference to a beginner.\n\n## Greetings and Politeness\n\n안녕하세요 (annyeonghaseyo) — Hello / Good day\n감사합니다 (gamsahamnida) — Thank you (formal)\n고마워요 (gomawoyo) — Thank you (casual)\n죄송합니다 (joesonghamnida) — I am sorry (formal)\n괜찮아요 (gwaenchanayo) — It is okay / I am fine\n\n## Numbers (Sino-Korean)\n\n일 (il) — 1\n이 (i) — 2\n삼 (sam) — 3\n사 (sa) — 4\n오 (o) — 5\n육 (yuk) — 6\n칠 (chil) — 7\n팔 (pal) — 8\n구 (gu) — 9\n십 (sip) — 10\n백 (baek) — 100\n천 (cheon) — 1,000\n\n> Korean has two number systems. Sino-Korean (above) is used for dates, money, minutes and phone numbers. Native Korean is used for hours, counting objects and age.\n\n## People and Relationships\n\n나/저 (na/jeo) — I / me (informal / formal)\n우리 (uri) — we / our\n친구 (chingu) — friend\n선생님 (seonsaengnim) — teacher\n학생 (haksaeng) — student\n가족 (gajok) — family\n\n## Time\n\n오늘 (oneul) — today\n내일 (naeil) — tomorrow\n어제 (eoje) — yesterday\n지금 (jigeum) — now\n\n## Food and Daily Life\n\n밥 (bap) — rice / meal\n물 (mul) — water\n커피 (keopi) — coffee\n집 (jip) — house / home\n학교 (hakgyo) — school",
                'sort_order' => 1,
            ],
            [
                'category' => 'vocabulary',
                'type' => 'article',
                'title' => 'K-Drama Vocabulary: 50 Words You Will Hear Every Episode',
                'difficulty' => 'beginner',
                'author' => 'Ankita Gogoi',
                'description' => 'The words that appear constantly in Korean dramas — learn these and you will suddenly understand a lot more.',
                'content' => "## K-Drama Vocabulary\n\nIf you watch Korean dramas regularly, you have probably started picking up words without trying. These 50 words are the ones that appear most frequently across genres — romance, thriller, family drama and historical.\n\n## Emotions and States\n\n왜 (wae) — why (you will hear this constantly)\n싫어 (sireo) — I hate it / I don't like it\n좋아 (joa) — I like it\n보고 싶어 (bogo sipeo) — I miss you\n사랑해 (saranghae) — I love you\n미안해 (mianhae) — I am sorry (informal)\n\n## Common Exclamations\n\n아이고 (aigo) — oh no / goodness\n진짜 (jinjja) — really / truly\n정말 (jeongmal) — really\n대박 (daebak) — awesome / unbelievable\n어머 (eomeo) — oh my! (used by women, like 'goodness')\n\n## Family Terms in Dramas\n\nKorean family vocabulary in dramas is complex because Koreans address family members by title rather than name.\n\n오빠 (oppa) — older brother (said by a woman)\n언니 (eonni) — older sister (said by a woman)\n형 (hyeong) — older brother (said by a man)\n누나 (nuna) — older sister (said by a man)\n엄마 (eomma) — mum\n아빠 (appa) — dad\n\n> In K-dramas, 오빠 is often used by women to address older boyfriends. This is a real social convention, not just a drama trope.\n\n## Situations\n\n안 돼 (an dwae) — it can't be / no way\n어떡해 (eotteokhae) — what do I do / what should I do\n괜찮아 (gwaenchana) — it's okay / are you okay\n잠깐만요 (jamkkanmanyo) — wait a moment",
                'sort_order' => 2,
            ],

            // ── Grammar ──────────────────────────────────────────────────────
            [
                'category' => 'grammar',
                'type' => 'article',
                'title' => 'The Particle System: Korean\'s Most Important Concept',
                'difficulty' => 'beginner',
                'author' => 'DKC Language Team',
                'description' => 'A clear introduction to Korean particles — the small words attached to nouns that tell you their role in the sentence.',
                'content' => "## Korean Particles: The Foundation\n\nParticles are small grammatical markers attached directly to nouns and pronouns. They tell you what role a word plays in the sentence — subject, object, location, and much more. English does this through word order; Korean does it through particles.\n\nThis means Korean word order is flexible. The particles carry the meaning.\n\n## The Four You Need First\n\n## 은/는 — The Topic Particle\n\n은 (eun) after a consonant, 는 (neun) after a vowel.\n\nThis marks the topic of the sentence — what you are talking about. It often translates as \"as for...\"\n\n저는 학생이에요. — As for me, I am a student.\n오늘은 날씨가 좋아요. — As for today, the weather is good.\n\n## 이/가 — The Subject Particle\n\n이 (i) after a consonant, 가 (ga) after a vowel.\n\nThis marks the grammatical subject — who or what performs the action or is described.\n\n비가 와요. — Rain is coming (it is raining).\n고양이가 자요. — The cat is sleeping.\n\n> The difference between topic (은/는) and subject (이/가) is one of the most discussed topics in Korean grammar. Don't worry about mastering it immediately — it will become intuitive with exposure.\n\n## 을/를 — The Object Particle\n\n을 (eul) after a consonant, 를 (reul) after a vowel.\n\nThis marks the direct object — what receives the action.\n\n커피를 마셔요. — I drink coffee.\n한국어를 공부해요. — I study Korean.\n\n## 에 — Location and Direction\n\nMarks where something is, or where you are going.\n\n학교에 가요. — I go to school.\n집에 있어요. — I am at home.",
                'sort_order' => 1,
            ],
            [
                'category' => 'grammar',
                'type' => 'article',
                'title' => 'Speech Levels: How Formality Works in Korean',
                'difficulty' => 'intermediate',
                'author' => 'Priya Sharma',
                'description' => 'Korean has multiple speech levels. This guide explains when to use formal, polite and informal speech — and why it matters.',
                'content' => "## Speech Levels in Korean\n\nKorean encodes social relationships directly in verb endings. Every time you say a sentence, you choose a speech level that reflects your relationship with the listener. This is not optional — using the wrong level is genuinely awkward or rude.\n\nThere are seven speech levels in total, but modern speakers primarily use three.\n\n## 합쇼체 (Formal Polite)\n\nEndings: -ㅂ니다 / -습니다 (statements), -ㅂ니까 / -습니까 (questions)\n\nUse: TV news, formal presentations, military speech, meeting someone for the first time in a professional context.\n\n감사합니다. — Thank you. (formal)\n어디에 가십니까? — Where are you going? (formal)\n\n## 해요체 (Informal Polite)\n\nEndings: -아요 / -어요\n\nUse: Default in most everyday interactions with people you don't know well, or who are older or senior to you. The vast majority of K-drama speech between adults who are not close friends.\n\n감사해요. — Thank you.\n어디에 가요? — Where are you going?\n\n> Start with 해요체. It is polite enough for almost all situations a beginner will encounter, and it is the most common speech level you will hear.\n\n## 해체 (Informal / Casual)\n\nEndings: -아 / -어\n\nUse: Close friends, younger people, people you are in a clearly established informal relationship with. Also used in inner monologue, diary entries and some song lyrics.\n\n고마워. — Thanks.\n어디 가? — Where are you going?\n\n## The Social Logic\n\nKorean speech levels are not just about politeness — they signal the social distance between speakers. Moving from 해요체 to 해체 with someone (called 말 놓기, \"dropping formality\") is a social event. It is often discussed explicitly: \"Should we speak casually with each other?\"",
                'sort_order' => 2,
            ],

            // ── Korean Culture ───────────────────────────────────────────────
            [
                'category' => 'korean-culture',
                'type' => 'article',
                'title' => 'Understanding Jeong (정): The Untranslatable Korean Bond',
                'difficulty' => 'beginner',
                'author' => 'Sneha Borah',
                'description' => 'Jeong is often described as the closest thing Korean culture has to a philosophy of human connection. Here is what it actually means.',
                'content' => "## What is Jeong (정)?\n\n정 (jeong) is one of those Korean concepts that resists direct translation — not because it is mysterious, but because English simply does not have a word for it.\n\nThe closest approximations are: attachment, affection, emotional bond, the feeling that builds between people (or between a person and a place, or even a person and an object) through shared time and experience.\n\nBut none of these quite captures jeong, because jeong is specifically about the residue that time leaves in relationships. It is what you have with someone after you have argued with them, eaten with them, seen them fail, watched them try again. It is not romance, though it can include romance. It is not friendship, though it can include friendship. It is something that happens to you over time, almost without your noticing.\n\n## Jeong in Daily Korean Life\n\nKoreans will say that you cannot manufacture jeong — it accumulates. A shopkeeper you have visited for years has jeong with you even if you barely speak. A colleague who sat next to you through three years of difficult work has jeong with you even if you were not particularly close.\n\n> The phrase 정이 들다 (jeong-i deulda) means \"jeong has settled in\" — the passive construction is deliberate. You do not make jeong. It settles.\n\n## Jeong in Korean Drama\n\nIf you have watched Korean drama and wondered why relationships feel so much more emotionally layered than in other TV — why the end of a friendship between two characters who were rivals carries as much weight as a romantic goodbye — jeong is part of the answer.\n\nKorean storytelling understands that connection is built from shared difficulty as much as shared joy. This is jeong.\n\n## Jeong and Northeast India\n\nMany Northeast Indian viewers of Korean content note that jeong resonates with concepts in their own cultures — the Mizo concept of tlawmngaihna (selfless service within community), the Manipuri idea of meitei relationship bonds. The attachment that builds between people who share geography, difficulty and history.\n\nThis may be part of why Korean culture has landed so deeply in this region. The emotional logic is familiar, even when the language is not.",
                'sort_order' => 1,
            ],
            [
                'category' => 'korean-culture',
                'type' => 'article',
                'title' => 'Chuseok and Seollal: Understanding Korea\'s Two Great Festivals',
                'difficulty' => 'beginner',
                'author' => 'Dev Hazarika',
                'description' => 'Korea\'s two biggest holidays — the harvest festival and the Lunar New Year — explained for those encountering them for the first time.',
                'content' => "## Korea's Two Great Festivals\n\nKorea has two national holidays that function similarly to Diwali or Eid in the Indian context — they are the occasions when families travel from across the country to be together, when traditional foods are prepared, when ancestors are honoured, and when the country essentially pauses.\n\n## Chuseok (추석) — The Harvest Festival\n\nChuseok falls on the fifteenth day of the eighth lunar month — usually in September or October. It is sometimes called the Korean Thanksgiving, though it is older and more complex than that comparison suggests.\n\nThe central ritual of Chuseok is charye (차례) — a formal ceremony of offering food to ancestors. The family prepares a large spread of traditional foods, arranges them on a table facing a designated direction, and performs bows. The ritual acknowledges that the living are supported by those who came before them.\n\nTraditional Chuseok foods include:\n- 송편 (songpyeon) — half-moon shaped rice cakes filled with sesame, red bean or chestnut\n- 잡채 (japchae) — glass noodles stir-fried with vegetables\n- 전 (jeon) — Korean pancakes made with vegetables, seafood or meat\n\n> In K-dramas, Chuseok episodes are often the most emotionally intense of the season. They bring families together — and family means conflict, love, and everything in between.\n\n## Seollal (설날) — Lunar New Year\n\nSeollal falls on the first day of the first lunar month — usually in late January or February. Like Chuseok, it involves ancestral rites, family gatherings, and traditional dress (한복, hanbok).\n\nThe distinctive Seollal greeting is:\n새해 복 많이 받으세요 (saehae bok mani badeuseyo) — May you receive much fortune in the new year.\n\nChildren perform a deep bow called sebae (세배) to elders, who give them money in envelopes (세뱃돈, sebaedon) and a blessing for the new year.\n\nThe traditional food of Seollal is 떡국 (tteokguk) — a soup made with sliced rice cake ovals. Eating it is said to make you one year older in the traditional Korean age-counting system.",
                'sort_order' => 2,
            ],

            // ── Practice ─────────────────────────────────────────────────────
            [
                'category' => 'practice',
                'type' => 'exercise',
                'title' => 'Reading Practice: Level 1 Passages with Vocabulary Notes',
                'difficulty' => 'beginner',
                'author' => 'DKC Language Team',
                'description' => 'Short Korean reading passages at TOPIK Level 1 difficulty, with vocabulary notes and comprehension questions.',
                'content' => "## Reading Practice: Beginner Passages\n\nThese short passages are written at approximately TOPIK Level 1 difficulty. Read each one, note the words you don't know, then check the vocabulary list below.\n\n## Passage 1: My Day\n\n저는 학생이에요. 매일 아침 학교에 가요. 학교에서 한국어를 공부해요. 한국어는 재미있어요. 점심에 친구들과 밥을 먹어요. 저녁에 집에서 공부해요. 그리고 음악을 들어요.\n\n## Vocabulary for Passage 1\n\n매일 (maeil) — every day\n아침 (achim) — morning\n공부하다 (gongbuhada) — to study\n재미있다 (jaemiitda) — to be interesting / fun\n점심 (jeomsim) — lunch\n친구들 (chingudeul) — friends (plural)\n저녁 (jeonyeok) — evening\n음악 (eumak) — music\n듣다 (deutda) — to listen\n\n## Comprehension Questions\n\n1. 이 사람은 학생이에요, 아니에요? (Is this person a student or not?)\n2. 이 사람은 어디에서 한국어를 공부해요? (Where does this person study Korean?)\n3. 이 사람은 점심에 누구와 밥을 먹어요? (Who does this person eat lunch with?)\n\n## Passage 2: The Weather Today\n\n오늘 날씨가 좋아요. 하늘이 파래요. 바람이 조금 불어요. 저는 공원에 가고 싶어요. 공원에서 책을 읽고 싶어요. 그런데 숙제가 많아요. 내일 공원에 갈 거예요.\n\n## Vocabulary for Passage 2\n\n날씨 (nalsi) — weather\n하늘 (haneul) — sky\n파랗다 (parata) — to be blue\n바람 (baram) — wind\n불다 (bulda) — to blow\n공원 (gongwon) — park\n책 (chaek) — book\n읽다 (ikda) — to read\n숙제 (sukje) — homework\n내일 (naeil) — tomorrow\n갈 거예요 (gal geoyeyo) — will go\n\n> Tip: Cover the vocabulary list and try to read each passage first, guessing meanings from context. Then check. This builds the same mental muscle as real reading.",
                'sort_order' => 1,
            ],
            [
                'category' => 'practice',
                'type' => 'exercise',
                'title' => 'Writing Exercises: Describing Yourself in Korean',
                'difficulty' => 'beginner',
                'author' => 'Rohan Das',
                'description' => 'Step-by-step writing prompts to help beginners write their first full Korean self-introduction (자기소개).',
                'content' => "## Writing Your Self-Introduction in Korean\n\n자기소개 (jagisogae) — self-introduction — is one of the first things you will be asked to produce in Korean. It is also one of the most useful pieces of writing to prepare in advance, because you can use it in class, in language exchange, and in TOPIK writing practice.\n\n## Step 1: Your Name and Origin\n\nPattern: 저는 [name]이에요/예요. [city/country]에서 왔어요.\n\nExample:\n저는 아르준이에요. 디브루가르에서 왔어요.\n(I am Arjun. I came from Dibrugarh.)\n\n## Step 2: What You Do\n\nPattern: 저는 [university/school]에서 [subject]를 공부해요.\nOr: 저는 [job]이에요.\n\nExample:\n저는 디브루가르 대학교에서 영어 문학을 공부해요.\n(I study English literature at Dibrugarh University.)\n\n## Step 3: Your Korean Learning\n\nPattern: 저는 [time period]부터 한국어를 공부했어요.\n\nExample:\n저는 2년 전부터 한국어를 공부했어요.\n(I have been studying Korean for 2 years.)\n\n## Step 4: Your Interests\n\nPattern: 저는 [activity]을/를 좋아해요.\n\nExample:\n저는 K-드라마를 보는 것을 좋아해요. 한국 음식도 좋아해요.\n(I like watching K-dramas. I also like Korean food.)\n\n## Step 5: Your Goal\n\nPattern: 앞으로 [goal]고 싶어요.\n\nExample:\n앞으로 한국에 가고 싶어요. 그리고 한국 친구를 만나고 싶어요.\n(In the future I want to go to Korea. And I want to meet Korean friends.)\n\n## Your Turn\n\nWrite your own 자기소개 using the patterns above. Aim for 8–10 sentences. Once you have a draft, share it in the DKC language chat for feedback.",
                'sort_order' => 2,
            ],

            // ── Books ────────────────────────────────────────────────────────
            [
                'category' => 'books',
                'type' => 'article',
                'title' => 'DKC Reading List: The Best Textbooks for Self-Study',
                'difficulty' => 'beginner',
                'author' => 'DKC Language Team',
                'description' => 'Our curated list of Korean textbooks and workbooks, with honest notes on who each is best suited for.',
                'content' => "## The DKC Recommended Textbook List\n\nChoosing the right textbook matters more than most beginners realise. The wrong book — too slow, too fast, too focused on written Korean when you want to speak — is a common reason people give up in the first few months.\n\n## Absolute Beginners\n\n## Talk To Me In Korean (TTMIK) — Levels 1–3\nBest for: Self-study learners who want conversational Korean. Available free on talktomeinkorean.com, with PDFs and audio.\nNote: Less rigorous on grammar explanations than some textbooks, but the audio quality and pacing are excellent for beginners.\n\n## Korean From Zero — George Trombley\nBest for: Complete beginners who want a patient, structured introduction. Teaches Hangul at the beginning of the book.\nNote: Some learners find it too slow after the first few chapters. Good for those who have struggled with other methods.\n\n## Intermediate\n\n## Yonsei Korean — Levels 1–4\nBest for: University-style learners who want a comprehensive curriculum. Used at Yonsei University's Korean Language Institute.\nNote: Slightly dated in its cultural references but rigorous in grammar coverage.\n\n## Integrated Korean — KLEAR Textbooks\nBest for: Academic learners preparing for reading and writing as well as speaking. Widely used in Korean Studies university programmes.\n\n## TOPIK Specific\n\n## TOPIK Master — Final 20 Days\nBest for: Anyone sitting TOPIK within 1–2 months. Structured practice papers with detailed answer explanations.\nNote: Essential in the final push. Not a teaching textbook — assumes you already know the material.\n\n## For Reading Korean Culture\n\n## The Korean Mind — Michael Breen\nBest for: Understanding modern Korean culture, society and values. Not a language textbook — an accessible cultural guide written for English speakers.\n\n> All titles above are available on Amazon India. The TTMIK PDFs and audio are entirely free at talktomeinkorean.com.",
                'sort_order' => 1,
            ],
            [
                'category' => 'books',
                'type' => 'article',
                'title' => 'Korean Literature in Translation: Where to Start',
                'difficulty' => 'intermediate',
                'author' => 'Sneha Borah',
                'description' => 'The best Korean novels, essays and story collections available in English translation — a reading guide for those who want the culture alongside the language.',
                'content' => "## Korean Literature in English Translation\n\nKorean literature has had a remarkable decade in translation. Since Han Kang's The Vegetarian won the Man Booker International Prize in 2016, a steady stream of Korean writing has become available in English — and the range is extraordinary.\n\n## Start Here\n\n## The Vegetarian — Han Kang\nA woman stops eating meat. Her family's response reveals violence and patriarchy beneath the surface of an ordinary life. Short, devastating, precisely written. The most accessible entry point into Han Kang's work.\n\n## Please Look After Mom — Kyung-sook Shin\nA mother goes missing in a Seoul subway station, and the novel unfolds through the perspectives of her family members — each discovering what they did not know about her. One of the best-selling Korean novels in translation.\n\n## The Hen Who Dreamed She Could Fly — Sun-mi Hwang\nA short allegory about a hen who longs to hatch an egg of her own. Deceptively simple; quietly profound. A good choice if you want something brief and emotionally complete.\n\n## For Those Who Want More Challenge\n\n## Human Acts — Han Kang\nA novel about the 1980 Gwangju Uprising, in which Korean military forces massacred civilians protesting martial law. Difficult, necessary, and one of the most important works of recent Korean fiction.\n\n## Your Republic Is Calling You — Young-Ha Kim\nA North Korean spy living undercover in South Korea receives a recall order and has twenty-four hours to decide what to do. A thriller with serious things to say about identity and the divided peninsula.\n\n## Why Read Korean Literature\n\nBeyond the pleasure of the novels themselves, reading Korean fiction gives you something language classes do not: the interior logic of Korean emotional life. The way characters think about obligation, shame, family, ambition and belonging in Korean fiction reflects real cultural values — and reading it will make your Korean conversations more nuanced.",
                'sort_order' => 2,
            ],

            // ── Useful Links ─────────────────────────────────────────────────
            [
                'category' => 'links',
                'type' => 'link',
                'title' => 'Talk To Me In Korean',
                'difficulty' => 'beginner',
                'author' => null,
                'description' => 'Free PDF lessons, audio files and video lessons covering Korean from beginner to advanced. The most comprehensive free resource for English-speaking Korean learners.',
                'url' => 'https://talktomeinkorean.com',
                'sort_order' => 1,
            ],
            [
                'category' => 'links',
                'type' => 'link',
                'title' => 'TOPIK Official Website',
                'difficulty' => null,
                'author' => null,
                'description' => 'The official TOPIK site — download free past papers, check exam schedules, and register for the test.',
                'url' => 'https://www.topik.go.kr',
                'sort_order' => 2,
            ],
            [
                'category' => 'links',
                'type' => 'link',
                'title' => 'Naver Dictionary (Korean–English)',
                'difficulty' => null,
                'author' => null,
                'description' => 'The gold standard Korean dictionary. Includes example sentences, audio pronunciation, Hanja breakdown and colloquial usage notes.',
                'url' => 'https://en.dict.naver.com',
                'sort_order' => 3,
            ],
            [
                'category' => 'links',
                'type' => 'link',
                'title' => 'Anki Flashcard App',
                'difficulty' => null,
                'author' => null,
                'description' => 'The best spaced-repetition flashcard tool for vocabulary learning. Free on desktop, paid on iOS. Thousands of pre-made Korean decks available.',
                'url' => 'https://apps.ankiweb.net',
                'sort_order' => 4,
            ],
            [
                'category' => 'links',
                'type' => 'link',
                'title' => 'Korean Cultural Centre India',
                'difficulty' => null,
                'author' => null,
                'description' => 'The official Korean government cultural centre in India — check for events, scholarship announcements, TOPIK registration, and free language programmes.',
                'url' => 'https://www.kccidelhi.org',
                'sort_order' => 5,
            ],
        ];

        $now = now();
        foreach ($resources as $r) {
            DB::table('resources')->insert(array_merge($r, [
                'is_active'  => true,
                'content'    => $r['content'] ?? null,
                'url'        => $r['url'] ?? null,
                'file_path'  => null,
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }

        $this->command->info('Resources seeded: ' . count($resources) . ' items across 7 categories.');
    }
}
