<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LearningModule extends Model
{
    use SoftDeletes;

    protected $table = 'learning_modules';

    protected $fillable = [
        'title_en',
        'title_as',
        'level',
        'order_index',
        'status',
    ];

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'module_id')->orderBy('order_index');
    }

    public function publishedLessons(): HasMany
    {
        return $this->hasMany(Lesson::class, 'module_id')
                    ->where('status', 'published')
                    ->orderBy('order_index');
    }

    public function getLessonCountAttribute(): int
    {
        return $this->lessons()->count();
    }
}
