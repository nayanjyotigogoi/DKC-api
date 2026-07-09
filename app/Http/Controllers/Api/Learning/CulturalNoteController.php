<?php

namespace App\Http\Controllers\Api\Learning;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\CulturalNoteResource;
use App\Models\Learning\CulturalNote;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CulturalNoteController extends Controller
{
    /**
     * GET /learning/cultural-notes
     *
     * Optional query params: category, level, search (title match)
     */
    public function index(Request $request): JsonResponse
    {
        $query = CulturalNote::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title_en', 'like', "%{$request->search}%")
                  ->orWhere('title_as', 'like', "%{$request->search}%");
            });
        }

        $notes = $query->orderBy('category')->orderBy('title_en')->get();

        return response()->json([
            'data' => CulturalNoteResource::collection($notes),
        ]);
    }

    /**
     * GET /learning/cultural-notes/{id}
     */
    public function show(int $id): JsonResponse
    {
        $note = CulturalNote::findOrFail($id);

        return response()->json([
            'data' => new CulturalNoteResource($note),
        ]);
    }
}
