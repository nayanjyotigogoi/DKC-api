<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class KoreanPhrase extends Model {
    protected $fillable = ['korean','english','romanized','sort_order','is_active'];
    protected $casts = ['is_active' => 'boolean'];
}
