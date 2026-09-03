<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MediaPick extends Model {
    protected $fillable = ['type','title','korean_title','description','tag','streaming_platform','streaming_url','is_active','sort_order'];
    protected $casts = ['is_active' => 'boolean'];
}
