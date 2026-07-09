<?php

namespace App\Models\Learning;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GrammarPoint extends Model
{
    use SoftDeletes;

    protected $table = 'learning_grammar';

    protected $fillable = [
        'title_ko',
        'title_en',
        'title_as',
        'pattern_formula',
        'explanation_en',
        'explanation_as',
        'level',
        'category',
        'examples',
        'related_vocabulary_ids',
    ];

    protected $casts = [
        'examples'               => 'array',
        'related_vocabulary_ids' => 'array',
    ];

    public function lessons(): BelongsToMany
    {
        return $this->belongsToMany(Lesson::class, 'lesson_grammar', 'grammar_id', 'lesson_id')
                    ->withPivot('order_index')
                    ->orderByPivot('order_index');
    }

    /**
     * Resolve related vocabulary objects from the stored ID array.
     * Returns an Eloquent collection — not a relationship, used in resources.
     */
    public function relatedVocabulary()
    {
        $ids = $this->related_vocabulary_ids ?? [];
        if (empty($ids)) {
            return collect();
        }
        return Vocabulary::whereIn('id', $ids)->get();
    }
}
