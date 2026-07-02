<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Event extends Model {
    protected $fillable = ['slug','title','korean_title','date','date_iso','time','location','category','status','description','long_description','highlights','image','color','is_featured','sort_order'];
    protected $casts = ['highlights' => 'array', 'is_featured' => 'boolean'];
}
