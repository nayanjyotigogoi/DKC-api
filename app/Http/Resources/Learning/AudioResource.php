<?php

namespace App\Http\Resources\Learning;

use Illuminate\Http\Resources\Json\JsonResource;

class AudioResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'url'            => $this->url,
            'duration_ms'    => $this->duration_ms,
            'type'           => $this->type,
            'speed_variant'  => $this->speed_variant,
            'speaker_gender' => $this->speaker_gender,
            'verified'       => $this->verified,
        ];
    }
}
