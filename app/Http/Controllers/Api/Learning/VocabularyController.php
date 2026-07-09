<?php

namespace App\Http\Controllers\Api\Learning;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\VocabularyResource;
use App\Services\Learning\VocabularyService;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    public function __construct(private readonly VocabularyService $vocabularyService) {}

    public function index(Request $request)
    {
        $paginated = $this->vocabularyService->paginate(
            $request->only(['level', 'part_of_speech', 'search']),
            (int) $request->input('per_page', 24)
        );

        return VocabularyResource::collection($paginated);
    }

    public function show(int $id)
    {
        $entry = $this->vocabularyService->findById($id);
        return new VocabularyResource($entry);
    }
}
