<?php

namespace App\Http\Resources\Learning;

use Illuminate\Http\Resources\Json\JsonResource;

class GrammarResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'              => $this->id,
            'title_ko'        => $this->title_ko,
            'title_en'        => $this->title_en,
            'title_as'        => $this->title_as,
            'pattern_formula' => $this->pattern_formula,
            'explanation_en'  => $this->explanation_en,
            'explanation_as'  => $this->explanation_as,
            'level'           => $this->level,
            'category'        => $this->category,
            'examples'        => $this->examples ?? [],
            'related_vocabulary' => VocabularyResource::collection(
                $this->relatedVocabulary()
            ),
        ];
    }
}
