<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InYeonMagazineSeeder extends Seeder
{
    public function run(): void
    {
        // Remove existing if re-running
        $existing = DB::table('magazine_issues')->where('slug', 'in-yeon-vol-1')->first();
        if ($existing) {
            DB::table('magazine_articles')->where('magazine_issue_id', $existing->id)->delete();
            DB::table('magazine_issues')->where('id', $existing->id)->delete();
        }

        $issueId = DB::table('magazine_issues')->insertGetId([
            'slug'         => 'in-yeon-vol-1',
            'title'        => '인연 — Vol. I',
            'issue_label'  => 'Our First Issue · Connections',
            'year'         => 2025,
            'month'        => 'August',
            'cover_color'  => '#8B1E24',
            'cover_accent' => '#FAF3ED',
            'tagline'      => '인연 (In-yeon) — the Korean word for a connection fated to happen.',
            'description'  => 'Our inaugural issue explores the Korean Wave and its deep roots in Northeast India — through culture, food, music, personal journeys, and the bonds that form when two distant worlds discover how much they share.',
            'is_featured'  => false,
            'page_count'   => 64,
            'sort_order'   => 10,
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        $articles = [

            // ── Article 1 ─────────────────────────────────────────────────────
            [
                'title'      => 'When Hallyu Came Home',
                'tag'        => 'HALLYU SPECIAL',
                'author'     => 'Editorial Team, DKC',
                'sort_order' => 1,
                'excerpt'    => 'How Korean popular culture became part of Northeast India — and why a generation chose to go beyond fandom.',
                'content'    => <<<'EOT'
## When Hallyu Came Home

*How Korean popular culture became part of Northeast India and why a generation chose to go beyond fandom.*

It may begin with a song.

A Korean drama playing late at night. A dance cover rehearsed with friends. A familiar face appearing on a phone screen. A few Korean words repeated without quite knowing what they mean.

Then, almost quietly, something changes.

The subtitles are no longer enough.

A viewer wants to know what the characters are actually saying. A song lyric that once sounded beautiful but unfamiliar begins to look like something worth understanding. The name of a favourite artist becomes a reason to learn Hangul. A K-drama becomes an introduction to Korean food, history, customs and language.

For many young people across Northeast India, this journey is no longer unusual.

Hallyu — the Korean Wave — has travelled far beyond Seoul. It has entered bedrooms, classrooms, university campuses, dance studios, social-media feeds and cultural communities across the Northeast. And while K-pop and K-dramas may have opened the door, an increasingly visible number of young people are choosing to walk through it.

They are not only consuming Korean culture. They are learning it. And, in some cases, they are building bridges with Korea in the process.

---

### The Northeast and the Korean Wave

The relationship between Korean popular culture and Northeast India did not begin with BTS, BLACKPINK or Netflix. Its roots go back much further.

Research on Hallyu in Northeast India has documented the region's early and particularly strong engagement with Korean films, dramas, fashion and popular culture. A 2017 academic study by Athikho Kaisii described Korean popular culture as generating considerable interest among young people in the Northeast and examined the way Korean culture was being received and adapted in the region.

Long before today's streaming platforms made Korean entertainment instantly accessible, television and physical media were important gateways. In 2006, Korean dramas such as *A Jewel in the Palace* and *Emperor of the Sea* reached Indian audiences through television. In parts of the Northeast, however, Korean entertainment had already begun developing a particularly strong following.

Manipur became one of the most frequently discussed examples. An Indian Express feature on the growth of K-pop in the Northeast reported that Manipur's engagement with Korean popular culture stretched back many years, with young people embracing Korean music, films and television.

By the time K-pop became a worldwide phenomenon, parts of Northeast India were not meeting the Korean Wave for the first time. They were already riding it.

---

### Why the Northeast?

There is no single explanation for why Korean culture found such an enthusiastic audience in the region.

Geography is one factor. Northeast India sits at a cultural crossroads connecting South Asia with Southeast and East Asia. Historically, the region has maintained connections across borders, and its communities have long interacted with diverse cultural influences.

But geography alone cannot explain the depth of the fascination.

There is also recognition.

For many young Northeasterners, Korean faces, fashion, music videos and visual culture can sometimes feel less culturally distant than Western pop culture. That sense of familiarity does not mean Korean and Northeastern cultures are the same — they are not. But it can make the first encounter feel less foreign.

---

### From Television to Telephone Screens

The first generation of Hallyu fans in the Northeast discovered Korean culture through television broadcasts, DVDs and word of mouth. Today's generation has an entirely different relationship with access.

A smartphone can open the door to Korean music, drama, films, interviews, dance, food, fashion and language within seconds. A student in Dibrugarh can watch a new K-pop release almost simultaneously with someone in Seoul. A learner in Imphal can practise Korean pronunciation using an online video. A dance group in Aizawl can learn choreography from a music video.

And that matters because Hallyu is not simply something people watch anymore. It is something people participate in.

Fans create edits, learn dances, translate lyrics, organise events, discuss dramas, practise Korean phrases and form communities around shared interests.

> *Consumption becomes participation. Participation becomes curiosity. And curiosity can become education.*

---

### Hangul: The Second Door

The Korean writing system adds another dimension to Hallyu because it gives fans a practical way to move beyond passive consumption.

Hangul was created during the reign of King Sejong in the fifteenth century. Its creation was announced in 1443, and the principles of the writing system were published in 1446 in *Hunminjeongeum*.

For today's learners, however, Hangul is not history alone. It is the alphabet on their notebooks. It is the writing they practise after class. It is the script they use when writing Korean names. It is the language of songs they once knew only through romanised lyrics.

The fan who once searched for translations begins searching for grammar. The person who memorised a chorus begins reading the lyrics. And slowly, Korean stops being merely the language of entertainment. It becomes a subject worth studying in its own right.

---

### The Classrooms Behind the Fandom

Across the Northeast, this transition from fandom to formal learning is increasingly visible.

Manipur University introduced formal Korean-language education in 2012, beginning with a one-year certificate course. The programme subsequently expanded into more advanced and integrated forms of Korean-language education. In 2023, the Korean Embassy noted Manipur University's importance as a centre of Korean studies in Northeast India.

In Assam, Dibrugarh University began promoting Korean studies through a certificate course in Korean language in collaboration with partner organisations. In August 2025, the university's Office of International Affairs and Korean-language students inaugurated a Korean Language Wall Magazine — creating a campus platform for Korean-language writing, artwork and literary expression.

The Korean Wave is producing learners. And learners can become something more than audiences. They can become translators, teachers, researchers, cultural organisers, creators, travellers and cultural ambassadors.

---

### A Bridge Between Northeast India and Korea

The growing interest in Korean culture has also created opportunities for direct interaction between Koreans and people from the Northeast.

Korean visitors arriving at universities or cultural events increasingly encounter students who already know Korean songs, dramas and basic expressions. For Northeastern students, contact with Korean visitors can turn something previously experienced through a screen into a real conversation.

That connection is one reason Korean clubs, language programmes, cultural organisations and university initiatives matter. They provide spaces where curiosity can become conversation. And conversation can become friendship.

---

### From Fandom to Understanding

The story of Hallyu is often told through numbers. Millions of streams. Millions of followers. Chart positions. Concerts. Television ratings.

But numbers cannot fully explain why someone decides to learn another language. They cannot explain the satisfaction of reading Hangul for the first time. They cannot explain why a student joins a Korean class after watching a drama. They cannot explain why a group of university students decides to create a cultural club.

Those moments are quieter. But they may be more important.

> *The Korean Wave may have arrived through screens. But it is increasingly moving through classrooms, campuses and communities.*

The subtitle was only the beginning. The song was only the beginning. The drama was only the beginning.

Because somewhere between watching a Korean series and learning to read its language, something changes.

The audience becomes a learner. The learner becomes a participant. The participant becomes part of a community. And the community becomes a bridge.

A Korean word may be the first thing they learn. But cultural understanding is the language they are ultimately trying to speak.

And that is where the Korean Wave becomes something more than a wave. It becomes a connection.
EOT,
            ],

            // ── Article 2 ─────────────────────────────────────────────────────
            [
                'title'      => 'How K-pop Captured the Hearts of Northeast India',
                'tag'        => 'K-POP',
                'author'     => 'DKC Contributors',
                'sort_order' => 2,
                'excerpt'    => 'From BTS to BLACKPINK — how Korean music became the soundtrack of a generation across eight northeastern states.',
                'content'    => <<<'EOT'
## How K-pop Captured the Hearts of Northeast India

Over the past two decades, K-pop has transformed from a South Korean music genre into a global cultural phenomenon. In India, its influence is especially strong in the Northeast, where Korean music, dramas, fashion, beauty trends, and language have become increasingly popular among young people. What started as a simple interest in entertainment has evolved into a cultural movement that shapes the lifestyles and aspirations of many youths across the region.

Today, the Korean Wave — also known as Hallyu — extends beyond music. Korean dramas such as *Crash Landing on You*, *Goblin*, and *Descendants of the Sun* have gained a large audience in India. Korean fashion, skincare products, food, and language learning have also become popular. However, K-pop remains the most influential aspect of Korean culture among the youth.

---

### The Rise of K-pop in Northeast India

Northeast India embraced Korean popular culture much earlier than many other parts of the country. Through television, the internet, and social media platforms such as YouTube and Instagram, young people in the region were introduced to Korean entertainment and quickly became fascinated by it.

Popular K-pop groups such as **BTS, BLACKPINK, EXO, TWICE,** and **SEVENTEEN** have gained massive fan followings in the region. Songs like BTS's *Dynamite* and *Butter*, BLACKPINK's *How You Like That*, PSY's *Gangnam Style*, and SEVENTEEN's *Super* are widely enjoyed by fans. These songs are often performed during school functions, college festivals, and dance competitions.

---

### Influence on Youth and Lifestyle

K-pop has had a significant influence on the lifestyle of young people in Northeast India. Korean-inspired fashion, hairstyles, skincare routines, and makeup trends have become increasingly popular. Many young fans admire the creativity, discipline, and confidence displayed by K-pop artists.

The influence of K-pop has also encouraged many students to learn the Korean language. Some wish to understand song lyrics and dramas without subtitles, while others hope to study or work in South Korea in the future. This growing interest has strengthened cultural exchange between India and South Korea.

---

### K-pop Events and Fan Communities

One of the most remarkable aspects of K-pop's popularity in Northeast India is the strong sense of community it creates. Fans connect through social media platforms, fan clubs, and online communities where they share their interests and support their favorite artists.

Several states — including *Assam, Manipur, Mizoram,* and *Nagaland* — regularly host K-pop-related events such as dance cover competitions, singing contests, and cultural festivals. These events provide young people with opportunities to showcase their talents while celebrating Korean culture.

One of the most notable events is the K-pop India Contest, organized with the support of the Korean Cultural Centre India (KCCI). Every year, talented participants from different parts of the country compete in singing and dance categories. Contestants from Northeast India have consistently performed well and gained recognition for their outstanding performances.

---

### Cultural Exchange and New Opportunities

The spread of K-pop has created new educational and professional opportunities. Many young people have started learning Korean, while others create dance covers, reaction videos, and cultural content for social media platforms. These activities help develop creativity, communication skills, and confidence.

More importantly, K-pop has encouraged cultural exchange. While learning about Korean traditions, values, and customs, young people in Northeast India continue to celebrate and preserve their own cultural heritage. This exchange promotes mutual understanding and appreciation between different cultures.

Despite its many positive effects, the growing influence of K-pop has also raised some concerns. Some critics argue that excessive interest in foreign entertainment may reduce attention toward local languages and traditions. Others believe that the beauty standards often portrayed in the entertainment industry can create unrealistic expectations among young people.

However, most fans view K-pop as a source of inspiration rather than a replacement for their own culture. Many successfully balance their admiration for Korean culture with pride in their local identity and traditions.

K-pop has had a profound impact on Northeast India, influencing fashion, language learning, entertainment, and cultural awareness. Through music, dance, fan communities, and cultural events, it has created a sense of belonging among young people and connected them to a global cultural community.

> *The popularity of K-pop in Northeast India is not merely a trend but a reflection of the region's openness to cultural exchange and new ideas.*

As the Korean Wave continues to expand, its influence on Northeast India is likely to remain strong for many years to come.
EOT,
            ],

            // ── Article 3 ─────────────────────────────────────────────────────
            [
                'title'      => 'Hallyu and the Northeast: Moving the Centre',
                'tag'        => 'PERSONAL ESSAY',
                'author'     => 'DKC Contributor',
                'sort_order' => 3,
                'excerpt'    => 'A personal account of arriving late to the Korean Wave — and finding that it had been waiting in the Northeast all along.',
                'content'    => <<<'EOT'
## Hallyu and the Northeast: Moving the Centre

My first encounter with Korean pop culture came second-hand, almost two decades ago. I was doing my master's in English literature then and was vaguely aware that the Hindi film industry was remaking Korean movies, often without permission. My best friend and I ended up watching a truly terrible film that was apparently a poor remake of *My Sassy Girl*. Almost twenty years later, I still remember us groaning and saying, "This should've been a couple of funny ads, at best."

A year or so later, around 2010, some friends told me about a new Korean restaurant near Indra Vihar. The food, they insisted, was excellent and surprisingly affordable. I vividly remember the floor seating and the generous portions of delicious ramen and bibimbap that made the extra forty rupees for the rickshaw ride well worth it.

---

### Dibrugarh and a Hard Drive Full of Korean Films

Around the same time, one of my cousins enrolled in the integrated BA LLB programme at Dibrugarh University. Hostel life turned her into a devoted fan of Korean cinema, as students routinely shared pirated films and television shows on external hard drives. So although she raved about how well-made Korean films were, I never bothered exploring the contents of her hard drive.

Another cousin, much younger than me, was already an avid K-pop fan while she was still in school in Guwahati. When PSY's *Gangnam Style* went viral in 2012 and the rest of the world discovered K-pop through the horse-riding dance, these kids had already been hardcore fans for years.

Around the same time, I remember reading a newspaper article arguing that Manipur was India's gateway to Korean popular culture. Manipuri insurgent groups had imposed a strict ban on Hindi-language entertainment from mainland India. While much of the country consumed increasingly melodramatic soap operas from the Ekta Kapoor stable, Manipur looked east instead. Rather than Hindi serials, audiences embraced Korean dramas, Korean cinema, and K-pop.

Whether it was my cousin studying law in Dibrugarh or the one still in school in Guwahati, young people across Assam — and indeed much of the Northeast — were already familiar with Korean culture long before many of us living in Delhi and other metropolitan cities had even heard of it.

---

### The Question of Identity

Ironically, only a few years later, the Hindi film industry decided to make a biopic about one of Manipur's greatest living athletes, Olympic bronze medallist boxer Mary Kom. True to mainland India's long tradition of erasing marginal identities, the filmmakers cast Priyanka Chopra rather than a Manipuri actress.

I was one of many people who found this appalling, and I wrote an essay about it that went semi-viral. Looking back at that piece — and another essay I wrote about beauty standards — I can see that my anger was entirely justified. I was writing about a long history of erasure that simultaneously exoticised and sexualised conventionally attractive North Eastern women while emasculating North Eastern men.

Yet despite recognising these patterns, I was still reluctant to move beyond my deeply Anglo-centric and mainland Indian cultural diet. Postcolonial theory had taught me to critique institutional racism, but I was not yet prepared to engage seriously with popular culture produced outside the hegemonic cultures that dominated my imagination.

---

### A Tragedy in Lajpat Nagar

In 2014, I was living in Lajpat Nagar III in Delhi. One afternoon, I walked to Central Market and was struck by how eerily empty it seemed. When I got home and opened Twitter, I learned why. A young Arunachali man named Nido Tania had been brutally assaulted by shopkeepers in Central Market. His crime? A K-pop-inspired hairstyle. They mocked his appearance, and when he protested, they beat him so severely that he later died of his injuries.

I remember feeling numb with shock that bystanders had watched a young man being beaten almost to death and done nothing because his "foreign" appearance had already rendered him unworthy of empathy.

---

### Finally, the Korean Wave

In 2016, my younger cousin — the K-pop fan — won second prize in the 4th Korea–India Friendship Essay Competition organised by the Korean Cultural Centre India and earned a sponsored trip to South Korea. Our entire family was immensely proud of her achievement.

It wasn't until 2020, during the first wave of the pandemic, when I found myself stuck at home and unable to work, that I finally watched my first Korean drama.

I still tell people that *Crash Landing on You* is the gateway drug to K-dramas. But it wasn't merely the familiar romantic premise that captivated me. It was the carefully written characters; the way every storyline had a satisfying beginning, middle, and end; and the consistently excellent performances. There were no artificial cliffhangers designed simply to set up another season. The romance unfolded gradually. Characters were allowed to yearn.

> *Perhaps most importantly, there was the simple joy of seeing people who looked like my family, my friends, and me — not relegated to bit parts or racial stereotypes, but depicted as complex, ordinary human beings living full lives.*

*Crash Landing on You* was followed by *Reply 1988*, which I adored, and *Romance Is a Bonus Book*, a delight for any reader. Then I discovered sageuks, and there was no turning back. As an Ahom from a culture with its own rich tradition of historical chronicles — the Buranjis — I was fascinated by *Rookie Historian Goo Hae-ryung* and its fictional portrayal of female court historians recording *The Veritable Records of the Joseon Dynasty*.

I also marvelled at the many things Joseon shared with my own culture — ancestor worship, silkworm rearing, and vessels that looked as though they were made of bell metal. I once paused a sageuk on Viki to comment on the silkworm rearing, only to discover that another Assamese viewer had already commented on how much it resembled eri and muga polu rearing in Assam.

---

### Moving the Centre

Hallyu did not enter India neatly through the usual cultural centres before trickling down to the periphery. In much of the Northeast, it arrived early, travelled through informal networks, and was embraced by young people long before it became fashionable in Delhi, Mumbai, or other mainland cities.

That history matters because the Northeast has long occupied an uneasy position in India's cultural imagination. The same features that made Northeastern people vulnerable to racial abuse — their appearance, their proximity to East and Southeast Asia, their perceived "foreignness" — also made Korean culture feel unexpectedly familiar. Hallyu offered young people in the region something more than another form of entertainment. It provided a cultural reference point that was neither wholly Western nor rooted in the dominant cultural traditions of mainland India.

In retrospect, perhaps that is what Hallyu gave me that postcolonial theory alone could not: not another argument about the centre and the periphery, but the experience of *moving* the centre.

I had spent years learning to critique the centre without realising how thoroughly I had internalised its centrality. Hallyu did not resolve that contradiction for me, but it helped me live with it differently. It taught me that decentring hegemonic cultures is not only an intellectual exercise. It can also mean changing what we watch for pleasure, whose stories we consider worth knowing, and where we allow ourselves to find beauty, history, humour, romance, and ordinary human experience.

Unlike my younger cousins, I took my time getting there. Perhaps I needed to. By the time I finally fell in love with Korean popular culture, I had begun to understand that coming home does not always mean looking inward. Sometimes it means looking elsewhere long enough to realise how much of yourself you had been taught not to see.
EOT,
            ],

            // ── Article 4 ─────────────────────────────────────────────────────
            [
                'title'      => 'From Television Screens to Cultural Bonds',
                'tag'        => 'CULTURE',
                'author'     => 'DKC Research Desk',
                'sort_order' => 4,
                'excerpt'    => 'The story of how Hallyu travelled from pirated DVDs in Manipur to Korean language courses at Dibrugarh University.',
                'content'    => <<<'EOT'
## From Television Screens to Cultural Bonds

*The Story of Hallyu in Northeast India*

Northeast India is widely recognized for its remarkable cultural diversity, distinct traditions, vibrant communities, and layered historical experiences. The region's long-standing connections with South and Southeast Asia further enrich its cultural fabric. Comprising eight states, it is one of the most linguistically diverse areas in the world. This history of interaction and exchange has fostered an openness to external influences and cross-cultural connections, significantly shaping its evolving social and cultural landscape.

Among various global cultural influences, South Korean popular culture has made a particularly strong impact. What began in the early 2000s with the circulation of Korean television dramas gradually expanded into a broader fascination with Korean fashion, beauty, cuisine, music, and language. Over time, the Korean Wave, or Hallyu, has emerged as a powerful cultural force across Northeast India.

---

### The Early Years: Pirated DVDs and Shared Hard Drives

In its initial phase during the early 2000s, the phenomenon gained momentum primarily in states such as Manipur and Mizoram before spreading to Nagaland, Arunachal Pradesh, Meghalaya, and Assam.

A key factor behind this early adoption was the political ban imposed on Hindi satellite channels and Bollywood films in Manipur and Mizoram, intended to resist cultural integration with mainland India. This created an entertainment vacuum, which young people filled by turning to pirated DVDs and smuggled cassettes of South Korean dramas and films, often sourced through neighboring Myanmar.

In this process, media consumption gradually became a shared cultural experience, fostering early forms of connection with Korean narratives and aesthetics. Subsequently, local cable networks in cities like Imphal (Manipur) and Aizawl (Mizoram) began broadcasting Korean channels such as Arirang TV, KBS World, and Zonet TV, further accelerating the spread of Korean content.

In contrast, states like Nagaland, Arunachal Pradesh, Meghalaya, and Assam encountered Korean culture more organically. In urban centres like Shillong (Meghalaya) and Itanagar (Arunachal Pradesh), grey markets, music stalls, and video rental shops became key sites for accessing Korean media. These materials often entered through transit hubs like Moreh in Manipur and quickly spread to markets in cities such as Dimapur and Kohima.

---

### Manipur, Assam and the Distribution Networks

Manipur thus emerged as a primary gateway for the spread of Hallyu in Northeast India, while Assam functioned as a central hub for duplication and distribution. In cities like Guwahati, technological infrastructure such as high-speed CD burning drives enabled large-scale reproduction of pirated media, which was then circulated across the region.

Educational institutions also played a crucial role: hostels at major universities like Gauhati University and Dibrugarh University became important spaces of cultural exchange. Students from states such as Manipur, Mizoram, and Nagaland brought their personal collections of Korean dramas and films, introducing their peers to the content and creating shared viewing cultures that strengthened interpersonal and cross-cultural bonds.

---

### The K-pop Era

By the 2010s, the rise of K-pop significantly amplified the reach of Korean culture, driven by platforms like YouTube and social media. This digital expansion fostered deeper engagement, sparking curiosity not only about entertainment but also about Korean traditions, language, and lifestyle.

Popular second-generation K-pop groups such as TVXQ, BIGBANG, Super Junior, Girls' Generation, Wonder Girls, SHINee, and 2NE1 played a foundational role in establishing the Korean Wave in the region. Their influence was later sustained and expanded by subsequent generations of K-pop artists.

---

### Cultural Proximity and Regional Identity

The strong resonance of Hallyu in Northeast India can also be understood through the lens of cultural proximity, representation, and regional identity. The similarities between Korean and Northeast Indian physical features, fashion sensibilities, and social values foster a sense of relatability often absent in mainstream Indian media.

> *In this context, the adoption of Korean culture is not merely imitation but also an expression of regional identity and differentiation from dominant cultural narratives within India.*

---

### From Informal Consumption to Institutional Recognition

Today, the influence of Hallyu in Northeast India extends far beyond entertainment, encompassing fashion trends, beauty standards, culinary practices, language learning, and digital fandom cultures.

As interest in K-dramas and K-pop grew, educational institutions began responding to the demand for Korean language learning. Manipur University pioneered this effort in 2012 by introducing the region's first Korean language course, which later expanded into full-fledged degree programs. The establishment of the King Sejong Institute in Imphal in 2020 and the launch of a Korean language certificate course at Dibrugarh University in 2023 further reflected the growing institutional support for Korean studies.

At the same time, cultural exchanges between Northeast India and South Korea have become increasingly visible. Nagaland has strengthened ties with South Korea through music collaborations and the inclusion of Korean cultural elements in the Hornbill Festival, and cities such as Guwahati continue to host K-pop festivals, concerts, and fan-led events.

What began with the circulation of television dramas has ultimately fostered enduring cultural connections between Northeast India and South Korea.
EOT,
            ],

            // ── Article 5 ─────────────────────────────────────────────────────
            [
                'title'      => 'Food in K-Dramas: A Delicious Part of Hallyu',
                'tag'        => 'FOOD & CULTURE',
                'author'     => 'DKC Contributor',
                'sort_order' => 5,
                'excerpt'    => 'From ramyeon to tteokbokki — how Korean food on screen has found its way into kitchens and hearts across Northeast India.',
                'content'    => <<<'EOT'
## Food in K-Dramas: A Delicious Part of Hallyu in Northeast India

한국 드라마 속 음식: 동북 인도에서 한류의 맛있는 한 부분

When people think of Korean dramas, they often remember the emotional stories, unforgettable characters, and beautiful cinematography. However, there is another important element that has won the hearts of viewers around the world — food. From a simple bowl of ramyeon to a table full of traditional Korean dishes, food plays a special role in K-dramas. It has become one of the many reasons why Hallyu, or the Korean Wave, continues to grow in Northeast India.

As a K-drama fan, I have always noticed how food is shown in almost every episode. Whether it is a family having dinner together, friends meeting after a long day, or a couple sharing a late-night meal, food is always connected with emotions. These scenes make the audience feel warm and comfortable. They also introduce viewers to Korean culture in a natural way.

---

### The Foods We Fell in Love With

One of the most famous foods in K-dramas is **ramyeon (라면)**. It is often seen during emotional conversations or funny moments between characters. Another popular dish is **tteokbokki (떡볶이)**, the spicy rice cakes that are commonly sold by street vendors. **Kimchi (김치)**, a traditional fermented side dish, is served with almost every meal.

Other dishes that have become familiar names to K-drama fans include:

- **Kimbap (김밥)** — seaweed rice rolls
- **Bibimbap (비빔밥)** — mixed rice with vegetables
- **Bulgogi (불고기)** — marinated grilled beef
- **Korean fried chicken** — crispy and glazed
- **Samgyeopsal (삼겹살)** — grilled pork belly

Many dramas have made these dishes even more memorable. In *Business Proposal*, restaurant scenes and office lunches make Korean food look delicious and inviting. *Crash Landing on You* beautifully shows the importance of sharing meals with family and neighbors. Historical dramas such as *Bon Appétit, Your Majesty* introduce viewers to traditional royal cuisine, showing that food is not only about taste but also about history and culture.

---

### The Influence in Northeast India

The influence of these dramas can clearly be seen in Northeast India. Today, many young people enjoy trying Korean food after watching their favorite shows. Korean instant noodles, kimchi, snacks, and drinks are easily available in supermarkets and online stores. Many fans also try cooking Korean recipes at home by following videos on social media. Some even learn to use chopsticks because of K-dramas.

Food has become a way for fans to feel closer to Korean culture. It allows people to experience a small part of the country without leaving their homes. Through these dishes, viewers learn about Korean traditions, dining etiquette, and the importance of eating together. A simple meal in a drama often tells a story of friendship, love, family, or comfort.

---

### Two Cultures, One Table

The popularity of Korean food in Northeast India also shows how entertainment can connect people from different cultures. Although Korean and Northeast Indian cuisines are different, both value homemade meals, fresh ingredients, and sharing food with loved ones. This cultural connection makes Korean food even more appealing to viewers in the region.

> *Food has become an important part of the Hallyu experience. K-dramas have introduced audiences not only to exciting stories but also to the rich flavours and traditions of Korean cuisine.*

For many fans in Northeast India, trying Korean food is another way of celebrating their love for Korean culture. It proves that sometimes, a delicious meal on screen can create a connection that goes far beyond entertainment.

---

*한국 드라마는 시청자들에게 흥미로운 이야기뿐만 아니라 한국 음식의 풍부한 맛과 전통도 소개해 왔습니다. 이는 때때로 화면 속 맛있는 음식 한 끼가 단순한 오락을 넘어 사람들을 이어 줄 수 있다는 사실을 보여 줍니다.*
EOT,
            ],

            // ── Article 6 ─────────────────────────────────────────────────────
            [
                'title'      => 'My Hallyu Journey',
                'tag'        => 'STUDENT VOICE',
                'author'     => 'Zaimu Drunk, DKC Member',
                'sort_order' => 6,
                'excerpt'    => 'How BTS led one Dibrugarh University student from K-pop fandom to a Korean language diploma — and a new way of seeing the world.',
                'content'    => <<<'EOT'
## My Hallyu Journey

*Experiencing the Korean Wave in Northeast India*

나의 한류 여정: 인도 동북부에서 경험한 한국의 물결

Hallyu, or the Korean Wave, has become popular around the world through K-pop, K-dramas, Korean food, fashion, and language. In Northeast India, many young people have developed a strong interest in Korean culture, and I am one of them.

---

### It Began with BTS

My Hallyu journey began when I discovered BTS on YouTube. Their music, performances, and meaningful messages immediately attracted me. Although I could not understand Korean at first, I could feel the emotions in their songs. Their messages about hope, self-love, dreams, and perseverance gave me confidence and motivation during difficult times.

As I became a BTS fan, I started watching Korean dramas and became interested in Korean traditions, food, and everyday life. This gradually made me curious about the Korean language. I wanted to understand BTS's songs and Korean dramas without depending on translations and subtitles.

> *처음에는 한국어를 이해하지 못했지만, 노래를 통해 감정을 느낄 수 있었습니다. BTS의 음악은 저에게 희망과 자신감, 그리고 꿈을 향해 노력하는 힘을 주었습니다.*
>
> *(At first I could not understand Korean, but I could feel the emotions through the songs. BTS's music gave me hope, confidence, and the strength to work toward my dreams.)*

---

### From Fan to Learner

Because of my love for BTS and Korean culture, I decided to join the Diploma in Korean Language at Dibrugarh University. Learning Korean has been challenging but rewarding.

I can now:
- Read Hangul (한글)
- Understand simple conversations
- Recognise many Korean words and expressions

디브루가르 대학교에서 한국어 디플로마 과정을 시작했습니다. 한국어를 배우는 것은 어렵지만 매우 보람 있는 경험입니다.

---

### Hallyu is More Than Entertainment

For me, Hallyu is more than entertainment. It has inspired me to learn a new language, explore another culture, and become more confident. I hope to continue improving my Korean and one day visit South Korea.

저에게 한류는 단순한 오락이 아닙니다. 한류는 새로운 언어와 문화를 배우고 더 자신감 있는 사람이 되도록 영감을 주었습니다. 앞으로도 한국어 실력을 계속 향상시키고, 언젠가 한국을 방문하고 싶습니다.

I am grateful to BTS for introducing me to Korean culture and inspiring this unforgettable journey. My Hallyu journey is still continuing, and I look forward to discovering more in the future.

저에게 한국 문화를 소개하고 이 특별한 여정을 시작하게 해 준 BTS에게 감사하고 싶습니다. 저의 한류 여정은 아직 끝나지 않았으며, 앞으로 더 많은 것을 배우고 경험하고 싶습니다.

---

*화이팅! (Hwaiting!) — Keep going!* 🌸
EOT,
            ],

        ];

        foreach ($articles as $article) {
            DB::table('magazine_articles')->insert([
                'magazine_issue_id' => $issueId,
                'title'             => $article['title'],
                'excerpt'           => $article['excerpt'],
                'content'           => $article['content'],
                'author'            => $article['author'],
                'tag'               => $article['tag'],
                'sort_order'        => $article['sort_order'],
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }

        $this->command->info('인연 Vol. I seeded — 6 articles added.');
    }
}
