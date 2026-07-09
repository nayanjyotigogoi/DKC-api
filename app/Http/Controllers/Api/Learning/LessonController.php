<?php

namespace App\Http\Controllers\Api\Learning;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\LessonCardResource;
use App\Http\Resources\Learning\LessonResource;
use App\Services\Learning\LessonService;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct(private readonly LessonService $lessonService) {}

    public function index(Request $request)
    {
        $lessons = $this->lessonService->list($request->only(['level', 'module_id']));
        return LessonCardResource::collection($lessons);
    }

    public function show(string $slug)
    {
        $lesson = $this->lessonService->getBySlug($slug);
        return new LessonResource($lesson);
    }
}
