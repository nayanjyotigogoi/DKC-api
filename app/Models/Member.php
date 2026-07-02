<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Member extends Model {
    protected $fillable = ['name','initials','role','korean_role','department','joined_month','joined_year','quote','dream','favourite_word','photo_path','color','is_spotlight','is_team','is_active','sort_order'];
    protected $casts = ['is_spotlight' => 'boolean', 'is_team' => 'boolean', 'is_active' => 'boolean'];
}
