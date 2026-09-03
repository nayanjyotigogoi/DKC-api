<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class KoreanPhrase extends Model {
    protected $fillable = ['korean','english','romanized','sort_order','is_active','is_featured'];
    protected $casts = ['is_active' => 'boolean', 'is_featured' => 'boolean'];
}
