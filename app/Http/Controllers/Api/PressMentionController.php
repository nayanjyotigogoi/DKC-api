<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PressMention;
class PressMentionController extends Controller
{
    public function index()
    {
        $mentions = PressMention::orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('published_date')
            ->get()
            ->map(fn($m) => [
                'id'             => $m->id,
                'title'          => $m->title,
                'source_name'    => $m->source_name,
                'source_url'     => $m->source_url,
                'image_path'     => $m->image_path,
                'language'       => $m->language,
                'published_date' => $m->published_date?->format('M j, Y'),
                'is_featured'    => $m->is_featured,
            ]);

        return response()->json($mentions)
            ->header('Cache-Control', 'public, max-age=60, stale-while-revalidate=300');
    }
}
