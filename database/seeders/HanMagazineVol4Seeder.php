<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HanMagazineVol4Seeder extends Seeder
{
    public function run(): void
    {
        // Remove existing Vol 4 if re-running
        $existing = DB::table('magazine_issues')->where('slug', 'han-vol-4')->first();
        if ($existing) {
            DB::table('magazine_articles')->where('magazine_issue_id', $existing->id)->delete();
            DB::table('magazine_issues')->where('id', $existing->id)->delete();
        }

        // Reset any previous featured issue
        DB::table('magazine_issues')->update(['is_featured' => false]);

        $issueId = DB::table('magazine_issues')->insertGetId([
            'slug'         => 'han-vol-4',
            'title'        => '한 Vol. IV',
            'issue_label'  => 'Volume IV · Roots & Resonance',
            'year'         => 2026,
            'month'        => 'June',
            'cover_color'  => '#0F2240',
            'cover_accent' => '#E8F0FA',
            'tagline'      => 'Where two cultures find each other across eight thousand kilometres.',
            'description'  => 'Our fourth volume explores the deep and often surprising connections between Korean culture and the Northeast Indian experience — identity, language, food, beauty, cinema, and the quiet revolutions happening in living rooms and language classes across Assam, Mizoram, Manipur and beyond.',
            'is_featured'  => true,
            'page_count'   => 112,
            'sort_order'   => 1,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        $articles = [

            // ── Article 1 ──────────────────────────────────────────────────────
            [
                'title'      => 'The Mirror Effect',
                'tag'        => 'CULTURE',
                'author'     => 'Editorial Team, DKC',
                'sort_order' => 1,
                'excerpt'    => 'How Korean stories gave Northeast India\'s youth the one thing Bollywood never could — a reflection of themselves.',
                'content'    => <<<'EOT'
## The Mirror Effect

How Korean stories gave Northeast India's youth the one thing Bollywood never could — a reflection of themselves.

The first time Mercy saw a face like hers on a screen and felt nothing but recognition — no surprise, no relief, just the quiet settling of something that had been unmoored for years — she was sixteen years old, sitting cross-legged on a concrete floor in Imphal, watching a Korean drama on her cousin's cracked phone.

"I didn't even understand the language," she says now, at twenty-two, studying Korean at a language centre in Guwahati. "But I understood everything. The way the girl in the drama looked, the way her mother spoke to her, the way she carried shame and ambition at the same time. I thought — that is me. That is exactly me."

Mercy is from Manipur, one of eight states that form the northeastern corner of India — a region of extraordinary diversity, ancient traditions, and a complicated relationship with the rest of the country. For decades, Northeast Indians have navigated a peculiar kind of invisibility: present within their nation's borders, but absent from its mainstream imagination. Bollywood gave them no heroes who looked like them. Fashion magazines had no models who carried their features. The beauty standard that dominated Indian media was, quite simply, not them.

And then, quietly, through a pirated drama series on a shared phone, through a K-pop music video glimpsed on YouTube at a cybercafe in Shillong, through a friend who pressed headphones into another friend's ears and said "just listen" — Korea arrived.

## The face in the screen

To understand why Hallyu — the Korean Wave of pop culture, drama, music, and cinema — took root so deeply in Northeast India, you have to first understand what it meant to grow up there and not see yourself anywhere.

Northeast Indians are ethnically distinct from most of mainland India. Their facial features — higher cheekbones, epicanthic folds, lighter complexions — reflect their Tibeto-Burman and Southeast Asian heritage. Within India, these features have historically invited casual cruelty. The slur "chinki," hurled at them on the streets of Delhi or Mumbai, reduces an entire region's identity to a caricature. In Bollywood films, when Northeast Indians appear at all, they are maids, villains, or comic relief. They are never the love interest. Never the hero.

Korean dramas and K-pop did not set out to fix this. They were simply made by people who looked, in many cases, like the people in Manipur and Mizoram and Nagaland. And in that accidental symmetry, something remarkable happened: an entire generation of young people in India's forgotten northeast found themselves watching screens where the lead character — beautiful, desired, powerful — had their eyes.

> "In Korean dramas, the face that looks like mine is the one everyone falls in love with. That sounds simple. But if you have spent your whole life being told your face is wrong, it does not feel simple at all."

David Ralte, twenty-five, from Aizawl, Mizoram, began watching K-dramas at fourteen and now runs a small Korean-language tutoring group online. For him, the recognition was not sentimental — it was structural. A whole visual grammar of beauty, desire, and worth had been rearranged.

## Two outsiders, one wavelength

The identification runs deeper than appearance. There is, between Northeast India and South Korea, a set of emotional and historical resonances that no cultural diplomat planned but that young people on both sides seem to feel intuitively.

Korea knows what it means to be overlooked. Sandwiched between China and Japan — two civilisations that dominated East Asia for centuries — Korea spent much of its history being absorbed, invaded, or ignored. Its culture was suppressed under Japanese colonial rule. Its people were divided by a war that the rest of the world barely remembers. And yet South Korea rebuilt itself, and then did something more extraordinary: it made the whole world curious about what it had to say.

Northeast India knows a version of this story. A region of more than forty-five million people, home to over two hundred distinct ethnic groups and hundreds of languages, it has spent decades feeling peripheral to the Indian national narrative — geographically cut off, economically underdeveloped, and culturally invisible in the mainstream conversation.

And then Korean drama brought them stories about exactly this kind of experience: the underdog who refuses to disappear, the family that holds its culture fiercely against the pressure of a homogenising world, the young person who carries ancestral pride into a future that doesn't always make room for it.

> "When I watched Reply 1988, I cried so much. Not just because of the story — but because I recognised the feeling. The neighbourhood, the closeness, the way parents sacrifice without saying so. That is our life too. Exactly our life."

Lalnuntluangi, twenty, from Champhai, Mizoram.

## What K-pop said that no one else did

If Korean dramas offered recognition, K-pop offered something else: permission. Permission to take your looks seriously as something beautiful. Permission to be emotional in public — to cry, to long for something, to say "I am lonely" in a melody and not be ashamed of it.

BTS, in particular, became a kind of cultural scripture for a generation of Northeast Indian youth who felt alienated from both the Indian mainstream and the Western pop culture that dominated global youth identity. Their songs about self-doubt, mental health, the pressure to conform, and the courage to persist — delivered in Korean, a language these young people had no reason to know and yet learned anyway — resonated with an intensity that surprised even the fans themselves.

"I learned Korean because of BTS," admits Zothanmawii, nineteen, from Lunglei. "I wanted to understand every word without waiting for the translation. And then one day I realised I was thinking in Korean sometimes. I don't know how that happened. I just kept listening."

## The mirror holds

Hallyu did not come to Northeast India with a plan. No cultural ministry in Seoul calculated that the forgotten corner of South Asia's largest democracy might be its most fertile ground. No K-drama writer sat down to pen a story for a Mizo girl in Champhai or a Naga boy in Kohima.

And yet here they are — tens of thousands of young people across Manipur, Mizoram, Nagaland, Meghalaya, Assam, Tripura, Arunachal Pradesh, and Sikkim — who have built part of their identity around Korean culture not as an act of escapism, but as an act of self-discovery.

They did not find Korea because it was foreign. They found it because, in the most unexpected way, it felt familiar.

> "Korea showed me that being from a small place doesn't mean you have a small story. They came from nowhere that the world cared about — and then the whole world cared. I think about that a lot."

Mercy, speaking from Guwahati, where she is now in her second year of Korean studies and considering a language exchange programme in Seoul. She still has the cracked phone in a drawer somewhere. She has not thrown it away.
EOT
            ],

            // ── Article 2 ──────────────────────────────────────────────────────
            [
                'title'      => 'The Hangul Hour',
                'tag'        => 'LANGUAGE',
                'author'     => 'Priya Sharma',
                'sort_order' => 2,
                'excerpt'    => 'Inside the classrooms, Discord servers and YouTube rabbit holes where Northeast Indian students are falling in love with the Korean alphabet.',
                'content'    => <<<'EOT'
## The Hangul Hour

Inside the classrooms, Discord servers and YouTube rabbit holes where Northeast Indian students are falling in love with the Korean alphabet.

It takes most people about ninety minutes to learn Hangul.

That is the claim that Korean language teachers make to hesitant beginners — and, remarkably, it is almost always true. The Korean writing system, invented in 1443 under King Sejong the Great, is arguably the most logically designed alphabet in the world. It consists of twenty-four letters, grouped into syllabic blocks, constructed on geometric principles that mirror the shape of the mouth and throat as they produce each sound. A linguist once described it as "the only writing system in history designed with a philosophy."

For Lalhmingmawii Sailo, a twenty-year-old from Lunglei, Mizoram, the ninety minutes came on a Sunday afternoon in her third year of school, on a phone she had borrowed from her older sister to look up BTS lyrics.

"I thought I would just learn the alphabet so I could read the Korean letters on the screen," she says, laughing. "And then I looked up and it was evening and I had also somehow learned how to say hello, goodbye, thank you, I like you, and the chorus of Dynamite."

She paused.

"I was a little bit concerned about myself after that."

## A language without prejudice

There is something Lalhmingmawii says almost in passing that stays with me long after our conversation ends. She says: "Korean doesn't have a Hindi accent."

It takes a moment to unpack what she means. She means that in Korean, she is not identifiably from the Northeast. She is not tagged by the way she rolls her r's or softens her t's. She does not carry, in her Korean, the acoustic fingerprint that marks her as other in Hindi-language spaces.

In Korean, she is simply a learner. And then, as she progresses, she is simply a speaker.

This freedom — from the social hierarchies encoded in language — is one of the less-discussed reasons why Korean has taken hold among Northeast Indian youth with such remarkable speed. Learning English always came with awareness of accent, class, and geography. Learning Hindi came, for many Northeast Indians, with the weight of a fraught national relationship. Learning Korean came with none of that baggage.

> "When I speak Korean, nobody can tell where I am from in India. I am just speaking Korean. That is incredibly freeing. I did not expect to feel that."

Biakmawii Colney, twenty-two, from Champhai, who has been studying Korean for three years and recently passed the TOPIK Level 3 examination.

## The classroom, physical and digital

Korean language instruction in the Northeast has grown from almost nothing two decades ago to a small but thriving ecosystem of private institutes, university electives, NGO programmes, and, most significantly, the sprawling informal infrastructure of the internet.

In Dibrugarh, where DKC itself runs language sessions, the waiting list for beginner classes now extends several months. The demographic is not what the institutes expected: it skews younger than Chinese or French, and it draws in an equal number of men and women — unusual for language learning, which has historically attracted more women in the region.

On YouTube, channels like "Talk to Me in Korean" have hundreds of thousands of Indian subscribers, a significant portion of them from the Northeast. Discord servers run by fans in Shillong, Imphal, and Aizawl host hundreds of members practising vocabulary, sharing grammar notes, and quizzing each other on verb conjugation at midnight.

The informal learning community has become, in many ways, more effective than formal instruction. It operates without fees, without fixed schedules, and without the social pressure that can make classroom language learning intimidating. A student who makes a grammatical error in a Discord message corrects it and moves on. A student who makes one in class carries the embarrassment home.

## What grammar teaches about culture

Language teachers often say that to learn a language is to learn a worldview. Korean, perhaps more than most, makes this visible.

Korean is a language structured around social relationships. Every verb form shifts depending on who you are speaking to and how they rank in relation to you — in age, in position, in familiarity. There are seven formal speech levels in Korean, each with its own grammar, and navigating them correctly requires a constant awareness of who the other person is and what your relationship to them means.

For young people from Northeast Indian cultures that also encode deep respect for elders and complex systems of social rank, this aspect of Korean grammar does not feel foreign. It feels, if anything, more familiar than the relatively flat social grammar of English.

> "In English, I say 'you' to my grandmother and 'you' to my classmate. In Korean, those are completely different sentences. That felt right to me. That felt like how I actually think about people."

Cynthia Varte, nineteen, from Aizawl.

The discovery that Korean grammar encodes values they already hold — respect for elders, awareness of hierarchy, the importance of relationship — has made Korean feel to many Northeast Indian learners less like acquiring something foreign and more like finding a language that understands them.

## TOPIK and beyond

The Test of Proficiency in Korean — TOPIK — is administered globally and has become, in recent years, a marker of achievement and aspiration for a growing number of Northeast Indian young people. Passing TOPIK Level 4 or above opens doors to Korean university scholarships, the Korean government's Global Korea Scholarship programme, and employment at Korean companies operating in India.

But beyond its instrumental value, TOPIK has become something else: a proof of seriousness. In a region where Korean fandom can still attract mild condescension from parents and teachers who see it as a teenage phase, a TOPIK certificate is a rebuttal. It says: I was not just watching dramas. I was building something.

"My parents didn't understand why I was spending so much time on Korean," says Malsawmtluangi, twenty-one, from Serchhip, who passed TOPIK Level 2 last year. "When I showed them the certificate, my father looked at it for a long time and then he said, 'Okay. Now I understand.' That felt like something."

## Ninety minutes

King Sejong designed Hangul in the fifteenth century explicitly so that anyone could learn it — regardless of class, education, or background. His stated aim was literacy for all. The script he created was considered so radical, so democratising, that the elite scholars of the Joseon court opposed it. They feared a language ordinary people could access.

It is perhaps one of the more ironic historical footnotes that this democratising alphabet — designed for the common person, fought over by the powerful — has now become the entry point for tens of thousands of young people in one of India's most marginalised regions, who found in it not just a language but a door.

Ninety minutes to learn the alphabet. Years to love the language. A lifetime, perhaps, to understand what it opened.
EOT
            ],

            // ── Article 3 ──────────────────────────────────────────────────────
            [
                'title'      => 'Seoul Food, Dibrugarh Taste',
                'tag'        => 'FOOD',
                'author'     => 'Ankita Gogoi',
                'sort_order' => 3,
                'excerpt'    => 'In kitchens across the Northeast, students are cooking tteokbokki with local rice cakes, gochujang from online vendors, and a hunger for something that feels both familiar and entirely new.',
                'content'    => <<<'EOT'
## Seoul Food, Dibrugarh Taste

In kitchens across the Northeast, students are cooking tteokbokki with local rice cakes, gochujang from online vendors, and a hunger for something that feels both familiar and entirely new.

The first thing Jayashree Bora ordered online was a 200-gram jar of gochujang.

This was three years ago, when she was eighteen and living in a hostel in Dibrugarh, sharing a single-burner induction cooker with two roommates. She had spent weeks watching Korean cooking videos — Maangchi, mostly, the Korean-American YouTube chef whose measured, affectionate instructions had taken over her evenings — and had decided, with the particular confidence of someone who has never made anything fail in a kitchen, that she would make tteokbokki.

"I watched the video maybe seven times," she says. "I knew exactly what to do. And then I opened the jar of gochujang and I thought — this is it. This is the smell I have been waiting for without knowing I was waiting for it."

She pauses, reconsidering.

"It is a very fermented smell. I will say that. My roommate thought something had gone wrong somewhere."

Nothing had gone wrong. The tteokbokki, made with rice cakes she found at a local market and gochujang she had now begun ordering in bulk, was excellent. She made it again the following weekend. And the weekend after that. By the end of the semester, her recipe had acquired, as all good recipes do, the specific adjustments of its maker: more ginger, slightly less gochujang, a handful of mustard greens from a vendor outside the university gate.

"It is still tteokbokki," she says firmly. "But it is also mine."

## The fermentation connection

Food historians and anthropologists have long noted that cultures with similar climates, agricultural histories, and geographic constraints often develop strikingly similar culinary traditions — not because of contact, but because the same problems produce the same solutions.

The Northeast Indian tradition of fermented foods — axone (fermented soybeans) in Nagaland, tungrymbai in Meghalaya, hawaijar in Manipur, the dozens of fermented bamboo preparations across the region — is among the most sophisticated in South Asia. It developed over thousands of years as a response to the same challenge that Korean cuisine faced: how to preserve protein and vegetable nutrition through long winters and monsoon seasons, using only salt, time, and the microbiological wisdom of the jar.

Korean cuisine is built on fermentation. Kimchi — the fermented cabbage that has become Korean food's global calling card — is merely the most visible member of a vast family of jeotgal (fermented seafood), doenjang (fermented soybean paste), and ganjang (fermented soy sauce) that anchor Korean cooking. The same logic that produced axone in Nagaland produced doenjang in Korea. The same patience that watches a clay pot of tungrymbai through the weeks watches a kimchi jar through the winter.

This culinary kinship means that Northeast Indian palates, accustomed to deep umami, fermentation funk, and the complex sour-spicy flavour profiles of their own traditions, often take to Korean food with a ease that surprises people from mainland India.

> "The first time I had real kimchi, I thought — we have something like this at home. Not the same, but the same idea. The idea that time is an ingredient."

Bendang Walling, twenty-three, from Kohima, Nagaland, who now leads a weekly Korean cooking session at a community centre.

## What arrives and what adapts

The spread of Korean food culture in the Northeast has followed the same informal channels as Korean pop culture: YouTube, Instagram, drama-watching sessions where someone invariably asks "but what are they eating?" and sets off a chain of inquiry that ends, three weeks later, with someone's grandmother learning the word tteokgalbi.

But unlike Korean music or Korean drama, food requires physical ingredients — and Korean ingredients, until recently, were largely unavailable in the Northeast. The past five years have changed this radically. E-commerce has brought gochujang, doenjang, gim (roasted seaweed), and Korean instant noodles to towns and cities that have no Korean restaurant within three hundred kilometres.

The result has been a generation of home cooks working in a distinctly hybrid mode: Korean technique, Korean sauces, Korean flavour logic — applied to local proteins, local vegetables, and local rice varieties that, it turns out, work very well.

"I make kimchi with local mustard leaves," says Vanlalthangi, twenty, from Aizawl. "The Korean community online says this is called geotjeori and it is actually traditional. I was doing traditional Korean food by accident."

## The ramyeon friendship

There is a particular social ritual that has emerged across Northeast Indian university hostels and shared apartments over the past decade. It involves late nights, electric kettles, instant ramyeon, and conversations that go until the early hours.

Korean instant noodles — ramyeon, not ramen, the distinction mattering to those who eat them — have become the food of intellectual friendship in a way that few other shared meals have. They are cheap, endlessly customisable, available everywhere, and carry the cultural weight of all the Korean dramas in which characters have eaten them at critical emotional moments: after a breakup, during a study session, at the end of a long day.

"Ramyeon is when you tell someone something true," says Rhea Chakraborty, twenty-one, from Guwahati, with complete seriousness. "I don't know how this happened. It just became the food you eat when you are being honest with someone."

She is, I think, describing something that food anthropologists would recognise as the construction of a ritual: a meal that has been invested with emotional significance not by advertising but by accumulated experience, repeated until the food and the feeling become inseparable.

## Cooking as cultural translation

What is perhaps most striking about the Korean food movement in Northeast India is what it reveals about the nature of cultural exchange when it happens from the margins.

Northeast Indian youth are not receiving Korean food culture passively. They are translating it — combining it, adapting it, finding in Korean culinary tradition the vocabulary for things they already knew but had no words for. The encounter produces something new: food that is genuinely hybrid, made by people who are themselves hybrid, who carry multiple cultural inheritances and are not required to choose between them.

Jayashree Bora's tteokbokki — with its mustard greens and extra ginger and bulk-ordered gochujang — is not inauthentic Korean food. It is authentic Dibrugarh-Korean food, a cuisine that did not exist five years ago and now exists in the specific and irreproducible form of one person's Sunday kitchen.

This is how cultures actually travel. Not as intact packages delivered from one place to another, but as seeds that grow differently in different soils — taking the shape of the ground they find themselves in, becoming something new without stopping being themselves.

> "I am not trying to cook like I am in Seoul. I am cooking like someone in Dibrugarh who loves Korean food and has her grandmother's mustard in the fridge. Both of those things are true at the same time."

Jayashree Bora, now in her third year, still ordering gochujang in bulk, still refining the recipe that is hers and Korea's simultaneously.
EOT
            ],

            // ── Article 4 ──────────────────────────────────────────────────────
            [
                'title'      => 'Boys Don\'t Cry (But K-Pop Idols Do)',
                'tag'        => 'CULTURE',
                'author'     => 'Dev Hazarika',
                'sort_order' => 4,
                'excerpt'    => 'For young men in Northeast India who grew up being told that emotion was weakness, watching Korean male idols cry on stage was, quietly, a revolution.',
                'content'    => <<<'EOT'
## Boys Don't Cry (But K-Pop Idols Do)

For young men in Northeast India who grew up being told that emotion was weakness, watching Korean male idols cry on stage was, quietly, a revolution.

The first time Arjun Boro cried in front of another person — deliberately, willingly, not from pain or injury but from feeling — he was nineteen years old, in a small room in Jorhat, watching a BTS concert DVD with his university roommate.

The song was Spring Day. The lights were off. Jin was standing at the centre of the stage with tears running down his face, singing about grief and distance and the people you cannot get back, and Arjun felt something give way in his chest.

He did not tell his roommate for a long time. When he did, his roommate said: "I was crying too. I thought you would laugh."

Neither of them had cried in front of another person before. Both of them had grown up in households, schools, and communities where crying was something boys were taught, explicitly and repeatedly, not to do.

Neither of them laughed.

## The script and the revision

The script for masculine emotion in Northeast India — as in most of India, as in much of the world — is old and consistent: men provide, men protect, men endure. Men do not weep. Men do not speak of longing or sadness or the particular ache of feeling lost. If they feel these things — and of course they do — they feel them in private, or they do not feel them at all.

This script has costs that are well documented. Men in Northeast India, as everywhere, die by suicide at higher rates than women. They seek mental health care less. They report emotional difficulty later and with greater reluctance. The correlation between restrictive emotional norms for men and poor mental health outcomes has been established across cultures, and the Northeast is not an exception.

And then K-pop arrived.

K-pop idols — almost all of them male, the genre having built its global empire largely on male groups — are routinely, publicly emotional. They cry at award ceremonies. They write and perform songs about depression, about self-doubt, about the fear of failure, about missing their families. They discuss these songs in interviews with directness that would be remarkable in any cultural context and is extraordinary in the context of Asian masculinity's traditional reserve.

> "I had never seen a man my age cry in public before and be admired for it. I had never seen a man talk about feeling lonely and have thousands of people tell him they loved him more for saying it. That was genuinely new information for me."

Lalrinpuia Fanai, twenty-two, from Aizawl, who has followed K-pop since he was fifteen.

## What the idol offers

It is worth being precise about what K-pop male idols model, because it is not simply "emotionality" in the abstract. It is a specific, carefully constructed aesthetic of emotional expressiveness that coexists with — is in fact part of — a rigorous masculine identity.

K-pop idols train for years. They maintain extraordinary physical discipline. They perform demanding choreography. They are, in the language that Northeast Indian young men might recognise, relentlessly hardworking — the value of hard work being central to both Korean and many Northeast Indian cultural traditions.

And they cry. And they say they are struggling. And they do both of these things as the same person, without any apparent contradiction between the tears and the discipline.

This is the model that Arjun Boro and Lalrinpuia Fanai and tens of thousands of young men across the Northeast have encountered, and it is a more disruptive model than it might initially appear. It does not ask men to abandon strength. It suggests that strength and emotional expression are not opposites.

"I was not sure it was possible to be both," says Arjun, now twenty-three and in his final year of engineering. "I thought you had to pick one. You could be strong, or you could be emotional. K-pop showed me people who were both. I needed to see that."

## The friendship shift

Something has changed, quietly, in the friendships that young men in Northeast India form around K-pop. Shared fandoms have always produced community, but K-pop fandoms have produced a specific kind of community around the norms of emotional disclosure.

In fan groups — online and in person — young men discuss the content of song lyrics with a degree of emotional engagement that they report having nowhere else. They talk about which songs helped them through difficult periods. They share what it felt like to be in the concert hall when a particular song played. They admit that they cried.

These admissions happen in spaces marked as safe by the fandom's own culture, which normalises emotional language in a way that most other young male spaces — sports teams, study groups, friend groups built around gaming or drinking — do not.

> "In my regular friend group, if I said I was struggling with something, they wouldn't know what to do. In my BTS group chat, I can say anything. And someone will always say — I know. I felt that too."

Bendang Longkumer, twenty, from Dimapur, Nagaland.

## The bigger question

I want to be careful not to overstate what is happening. K-pop has not dismantled the emotional scripts that shape young men in Northeast India. Those scripts are old, deep, and reinforced by far more than what is on a screen. The boys who cry watching Spring Day still grow up in households where their fathers did not cry. They still move through institutions where masculine stoicism is modelled and rewarded.

But something is loosening. A permission is being granted, even if only in specific spaces and specific moments. And permissions, once given, have a way of expanding.

Arjun Boro tells me that the last time he cried — really cried, with someone present — was three months ago, when his grandfather died. He cried with his mother. He was not embarrassed. He is not sure he would have been able to do that five years ago.

He is not certain whether K-pop is responsible for this. He is certain that something changed, and that it started in a small room in Jorhat, in the dark, with a song about grief and the people you cannot get back.

> "Jin was crying on stage in front of fifty thousand people. That seemed brave. I thought — if he can do that, maybe I can cry in front of one person. That was not a big logical leap. But it was a leap I had not made before."
EOT
            ],

            // ── Article 5 ──────────────────────────────────────────────────────
            [
                'title'      => 'The Quiet Revolution: K-Beauty and the Northeast',
                'tag'        => 'BEAUTY',
                'author'     => 'Sneha Borah',
                'sort_order' => 5,
                'excerpt'    => 'For young women in Northeast India whose features were long dismissed as "too Asian," the K-beauty movement has become something far larger than a skincare routine.',
                'content'    => <<<'EOT'
## The Quiet Revolution: K-Beauty and the Northeast

For young women in Northeast India whose features were long dismissed as "too Asian," the K-beauty movement has become something far larger than a skincare routine.

In 2018, Lianthangi Pachuau bought her first Korean sheet mask from a beauty store in Aizawl that had recently begun stocking a small selection of imported skincare. She was sixteen. She had saved for two weeks from her pocket money. The mask cost ninety rupees, which felt extravagant.

She did not buy it because of the ingredients or the hydration or the twelve-step routine she had been watching on YouTube. She bought it because she had seen, in a Korean beauty advertisement, a woman who looked like her — who had her eyes, her cheekbones, her complexion — and who was being described, in the language of advertising, as beautiful.

"Not 'beautiful for a Northeast Indian girl,'" she says carefully. "Not beautiful 'despite' my features. Just beautiful. Like there was no asterisk."

She folded the sheet mask out of its packet, applied it, sat for fifteen minutes, and cried a little. She was not entirely sure why.

She is now twenty-four and works as a makeup artist in Aizawl. She thinks she knows why.

## The standard and the cost

The Indian beauty standard, as disseminated through mainstream Bollywood cinema, advertising, and fashion media, has for decades centred on features that Northeast Indian women do not typically have: darker eyes, lighter skin (though this has its own complex hierarchy), sharper noses, fuller lips, and a facial structure associated with Indo-Aryan heritage.

Northeast Indian women have been measured against this standard for as long as the standard has existed, and found wanting — not by their own communities, where local beauty traditions have their own logic and their own ideals, but by the national media environment in which they exist as citizens.

The psychic cost of this is difficult to quantify and easy to underestimate. A girl who grows up being told that the face she was born with is not the right kind of face does not only learn a beauty lesson. She learns something about belonging, about whether the national story has a place for her, about what kinds of people are considered desirable enough to put on screens.

K-beauty arrived and began, quietly, to rewrite this.

## Glass skin and epicanthic folds

The Korean beauty ideal — clean, hydrated skin; soft, gradient makeup; the famous "glass skin" effect of light reflecting off a well-maintained complexion — is built around, rather than against, the features common to East and Southeast Asian faces.

Glass skin looks best on complexions with the particular quality of light-diffusion associated with East Asian skin types. The soft, cushion-coverage makeup styles central to K-beauty are designed for the face structures common to Korean women — structures that are, in many cases, structurally similar to Northeast Indian faces.

This is not accidental. Korean beauty brands developed their products for their primary market. But the effect in Northeast India has been significant: for the first time, a global beauty system was producing products optimised for faces like theirs.

> "In Indian makeup tutorials, when they contour, they are always trying to make the face look different — sharper, longer, more defined. In Korean tutorials, they enhance what is there. I have been enhancing what is there my whole life. I just didn't have the vocabulary for it."

Neithoviu Rhakho, twenty-two, from Kohima, who runs a beauty tutorial Instagram account with thirty thousand followers.

## The twelve-step routine as philosophy

The K-beauty skincare routine — which, at its most elaborate, involves twelve distinct steps applied in a precise sequence — has attracted both admiration and gentle mockery in the global press. It is elaborate. It is expensive if done with branded products. It requires patience and consistency.

But among the young women in Northeast India who have adopted it (or versions of it, since very few complete all twelve steps every day), it has acquired a significance beyond its dermatological effects. It is, for many of them, a daily act of deliberate self-regard.

The routine says: your face is worth attending to. Your skin deserves time and consideration. The daily ritual of cleansing, toning, essence, serum, and moisturiser is an investment in yourself that is made not for anyone else — not to attract a partner or please an employer — but because you have decided your face is worth the attention.

For young women who grew up absorbing the message that their faces were the wrong kind of face, this daily reorientation is not trivial.

"I started the routine because I wanted clear skin," says Vanlalhlimpuii Lalhlimpuii, nineteen, from Lunglei. "I kept doing it because it makes me feel like I matter to myself. I know that sounds strange for a skincare routine. But that's what it does."

## Beyond the product

What distinguishes K-beauty's impact in Northeast India from a simple consumer trend is the way it has been refracted through the specific cultural context in which it arrived.

The young women who follow K-beauty tutorials are not passively receiving a beauty standard from Korea. They are making active, conscious connections between what they see in Korean beauty content and what they know from their own traditions. Many are noting, for example, that Northeast Indian beauty traditions — the use of turmeric, fermented ingredients, plant-based oils — have significant overlap with K-beauty's emphasis on gentle, natural-ingredient skincare. The encounter produces synthesis rather than replacement.

Lianthangi Pachuau, now a working makeup artist, has developed a practice she describes as "Northeast-Korean": the layering and skin-preparation techniques of K-beauty applied with local ingredients and adjusted for the specific needs of skin in Mizoram's climate. She teaches workshops. Her waiting list is long.

"What I learned from K-beauty is the principle," she says. "Respect your skin. Work with your features rather than against them. Be patient. Those ideas are mine now. I will keep them whether or not Korean sheet masks are available."

The sheet mask that cost ninety rupees is long gone. The permission it granted has not expired.

## The asterisk

Lianthangi used a specific phrase earlier in our conversation that I keep returning to: she said that the Korean beauty advertisement showed a woman who looked like her being described as beautiful — "just beautiful, with no asterisk."

The asterisk is what she is talking about when she talks about growing up. The qualification. The exception. The beautiful-for. The implication that the standard, the real standard, the one that actually matters, is somewhere else, and she has been granted a provisional pass to sit near it.

K-beauty, arriving in Aizawl in 2018 in a ninety-rupee sheet mask, did not eliminate the asterisk entirely. The asterisk is structural and old and will take more than a skincare trend to remove.

But it loosened it. And loosening something that has been fixed for a long time — even a little, even temporarily, even just enough for a sixteen-year-old to look in the mirror and feel, for a moment, no asterisk at all — is not nothing.

It is, in its quiet way, a revolution.
EOT
            ],

            // ── Article 6 ──────────────────────────────────────────────────────
            [
                'title'      => 'What Squid Game Said',
                'tag'        => 'FILM',
                'author'     => 'Rohan Das',
                'sort_order' => 6,
                'excerpt'    => 'Korean cinema found its most unexpected audience in Northeast India — where its stories of precarity, survival and a rigged system resonated with an intimacy that surprised everyone, including the viewers themselves.',
                'content'    => <<<'EOT'
## What Squid Game Said

Korean cinema found its most unexpected audience in Northeast India — where its stories of precarity, survival and a rigged system resonated with an intimacy that surprised everyone, including the viewers themselves.

On a Thursday evening in September 2021, Moimoi Gogoi watched the first episode of Squid Game on her phone in her family's two-room house in a village outside Jorhat. She had not heard of it before. A classmate had sent her the link. She watched for three hours, standing, then sitting, then lying on the floor, unable to find a comfortable position for the discomfort she felt.

"It was like watching something I already knew," she says. "The people in the game — their debt, their desperation, the way the system had already made the choice for them before the game even started. I thought — I know this. I grew up watching people in this situation."

She is twenty-three now, finishing a master's degree in English literature at Dibrugarh University. She has since watched Squid Game twice more, and written a paper about it that her professor described as "the most unexpectedly personal analysis of Korean popular culture I have encountered from an Indian student."

She is not surprised that it was personal.

## The Korean cinematic moment

South Korean cinema and television have spent the past decade producing a body of work that is, by any measure, extraordinary. Bong Joon-ho's Parasite won the Palme d'Or and then the Academy Award for Best Picture, becoming the first non-English-language film to do so. Squid Game became the most-watched programme in Netflix history. The films of Park Chan-wook, Lee Chang-dong, and Yeon Sang-ho have gathered awards and audiences across the world.

The critical consensus holds that Korean cinema's ascendance is the result of craft, ambition, and the Korean film industry's distinctive combination of genre discipline and social seriousness. All of this is true.

But among the young people of Northeast India who have consumed Korean cinema with the intensity of a generation finding its cultural mirror, there is another explanation for the resonance — one that is about content rather than craft, about what the films are saying rather than how beautifully they say it.

Korean cinema, almost uniquely among the major cinematic traditions currently producing globally popular work, is obsessed with class. With what economic precarity does to human relationships. With the way a system can appear meritocratic while being structurally rigged. With the question of what people do — what they become — when survival and dignity are placed in direct conflict.

These are not abstract themes for young people in Northeast India.

## The precarity geography

The Northeast is one of the most economically complex regions of India. It contains some of the country's highest rates of educated unemployment — young people with degrees who cannot find work that matches their qualifications. It contains communities with deep traditions of entrepreneurship and enormous obstacles to capital. It is a region where migration — to Delhi, to Bengaluru, to farther cities in search of economic opportunity — is so common that it has shaped the culture of departure and return.

The young people watching Korean cinema in this context bring to it a specific literacy. When the characters in Parasite execute an elaborate scheme to penetrate a wealthy household because it is the only available vector to economic stability, these viewers do not watch it as satire. They watch it as documentation.

> "Parasite is not a dark story to me. It is a Tuesday. The basement, the planning, the way you have to perform yourself as a different person to get access to what you need. I have done a smaller version of that. My family has done a smaller version of that. Everyone I know has."

Thoibi Meitei, twenty-four, from Imphal, who watched Parasite three times in the same week it became available to her and is now writing a comparative study of Korean and Manipuri cinema.

## What Squid Game actually said

Squid Game's premise — that people in desperate debt can be lured into lethal children's games by the promise of a life-changing sum of money — struck many Western reviewers as a darkly satirical metaphor. A clever exaggeration of capitalism's violence.

For Moimoi Gogoi and many viewers like her, it did not read as exaggeration.

"The show is not really about the game," she says. "It is about what the debt did to those people before the game. How they got to the point where the game was a reasonable option. That part — the debt, the shame, the feeling that the legitimate path was closed — that is not metaphor. That is how it actually works."

The character of Seong Gi-hun, the protagonist — charming, feckless, perpetually failing, deeply loving, caught in cycles of obligation he cannot meet — resonated in ways that surprised viewers who expected to identify with him as a cultural outsider.

"He is not like anyone in my family," says one viewer from Dibrugarh, who asked to remain unnamed. "But he is also exactly like everyone in my family. The trying. The failing. The loving the people you are failing. That is not Korean. That is just human. But Korean cinema showed it to me so clearly I had to sit down."

## The slow cinema and the fast feeling

Not all resonant Korean cinema is as visceral as Squid Game or Parasite. Among the community of viewers in the Northeast, the films of Lee Chang-dong — Oasis, Poetry, Burning — have attracted a quieter but equally devoted following.

Lee's films are slow, observational, and preoccupied with characters who exist at the margins of Korean society: the disabled, the elderly, the poor, the artistically inclined in a culture that rewards only practical ambition. They resist easy emotional payoff. They end in ambiguity.

They have found, in Northeast India, an audience that responds to them with a depth of engagement that the films' relatively modest global profile might not predict.

> "Burning is the loneliest film I have ever watched. It is about what happens when you are invisible to the people who have everything and you have nothing. I watched it and I thought — he made this film for me. Obviously he didn't. But I felt it."

Lalremsiami Khawlhring, twenty-one, from Champhai.

## The question the films keep asking

There is a question that runs through Korean cinema's most significant recent work, beneath the genre plots and the social satire: what do you owe a system that does not acknowledge you?

It is the question Parasite's Kim family asks, slowly and then suddenly. It is the question Squid Game's desperate contestants ask in the most literal possible way. It is the question Burning's invisible protagonist asks in the film's smouldering final sequence.

It is, for young people in Northeast India — educated, ambitious, facing a labour market that has not fully made room for them, navigating a national identity in which they are citizens but rarely protagonists — not an abstract question. It is the question of their own lives, asked in Korean, by people eight thousand kilometres away who somehow already knew the answer they were reaching for.

Moimoi Gogoi has moved on from Squid Game. She is working on her thesis. She is hoping for a lectureship. She has no debt she cannot manage.

She rewatched the first episode recently, just to check whether it had changed.

"It hadn't," she says. "That is either very depressing or very useful. I have not decided which."

She is, I think, still deciding. She is twenty-three. She has time.
EOT
            ],

        ];

        foreach ($articles as $article) {
            DB::table('magazine_articles')->insert([
                'magazine_issue_id' => $issueId,
                'title'             => $article['title'],
                'tag'               => $article['tag'],
                'author'            => $article['author'],
                'sort_order'        => $article['sort_order'],
                'excerpt'           => $article['excerpt'],
                'content'           => $article['content'],
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }

        $this->command->info('Han Magazine Vol. IV seeded: 1 issue + ' . count($articles) . ' articles.');
    }
}
