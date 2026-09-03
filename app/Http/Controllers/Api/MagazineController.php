<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\MagazineIssue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class MagazineController extends Controller
{
    private const CACHE_TTL = 60;

    public function index(Request $request)
    {
        $issues = MagazineIssue::orderBy('sort_order')
            ->select(['slug','title','issue_label','year','month','cover_color','cover_accent','tagline','description','is_featured','page_count','sort_order','pdf_path'])
            ->get()
            ->map(fn($i) => array_merge($i->makeHidden(['pdf_path'])->toArray(), ['has_pdf' => !empty($i->pdf_path)]));

        return response()->json($issues)
            ->header('Cache-Control', 'public, max-age=' . self::CACHE_TTL . ', stale-while-revalidate=300');
    }

    public function show(string $slug)
    {
        $issue = MagazineIssue::where('slug', $slug)
            ->with(['articles' => fn($q) => $q->orderBy('sort_order')])
            ->firstOrFail();

        $data = $issue->makeHidden(['pdf_path'])->toArray();
        $data['has_pdf'] = !empty($issue->pdf_path);

        return response()->json($data)
            ->header('Cache-Control', 'public, max-age=' . self::CACHE_TTL . ', stale-while-revalidate=300');
    }

    // Generate a short-lived token (15 min) to access the PDF
    public function pdfToken(string $slug)
    {
        $issue = MagazineIssue::where('slug', $slug)->firstOrFail();

        if (empty($issue->pdf_path)) {
            return response()->json(['error' => 'No PDF available'], 404);
        }

        $token = Str::random(48);
        Cache::put("pdf_token_{$token}", $issue->pdf_path, now()->addMinutes(15));

        return response()->json(['token' => $token, 'expires_in' => 900]);
    }

    // Stream the PDF inline — never as a download
    public function pdfStream(Request $request)
    {
        $token = $request->query('token');
        if (!$token) abort(403);

        $path = Cache::get("pdf_token_{$token}");
        if (!$path) abort(403, 'Token expired or invalid');

        if (!Storage::disk('private')->exists($path)) abort(404);

        $stream = Storage::disk('private')->readStream($path);
        $size   = Storage::disk('private')->size($path);

        return response()->stream(function () use ($stream) {
            fpassthru($stream);
        }, 200, [
            'Content-Type'              => 'application/pdf',
            'Content-Length'            => $size,
            'Content-Disposition'       => 'inline; filename="dkc-magazine.pdf"',
            'X-Content-Type-Options'    => 'nosniff',
            'Cache-Control'             => 'no-store, no-cache, must-revalidate',
            'Pragma'                    => 'no-cache',
            'X-Frame-Options'           => 'SAMEORIGIN',
        ]);
    }
}
