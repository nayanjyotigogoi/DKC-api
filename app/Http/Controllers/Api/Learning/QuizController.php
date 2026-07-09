<?php

namespace App\Http\Controllers\Api\Learning;

use App\Http\Controllers\Controller;
use App\Http\Resources\Learning\QuizQuestionResource;
use App\Models\Learning\Lesson;
use Illuminate\Http\JsonResponse;

class QuizController extends Controller
{
    /**
     * GET /learning/lessons/{slug}/quiz
     *
     * Returns all quiz questions linked to a published lesson, ordered by pivot order_index.
     * The correct_index is included — the frontend handles answer checking client-side.
     */
    public function forLesson(string $slug): JsonResponse
    {
        $lesson = Lesson::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $questions = $lesson->quizQuestions()->with('audio')->get();

        return response()->json([
            'lesson_slug'  => $lesson->slug,
            'lesson_title' => $lesson->title_en,
            'total'        => $questions->count(),
            'data'         => QuizQuestionResource::collection($questions),
        ]);
    }
}
