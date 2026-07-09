<?php

namespace App\Http\Controllers\Api\Learning;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\GrammarResource;
use App\Services\Learning\GrammarService;
use Illuminate\Http\Request;

class GrammarController extends Controller
{
    public function __construct(private readonly GrammarService $grammarService) {}

    public function index(Request $request)
    {
        $paginated = $this->grammarService->paginate(
            $request->only(['level', 'category', 'search'])
        );

        return GrammarResource::collection($paginated);
    }

    public function show(int $id)
    {
        $point = $this->grammarService->findById($id);
        return new GrammarResource($point);
    }
}
