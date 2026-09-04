<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PressMention extends Model
{
    protected $fillable = [
        'title',
        'source_name',
        'source_url',
        'image_path',
        'language',
        'published_date',
        'is_featured',
        'sort_order',
    ];

    protected $casts = [
        'published_date' => 'date',
        'is_featured'    => 'boolean',
    ];
}
