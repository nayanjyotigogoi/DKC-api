<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    private const CACHE_TTL = 120;

    public function index(Request $request)
    {
        $query = Resource::where('is_active', true)->orderBy('sort_order');

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        return response()->json($query->get())
            ->header('Cache-Control', 'public, max-age=' . self::CACHE_TTL . ', stale-while-revalidate=600');
    }

    public function categories()
    {
        $cats = [
            'study-materials' => ['label' => 'Study Materials',    'icon' => '📚', 'description' => 'Curated study guides, notes and learning paths for Korean learners at every level.'],
            'vocabulary'      => ['label' => 'Vocabulary Lists',   'icon' => '🗂️', 'description' => 'Topical word lists, TOPIK vocabulary packs and daily word sets to build your lexicon.'],
            'grammar'         => ['label' => 'Grammar Guide',      'icon' => '📝', 'description' => 'Clear explanations of Korean grammar patterns from basic particles to advanced structures.'],
            'korean-culture'  => ['label' => 'Korean Culture',     'icon' => '🎭', 'description' => 'Articles, essays and guides exploring Korean history, traditions, film, food and modern culture.'],
            'practice'        => ['label' => 'Practice Exercises', 'icon' => '✏️', 'description' => 'Interactive drills, reading passages, listening exercises and writing prompts.'],
            'books'           => ['label' => 'Recommended Books',  'icon' => '📖', 'description' => 'DKC\'s curated reading list — textbooks, novels, webtoons and reference works.'],
            'links'           => ['label' => 'Useful Links',       'icon' => '🔗', 'description' => 'The best external websites, apps, YouTube channels and tools for learning Korean.'],
        ];

        $counts = Resource::where('is_active', true)
            ->selectRaw('category, count(*) as total')
            ->groupBy('category')
            ->pluck('total', 'category');

        $result = [];
        foreach ($cats as $slug => $meta) {
            $result[] = array_merge($meta, ['slug' => $slug, 'count' => $counts[$slug] ?? 0]);
        }

        return response()->json($result)
            ->header('Cache-Control', 'public, max-age=' . self::CACHE_TTL . ', stale-while-revalidate=600');
    }
}
