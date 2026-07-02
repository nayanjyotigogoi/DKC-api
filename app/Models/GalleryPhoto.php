<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class GalleryPhoto extends Model {
    protected $fillable = ['caption','category','event_name','year','aspect','image_path','color','icon','sort_order','is_visible'];
    protected $casts = ['is_visible' => 'boolean'];
}
