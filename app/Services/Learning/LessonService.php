<?php

namespace App\Services\Learning;

use App\Models\Learning\Lesson;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class LessonService
{
    /**
     * Fetch a published lesson by slug with all content eagerly loaded.
     * Single query group — no N+1 issues.
     */
    public function getBySlug(string $slug): Lesson
    {
        $lesson = Lesson::with([
            'module',
            'vocabulary.audio',
            'vocabulary.exampleAudio',
            'grammar',
            'conversations.lines.audio',
            'culturalNotes',
            'quizQuestions.audio',
        ])
        ->where('slug', $slug)
        ->where('status', 'published')
        ->firstOrFail();

        return $lesson;
    }

    /**
     * List lessons — optionally filtered by level or module.
     */
    public function list(array $filters = []): \Illuminate\Support\Collection
    {
        $query = Lesson::where('status', 'published')
                       ->withCount(['vocabulary', 'grammar', 'conversations', 'quizQuestions'])
                       ->orderBy('order_index');

        if (!empty($filters['level'])) {
            $query->where('level', $filters['level']);
        }

        if (!empty($filters['module_id'])) {
            $query->where('module_id', $filters['module_id']);
        }

        return $query->get();
    }

    /**
     * Publish a lesson. Validates completeness before changing status.
     *
     * @throws \RuntimeException when the lesson is not ready to publish.
     */
    public function publish(Lesson $lesson): Lesson
    {
        if (!$lesson->isPublishable()) {
            throw new \RuntimeException(
                'Lesson cannot be published. It must have at least one vocabulary entry, ' .
                'one grammar point, one conversation, and one quiz question.'
            );
        }

        $lesson->update([
            'status'       => 'published',
            'published_at' => now(),
        ]);

        return $lesson->fresh();
    }

    /**
     * Unpublish a lesson (revert to draft).
     */
    public function unpublish(Lesson $lesson): Lesson
    {
        $lesson->update(['status' => 'draft']);
        return $lesson->fresh();
    }

    /**
     * Sync content relationships for a lesson.
     * Each $items array should be [{id, order_index}].
     */
    public function syncContent(Lesson $lesson, array $vocabularyIds, array $grammarIds, array $conversationIds, array $culturalNoteIds, array $quizIds): void
    {
        DB::transaction(function () use ($lesson, $vocabularyIds, $grammarIds, $conversationIds, $culturalNoteIds, $quizIds) {
            $lesson->vocabulary()->sync($this->toPivotFormat($vocabularyIds));
            $lesson->grammar()->sync($this->toPivotFormat($grammarIds));
            $lesson->conversations()->sync($this->toPivotFormat($conversationIds));
            $lesson->culturalNotes()->sync($this->toPivotFormat($culturalNoteIds));
            $lesson->quizQuestions()->sync($this->toPivotFormat($quizIds));
        });
    }

    /** Convert [{id, order_index}] to the pivot sync format Laravel expects. */
    private function toPivotFormat(array $items): array
    {
        $result = [];
        foreach ($items as $item) {
            $result[$item['id']] = ['order_index' => $item['order_index'] ?? 0];
        }
        return $result;
    }
}
