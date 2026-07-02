<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'category', 'description', 'content', 'url',
        'file_path', 'type', 'difficulty', 'author', 'is_active', 'sort_order',
    ];

    protected $casts = ['is_active' => 'boolean'];
}
