<?php

namespace App\Services\Learning;

use App\Models\Learning\Vocabulary;
use App\Models\Learning\GrammarPoint;
use App\Models\Learning\Conversation;
use App\Models\Learning\Lesson;

class SearchService
{
    private const LIMIT = 5;

    public function search(string $query): array
    {
        $term = "%{$query}%";

        $vocabulary = Vocabulary::where(function ($q) use ($term) {
            $q->where('korean', 'like', $term)
              ->orWhere('romanization', 'like', $term)
              ->orWhere('assamese', 'like', $term)
              ->orWhere('english', 'like', $term);
        })->limit(self::LIMIT)->get()
          ->map(fn ($v) => [
              'type'     => 'vocabulary',
              'id'       => $v->id,
              'title'    => $v->korean,
              'subtitle' => "{$v->romanization} · {$v->english}",
              'url'      => "/learn/dictionary/{$v->id}",
          ]);

        $grammar = GrammarPoint::where(function ($q) use ($term) {
            $q->where('title_ko', 'like', $term)
              ->orWhere('title_en', 'like', $term)
              ->orWhere('title_as', 'like', $term)
              ->orWhere('pattern_formula', 'like', $term);
        })->limit(self::LIMIT)->get()
          ->map(fn ($g) => [
              'type'     => 'grammar',
              'id'       => $g->id,
              'title'    => $g->title_ko,
              'subtitle' => $g->title_en,
              'url'      => "/learn/grammar/{$g->id}",
          ]);

        $conversations = Conversation::where(function ($q) use ($term) {
            $q->where('title_ko', 'like', $term)
              ->orWhere('title_en', 'like', $term)
              ->orWhere('title_as', 'like', $term);
        })->limit(self::LIMIT)->get()
          ->map(fn ($c) => [
              'type'     => 'conversation',
              'id'       => $c->id,
              'title'    => $c->title_ko,
              'subtitle' => $c->title_en,
              'url'      => "/learn/conversations/{$c->id}",
          ]);

        $lessons = Lesson::where('status', 'published')
          ->where(function ($q) use ($term) {
              $q->where('title_en', 'like', $term)
                ->orWhere('title_as', 'like', $term);
          })->limit(self::LIMIT)->get()
          ->map(fn ($l) => [
              'type'     => 'lesson',
              'id'       => $l->id,
              'title'    => $l->title_en,
              'subtitle' => $l->title_as,
              'url'      => "/learn/lessons/{$l->slug}",
          ]);

        return [
            'query'         => $query,
            'total'         => $vocabulary->count() + $grammar->count() + $conversations->count() + $lessons->count(),
            'vocabulary'    => $vocabulary->values()->all(),
            'grammar'       => $grammar->values()->all(),
            'conversations' => $conversations->values()->all(),
            'lessons'       => $lessons->values()->all(),
        ];
    }
}
