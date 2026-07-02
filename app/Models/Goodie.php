<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Goodie extends Model {
    protected $fillable = ['name','korean_name','category','price','description','availability','image_path','color','icon','tags','sort_order'];
    protected $casts = ['tags' => 'array'];
}
