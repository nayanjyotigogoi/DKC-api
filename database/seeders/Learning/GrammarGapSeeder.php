<?php

namespace Database\Seeders\Learning;

use Illuminate\Database\Seeder;
use App\Models\Learning\GrammarPoint;

/**
 * Seeds grammar points that RelationshipsSeeder references by title_ko
 * but that did not exist in the database.
 *
 * After this seeder runs, RelationshipsSeeder will successfully link
 * these grammar points to their lessons.
 */
class GrammarGapSeeder extends Seeder
{
    public function run(): void
    {
        $points = [
            [
                'title_ko'          => '이다 / 아니다 (be / not be)',
                'title_en'          => 'To Be / Not To Be (Copula)',
                'title_as'          => 'হোৱা / নোহোৱা (কপুলা)',
                'pattern_formula'   => '명사 + 이에요 / 예요 | 명사 + 이/가 아니에요',
                'explanation_en'    => '이다 is the Korean copula meaning "to be." After a consonant-ending noun, use 이에요; after a vowel-ending noun, use 예요. The negative form 아니다 means "to not be" — use 이/가 아니에요.',
                'explanation_as'    => 'কোৰিয়ান ভাষাত 이다 মানে "হোৱা।" ব্যঞ্জনবৰ্ণৰ পিছত 이에요 আৰু স্বৰবৰ্ণৰ পিছত 예요 ব্যৱহাৰ হয়। অস্বীকৃতি ৰূপ 아니다 মানে "নহয়।"',
                'level'             => 'beginner',
                'category'          => 'particle',
                'examples'          => [
                    ['korean' => '저는 학생이에요.', 'romanization' => 'Jeoneun haksaengieyo.', 'assamese' => 'মই এজন ছাত্ৰ।', 'english' => 'I am a student.'],
                    ['korean' => '이분은 선생님이에요.', 'romanization' => 'Ibun-eun seonsaengnimieyo.', 'assamese' => 'এই মানুহজন এজন শিক্ষক।', 'english' => 'This person is a teacher.'],
                    ['korean' => '이것은 물이 아니에요.', 'romanization' => 'Igeoseun mul-i anieyo.', 'assamese' => 'এইটো পানী নহয়।', 'english' => 'This is not water.'],
                    ['korean' => '저는 학생이 아니에요.', 'romanization' => 'Jeoneun haksaeng-i anieyo.', 'assamese' => 'মই ছাত্ৰ নহয়।', 'english' => 'I am not a student.'],
                ],
            ],
            [
                'title_ko'          => '이/가 있다 vs. 이/가 없다',
                'title_en'          => 'To Have / Not Have (Existence)',
                'title_as'          => 'থকা / নথকা (অস্তিত্ব)',
                'pattern_formula'   => '명사 + 이/가 있어요 | 명사 + 이/가 없어요',
                'explanation_en'    => '있다 means "to exist / to have" and 없다 means "to not exist / not have." Use 이 after consonants and 가 after vowels. These are used both for possession and for indicating presence/absence.',
                'explanation_as'    => '있다 মানে "থকা / থাকা" আৰু 없다 মানে "নথকা।" ব্যঞ্জনৰ পিছত 이 আৰু স্বৰৰ পিছত 가 ব্যৱহাৰ হয়।',
                'level'             => 'beginner',
                'category'          => 'particle',
                'examples'          => [
                    ['korean' => '책이 있어요.', 'romanization' => 'Chaeg-i isseoyo.', 'assamese' => 'কিতাপ আছে।', 'english' => 'There is a book. / I have a book.'],
                    ['korean' => '시간이 없어요.', 'romanization' => 'Sigan-i eopsseoyo.', 'assamese' => 'সময় নাই।', 'english' => 'There is no time. / I have no time.'],
                    ['korean' => '동생이 있어요?', 'romanization' => 'Dongsaeng-i isseoyo?', 'assamese' => 'আপোনাৰ সৰু ভাই-ভনী আছে নে?', 'english' => 'Do you have a younger sibling?'],
                    ['korean' => '여기에 화장실이 없어요.', 'romanization' => 'Yeogie hwajangsil-i eopsseoyo.', 'assamese' => 'ইয়াত শৌচালয় নাই।', 'english' => 'There is no restroom here.'],
                ],
            ],
            [
                'title_ko'          => '에서 (Location particle — action)',
                'title_en'          => 'At / In (Location of Action)',
                'title_as'          => 'ত / ভিতৰত (কাৰ্যস্থান)',
                'pattern_formula'   => '장소 + 에서 + 동사',
                'explanation_en'    => '에서 marks the location where an action takes place. It attaches to the place noun and is followed by an action verb. Contrast with 에, which marks a static location (existence) or destination.',
                'explanation_as'    => '에서 কোনো ঠাইত কাৰ্য সংঘটিত হোৱাটো বুজায়। এইটো ঠাই-বাচক বিশেষ্যৰ পিছত ব্যৱহাৰ হয় আৰু ক্ৰিয়াপদৰ আগত আহে।',
                'level'             => 'beginner',
                'category'          => 'particle',
                'examples'          => [
                    ['korean' => '학교에서 공부해요.', 'romanization' => 'Hakgyo-eseo gongbuhaeoyo.', 'assamese' => 'মই বিদ্যালয়ত পঢ়াশুনা কৰোঁ।', 'english' => 'I study at school.'],
                    ['korean' => '식당에서 밥을 먹었어요.', 'romanization' => 'Sikdang-eseo bab-eul meogeosseoyo.', 'assamese' => 'মই ৰেষ্টুৰেণ্টত ভাত খালোঁ।', 'english' => 'I ate rice at the restaurant.'],
                    ['korean' => '도서관에서 책을 읽어요.', 'romanization' => 'Doseogwan-eseo chaeg-eul ilg-eoyo.', 'assamese' => 'মই পুথিভঁৰালত কিতাপ পঢ়োঁ।', 'english' => 'I read books at the library.'],
                    ['korean' => '어디에서 살아요?', 'romanization' => 'Eodie-seo sal-ayo?', 'assamese' => 'আপুনি ক\'ত থাকে?', 'english' => 'Where do you live?'],
                ],
            ],
            [
                'title_ko'          => '에 대해서 (about / regarding)',
                'title_en'          => 'About / Regarding',
                'title_as'          => 'বিষয়ে / সম্পৰ্কে',
                'pattern_formula'   => '명사 + 에 대해서 + 동사',
                'explanation_en'    => '에 대해서 is used after a noun to mean "about" or "regarding" that topic. It is often used with verbs like 말하다 (to talk), 이야기하다 (to discuss), 알다 (to know), and 생각하다 (to think).',
                'explanation_as'    => '에 대해서 বিশেষ্যৰ পিছত ব্যৱহাৰ হৈ "বিষয়ে" বা "সম্পৰ্কে" অৰ্থ দিয়ে। এইটো প্ৰায়েই 말하다, 이야기하다, 알다, 생각하다 আদি ক্ৰিয়াৰ সৈতে ব্যৱহাৰ হয়।',
                'level'             => 'intermediate',
                'category'          => 'connective',
                'examples'          => [
                    ['korean' => '한국 문화에 대해서 이야기해요.', 'romanization' => 'Hanguk munhwa-e daeheseo iyagihaeyo.', 'assamese' => 'কোৰিয়ান সংস্কৃতিৰ বিষয়ে কথা পাতোঁ।', 'english' => 'Let\'s talk about Korean culture.'],
                    ['korean' => '그 영화에 대해서 알아요?', 'romanization' => 'Geu yeonghwa-e daeheseo ar-ayo?', 'assamese' => 'সেই চিনেমাখনৰ বিষয়ে জানেনে?', 'english' => 'Do you know about that movie?'],
                    ['korean' => '이 문제에 대해서 생각해 봤어요.', 'romanization' => 'I munje-e daeheseo saengkae bwasseoyo.', 'assamese' => 'মই এই সমস্যাৰ বিষয়ে চিন্তা কৰিছিলোঁ।', 'english' => 'I thought about this problem.'],
                    ['korean' => '케이팝에 대해서 뭐 알아요?', 'romanization' => 'K-pop-e daeheseo mwo arayo?', 'assamese' => 'কে-পপৰ বিষয়ে কি জানে?', 'english' => 'What do you know about K-pop?'],
                ],
            ],
        ];

        foreach ($points as $p) {
            GrammarPoint::firstOrCreate(['title_ko' => $p['title_ko']], $p);
        }
    }
}
