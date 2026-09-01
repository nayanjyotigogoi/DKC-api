<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningChapter;
use App\Models\LearningChapterItem;
use App\Models\LearningChapterConversation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LearningChapterController extends Controller
{
    // ── Chapters ──────────────────────────────────────────────────────────────

    /** GET /api/admin/learning/chapters */
    public function index(): JsonResponse
    {
        $chapters = LearningChapter::orderBy('sort_order')->get();
        return response()->json($chapters);
    }

    /** GET /api/admin/learning/chapters/{id} — full chapter with items + conversations */
    public function show(LearningChapter $chapter): JsonResponse
    {
        $chapter->load(['items', 'conversations']);

        // Group items by section for the admin UI
        $itemsBySection = $chapter->items
            ->groupBy('section')
            ->map(fn ($items) => $items->values())
            ->toArray();

        return response()->json([
            'chapter'          => $chapter,
            'items_by_section' => $itemsBySection,
            'conversations'    => $chapter->conversations,
        ]);
    }

    /** PATCH /api/admin/learning/chapters/{id} — update chapter metadata */
    public function updateChapter(Request $request, LearningChapter $chapter): JsonResponse
    {
        $data = $request->validate([
            'title_en'     => 'sometimes|string|max:120',
            'title_ko'     => 'sometimes|string|max:120',
            'description'  => 'sometimes|nullable|string|max:500',
            'accent_color' => 'sometimes|string|max:20',
            'tint_color'   => 'sometimes|string|max:20',
            'border_color' => 'sometimes|string|max:20',
            'icon'         => 'sometimes|string|max:10',
            'is_published' => 'sometimes|boolean',
        ]);

        $chapter->update($data);
        return response()->json($chapter);
    }

    // ── Items ─────────────────────────────────────────────────────────────────

    /** POST /api/admin/learning/chapters/{id}/items */
    public function createItem(Request $request, LearningChapter $chapter): JsonResponse
    {
        $data = $request->validate([
            'section'      => 'required|string|max:60',
            'korean'       => 'required|string|max:100',
            'speak_text'   => 'nullable|string|max:200',
            'romanization' => 'nullable|string|max:100',
            'english'      => 'nullable|string|max:200',
            'assamese'     => 'nullable|string|max:200',
            'meta'         => 'nullable|array',
            'sort_order'   => 'nullable|integer',
        ]);

        // Auto-assign sort_order if not provided
        if (!isset($data['sort_order'])) {
            $data['sort_order'] = LearningChapterItem::where('chapter_id', $chapter->id)
                ->where('section', $data['section'])
                ->max('sort_order') + 1;
        }

        $item = $chapter->items()->create($data);
        return response()->json($item, 201);
    }

    /** PATCH /api/admin/learning/items/{item} */
    public function updateItem(Request $request, LearningChapterItem $item): JsonResponse
    {
        $data = $request->validate([
            'korean'       => 'sometimes|string|max:100',
            'speak_text'   => 'sometimes|nullable|string|max:200',
            'romanization' => 'sometimes|nullable|string|max:100',
            'english'      => 'sometimes|nullable|string|max:200',
            'assamese'     => 'sometimes|nullable|string|max:200',
            'meta'         => 'sometimes|nullable|array',
            'sort_order'   => 'sometimes|integer',
            'is_active'    => 'sometimes|boolean',
        ]);

        $item->update($data);
        return response()->json($item);
    }

    /** DELETE /api/admin/learning/items/{item} */
    public function deleteItem(LearningChapterItem $item): JsonResponse
    {
        $item->delete();
        return response()->json(['ok' => true]);
    }

    /** POST /api/admin/learning/items/reorder — bulk sort_order update */
    public function reorderItems(Request $request): JsonResponse
    {
        $request->validate([
            'items'            => 'required|array',
            'items.*.id'       => 'required|integer|exists:learning_chapter_items,id',
            'items.*.sort_order' => 'required|integer',
        ]);

        foreach ($request->items as $row) {
            LearningChapterItem::where('id', $row['id'])
                ->update(['sort_order' => $row['sort_order']]);
        }

        return response()->json(['ok' => true]);
    }

    // ── Conversations ─────────────────────────────────────────────────────────

    /** POST /api/admin/learning/chapters/{id}/conversations */
    public function createConversation(Request $request, LearningChapter $chapter): JsonResponse
    {
        $data = $request->validate([
            'speaker'    => 'required|in:A,B',
            'korean'     => 'required|string',
            'english'    => 'required|string',
            'assamese'   => 'nullable|string',
            'speak_text' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);

        if (!isset($data['sort_order'])) {
            $data['sort_order'] = LearningChapterConversation::where('chapter_id', $chapter->id)
                ->max('sort_order') + 1;
        }

        $line = $chapter->conversations()->create($data);
        return response()->json($line, 201);
    }

    /** PATCH /api/admin/learning/conversations/{line} */
    public function updateConversation(Request $request, LearningChapterConversation $line): JsonResponse
    {
        $data = $request->validate([
            'speaker'    => 'sometimes|in:A,B',
            'korean'     => 'sometimes|string',
            'english'    => 'sometimes|string',
            'assamese'   => 'sometimes|nullable|string',
            'speak_text' => 'sometimes|nullable|string',
            'sort_order' => 'sometimes|integer',
        ]);

        $line->update($data);
        return response()->json($line);
    }

    /** DELETE /api/admin/learning/conversations/{line} */
    public function deleteConversation(LearningChapterConversation $line): JsonResponse
    {
        $line->delete();
        return response()->json(['ok' => true]);
    }

    /** POST /api/admin/learning/conversations/reorder */
    public function reorderConversations(Request $request): JsonResponse
    {
        $request->validate([
            'lines'              => 'required|array',
            'lines.*.id'         => 'required|integer|exists:learning_chapter_conversations,id',
            'lines.*.sort_order' => 'required|integer',
        ]);

        foreach ($request->lines as $row) {
            LearningChapterConversation::where('id', $row['id'])
                ->update(['sort_order' => $row['sort_order']]);
        }

        return response()->json(['ok' => true]);
    }

    // ── Public read endpoint (used by the frontend) ───────────────────────────

    /** GET /api/learning/chapters — public, no auth */
    public function publicIndex(): JsonResponse
    {
        $chapters = LearningChapter::where('is_published', true)
            ->orderBy('sort_order')
            ->with(['items' => fn($q) => $q->where('is_active', true)->orderBy('sort_order'), 'conversations'])
            ->get();

        return response()->json($chapters);
    }

    /** GET /api/learning/chapters/{slug} — public, no auth */
    public function publicShow(string $slug): JsonResponse
    {
        $chapter = LearningChapter::where('slug', $slug)
            ->where('is_published', true)
            ->with([
                'items' => fn($q) => $q->where('is_active', true)->orderBy('sort_order'),
                'conversations',
            ])
            ->firstOrFail();

        $itemsBySection = $chapter->items
            ->groupBy('section')
            ->map(fn ($items) => $items->values());

        return response()->json([
            'chapter'          => $chapter,
            'items_by_section' => $itemsBySection,
            'conversations'    => $chapter->conversations,
        ]);
    }
}
