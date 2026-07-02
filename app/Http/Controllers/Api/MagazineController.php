<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\MagazineIssue;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    private const CACHE_TTL = 60; // seconds

    public function index(Request $request)
    {
        $issues = MagazineIssue::orderBy('sort_order')
            ->select(['slug','title','issue_label','year','month','cover_color','cover_accent','tagline','description','is_featured','page_count','sort_order'])
            ->get();

        return response()->json($issues)
            ->header('Cache-Control', 'public, max-age=' . self::CACHE_TTL . ', stale-while-revalidate=300');
    }

    public function show(string $slug)
    {
        $issue = MagazineIssue::where('slug', $slug)
            ->with(['articles' => fn($q) => $q->orderBy('sort_order')])
            ->firstOrFail();

        return response()->json($issue)
            ->header('Cache-Control', 'public, max-age=' . self::CACHE_TTL . ', stale-while-revalidate=300');
    }
}
