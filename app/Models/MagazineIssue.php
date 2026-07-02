<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MagazineIssue extends Model {
    protected $fillable = ['slug','title','issue_label','year','month','cover_color','cover_accent','tagline','description','is_featured','page_count','pdf_path','sort_order'];
    protected $casts = ['is_featured' => 'boolean'];
    public function articles() { return $this->hasMany(MagazineArticle::class); }
}
