<?php

namespace App\Http\Resources\Learning;

use Illuminate\Http\Resources\Json\JsonResource;

/** Full lesson resource — all content resolved, no waterfall fetches needed. */
class LessonResource extends JsonResource
{
    public function toArray($request): array
    {
        $prev = $this->previousLesson();
        $next = $this->nextLesson();

        return [
            'id'            => $this->id,
            'module_id'     => $this->module_id,
            'module'        => [
                'id'       => $this->module->id,
                'title_en' => $this->module->title_en,
                'title_as' => $this->module->title_as,
                'level'    => $this->module->level,
            ],
            'title_en'      => $this->title_en,
            'title_as'      => $this->title_as,
            'slug'          => $this->slug,
            'level'         => $this->level,
            'order_index'   => $this->order_index,
            'status'        => $this->status,
            'published_at'  => $this->published_at?->toIso8601String(),

            // All content fully resolved in one response
            'vocabulary'     => VocabularyResource::collection($this->vocabulary),
            'grammar'        => GrammarResource::collection($this->grammar),
            'conversations'  => ConversationResource::collection($this->conversations),
            'cultural_notes' => CulturalNoteResource::collection($this->culturalNotes),
            'quiz_questions' => QuizQuestionResource::collection($this->quizQuestions),

            // Navigation
            'prev_lesson' => $prev ? ['slug' => $prev->slug, 'title_en' => $prev->title_en] : null,
            'next_lesson' => $next ? ['slug' => $next->slug, 'title_en' => $next->title_en] : null,
        ];
    }
}
