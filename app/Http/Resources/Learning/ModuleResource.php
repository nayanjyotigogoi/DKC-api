<?php

namespace App\Http\Resources\Learning;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'           => $this->id,
            'title_en'     => $this->title_en,
            'title_as'     => $this->title_as,
            'level'        => $this->level,
            'order_index'  => $this->order_index,
            'status'       => $this->status,
            'lesson_count' => $this->lessons_count ?? $this->lesson_count,
        ];
    }
}
