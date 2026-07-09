<?php

namespace App\Http\Controllers\Api\Learning;

use App\Http\Controllers\Controller;
use App\Services\Learning\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct(private readonly SearchService $searchService) {}

    public function __invoke(Request $request)
    {
        $query = trim($request->input('q', ''));

        if (strlen($query) < 1) {
            return response()->json([
                'query'         => $query,
                'total'         => 0,
                'vocabulary'    => [],
                'grammar'       => [],
                'conversations' => [],
                'lessons'       => [],
            ]);
        }

        return response()->json($this->searchService->search($query));
    }
}
