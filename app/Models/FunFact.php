<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class FunFact extends Model {
    protected $fillable = ['type','korean_word','romanized','fact','is_active','sort_order'];
    protected $casts = ['is_active' => 'boolean'];
}
